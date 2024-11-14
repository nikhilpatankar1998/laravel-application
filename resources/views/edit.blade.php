@extends('layouts.master')

@section('content')
    <div class="main-container mt-4">
        <div class="card">
            <div class="card-header">
                Update POst Data
                <div class=" d-flex justify-content-end">
                    <a href="/post" class="btn btn-success mx-1">Back</a>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <div class="card-body">
                <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <img src="{{asset('/storage/'.$post->image)}}" alt="" width="100px" >
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" >
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input type="text"  class="form-control" id="image" name="title" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Category</label>
                        <select  id="" class="form-control" name="category_id">
                            {{-- <option value="">{{$post->category-}}</option> --}}
                            @foreach ($category as $item)
                            <option {{$item->id == $post->category_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30"  class="form-control" rows="10">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
