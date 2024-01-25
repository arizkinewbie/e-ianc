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
    <a href="{{ route('service', $norm) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Disposisi Pasien</h1>
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
                            <div class="row">
                                <div class="col-md-4">No Rujukan</div>
                                <div class="col-md-8">: {{ $d->des_reg_no }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Tujuan Poli</div>
                                <div class="col-md-8">: {{ $d->des_des_unit }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Tujuan Faskes</div>
                                <div class="col-md-8">: {{ $d->des_des_ins }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Diagnosis</div>
                                <div class="col-md-8">: {{ $d->des_diagnose . ' - ' . DB::table('selec_icds')->where('icd_code', $d->des_diagnose)->value('icd_name') }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Telah diberikan</div>
                                <div class="col-md-8">: {{ $d->des_first_aid }}</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('service.desposisi.edit', ['norm' => $norm, 'id' => Crypt::encrypt($d->des_id)]) }}" class="{{ (DB::table('users')->where('id', $d->des_user_id)->value('id') != auth()->user()->id || auth()->user()->role != 0) ? 'isDisabled' : '' }}">
                                <button class="btn btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="{{ route('report.rujuk', Crypt::encrypt($d->des_id)) }}" target="_blank">
                                <button class="btn btn-primary" title="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
