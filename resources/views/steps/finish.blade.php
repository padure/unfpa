@extends('layouts.app')
@section('content')
    <h1 class="title" style="padding: 90px 0;">@lang('labels.congratulations')</h1>

    <div class="results">
        <h2>@lang('labels.answered_correctly', ['success_sum' => $result->success_sum, 'total' => App\Question::query()->count(), 'percentage' => round(($result->success_sum / App\Question::query()->count()) * 100)])</h2>
        @if($result->success_sum < 63)
        <p>@lang('labels.limited_knowledge')</p>
        @endif

        @if($result->success_sum > 62 && $result->success_sum < 95)
        <p>@lang('labels.health_risks')</p>
        @endif

        @if($result->success_sum > 94 && $result->success_sum < 114)
        <p>@lang('labels.knowledgeable')</p>
        @endif

        @if($result->success_sum > 114)
        <p>@lang('labels.excellent')</p>
        @endif
    </div>

    <div class="res-wrp">
        <div class="res-boy">
            <span>@lang('labels.thank_you')</span>
        </div>
        <div class="res-girl">
            <span>@lang('labels.encourage_others')</span>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .results {
            border-radius: 34px;
            background: #6b3f9e;
            width: 100%;
            max-width: 956px;
            padding: 70px 0;
            margin: auto;
            text-align: center;
            color: #FFF;
        }

        .results h2 {
            margin: 0;
            padding: 0;
            font-size: 48px;
        }

        .results p {
            margin: 0;
            padding: 30px 0 0 0;
            color: rgba(255, 255, 255, 0.7);
            max-width: 656px;
            margin: auto;
        }

        .res-wrp {
            margin-top: 90px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            max-width: 1200px;
            position: relative;
        }

        .res-boy {
            position: relative;
            width: 593px;
            height: 494px;
            background-image: url({{ asset('img/boy.svg') }});
        }

        .res-boy span {
            max-width: 250px;
            position: absolute;
            color: #311746;
            left: 320px;
            top: 105px;
            font-size: 14px;
        }

        .res-girl {
            position: relative;
            background-image: url({{ asset('img/girl.svg') }});
            width: 696px;
            height: 496px;
            position: absolute;
            right: 0;
            top: 60px;
        }

        .res-girl span {
            max-width: 300px;
            color: #311746;
            position: absolute;
            top: 190px;
            left: 30px;
            font-size: 14px!important;
        }
    </style>
@endsection
