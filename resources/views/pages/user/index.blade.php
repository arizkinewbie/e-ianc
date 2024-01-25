@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <h1>User</h1>
</div>
<div class="col-sm-6 text-right">
    <a href="{{ route('user.create') }}">
        <button class="btn btn-success">
            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Tambah
        </button>
    </a>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%; text-align: right;">No</th>
                    <th style="text-align: center;">Detail</th>
                    <th style="width: 15%; text-align: center;">Hak Akses</th>
                    <th style="width: 10%; text-align: center;">Status</th>
                    <th style="width: 20%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="text-right">{{ $loop->iteration }}</td>
                        <td>
                            <b>{{ $d->name }}</b>
                            <br>
                            {{ $d->email }}
                        </td>
                        <td class="text-center">
                            @php
                                echo DB::table('user_roles')->where('user_role_code', $d->role)->value('user_role_name');
                            @endphp
                        </td>
                        <td class="text-center">
                            @if ($d->status == '1')
                                <div class="badge badge-success">Aktif</div>
                            @else
                                <div class="badge badge-danger">Blocked</div>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', Crypt::encrypt($d->id)) }}">
                                <button class="btn btn-sm btn-warning" title="edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            @if (auth()->user()->role == '0')
                            &nbsp;|&nbsp;
                            <form action="{{ route('user.destroy') }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($d->id) }}">
                                <button type="submite" class="btn btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure you want to delete this data?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
