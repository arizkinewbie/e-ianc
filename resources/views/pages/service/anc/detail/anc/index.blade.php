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
    <a href="{{ route('service.anc.d', ['id' => $id, 'anc' => $anc]) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>ANC - ANC</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped" width="100%">
                    <tr>
                        <td>
                            <h5>
                                <b>
                                    ANAMNESA
                                </b>
                            </h5>
                        </td>
                        <td width="30%" class="text-center">
                            <a href="{{ route('service.anc.anc.anamnesa', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                                <button class="btn btn-primary">
                                    Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>
                                <b>
                                    PEMERIKSAAN FISIK
                                </b>
                            </h5>
                        </td>
                        <td width="30%" class="text-center">
                            @php
                                $a1 = DB::table('eianc_service_anc_physical_examinations')->where('sancpe_anc_d_id', Crypt::decrypt($det))->get();
                            @endphp
                            <a href="{{ route('service.anc.anc.physical', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}" >
                                <button class="btn btn-primary" {{ (count($a1) < 1) ? 'disabled' : '' }}>
                                    Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>
                                <b>
                                    LABORAT
                                </b>
                            </h5>
                        </td>
                        <td width="30%" class="text-center">
                            @php
                                $a2 = DB::table('eianc_service_anc_labs')->where('sancl_anc_d_id', Crypt::decrypt($det))->get();
                            @endphp
                            <a href="{{ route('service.anc.anc.lab', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}" >
                                <button class="btn btn-primary" {{ (count($a2) < 1) ? 'disabled' : '' }}>
                                    Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>
                                <b>
                                    KIE
                                </b>
                            </h5>
                        </td>
                        <td width="30%" class="text-center">
                            @php
                                $a3 = DB::table('eianc_service_anc_kies')->where('sanckie_anc_d_id', Crypt::decrypt($det))->get();
                            @endphp
                            <a href="{{ route('service.anc.anc.kie', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}" >
                                <button class="btn btn-primary" {{ (count($a3) < 1) ? 'disabled' : '' }}>
                                    Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>
                                <b>
                                    TREATMENT
                                </b>
                            </h5>
                        </td>
                        <td width="30%" class="text-center">
                            @php
                                $a4 = DB::table('eianc_service_anc_treatments')->where('sanct_anc_d_id', Crypt::decrypt($det))->get();
                            @endphp
                            <a href="{{ route('service.anc.anc.treatment', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}" >
                                <button class="btn btn-primary" {{ (count($a4) < 1) ? 'disabled' : '' }}>
                                    Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>
                                <b>
                                    RESULT DIAGNOSIS
                                </b>
                            </h5>
                        </td>
                        <td width="30%" class="text-center">
                            @php
                                $a5 = DB::table('eianc_service_anc_diagnoses')->where('sancdi_anc_d_id', Crypt::decrypt($det))->get();
                            @endphp
                            <a href="{{ route('service.anc.anc.diag', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}" >
                                <button class="btn btn-primary" {{ (count($a5) < 1) ? 'disabled' : '' }}>
                                    Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="2">
                            @php
                                $a6 = DB::table('eianc_service_anc_risks')->where('sancr_anc_d_id', Crypt::decrypt($det))->get();
                            @endphp
                            <a href="{{ route('service.anc.anc.risk', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                                <button class="btn btn-danger btn-lg" {{ (count($a6) < 1) ? 'disabled' : '' }}>
                                    <b>RISIKO IBU HAMIL</b>
                                </button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
