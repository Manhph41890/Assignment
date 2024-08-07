@extends('admin.layouts.master')

@section('title')
    Detail News
@endsection

@section('content')
    @include('admin.layouts.partials.classtop')


    <!-- Title -->
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Category<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input value="{{ $news->category->name }}" class="form-control" type="text" readonly />
        </div>
    </div>

    <!-- Content -->
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Content<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" rows="5" readonly>{{ $news->content }}</textarea>
        </div>
    </div>

    <!-- Image -->
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
        <div class="col-md-6 col-sm-6">
            @if ($news->image && \Storage::exists($news->image))
                <img width="100px" src="{{ \Storage::url($news->image) }}" alt="" style="width:100px;height:auto;">
            @endif
        </div>
    </div>

    <!-- Published Date -->
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Published Date<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input value="{{ $news->published_date }}" class="form-control" type="text" readonly />
        </div>
    </div>

    <!-- Views -->
    <div class="field item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Views</label>
        <div class="col-md-6 col-sm-6">
            <input value="{{ $news->views }}" class="form-control" type="number" readonly />
        </div>
    </div>

    <div class="ln_solid">
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                <a href="{{ route('news.edit', $news->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('news.list') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    @include('admin.layouts.partials.classbotom')
@endsection
