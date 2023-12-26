@extends('layouts.appadmin')

@section('content')

    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">@lang('admin.questions.question_title')</h3>
            </div>
            <form action="{{ route('questions.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">@lang('admin.questions.name_ro')</label>
                        <input type="text" class="form-control" id="name" name="name_ro">
                    </div>

                    <div class="form-group">
                        <label for="name">@lang('admin.questions.name_ru')</label>
                        <input type="text" class="form-control" id="name" name="name_ru">
                    </div>

                    <div class="form-group">
                        <label for="step">@lang('admin.questions.stage')</label>
                        <select name="step" id="step" class="form-control select2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tab">@lang('admin.questions.tab')</label>
                        <select name="tab" id="tab" class="form-control select2">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
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
