@extends('admin.layouts.master')


@section('content')
    <h2> Detail Category<small></small></h2>
    @include('admin.layouts.partials.classtop')
    <div class="field item form-group">
        <label class="form-label col-md-3 col-sm-3 label-align">Name<span class="required">*</span></label>
        <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" id="name"
            placeholder="Create Category" required="required" value="{{ $category->name }}" />
    </div>
    <div class="mt-3">
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                <a href="{{ route('category.list') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
    @include('admin.layouts.partials.classbotom')
@endsection
