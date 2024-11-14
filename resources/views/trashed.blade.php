@extends('layouts.master')

@section('content')

    <div class="main-container mt-4">
        <div class="card">
            <div class="card-header">
                Trashed Post Data 
                <div class="d-flex justify-content-end">
                    <a href="/post" class="btn btn-success mx-1">Back</a>
                    <a href="" class="btn btn-warning mx-1">Trashed</a>
                </div>
            </div>
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
                        @foreach ($post as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>
                                <img src="{{ asset('/storage/' . $item->image) }}" alt="image" width="80px">
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->category_id }}</td>
                            <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('post.restore', $item->id) }}" class="btn btn-success mx-1">Restore</a>
                                
                                <form action="{{ route('post.force-delete', $item->id) }}" method="POST">
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
            </div>
        </div>
    </div>
@endsection