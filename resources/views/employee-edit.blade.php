@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="col-sm-6">
        <h1 class="text-black-50">Edit employee</h1>
    </div>
    <form action="{{route('employee-edit-submit', $data->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputFile" style="width: 100%">Photo</label>
                <img id="preview-image-before-upload" src="{{ Storage::url('image/employees/origin/'.$data->photo) }}" style="margin-bottom: 10px; border: 2px dotted gray; width: 300px; height: 300px; background-size: cover">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                </div>
                @if ($errors->has('photo'))
                    <label style="color: red">File format jpg,png up to 5MB, minimum 300x300px</label>
                @else
                    <label>File format jpg,png up to 5MB, minimum 300x300px</label>
                @endif
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                @if ($errors->has('name'))
                    <input type="tel"  name="name" class="form-control" style="border: 2px solid red" id="name" value="{{$data->name}}" placeholder="Enter name">
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @else
                    <input type="tel"  name="name" class="form-control" id="name" value="{{$data->name}}" placeholder="Enter name">
                @endif
            </div>
            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" name="phone" data-tel-input  class="form-control art-stranger" id="phone" value="{{$data->phone}}">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                @if ($errors->has('email'))
                    <input type="email" name="email" class="form-control" style="border: 2px solid red" id="email" value="{{$data->email}}" placeholder="Enter email">
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @else
                    <input type="email" name="email" class="form-control"  id="email" value="{{$data->email}}" placeholder="Enter email">
                @endif
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <select name="position" class="form-control">
                    <option>{{$data->position}}</option>
                    @foreach($all_pos as $pos)
                        @if($pos->pos_name !== $data->position)
                            <option>{{$pos->pos_name}}</option>
                        @endif
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="salary">Salary, $</label>
                @if ($errors->has('salary'))
                    <input type="text" name="salary" class="form-control" style="border: 2px solid red" id="salary" value="{{$data->salary}}" placeholder="Enter salary">
                    <span class="help-block">
                        <strong>Maximum 500.00</strong>
                    </span>
                @else
                    <input type="text" name="salary" class="form-control" id="salary" value="{{$data->salary}}" placeholder="Enter salary">
                @endif
            </div>
            <div class="form-group">
                <label for="head">Head</label>
                @if ($errors->has('head'))
                    <input type="text" name="head" class="form-control" style="border: 2px solid red" id="salary" id="head" value="{{$data->head}}" placeholder="Enter head">
                    <span class="help-block">
                        <strong>There is no person in the database or person is himself</strong>
                    </span>
                @else
                    <input type="text" name="head" class="form-control" id="head" value="{{$data->head}}" placeholder="Enter head">
                @endif
            </div>
            <div class="form-group">
                <label for="emp_date">Date of employment</label>
                <@if ($errors->has('emp_date'))
                    <input type="date" name="emp_date" class="form-control" id="emp_date" style="border: 2px solid red" placeholder="Enter date">
                    <span class="help-block">
                        <strong>Date of employment field is required</strong>
                    </span>
                @else
                    <input type="date" name="emp_date" class="form-control" id="emp_date" value="{{$data->emp_date}}">
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

@push('page_scripts')
<script>
    var phoneMask = IMask(
        document.getElementById('phone'), {
            mask: '+{38} (000) 000 00 00'
        });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">

    $(document).ready(function (e) {


        $('#photo').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });
</script>
@endpush
