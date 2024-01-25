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
    <h1 class="d-inline">ANC - NIFAS KONTROL</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.con.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            @if (count($data) < 1)
                <input type="hidden" name="xid" value="{{ $id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_keluhan">Keluhan yang dirasakan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sancnc_keluhan" id="sancnc_keluhan" cols="30" rows="5" class="form-control" maxlength="255">{{ old('sancnc_keluhan') }}</textarea>
                                    @if ($errors->has('sancnc_keluhan'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancnc_keluhan') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_diagnosis">Diagnosis terhadap keluhan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sancnc_diagnosis" id="sancnc_diagnosis" cols="30" rows="5" class="form-control" maxlength="255">{{ old('sancnc_diagnosis') }}</textarea>
                                    @if ($errors->has('sancnc_diagnosis'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancnc_diagnosis') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_kasus">Jenis Kasus</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancnc_kasus" id="sancnc_kasus" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancnc_kasus') == '0') ? 'selected' : '' }}>BARU</option>
                                        <option value="1" {{ (old('sancnc_kasus') == '1') ? 'selected' : '' }}>LAMA</option>
                                    </select>
                                    @if(session()->has('sancnc_kasus'))
                                    <div class="text-danger">
                                        {{ session()->get('sancnc_kasus') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_visit">Kategori Kasus</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancnc_visit" id="sancnc_visit" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancnc_visit') == '0') ? 'selected' : '' }}>Kunjungan Kasus Lama (KKL)</option>
                                        <option value="1" {{ (old('sancnc_visit') == '1') ? 'selected' : '' }}>Penyakit Utama (U)</option>
                                        <option value="2" {{ (old('sancnc_visit') == '2') ? 'selected' : '' }}>Komplikasi (Km)</option>
                                        <option value="3" {{ (old('sancnc_visit') == '3') ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @if(session()->has('sancnc_visit'))
                                    <div class="text-danger">
                                        {{ session()->get('sancnc_visit') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_tindakan">Tindakan yang dilakukan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sancnc_tindakan" id="sancnc_tindakan" cols="30" rows="10" class="form-control" maxlength="255">{{ old('sancnc_tindakan') }}</textarea>
                                    @if ($errors->has('sancnc_tindakan'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancnc_tindakan') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Disposisi Pasien</h3>
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
                <input type="hidden" name="xid" value="{{ $id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">
                <input type="hidden" name="id" value="{{ $data[0]->sancnc_id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_keluhan">Keluhan yang dirasakan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sancnc_keluhan" id="sancnc_keluhan" cols="30" rows="5" class="form-control" maxlength="255">{{ (old('sancnc_keluhan')) ? old('sancnc_keluhan') : $data[0]->sancnc_keluhan }}</textarea>
                                    @if ($errors->has('sancnc_keluhan'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancnc_keluhan') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_diagnosis">Diagnosis terhadap keluhan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sancnc_diagnosis" id="sancnc_diagnosis" cols="30" rows="5" class="form-control" maxlength="255">{{ (old('sancnc_diagnosis')) ? old('sancnc_diagnosis') : $data[0]->sancnc_diagnosis }}</textarea>
                                    @if ($errors->has('sancnc_diagnosis'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancnc_diagnosis') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_kasus">Jenis Kasus</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancnc_kasus" id="sancnc_kasus" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancnc_kasus') == '0') ? 'selected' : (($data[0]->sancnc_kasus == '0') ? 'selected' : '') }}>BARU</option>
                                        <option value="1" {{ (old('sancnc_kasus') == '1') ? 'selected' : (($data[0]->sancnc_kasus == '1') ? 'selected' : '') }}>LAMA</option>
                                        <option value="2" {{ (old('sancnc_kasus') == '2') ? 'selected' : (($data[0]->sancnc_kasus == '2') ? 'selected' : '') }}>Tidak Ada</option>
                                    </select>
                                    @if(session()->has('sancnc_kasus'))
                                    <div class="text-danger">
                                        {{ session()->get('sancnc_kasus') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_visit">Kategori Kasus</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancnc_visit" id="sancnc_visit" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancnc_visit') == '0') ? 'selected' : (($data[0]->sancnc_visit == '0') ? 'selected' : '') }}>Kunjungan Kasus Lama (KKL)</option>
                                        <option value="1" {{ (old('sancnc_visit') == '1') ? 'selected' : (($data[0]->sancnc_visit == '1') ? 'selected' : '') }}>Penyakit Utama (U)</option>
                                        <option value="2" {{ (old('sancnc_visit') == '2') ? 'selected' : (($data[0]->sancnc_visit == '2') ? 'selected' : '') }}>Komplikasi (Km)</option>
                                        <option value="3" {{ (old('sancnc_visit') == '3') ? 'selected' : (($data[0]->sancnc_visit == '3') ? 'selected' : '') }}>Tidak Ada</option>
                                    </select>
                                    @if(session()->has('sancnc_visit'))
                                    <div class="text-danger">
                                        {{ session()->get('sancnc_visit') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancnc_tindakan">Tindakan yang dilakukan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sancnc_tindakan" id="sancnc_tindakan" cols="30" rows="10" class="form-control" maxlength="255">{{ (old('sancnc_tindakan')) ? old('sancnc_tindakan') : $data[0]->sancnc_tindakan }}</textarea>
                                    @if ($errors->has('sancnc_tindakan'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancnc_tindakan') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Disposisi Pasien</h3>
                @php
                    $ds = DB::table('eianc_desposisis')->where('des_reg_no', $data[0]->sancnc_no_reg)->get();
                @endphp
                <input type="hidden" name="iddes" value="{{ $ds[0]->des_id }}">
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

@if (count($data) > 0)
<div class="card card-body">
    <form action="{{ route('service.anc.con.obat') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $data[0]->sancnc_id }}">
        <div class="row">
            <div class="col-md-4">
                <label for="sancnr_drug_id">Nama Obat</label>
                <select name="sancnr_drug_id" id="sancnr_drug_id" class="form-control select2">
                    <option value="">-- PILIH OBAT --</option>
                    @foreach ($sobat as $o)
                        <option value="{{ $o->dg_id }}" {{ ($o->dg_id == old('sancnr_drug_id') ? 'selected' : '') }}>{{ $o->dg_brand . ' (' . $o->dg_batch . '), Stok : ' . $o->dg_remainder }}</option>
                    @endforeach
                </select>
                @if(session()->has('sancnr_drug_id'))
                    <div class="text-danger">
                        {{ session()->get('sancnr_drug_id') }}
                    </div>
                @endif
            </div>
            <div class="col-md-2">
                <label for="sancnr_qty">Jumlah (Qty)</label>
                <input type="text" name="sancnr_qty" id="sancnr_qty" class="form-control text-center" value="{{ old('sancnr_qty') }}" placeholder="10">
                @if ($errors->has('sancnr_qty'))
                    <div class="text-danger">
                        {{ $errors->first('sancnr_qty') }}
                    </div>
                @endif
            </div>
            <div class="col-md-2">
                <label for="sancnr_dosis">Dosis</label>
                <input type="text" name="sancnr_dosis" id="sancnr_dosis" class="form-control text-center" value="{{ old('sancnr_dosis') }}" placeholder="3 x 1">
                @if ($errors->has('sancnr_dosis'))
                    <div class="text-danger">
                        {{ $errors->first('sancnr_dosis') }}
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="sancnr_use">Anjuran Guna Saat?</label>
                    <select name="sancnr_use" id="sancnr_use" class="form-control select2">
                        <option value="">-- PILIH --</option>
                        <option value="0" {{ (old('sancnr_use') == '0') ? 'selected' : '' }}>SEBELUM MAKAN</option>
                        <option value="1" {{ (old('sancnr_use') == '1') ? 'selected' : '' }}>SESUDAH MAKAN</option>
                        <option value="2" {{ (old('sancnr_use') == '2') ? 'selected' : '' }}>SEBELUM TIDUR</option>
                    </select>
                    @if(session()->has('sancnr_use'))
                    <div class="text-danger">
                        {{ session()->get('sancnr_use') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-1">
                <label for="">&nbsp;</label>
                <button class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th class="text-center" width="50%">NAMA OBAT</th>
                <th class="text-center">JUMLAH OBAT</th>
                <th class="text-center">DOSIS OBAT</th>
                <th class="text-center" width="20%">ANJURAN GUNA OBAT</th>
                <th class="text-center" width="10%">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @php
                $obat = DB::table('eianc_service_nifas_recipes')->where('sancnr_n_id', $data[0]->sancnc_id)->join('eianc_drugs', 'eianc_drugs.dg_id', '=', 'eianc_service_nifas_recipes.sancnr_drug_id')->get();
            @endphp

            @foreach ($obat as $o)
                <tr>
                    <td><b>{{ $o->dg_brand }}</b></td>
                    <td class="text-center">
                        {{ $o->sancnr_qty . ' ' . $o->dg_unit }}
                    </td>
                    <td class="text-center">
                        {{ $o->sancnr_dosis }}
                    </td>
                    <td class="text-center">
                        {{ ($o->sancnr_dosis == 1) ? 'SEBELUM MAKAN' : (($o->sancnr_dosis == 2) ? 'SESUDAH MAKAN' : 'SEBELUM TIDUR') }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('service.anc.con.obathapus', Crypt::encrypt($o->sancnr_id)) }}">
                            <button class="btn btn-danger">HAPUS</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@if (session()->has('print'))
<script>
    window.open("{{ route('report.rujuk', session()->get('id2')) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif
@endsection
