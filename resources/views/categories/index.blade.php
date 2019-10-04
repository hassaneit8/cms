@extends('layouts.app')

@section('content')


        <div class="d-flex justify-content-end mb-2">
            <a href="{{route('categories.create')}}" class="btn btn-success"> Add Category </a>
        </div>
        <div class="card card-default">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)

                        <tr>
                            <td>

                                {{ $category->name }}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="deleteModelLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        function handleDelete(id) {
            console.log('deleting.',id)
            $('#deleteModel').model('show')
        }
    </script>
@endsection
