@extends('layouts.app')
@section('content')
    <div class="main-frame">
        <h1>@lang('labels.success_message')</h1>
        <a href="{{ route('step', 2) }}" class="main-frame-btn">
            @lang('labels.next_chapter')
        </a>
        <img src="{{ asset('img/zagluska.svg') }}" class="frame-img">
    </div>
@endsection
