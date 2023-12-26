<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use App\Question;

class AnswersController extends Controller
{

    /**
     * List page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.answers.list', [
            'list' => Answer::query()
                ->orderBy('created_at', 'desc')
                ->paginate()
        ]);
    }

    /**
     * Create page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $questions = Question::pluck('name_ro', 'id');
        return view('admin.answers.add', [
            'questions' => $questions
        ]);
    }

    /**
     * Edit page
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $answers = Answer::query()->create(
            $request->except('_token', '_method')
        );

        return redirect()->route('answers.index', $answers->id);
    }

    /**
     * Edit page
     *
     * @param Answer $answer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Answer $answer)
    {
        return view('admin.answers.edit', [
            'answer' => $answer,
            'questions' => Question::all()
        ]);
    }

    /**
     * Update answer
     *
     * @param Request $request
     * @param Answer $answer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Answer $answer)
    {
        $answer->update(
            $request->except('_token', '_method')
        );

        return redirect()->route('answers.index', $answer->id);
    }

    /**
     * Delete answer
     *
     * @param Answer $answer
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('answers.index');
    }
}
