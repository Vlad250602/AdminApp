@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1 class="text-black-50" style=" display: inline">Employees</h1>
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{route('employee-create')}}"><button class="btn btn-block btn-primary" style=" width: 150px; margin-top: -5px; position: fixed; z-index: 100">Add employee</button></a>
                    <table id="adminTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Date of employment</th>
                            <th>Phone number</th>
                            <th>Email</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $admin)
                            <tr>
                                <td style="text-align: center"><img style="max-height: 40px; max-width: 40px; border-radius: 20px" src="{{ Storage::url('image/employees/origin/'.$admin->photo) }}" alt=""></td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->position}}</td>
                                <td>{{$admin->emp_date}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>{{$admin->email}}</td>
                                <td>${{$admin->salary}}</td>
                                <td style="text-align: center">
                                    <a href="{{route('employee-edit', $admin->id)}}">
                                        <button class="btn btn-block btn-outline-primary" style=" width:45%; display: inline-block"><ion-icon name="pencil-sharp" style="scale: 150%"></ion-icon></button>
                                    </a>
                                    <a href="{{route('employee-delete', $admin->id)}}">
                                        <button class="btn btn-block btn-outline-danger"  style=" width:45%; display: inline-block" ><ion-icon name="trash-sharp" style="scale: 150%" ></ion-icon></button>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>

    <!-- /.content -->
@endsection

@push('page_scripts')
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            $("#adminTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false
            })
        });
    </script>
@endpush
