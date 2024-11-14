@extends('layouts.master')

@section('content')
    <div class="main-container mt-4">
        <div class="card">
            <div class="card-header">
                Store  Data
                <div class=" d-flex justify-content-end">
                    <a href="/post" class="btn btn-success mx-1">Back</a>
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
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="image">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Category</label>
                        <select  id="" class="form-control" name="category_id">
                            <option value="">select</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
