@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success btn-sm"> Add Posts </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <th>image</th>
                <th>title</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>

                            <img src="{{asset('/storage/'.$post->image ) }}" width="60px" height="60px" alt="">
                        </td>

                        <td>
                            {{ $post->title}}
                        </td>
                        <td>
                            <a href=""  class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy',$post->id)}}"  method="POST" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
