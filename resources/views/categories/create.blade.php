@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($CategoryFromEditFunc) ? 'Edit Category' : 'Create Category' }}

        </div>
        <div class="card-body">
            <form
                action="{{ isset($CategoryFromEditFunc) ? route('categories.update',$CategoryFromEditFunc->id) : route('categories.store') }}"
                method="POST">
                @csrf
                @if(isset($CategoryFromEditFunc))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control " name="name"
                           value="{{ isset($CategoryFromEditFunc) ? $CategoryFromEditFunc->name : '' }}">

                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success"
                           value="{{ isset($CategoryFromEditFunc) ? 'Update Category' : 'Add Category' }}">
                </div>
            </form>
        </div>
    </div>
@endsection
