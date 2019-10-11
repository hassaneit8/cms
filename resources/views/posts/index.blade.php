@extends('layouts.app')
@section('content')
    @include('partial.error')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success btn-sm"> Add Posts </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        @if($posts->count() > 0 )
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>image</th>
                    <th>title</th>
                    <th>category</th>
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
                                <a href="{{ route('categories.edit',$post->category->id) }}">
                                    {{ $post->category->name }}
                                </a>

                            </td>
                            <td>
                                @if($post->trashed())
                                    <form action=" {{ route('post.restore',$post->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit" class="btn btn-success btn-sm"> Restore </button>
                                    </form>
                                @else
                                    <a href=" {{ route('posts.edit',$post->id) }}" class="btn btn-success btn-sm"> Edit  </a>

                                @endif
                                <form action="{{ route('posts.destroy',$post->id)}}" method="POST"
                                      class="d-inline-block">
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

        @else
            <h3 class="text-center"><p> There is no post yet </p></h3>
        @endif

    </div>
@endsection
