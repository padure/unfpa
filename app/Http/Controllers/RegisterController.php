<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegiserRequest;
use App\School;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    /**
     * Register page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        return view('register', [
            'schools' => School::all()
        ]);
    }

    /**
     * Set user info
     *
     * @param RegiserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function setInfo(RegiserRequest $request)
    {
        # Записываем данные в сессию
        session()->put('userInfo', $request->all());

        # Редиректим на страницу теста

        return redirect()->route('step', 1);
    }
}
