@extends('admin.layouts.master')

@section('title')
    List News
@endsection

@section('content')
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h1 class="text-muted font-13 m-b-30">
                        List News
                    </h1>
                    <a href="{{ route('category.create') }}"><button class="btn btn-success">Create</button></a>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($Category as $Cate)
                                <tr>
                                    <td>{{ $Cate->name }}</td>
                                    <td>
                                        <div class="x_content">
                                            <!-- Sửa liên kết đến chi tiết -->
                                            <a href="{{ route('category.show', $Cate->id) }}">
                                                <button type="button" class="btn btn-primary">Detail</button>
                                            </a>

                                            <!-- Cập nhật liên kết sửa và xóa -->
                                            <a href="{{ route('category.edit', $Cate->id) }}">
                                                <button type="button" class="btn btn-warning">Edit</button>
                                            </a>

                                            <form action="{{ route('category.delete', $Cate->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $Category->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
