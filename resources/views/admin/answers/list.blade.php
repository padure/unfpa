@extends('layouts.appadmin')

@section('content')
    <style>
        .page-item.active .page-link{
            color: white;
            background-color: #333;
            border: 1px solid #333;
        }
        .page-link{
            background-color: white;
            border-color: #333;
            color: #333;
        }
        .page-link:hover{
            color: #333;
            border-color: #333;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('answers.create') }}"
               class="btn btn-dark">
                @lang('admin.answers.add_button')
            </a>
            <br> <br>
            <h3 class="card-title">@lang('admin.answers.name')</h3>
            <br>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('admin.answers.name')</th>
                        <th>@lang('admin.questions.name_ro')</th>
                        <th>@lang('admin.answers.letter')</th>
                        <th>@lang('admin.answers.answer')</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{ $item->name ?? __('admin.missing') }}</td>
                        <td>{{ session()->get('locale') == 'ro' ? $item->question->name_ro : $item->question->name_ru }}</td>
                        <td>{{ $item->letter }}</td>
                        <td>
                            @if($item->status == 1)
                                @lang('admin.status.correct')
                            @else
                                @lang('admin.status.incorrect')
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <a class="btn btn-warning btn-sm text-white mb-1" href="{{ route('answers.edit', $item->id) }}">
                                    @lang('admin.questions.edit')
                                </a>
                                <form action="{{ route('answers.destroy', $item->id) }}"
                                      method="POST">
                                      @csrf
                                      @method('delete')
                                    <button class="btn btn-danger btn-sm w-100" type="submit">
                                        @lang('admin.questions.delete')
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="py-3 d-flex justify-content-center">
                {{ $list->links() }}
            </div>
        </div>
    </div>
@endsection
