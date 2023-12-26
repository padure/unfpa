@extends('layouts.appadmin')

@section('content')

    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">@lang('admin.questions.question_title')</h3>
            </div>
            <form action="{{ route('questions.update', $question->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">@lang('admin.questions.name_ro')</label>
                        <input type="text" class="form-control" id="name" name="name_ro" value="{{ $question->name_ro }}">
                    </div>

                    <div class="form-group">
                        <label for="name">@lang('admin.questions.name_ru')</label>
                        <input type="text" class="form-control" id="name" name="name_ru" value="{{ $question->name_ru }}">
                    </div>

                    <div class="form-group">
                        <label for="step">@lang('admin.questions.stage')</label>
                        <select name="step" id="step" class="form-control select2">
                            <option @if($question->step == 1) selected @endif value="1">1</option>
                            <option @if($question->step == 2) selected @endif value="2">2</option>
                            <option @if($question->step == 3) selected @endif value="3">3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tab">@lang('admin.questions.tab')</label>
                        <select name="tab" id="tab" class="form-control select2">
                            <option @if($question->tab == 1) selected @endif value="1">1</option>
                            <option @if($question->tab == 2) selected @endif value="2">2</option>
                            <option @if($question->tab == 3) selected @endif value="3">3</option>
                            <option @if($question->tab == 4) selected @endif value="4">4</option>
                            <option @if($question->tab == 5) selected @endif value="5">5</option>
                            <option @if($question->tab == 6) selected @endif value="6">6</option>
                            <option @if($question->tab == 7) selected @endif value="7">7</option>
                            <option @if($question->tab == 8) selected @endif value="8">8</option>
                            <option @if($question->tab == 9) selected @endif value="9">9</option>
                            <option @if($question->tab == 10) selected @endif value="10">10</option>
                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">@lang('admin.questions.submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
