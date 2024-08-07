@extends('admin.layouts.master')


@section('content')
    <h2> Create Category<small></small></h2>
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
    <form action="{{ route('category.store') }}" method="POST" novalidate>
        @csrf
        <div class="field item form-group">
            <label class="form-label col-md-3 col-sm-3 label-align">Name<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name"
                    id="name" placeholder="Create Category" required="required" value="{{ old('name') }}" />
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mt-3">
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
