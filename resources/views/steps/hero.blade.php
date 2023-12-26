@extends('layouts.app')
@section('content')
    <div class="main-frame">
        <h1>@lang('labels.chapter_complete')</h1>
        <a href="{{ route('step', 3) }}" class="main-frame-btn">
            @lang('labels.next_chapter')
        </a>
        <img src="{{ asset('img/hero.png') }}" class="frame-img">
    </div>
@endsection
