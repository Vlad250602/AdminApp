@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="col-sm-6">
        <h1 class="text-black-50">Create position</h1>
    </div>
    <form action="{{route('position-create-submit') }}" method="post">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="name">Position name</label>
                @if ($errors->has('name'))
                    <input type="text" name="name" class="form-control" style="border: 2px solid red" id="name" placeholder="Enter name">
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @else
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                @endif
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
