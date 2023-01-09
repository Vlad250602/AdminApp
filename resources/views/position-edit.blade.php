@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="col-sm-6">
        <h1 class="text-black-50">Edit position</h1>
    </div>
    <form action="{{route('position-edit-submit', $data->id) }}" method="post">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="name">Position name</label>
                @if ($errors->has('name'))
                    <input type="text" name="name" class="form-control" style="border: 2px solid red" id="name" value="{{$data->pos_name}}" placeholder="Enter name">
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @else
                    <input type="text" name="name" class="form-control" id="name" value="{{$data->pos_name}}" placeholder="Enter name">
                @endif

            </div>
            <div class="form-group">
                <div style="display: inline-block">
                    <label style="display: block" >Created at: {{$data->created_at->format('m.d.y')}}</label>
                    <label style="display: block">Updated at: {{$data->updated_at->format('m.d.y')}}</label>
                </div>
                <div style="display: inline-block; margin-left: 40px">
                    <label style="display: block" >Admin created id: {{$data->admin_created_id}}</label>
                    <label style="display: block">Admin updated id: {{$data->admin_updated_id}}</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
