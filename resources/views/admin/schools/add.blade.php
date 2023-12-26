@extends('layouts.appadmin')

@section('content')
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">@lang('admin.schools.school')</h3>
            </div>
            <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="orderName-field">@lang('admin.schools.school')</label>
                        <input type="text" class="form-control @error('orderName') is-invalid @enderror" id="orderName-field"   name="orderName" >
                    </div>
                    <div class="form-group">
                        <label for="orderCity-field">@lang('admin.city')</label>
                        <input type="text" class="form-control @error('orderCity') is-invalid @enderror" id="orderCity-field"   name="orderCity" >
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">@lang('admin.questions.submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
