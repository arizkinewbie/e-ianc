@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('js')
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
    <a href="{{ route('service.anc.no', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">ANC - TAMBAH NIFAS OBSERVASI</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.no.store') }}" method="post" autocomplete="off">
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
                                    <label for="sancno_date">Tanggal</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="sancno_date" id="sancno_date" class="form-control text-center" value="{{ (old('sancno_date')) ? old('sancno_date') : date('Y-m-d') }}">
                                    @if ($errors->has('sancno_date'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_date') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_day">Hari ke Berapa?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancno_day" id="sancno_day" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="1" {{ (old('sancno_day') == '1') ? 'selected' : '' }}>Hari-1</option>
                                        <option value="2" {{ (old('sancno_day') == '2') ? 'selected' : '' }}>Hari-2</option>
                                        <option value="3" {{ (old('sancno_day') == '3') ? 'selected' : '' }}>Hari-3</option>
                                    </select>
                                    @if(session()->has('sancno_day'))
                                        <div class="text-danger">
                                            {{ session()->get('sancno_day') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_time">Jam ke Berapa?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancno_time" id="sancno_time" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="6" {{ (old('sancno_time') == '6') ? 'selected' : '' }}>Jam 6</option>
                                        <option value="11" {{ (old('sancno_time') == '11') ? 'selected' : '' }}>Jam 11</option>
                                        <option value="15" {{ (old('sancno_time') == '15') ? 'selected' : '' }}>Jam 15</option>
                                        <option value="20" {{ (old('sancno_time') == '20') ? 'selected' : '' }}>Jam 20</option>
                                    </select>
                                    @if(session()->has('sancno_time'))
                                        <div class="text-danger">
                                            {{ session()->get('sancno_time') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <label for="sancno_tensi">Tensi</label>
                                    <input type="text" name="sancno_tensi" id="sancno_tensi" class="form-control text-center" value="{{ old('sancno_tensi') }}" placeholder="100/80">
                                    @if ($errors->has('sancno_tensi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_tensi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 text-center">
                                    <label for="sancno_nadi">Denyut Nadi</label>
                                    <input type="text" name="sancno_nadi" id="sancno_nadi" class="form-control text-center" value="{{ old('sancno_nadi') }}" placeholder="13">
                                    @if ($errors->has('sancno_nadi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_nadi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 text-center">
                                    <label for="sancno_suhu">Suhu Tubuh</label>
                                    <input type="text" name="sancno_suhu" id="sancno_suhu" class="form-control text-center" value="{{ old('sancno_suhu') }}" placeholder="35.4">
                                    @if ($errors->has('sancno_suhu'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_suhu') }}
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
                                    <label for="sancno_cond">Kondisi Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_cond" id="sancno_cond" class="form-control" value="{{ old('sancno_cond') }}">
                                    @if ($errors->has('sancno_cond'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_cond') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_laktasi">Laktasi/Buah Dada Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_laktasi" id="sancno_laktasi" class="form-control" value="{{ old('sancno_laktasi') }}">
                                    @if ($errors->has('sancno_laktasi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_laktasi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_perut">Perut Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_perut" id="sancno_perut" class="form-control" value="{{ old('sancno_perut') }}">
                                    @if ($errors->has('sancno_perut'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_perut') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_fun_uteri">Fundus Uteri Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_fun_uteri" id="sancno_fun_uteri" class="form-control" value="{{ old('sancno_fun_uteri') }}">
                                    @if ($errors->has('sancno_fun_uteri'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_fun_uteri') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_kontraksi">Apakah Ibu mengalami Kontraksi?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_kontraksi" id="sancno_kontraksi" class="form-control" value="{{ old('sancno_kontraksi') }}">
                                    @if ($errors->has('sancno_kontraksi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_kontraksi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_perineum">Perieum Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_perineum" id="sancno_perineum" class="form-control" value="{{ old('sancno_perineum') }}">
                                    @if ($errors->has('sancno_perineum'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_perineum') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_lochea">Lochea Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_lochea" id="sancno_lochea" class="form-control" value="{{ old('sancno_lochea') }}">
                                    @if ($errors->has('sancno_lochea'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_lochea') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_flatus">Flatus Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_flatus" id="sancno_flatus" class="form-control" value="{{ old('sancno_flatus') }}">
                                    @if ($errors->has('sancno_flatus'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_flatus') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_miksi">Miksi Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_miksi" id="sancno_miksi" class="form-control" value="{{ old('sancno_miksi') }}">
                                    @if ($errors->has('sancno_miksi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_miksi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_defiksi">Defiksi Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_defiksi" id="sancno_defiksi" class="form-control" value="{{ old('sancno_defiksi') }}">
                                    @if ($errors->has('sancno_defiksi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_defiksi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_other">kesimpulan pemeriksaan ?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_other" id="sancno_other" class="form-control" value="{{ old('sancno_other') }}">
                                    @if ($errors->has('sancno_other'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_other') }}
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
                <input type="hidden" name="id" value="{{ $data[0]->sancno_id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_date">Tanggal</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="sancno_date" id="sancno_date" class="form-control text-center" value="{{ (old('sancno_date')) ? old('sancno_date') : $data[0]->sancno_date }}">
                                    @if ($errors->has('sancno_date'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_date') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_day">Hari ke Berapa?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancno_day" id="sancno_day" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="1" {{ (old('sancno_day') == '1') ? 'selected' : (($data[0]->sancno_day == '1') ? 'selected' : '') }}>Hari-1</option>
                                        <option value="2" {{ (old('sancno_day') == '2') ? 'selected' : (($data[0]->sancno_day == '2') ? 'selected' : '') }}>Hari-2</option>
                                        <option value="3" {{ (old('sancno_day') == '3') ? 'selected' : (($data[0]->sancno_day == '3') ? 'selected' : '') }}>Hari-3</option>
                                    </select>
                                    @if(session()->has('sancno_day'))
                                        <div class="text-danger">
                                            {{ session()->get('sancno_day') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_time">Jam ke Berapa?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancno_time" id="sancno_time" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="6" {{ (old('sancno_time') == '6') ? 'selected' : (($data[0]->sancno_time == '6') ? 'selected' : '') }}>Jam 6</option>
                                        <option value="11" {{ (old('sancno_time') == '11') ? 'selected' : (($data[0]->sancno_time == '11') ? 'selected' : '') }}>Jam 11</option>
                                        <option value="15" {{ (old('sancno_time') == '15') ? 'selected' : (($data[0]->sancno_time == '15') ? 'selected' : '') }}>Jam 15</option>
                                        <option value="20" {{ (old('sancno_time') == '20') ? 'selected' : (($data[0]->sancno_time == '20') ? 'selected' : '') }}>Jam 20</option>
                                    </select>
                                    @if(session()->has('sancno_time'))
                                        <div class="text-danger">
                                            {{ session()->get('sancno_time') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <label for="sancno_tensi">Tensi</label>
                                    <input type="text" name="sancno_tensi" id="sancno_tensi" class="form-control text-center" value="{{ (old('sancno_tensi')) ? old('sancno_tensi') : $data[0]->sancno_tensi }}" placeholder="100/80">
                                    @if ($errors->has('sancno_tensi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_tensi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 text-center">
                                    <label for="sancno_nadi">Denyut Nadi</label>
                                    <input type="text" name="sancno_nadi" id="sancno_nadi" class="form-control text-center" value="{{ (old('sancno_nadi')) ? old('sancno_nadi') : $data[0]->sancno_nadi }}" placeholder="13">
                                    @if ($errors->has('sancno_nadi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_nadi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 text-center">
                                    <label for="sancno_suhu">Suhu Tubuh</label>
                                    <input type="text" name="sancno_suhu" id="sancno_suhu" class="form-control text-center" value="{{ (old('sancno_suhu')) ? old('sancno_suhu') : $data[0]->sancno_suhu }}" placeholder="35.4">
                                    @if ($errors->has('sancno_suhu'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_suhu') }}
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
                                    <label for="sancno_cond">Kondisi Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_cond" id="sancno_cond" class="form-control" value="{{ (old('sancno_cond')) ? old('sancno_cond') : $data[0]->sancno_cond }}">
                                    @if ($errors->has('sancno_cond'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_cond') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_laktasi">Laktasi/Buah Dada Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_laktasi" id="sancno_laktasi" class="form-control" value="{{ (old('sancno_laktasi')) ? old('sancno_laktasi') : $data[0]->sancno_laktasi }}">
                                    @if ($errors->has('sancno_laktasi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_laktasi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_perut">Perut Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_perut" id="sancno_perut" class="form-control" value="{{ (old('sancno_perut')) ? old('sancno_perut') : $data[0]->sancno_perut }}">
                                    @if ($errors->has('sancno_perut'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_perut') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_fun_uteri">Fundus Uteri Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_fun_uteri" id="sancno_fun_uteri" class="form-control" value="{{ (old('sancno_fun_uteri')) ? old('sancno_fun_uteri') : $data[0]->sancno_fun_uteri }}">
                                    @if ($errors->has('sancno_fun_uteri'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_fun_uteri') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_kontraksi">Apakah Ibu mengalami Kontraksi?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_kontraksi" id="sancno_kontraksi" class="form-control" value="{{ (old('sancno_kontraksi')) ? old('sancno_kontraksi') : $data[0]->sancno_kontraksi }}">
                                    @if ($errors->has('sancno_kontraksi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_kontraksi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_perineum">Perieum Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_perineum" id="sancno_perineum" class="form-control" value="{{ (old('sancno_perineum')) ? old('sancno_perineum') : $data[0]->sancno_perineum }}">
                                    @if ($errors->has('sancno_perineum'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_perineum') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_lochea">Lochea Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_lochea" id="sancno_lochea" class="form-control" value="{{ (old('sancno_lochea')) ? old('sancno_lochea') : $data[0]->sancno_lochea }}">
                                    @if ($errors->has('sancno_lochea'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_lochea') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_flatus">Flatus Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_flatus" id="sancno_flatus" class="form-control" value="{{ (old('sancno_flatus')) ? old('sancno_flatus') : $data[0]->sancno_flatus }}">
                                    @if ($errors->has('sancno_flatus'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_flatus') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_miksi">Miksi Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_miksi" id="sancno_miksi" class="form-control" value="{{ (old('sancno_miksi')) ? old('sancno_miksi') : $data[0]->sancno_miksi }}">
                                    @if ($errors->has('sancno_miksi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_miksi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_defiksi">Defiksi Ibu?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_defiksi" id="sancno_defiksi" class="form-control" value="{{ (old('sancno_defiksi')) ? old('sancno_defiksi') : $data[0]->sancno_defiksi }}">
                                    @if ($errors->has('sancno_defiksi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_defiksi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancno_other">kesimpulan pemeriksaan ?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancno_other" id="sancno_other" class="form-control" value="{{ (old('sancno_other')) ? old('sancno_other') : $data[0]->sancno_other }}">
                                    @if ($errors->has('sancno_other'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancno_other') }}
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
                    $ds = DB::table('eianc_desposisis')->where('des_reg_no', $data[0]->sancno_no_reg)->get();
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
    <form action="{{ route('service.anc.no.obat') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $data[0]->sancno_id }}">
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
                $obat = DB::table('eianc_service_nifas_recipes')->where('sancnr_n_id', $data[0]->sancno_id)->join('eianc_drugs', 'eianc_drugs.dg_id', '=', 'eianc_service_nifas_recipes.sancnr_drug_id')->get();
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
                        <a href="{{ route('service.anc.no.obathapus', Crypt::encrypt($o->sancnr_id)) }}">
                            <button class="btn btn-danger">HAPUS</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
