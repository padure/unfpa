@extends('layouts.appadmin')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.schools.add') }}" class="btn btn-dark">@lang('admin.schools.add_school')</a><br><br>
            <h3 class="card-title">@lang('admin.schools.schools')</h3>
            <br>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('admin.schools.school')</th>
                    <th>@lang('admin.schools.city')</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($schools as $school)
                        <tr>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->city }}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ route('admin.schools.delete', $school->id) }}">@lang('admin.schools.delete')</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
