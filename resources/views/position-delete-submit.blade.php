@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="col-sm-6">
        <h1 class="text-black-50">Delete position</h1>
    </div>
    <form action="{{route('position-delete-submit', $data->id) }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Are you actually want to delete position "{{$data->pos_name}}" ?</label>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
@endsection
