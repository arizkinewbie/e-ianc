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
    <a href="{{ route('service', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Perkembangan Bayi dan Balita</h1>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="{{ route('service.baby.create', ['id' => $id, 'xid' => Crypt::encrypt(0)]) }}">
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
                    <th style="width: 15%; text-align: center;">Tanggal</th>
                    <th style="text-align: center;">Detail</th>
                    <th style="width: 20%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="text-right">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ date('d-m-Y', strtotime($d->created_at)) }}</td>
                        <td>
                            <b>
                                @php
                                    echo DB::table('eianc_patients')->where('pat_norm', $d->sbaby_norm)->value('pat_name');
                                @endphp
                            </b>
                            <br>
                            Berat Badan : <b>{{ $d->sbaby_weight_now }}</b> gram
                            <br>
                            Tinggi Badan : <b>{{ $d->sbaby_height_now }}</b> cm
                        </td>
                        <td class="text-center">
                            <a href="{{ route('service.baby.create', ['id' => $id, 'xid' => Crypt::encrypt($d->sbaby_id)]) }}">
                                <button class="btn btn-warning" title="edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="{{ route('service.baby.destroy', ['id' => $id, 'xid' => Crypt::encrypt($d->sbaby_id)]) }}">
                                <button class="btn btn-danger" title="hapus" onclick="return confirm('Are you sure you want to delete this data?');">
                                    <i class="fa fa-trash"></i>
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
