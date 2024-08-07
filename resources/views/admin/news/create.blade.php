@extends('admin.layouts.master')

@section('title')
    List News
@endsection

@section('content')
    @include('admin.layouts.partials.classtop')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Category ID<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control" name="category_id" required="required">
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Title -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Title<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="title" required="required" />
            </div>
        </div>
        se

        <!-- Content -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Content<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <textarea class="form-control" name="content" rows="5" required="required"></textarea>
            </div>
        </div>

        <!-- Image -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Image</label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="file" name="image" />
            </div>
        </div>

        <!-- Published Date -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Published Date<span
                    class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="date" name="published_date" required="required" />
            </div>
        </div>

        <!-- Views -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Views</label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="number" name="views" />
            </div>
        </div>

        <div class="ln_solid">
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Submit</button>
                    <button type='reset' class="btn btn-success">Reset</button>
                </div>
            </div>
        </div>
    </form>
    @include('admin.layouts.partials.classbotom')
@endsection
