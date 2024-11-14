@extends('layouts.master')

@section('content')

    <div class="main-container mt-4">
        <div class="card">
            <div class="card-header">
                Specific Post.
                <div class="d-flex justify-content-end">
                    <a href="{{ route('post.create') }}" class="btn btn-success mx-1">Create</a>
                    <a href="{{ route('post.trash') }}" class="btn btn-warning mx-1">Trashed</a>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            {{-- @if ($success->any())
                @foreach ($success as $succes)
                    <div class="alert alert-danger">{{ $succes }}</div>
                @endforeach
            @endif --}}

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10%">#</th>
                            <th scope="col" style="width: 10%">Image</th>
                            <th scope="col" style="width: 10%">Title</th>
                            <th scope="col" style="width: 30%">Description</th>
                            <th scope="col" style="width: 10%">Category</th>
                            <th scope="col" style="width: 15%">Published Date</th>
                            <th scope="col" style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>
                                <img src="{{ asset('/storage/' . $post->image) }}" alt="image" width="80px">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->category_id }}</td>
                            <td>{{ date('d-m-y', strtotime($post->created_at)) }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success mx-1">Edit</a>
                                    {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mx-1">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
