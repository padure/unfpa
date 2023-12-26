@extends('layouts.app')
@section('content')
    <div class="home-frame">
        <div class="home-cnt" style="background-image: url('{{ asset('img/drug.svg') }}');">
            <h1 class="title">@lang('labels.welcome')</h1>
            <p class="frame-text">@lang('labels.description1')</p>
            <p class="frame-text">@lang('labels.description2')</p>
            <a href="{{ route('register') }}" class="main-frame-btn home-lnk">@lang('labels.start_button')</a>
        </div>
        <div class="home-cpr">
            <div class="copyright">
                <span>@lang('labels.copyright')</span>
            </div>
        </div>
    </div>
@endsection
