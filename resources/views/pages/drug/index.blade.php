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
    <h1>Obat-obatan</h1>
</div>
<div class="col-sm-6 text-right">
    <a href="{{ route('drug.create') }}">
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
                    <th style="width: 20%; text-align: center;">Obat</th>
                    <th style="text-align: center;">Detail</th>
                    <th style="width: 20%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="text-right">{{ $loop->iteration }}</td>
                        <td class="text-center"><b>{{ $d->dg_brand }}</b></td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    Batch : <b>{{ $d->dg_batch }}</b>
                                    <br>
                                    Netto : <b>{{ $d->dg_netto . ' ' . $d->dg_unit }}</b>
                                    <br>
                                    Stock : <b>{{ $d->dg_remainder . ' ' . $d->dg_unit }}</b>
                                </div>
                                <div class="col-md-6">
                                    Tanggal Terima : <b>{{ $d->dg_received_date }}</b>
                                    <br>
                                    Tanggal Expried : <b style="color: red">{{ $d->dg_expired_date }}</b>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('drug.edit', Crypt::encrypt($d->dg_id)) }}">
                                <button class="btn btn-sm btn-warning" title="edit" {{ ($d->dg_netto != $d->dg_remainder) ? 'disabled' : '' }}>
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            &nbsp;|&nbsp;
                            <form action="{{ route('drug.destroy') }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($d->dg_id) }}">
                                <button type="submite" class="btn btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure you want to delete this data?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
