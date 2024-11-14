@extends('layouts.master')

@section('content')

    <div class="main-container mt-4">
        <div class="card">
            <div class="card-header">
                All Data of Post.
                <div class="d-flex justify-content-end">
                    <a href="{{ route('post.create') }}" class="btn btn-success mx-1">Create</a>
                    <a href="{{route('post.trash')}}" class="btn btn-warning mx-1">Trashed</a>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%">#</th>
                            <th scope="col" style="width: 10%">Image</th>
                            <th scope="col" style="width: 10%">Title</th>
                            <th scope="col" style="width: 30%">Description</th>
                            <th scope="col" style="width: 10%">Category</th>
                            <th scope="col" style="width: 10%">Published Date</th>
                            <th scope="col" style="width: 22%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>
                                    <img src="{{ asset('/storage/' . $item->image) }}" alt="image" width="80px">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                                <td>
                                    <div class="d-flex justify-content-end ">
                                        <a href="{{ route('post.show', $item->id) }}" class="btn btn-success mx-1">Show</a>
                                        <a href="{{ route('post.edit', $item->id) }}" class="btn btn-success mx-1">Edit</a>
                                        {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                        <form action="{{ route('post.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mx-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $post->links() }}
            </div>
        </div>
    </div>
@endsection
