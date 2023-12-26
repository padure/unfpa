<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Index page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        return view('index');
    }

    public function translate (string $locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
