@extends('admin.layouts.master')

@section('title')
    Edit News
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

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Category ID<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control" name="category_id" required="required">
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" {{ $news->category_id == $cate->id ? 'selected' : '' }}>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Title -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Title<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="text" name="title" value="{{ old('title', $news->title) }}"
                    required="required" />
            </div>
        </div>

        <!-- Content -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Content<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <textarea class="form-control" name="content" rows="5" required="required">{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Image -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
            <div class="col-md-6 col-sm-6">
                @if ($news->image)
                    <div>
                        <img src="{{ Storage::url($news->image) }}" alt="Current Image" width="100" />
                    </div>
                @endif
                <input class="form-control" type="file" name="image" />
            </div>
        </div>

        <!-- Published Date -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Published Date<span
                    class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="date" name="published_date"
                    value="{{ old('published_date', $news->published_date) }}" required="required" />
            </div>
        </div>

        <!-- Views -->
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Views</label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="number" name="views" value="{{ old('views', $news->views) }}" />
            </div>
        </div>

        <div class="ln_solid">
            <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <button type='submit' class="btn btn-primary">Update</button>
                    <a href="{{ route('news.list') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    @include('admin.layouts.partials.classbotom')
@endsection
