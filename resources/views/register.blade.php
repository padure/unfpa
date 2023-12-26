@extends('layouts.app')
@section('content')
    <div class="register-frame">
        <h1 class="title">@lang('labels.register_title')</h1>
        <p class="frame-text">@lang('labels.register_description')</p>
        <div class="reg-wrp" style="margin-bottom: 40px;">
            <div class="reg-form">
                <form action="{{ route('register.set.info') }}" method="post">
                    @csrf
                    <label for="last_name">@lang('labels.last_name')</label>
                    <input id="last_name" name="last_name" type="text" placeholder="" required>

                    <label for="first_name">@lang('labels.first_name')</label>
                    <input id="first_name" name="first_name" type="text" placeholder="" required>

                    <label for="email">@lang('labels.email')</label>
                    <input id="email" name="email" type="email" placeholder="" required>

                    <label for="phone">@lang('labels.phone')</label>
                    <input id="phone" name="phone" type="text" placeholder="" required>

                    <label for="class">@lang('labels.class')</label>
                    <input id="class" name="class" type="text" placeholder="" required>

                    <label for="class">@lang('labels.email_teachers')</label>
                    <input id="class" name="email_teachers" type="text" placeholder="" required>

                    <label for="school_id">@lang('labels.school')</label>
                    <select id="school_id" name="school_id" class="dependent" required>
                        <option value=""></option>
                        @foreach($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->city }} > {{ $school->name }}</option>
                        @endforeach
                    </select>

                    <div class="check-reg">
                        <input type="checkbox" required id="conditii">
                        <label for="conditii">@lang('labels.checkbox_label')</label>
                    </div>

                    <button style="cursor: pointer" type="submit">@lang('labels.start_test_button')</button>
                </form>
            </div>
            <div class="reg-img">
                <span>@lang('labels.start')</span>
            </div>
        </div>
    </div>
@endsection
