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
            <h3 class="card-title">@lang('admin.result.name')</h3>
            <br>
            <form action="{{ route('admin.ratings.export') }}" method="post">
                @csrf
                <div class="d-flex">
                    <input type="submit" value="@lang('admin.download_xlsx.label')" class="btn btn-dark"
                           href="{{ route('admin.ratings.export') }}">
                    <select name="school_id" id="school_id" class="form-control">
                        <option value="" selected>@lang('admin.download_xlsx.all')</option>
                        @foreach($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }} > {{ $school->city }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('admin.table_headings.school')</th>
                        <th>@lang('admin.table_headings.first_name')</th>
                        <th>@lang('admin.table_headings.last_name')</th>
                        <th>@lang('admin.table_headings.email')</th>
                        <th>@lang('admin.table_headings.phone')</th>
                        <th>@lang('admin.table_headings.class')</th>
                        <th>@lang('admin.table_headings.grade')</th>
                        <th>@lang('admin.table_headings.pdf')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $results)
                        <tr>
                            <td>{{ $results->school->city }} > {{ $results->school->name }}</td>
                            <td>{{ $results->last_name }}</td>
                            <td>{{ $results->first_name }}</td>
                            <td>{{ $results->email }}</td>
                            <td>{{ $results->phone }}</td>
                            <td>{{ $results->class }}</td>
                            <td>{{ $results->success_sum }}</td>
                            <td>
                                <a target="_blank" href="{{ asset($results->pdf_url) }}">PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-3 d-flex justify-content-center">
                {{ $result->links() }}
            </div>
        </div>
    </div>

@endsection
