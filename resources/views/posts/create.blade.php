@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header"> Add Posts </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title"> Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" class="form-control"id="description"></textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contentt">Content</label>
                    <textarea type="text" name="contentt"class="form-control"id="contentt"></textarea>
                    @error('contentt')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="published_at">Published_at</label>
                    <input type="date" name="published_at"class="form-control"id="published_at">
                    @error('published_at')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image"class="form-control" id="image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                        <button type="submet" class="btn btn-success"> Add Post </button>
                    </div>
            </form>
        </div>
@endsection

