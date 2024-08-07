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
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Published date</th>
                                <th>View</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($News as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->image && \Storage::exists($item->image))
                                            <img width="100px" src="{{ \Storage::url($item->image) }}" alt=""
                                                style="width:100px;height:auto;">
                                        @endif
                                    </td>
                                    <td>{{ $item->published_date }}</td>
                                    <td>{{ $item->views }}</td>
                                    <td>
                                        <a href="{{ route('news.show', $item->id) }}"
                                            class="btn btn-primary btn-sm">Detail</a>
                                        <a href="{{ route('news.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('news.delete', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $News->links() }}
                    <!-- Pagination Links -->


                </div>
            </div>
        </div>
    </div>
@endsection
