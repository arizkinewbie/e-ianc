@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });
</script>

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
    <a href="{{ route('service.anc.d', ['id' => $id, 'anc' => $anc]) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">ANC - NIFAS OBSERVASI</h1>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="{{ route('service.anc.no.create', ['id' => $id, 'anc' => $anc, 'det' => $det, 'idx' => 0]) }}">
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
                    <th style="width: 10%; text-align: center;">Hari</th>
                    <th style="width: 10%; text-align: center;">Waktu</th>
                    <th style="text-align: center;">Detail</th>
                    <th style="width: 20%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="text-center">{{ $d->sancno_day }}</td>
                        <td class="text-center">{{ $d->sancno_time }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    Tensi : <b>{{ $d->sancno_tensi }}</b>
                                    <br>
                                    Nadi : <b>{{ $d->sancno_nadi }}</b>
                                    <br>
                                    Suhu : <b>{{ $d->sancno_suhu }} C</b>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('service.anc.no.create', ['id' => $id, 'anc' => $anc, 'det' => $det, 'idx' => $data[0]->sancno_id]) }}">
                                <button class="btn btn-warning btn-lg">
                                    <b>
                                        EDIT
                                    </b>
                                </button>
                            </a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="{{ route('service.anc.no.destroy', ['id' => $data[0]->sancno_id]) }}">
                                <button class="btn btn-danger btn-lg"  onclick="return confirm('Are you sure you want to delete this data?');">
                                    <b>
                                        HAPUS
                                    </b>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if (session()->has('print'))
<script>
    window.open("{{ route('report.rujuk', session()->get('id2')) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif
@endsection
