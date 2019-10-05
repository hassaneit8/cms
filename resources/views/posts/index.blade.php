@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.index')}}" class="btn btn-success btn-sm"> Add Posts </a>
    </div>
    <div class="card card-header">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
