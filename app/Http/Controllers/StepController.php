<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Question;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;

class StepController extends Controller
{

    /**
     * Step page
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index($id)
    {
        return view('steps.'.$id, [
            'step' => Question::query()
                ->with('answers')
                ->where('step', $id)
        ]);
    }

    /**
     * Set test info
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function setInfo(Request $request, $id)
    {
        session()->put('step_'.$id, $request->except('_token'));

        if ($id == 1) {
            return redirect()->route('step.great-job');
        } elseif ($id == 2) {
            return redirect()->route('step.hero');
        } elseif ($id == 3) {
            $result = $this->calcResult();
            session()->put('result_id', $result->id);
            return redirect()->route('step.finish');
        }

        return redirect()->route('home');
    }

    /**
     * Hero page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function hero()
    {
        return view('steps.hero');
    }

    /**
     * Zagluscha page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function greatJob()
    {
        return view('steps.zagluscha');
    }

    /**
     * Finish page
     *
     * @param Result $result
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function finish()
    {
        $resultId = session()->get('result_id');
        $result = Result::findOrFail($resultId);
        return view('steps.finish', [
            'result' => $result
        ]);
    }

        /**
     * Calc results
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */

    private function calcResult()
    {
        # Получаем все результаты
        $setOne = session()->get('step_1');
        $setTwo = session()->get('step_2');
        $setThere = session()->get('step_3');

        # Генерируем лист ответов
        $resultPdfOne = $this->getResultArray($setOne);
        $resultPdfTwo = $this->getResultArray($setTwo);
        $resultPdfThere = $this->getResultArray($setThere);

        # Обьеденяем массивы
        $resultPdfAll = $resultPdfOne->merge($resultPdfTwo);
        $resultPdfAll = $resultPdfAll->merge($resultPdfThere);

        # Количество правильных ответов
        $sum = $resultPdfAll->sum(function ($item) {
            return $item['status'] == 1;
        });

        # HTML PDF
        $html = view('pdf.pdf', [
            'results' => $resultPdfAll
        ])->render();

        # Генерация PDF
        $pdf = new Mpdf();
        $pdf->WriteHTML($html);
        # Имя файла
        $name = time().rand(1, 1000).'.pdf';
        # Сохраняем PDF
        $storage = $pdf->Output($name, 'F');

        # Записывам результат в БД
        $result = Result::query()->create(
            session()->get('userInfo') + [
                'success_sum' => $sum,
                'pdf_url' => $name
            ]
        );

        # Отправка письма учителю
        Mail::send('mail.result', [
            'result' => $result,
            'pdf' => true
        ], function ($message) use ($result) {
            $message->to($result->email_teachers)->subject('Rezultatele testului!');
        });

        $result->load('school');

        # Отправка письма ученику
        Mail::send('mail.result', [
            'result' => $result,
            'pdf' => false
        ], function ($message) use ($result) {
            $message->to($result->email)->subject('Rezultatele testului!');
        });

        # Очищаем информацию в сессии
        session()->put('step_1', false);
        session()->put('step_2', false);
        session()->put('step_3', false);
        session()->put('userInfo', false);

        return $result;
    }

    /**
     * Get result array
     *
     * @param $array
     * @return \Illuminate\Support\Collection
     */
    private function getResultArray($array)
    {
        return collect($array)->map(function ($item, $key) {
            $answer = Answer::query()
                ->with('question')
                ->findOrFail($item);

            return [
                'question' => session()->get('locale') == 'ro' ? $answer->question->name_ro:$answer->question->name_ru,
                'answer' => $answer->name ?? $answer->letter,
                'status' => $answer->status
            ];
        });
    }
}
