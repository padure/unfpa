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
            <a href="{{ route('questions.create') }}" class="btn btn-dark">@lang('admin.questions.add_question')</a><br><br>
            <h3 class="card-title fw-bolder">@lang('admin.questions.question_title')</h3>
            <br>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('admin.table_header_name_ro')</th>
                    <th>@lang('admin.table_header_name_ru')</th>
                    <th>@lang('admin.table_header_stage')</th>
                    <th>@lang('admin.table_header_tab')</th>
                    <th>@lang('admin.table_header_number')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{ $item->name_ro }}</td>
                        <td>{{ $item->name_ru }}</td>
                        <td>{{ $item->step }}</td>
                        <td>{{ $item->tab }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <a class="btn btn-warning btn-sm text-white mb-1" href="{{ route('questions.edit', $item->id) }}">
                                    @lang('admin.questions.edit')
                                </a>
                                <form action="{{ route('questions.destroy', $item->id) }}" method="POST">
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
