@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

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

<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });

    jQuery('select[name="desid"]').on('change', function () {
            var des = jQuery(this).val();

            if (des == 2) {
                $("#rujuk").show();
            } else {
                $("#rujuk").hide();
            }
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
    <h1>ANC - PERSALINAN</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.marr.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            @if (count($data) < 1)
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancm_date">Tanggal Persalinan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="sancm_date" id="sancm_date" class="form-control text-center" value="{{ (old('sancm_date')) ? old('sancm_date') : date('Y-m-d') }}">
                                    @if ($errors->has('sancm_date'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancm_date') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancm_time">Jam Persalinan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="time" name="sancm_time" id="sancm_time" class="form-control text-center" value="{{ (old('sancm_time')) ? old('sancm_time') : date('H:i') }}">
                                    @if ($errors->has('sancm_time'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancm_time') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancm_met_marr">Metode Persalinan</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancm_met_marr" id="sancm_met_marr" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($smet as $sm)
                                            <option value="{{ $sm->pw_id }}" {{ (old('sancm_met_marr') == $sm->pw_id) ? 'selected' : '' }}>{{ $sm->pw_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sancm_met_marr'))
                                        <div class="text-danger">
                                            {{ session()->get('sancm_met_marr') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <label for="sancm_kembar">Apakah bayi kembar?</label>
                                </div>
                                <div class="col-md-3">
                                    <select name="sancm_kembar" id="sancm_kembar" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancm_kembar') == '0') ? 'selected' : '' }}>Tidak</option>
                                        <option value="1" {{ (old('sancm_kembar') == '1') ? 'selected' : '' }}>Kembar</option>
                                    </select>
                                    @if(session()->has('sancm_kembar'))
                                        <div class="text-danger">
                                            {{ session()->get('sancm_kembar') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="idx" value="{{ $data[0]->sancm_id }}">
            <input type="hidden" name="anc" value="{{ $anc }}">
            <input type="hidden" name="det" value="{{ $det }}">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sancm_date">Tanggal Persalinan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="sancm_date" id="sancm_date" class="form-control text-center" value="{{ (old('sancm_date')) ? old('sancm_date') : $data[0]->sancm_date }}">
                                @if ($errors->has('sancm_date'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancm_date') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sancm_time">Jam Persalinan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="time" name="sancm_time" id="sancm_time" class="form-control text-center" value="{{ (old('sancm_time')) ? old('sancm_time') : $data[0]->sancm_time }}">
                                @if ($errors->has('sancm_time'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancm_time') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sancm_met_marr">Metode Persalinan</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sancm_met_marr" id="sancm_met_marr" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($smet as $sm)
                                        <option value="{{ $sm->pw_id }}" {{ (old('sancm_met_marr') == $sm->pw_id) ? 'selected' : (($data[0]->sancm_met_marr == $sm->pw_id) ? 'selected' : '') }}>{{ $sm->pw_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('sancm_met_marr'))
                                    <div class="text-danger">
                                        {{ session()->get('sancm_met_marr') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-right">
                                <label for="sancm_kembar">Apakah bayi kembar?</label>
                            </div>
                            <div class="col-md-3">
                                <select name="sancm_kembar" id="sancm_kembar" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    <option value="0" {{ (old('sancm_kembar') == '0') ? 'selected' : (($data[0]->sancm_kembar == '0') ? 'selected' : '') }}>Tidak</option>
                                    <option value="1" {{ (old('sancm_kembar') == '1') ? 'selected' : (($data[0]->sancm_kembar == '1') ? 'selected' : '') }}>Kembar</option>
                                </select>
                                @if(session()->has('sancm_kembar'))
                                    <div class="text-danger">
                                        {{ session()->get('sancm_kembar') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@if (count($data) > 0)
@php
    $skl = DB::table('eianc_service_marrital_skls')->where('sancmskl_marr_id', $data[0]->sancm_id)->get();
    $ds = DB::table('eianc_desposisis')->where('des_reg_no', $data[0]->sancm_no_reg)->get();
@endphp

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>
                    <b>
                        SURAT KETERANGAN KELAHIRAN
                    </b>
                </h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('service.anc.marr.skl.create', ['id' => $id, 'anc' => $anc, 'det' => $det, 'id1' => $data[0]->sancm_id, 'id2' => 0]) }}">
                    <button class="btn btn-success">
                        Tambah SKL
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="5%" class="text-center">BAYI</th>
                    <th class="text-center">DETAIL</th>
                    <th width="20%" class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skl as $s)
                    <tr>
                        <td class="text-center">
                            <h3>
                                <b>{{ $loop->iteration }}</b>
                            </h3>
                        </td>
                        <td>
                            <h4>
                                <b>
                                    {{ $s->sancmskl_name }}
                                </b>
                            </h4>
                            Tanggal Lahir : <b>{{ $s->sancmskl_date }}</b>
                            <br>
                            Jenis Kelamin : <b>{{ ($s->sancmskl_sex == '1') ? 'Laki-laki' : 'Perempuan' }}</b>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('report.skl', Crypt::encrypt($s->sancmskl_id)) }}" target="_blank">
                                <button class="btn btn-info btn-lg">
                                    <b>
                                        CETAK SKL
                                    </b>
                                </button>
                            </a>
                            <hr>
                            <a href="{{ route('service.anc.marr.skl.create', ['id' => $id, 'anc' => $anc, 'det' => $det, 'id1' => $data[0]->sancm_id, 'id2' => $s->sancmskl_id]) }}">
                                <button class="btn btn-warning btn-lg">
                                    <b>
                                        EDIT
                                    </b>
                                </button>
                            </a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="{{ route('service.anc.marr.skl.destroy', ['id' => $id, 'anc' => $anc, 'det' => $det, 'id1' => $s->sancmskl_id]) }}">
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

<div class="card">
    <form action="{{ route('service.anc.marr.desposisi') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-header">
            <h3>Disposisi Pasien</h3>
        </div>
        <div class="card-body">
            @if (count($ds) < 1)
                <input type="hidden" name="norm" value="{{ $id }}">
                <input type="hidden" name="regrisk" value="{{ $data[0]->sancm_no_reg }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="desid">Status Disposisi</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="desid" id="desid" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($desposisi as $des)
                                            <option value="{{ $des->de_id }}" {{ ($des->de_id == old('desid')) ? 'selected' : '' }}>{{ $des->de_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="display: {{ (old('desid') == 2) ? 'block' : 'none' }};" id="rujuk">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="unit">Tujuan Poliklinik/Unit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="rs">Tujuan RS/Puskesmas/PMB</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="rs" id="rs" class="form-control" value="{{ old('rs') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="icd">Diagnosis</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="icd" id="icd" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($icd as $icd)
                                                <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('icd')) ? 'selected' : '' }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first">Tindakan yang sudah diberikan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="first" id="first" class="form-control" cols="30" rows="3">{{ old('first') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <input type="hidden" name="iddes" value="{{ $ds[0]->des_id }}">
                <input type="hidden" name="norm" value="{{ $id }}">
                <input type="hidden" name="regrisk" value="{{ $data[0]->sancm_no_reg }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="desid">Status Disposisi</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="desid" id="desid" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($desposisi as $des)
                                            <option value="{{ $des->de_id }}" {{ ($des->de_id == old('desid')) ? 'selected' : (($ds[0]->des_de_id == $des->de_id) ? 'selected' : '') }}>{{ $des->de_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="display: {{ (old('desid') == 2) ? 'block' : (($ds[0]->des_de_id == 2) ? 'block' : 'none') }};" id="rujuk">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="unit">Tujuan Poliklinik/Unit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="unit" id="unit" class="form-control" value="{{ (old('unit')) ? old('unit') : $ds[0]->des_des_unit }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="rs">Tujuan RS/Puskesmas/PMB</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="rs" id="rs" class="form-control" value="{{ (old('rs')) ? old('rs') : $ds[0]->des_des_ins }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="icd">Diagnosis</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="icd" id="icd" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($icd as $icd)
                                                <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('icd')) ? 'selected' : (($icd->icd_code == $ds[0]->des_diagnose) ? 'selected' : '') }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first">Tindakan yang sudah diberikan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="first" id="first" class="form-control" cols="30" rows="3">{{ (old('first')) ? old('first') : $ds[0]->des_first_aid }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endif

@if (session()->has('print'))
<script>
    window.open("{{ route('report.rujuk', session()->get('id2')) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif
@endsection
