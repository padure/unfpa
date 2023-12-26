@extends('layouts.appadmin')

@section('content')
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">@lang('admin.answers.name')</h3>
            </div>
            <form action="{{ route('answers.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">@lang('admin.answers.name')</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="letter">@lang('admin.answers.letter')</label>
                        <input type="text" class="form-control" id="letter" name="letter">
                    </div>

                    <div class="mb-3">
                        <label for="question_id">@lang('admin.questions.name')</label>
                        <select name="question_id" id="question_id" class="form-control select2">
                            @foreach($questions as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">@lang('admin.answers.answer')</label>
                        <select name="status" id="status" class="form-control select2">
                            <option value="0">@lang('admin.incorrect')</option>
                            <option value="1">@lang('admin.correct')</option>
                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">
                            @lang('admin.questions.submit')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
    <script>
        $('#question_id').select2();
    </script>
@endsection
