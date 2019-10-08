@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? 'update Post' : 'Create Post' }}
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ?  route('posts.update',$post)  :  route('posts.store')  }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title"> Title</label>
                    <input type="text" name="title" class="form-control" id="title"
                           value="{{ isset($post) ? $post->title : '' }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" class="form-control"
                              id="description">{{ isset($post) ? $post->description : '' }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contentt">Content</label>
                    <input id="contentt" type="hidden" name="contentt" value="{{ isset($post) ? $post->content : '' }}">
                    <trix-editor input="contentt"></trix-editor>
                    @error('contentt')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="published_at">Published_at</label>
                    <input type="text" class="form-control" name="published_at" id='published_at'
                           value="{{ isset($post) ? $post->published_at : ""}}">

                    {{--                    <input type="text" name="published_at" class="form-control" id="published_at" value="{{ isset($post) ? $post->published_at : '' }}">--}}
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{ asset('/storage/'.$post->image) }}" alt="" style="width: 100%">
                    </div>
                @endif
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @if(!isset($post))
                            <option value="" disabled selected>-----</option>
                        @endif
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if(isset($post))
                                    @if($category->id==$post->category_id)
                                    selected
                                @endif
                                @endif
                            >
                        {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($post) ? 'update Post' : 'Add Post' }}
                    </button>
                </div>
            </form>
        </div>
        @endsection
        @section('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                flatpickr('#published_at', {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                })
            </script>
        @endsection
        @section('css')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
