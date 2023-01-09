@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1 class="text-black-50" style=" display: inline">Positions</h1>
            <div class="card">
                @if(session('trouble'))
                    <div class="alert alert-danger" id="timed">
                        {{session('trouble')}}
                    </div>
                @endif
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{route('position-create')}}"><button class="btn btn-block btn-primary" style=" width: 150px; margin-top: -5px; position: fixed; z-index: 100">Add position</button></a>
                    <table id="positionTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Position</th>
                            <th>Last update</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $position)
                            <tr>
                                <td>{{$position->pos_name}}</td>
                                <td>{{$position->updated_at}}</td>
                                <td style="text-align: center">
                                    <a href="{{route('position-edit', $position->id)}}">
                                        <button class="btn btn-block btn-outline-primary" style=" width:45%; display: inline-block"><ion-icon name="pencil-sharp" style="scale: 150%"></ion-icon></button>
                                    </a>
                                    <a href="{{route('position-delete', $position->id)}}">
                                        <button class="btn btn-block btn-outline-danger"   style=" width:45%; display: inline-block" ><ion-icon name="trash-sharp" style="scale: 150%" ></ion-icon></button>
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
            $("#positionTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false
            })
        });

    </script>

    <script>
        setTimeout(function(){
            document.getElementById('timed').style.display = 'none';
        }, 5000);
    </script>
@endpush
