<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    <title>{{ env('APP_NAME') }}</title>
    @yield('css')
</head>
<body>
    <div class="intro-wrp">
        <header>
            <div class="logo title">
                <img src="{{ asset('settings/mec_1.png') }}" alt="logo" class="main-logo">
                <img src="{{ asset('settings/unfpa.png') }}" alt="logo" class="main-logo2">
                <img src="{{ asset('settings/ada.png') }}" alt="logo" class="main-logo2">
            </div>
            <nav>
                <ul class="lang-switcher">
                    <li class="fw-bold"><a href="{{ route('home') }}">@lang('labels.home')</a></li>
                    <li class="{{ session()->get('locale') == 'ro'?'active':'' }}">
                        <a href="{{ route('translate', ['locale'=>'ro']) }}">
                            @lang('labels.ro')
                        </a>
                    </li>
                    <li class="{{ session()->get('locale') == 'ru'?'active':'' }}">
                        <a href="{{ route('translate', ['locale'=>'ru']) }}">
                            @lang('labels.ru')
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        @yield('content')
    </div>
    <script
        src="{{ asset('//code.jquery.com/jquery-3.6.0.js') }}"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/depend.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>
</html>
