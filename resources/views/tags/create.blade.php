@extends('layouts.app')

@section('content')
    @include('partial.error')

    <div class="card card-default">
        <div class="card-header">
            {{ isset($TagFromEditFunc) ? 'Edit Tag' : 'Create Tag' }}

        </div>
        <div class="card-body">
            <form
                action="{{ isset($TagFromEditFunc) ? route('tags.update',$TagFromEditFunc->id) : route('tags.store') }}"
                method="POST">
                @csrf
                @if(isset($TagFromEditFunc))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control " name="name"
                           value="{{ isset($TagFromEditFunc) ? $TagFromEditFunc->name : '' }}">

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success"
                           value="{{ isset($TagFromEditFunc) ? 'Update Tag' : 'Add Tag' }}">
                </div>
            </form>
        </div>
    </div>
@endsection
