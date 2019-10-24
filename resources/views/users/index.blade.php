@extends('layouts.app')
@section('content')
    @include('partial.error')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('users.create-profile')}}" class="btn btn-success btn-sm"> Add User </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        @if($users->count() > 0 )
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>image</th>
                    <th>Name</th>
                    <th>role</th>
                    <th>E-mail</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($user->email)  }}" width="60px" height="60px" style="border-radius: 90%">
                            </td>
                            <td>
                                {{ $user->name}}
                            </td>
                            <td>
                                {{ $user->role}}
                            </td>
                            <td>
                                {{ $user->email}}
                            </td>
                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{ route('users.makeAdmin',$user->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" > Make Admin </button>

                                    </form>
                                @endif

                                    @if($user->isAdmin())
                                        <form action="{{ route('users.makeWriter',$user->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm" > Make Writer </button>

                                        </form>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <h3 class="text-center"><p> There is no User yet </p></h3>
        @endif

    </div>
@endsection
