<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{

    /**
     * List page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.questions.list', [
            'list' => Question::query()
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
        return view('admin.questions.add');
    }


    /**
     * Store question
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Question::query()->create(
            $request->except('_token', '_method')
        );
        return redirect()->route('questions.index');
    }

    /**
     * Edit page
     *
     * @param Question $question
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', [
            'question' => $question
        ]);
    }


    /**
     * Update question
     *
     * @param Request $request
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Question $question)
    {
        $question->update(
            $request->except('_token', '_method')
        );

        return redirect()->route('questions.index');
    }

    /**
     * Delete question
     *
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index');
    }
}
