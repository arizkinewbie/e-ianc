@php
    $date1 = strtotime(date('Y-m-d'));
    $date2 = strtotime($anamdet[0]->sanc_hpht);

    $div = ($date1 - $date2)/ 60 / 60 / 24;
@endphp

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
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('service.anc.anc', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>ANC - Diagnosis Result</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.anc.diag.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
        @if ($show == '0')
            @if (count($data) < 1)
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_gpa">Gravida Partus Abortus (GPA)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_gpa" id="sancdi_gpa" class="form-control text-center" value="{{ $anamdet[0]->sanc_gravida.$anamdet[0]->sanc_partus.$anamdet[0]->sanc_aborsi }}" readonly>
                                    @if ($errors->has('sancdi_gpa'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_gpa') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_uk">Usia Kandungan (UK)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_uk" id="sancdi_uk" class="form-control text-center" value="{{ $anamdet[0]->sanca_uk }}" readonly>
                                    @if ($errors->has('sancdi_uk'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_uk') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_disease_id">Sakit apa yang dialami ibu hami?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancdi_disease_id" id="sancdi_disease_id" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($sdise as $sd)
                                            <option value="{{ $sd->sd_id }}" {{ (old('sancdi_disease_id') == $sd->sd_id) }}>{{ $sd->sd_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sancdi_disease_id'))
                                    <div class="text-danger">
                                        {{ session()->get('sancdi_disease_id') }}
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
                                    <label for="sancdi_tcompli">Penjelasan komplikasi apa yang dialami ibu hamil?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancdi_tcompli" id="sancdi_tcompli" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($scom as $sc)
                                            <option value="{{ $sc->com_id }}" {{ ($sc->com_id == old('sancdi_tcompli')) ? 'selected' : '' }}>{{ $sc->com_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_compli">Penjelasan komplikasi apa yang dialami ibu hamil?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_compli" id="sancdi_compli" class="form-control text-center" value="{{ old('sancdi_compli') }}" maxlength="255">
                                    @if ($errors->has('sancdi_compli'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_compli') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_sugg">Anjuran untuk ibu hamil?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_sugg" id="sancdi_sugg" class="form-control text-center" value="{{ old('sancdi_sugg') }}" maxlength="255">
                                    @if ($errors->has('sancdi_sugg'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_sugg') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_diag_marr">Diagnosa Kebidanan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_diag_marr" id="sancdi_diag_marr" class="form-control text-center" value="{{ 'G'.$anamdet[0]->sanc_gravida.' P'.$anamdet[0]->sanc_partus.' A'.$anamdet[0]->sanc_aborsi }}; {{ $anamdet[0]->sanca_allergy }}; {{ $anamdet[0]->sanca_complaint }}; {{ $anamdet[0]->sanca_uk }}; {{ $div }} Hari;">
                                    @if ($errors->has('sancdi_diag_marr'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_diag_marr') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">
                <input type="hidden" name="idx" value="{{ $data[0]->sancdi_id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_gpa">Gravida Partus Abortus (GPA)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_gpa" id="sancdi_gpa" class="form-control text-center" value="{{ (isset($data[0]->sancdi_gpa)) ? $data[0]->sancdi_gpa : $anamdet[0]->sanc_gravida.$anamdet[0]->sanc_partus.$anamdet[0]->sanc_aborsi }}" readonly>
                                    @if ($errors->has('sancdi_gpa'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_gpa') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_uk">Usia Kandungan (UK)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_uk" id="sancdi_uk" class="form-control text-center" value="{{ (isset($data[0]->sancdi_uk)) ? $data[0]->sancdi_uk : $anamdet[0]->sanca_uk }}" readonly>
                                    @if ($errors->has('sancdi_uk'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_uk') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_disease_id">Sakit apa yang dialami ibu hami?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancdi_disease_id" id="sancdi_disease_id" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($sdise as $sd)
                                            <option value="{{ $sd->sd_id }}" {{ (old('sancdi_disease_id') == $sd->sd_id) ? 'selected' : (($data[0]->sancdi_disease_id == $sd->sd_id) ? 'selected' : '') }}>{{ $sd->sd_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sancdi_disease_id'))
                                    <div class="text-danger">
                                        {{ session()->get('sancdi_disease_id') }}
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
                                    <label for="sancdi_tcompli">Penjelasan komplikasi apa yang dialami ibu hamil?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancdi_tcompli" id="sancdi_tcompli" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($scom as $sc)
                                            <option value="{{ $sc->com_id }}" {{ ($sc->com_id == old('sancdi_tcompli')) ? 'selected' : (($sc->com_id == $data[0]->sancdi_tcompli) ? 'selected' : '') }}>{{ $sc->com_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_compli">Penjelasan komplikasi apa yang dialami ibu hamil?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_compli" id="sancdi_compli" class="form-control text-center" value="{{ (old('sancdi_compli')) ? old('sancdi_compli') : $data[0]->sancdi_compli }}" maxlength="255">
                                    @if ($errors->has('sancdi_compli'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_compli') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_sugg">Anjuran untuk ibu hamil?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_sugg" id="sancdi_sugg" class="form-control text-center" value="{{ (old('sancdi_sugg')) ? old('sancdi_sugg') : $data[0]->sancdi_sugg }}" maxlength="255">
                                    @if ($errors->has('sancdi_sugg'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_sugg') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancdi_diag_marr">Diagnosa Kebidanan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancdi_diag_marr" id="sancdi_diag_marr" class="form-control text-center" value="{{ (isset($data[0]->sancdi_diag_marr)) ? $data[0]->sancdi_diag_marr : $anamdet[0]->sanc_gravida.';'.$anamdet[0]->sanc_partus.';'.$anamdet[0]->sanc_aborsi.';' }}" maxlength="255">
                                    @if ($errors->has('sancdi_diag_marr'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancdi_diag_marr') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="anc" value="{{ $anc }}">
        <input type="hidden" name="det" value="{{ $det }}">
        <input type="hidden" name="idx" value="{{ $xdata[0]->sancdi_id }}">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            <label for="sancdi_gpa">Gravida Partus Abortus (GPA)</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="sancdi_gpa" id="sancdi_gpa" class="form-control text-center" value="{{ (isset($xdata[0]->sancdi_gpa)) ? $xdata[0]->sancdi_gpa : $anamdet[0]->sanc_gravida.$anamdet[0]->sanc_partus.$anamdet[0]->sanc_aborsi }}" readonly>
                            @if ($errors->has('sancdi_gpa'))
                            <div class="text-danger">
                                {{ $errors->first('sancdi_gpa') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            <label for="sancdi_uk">Usia Kandungan (UK)</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="sancdi_uk" id="sancdi_uk" class="form-control text-center" value="{{ (isset($xdata[0]->sancdi_uk)) ? $xdata[0]->sancdi_uk : $anamdet[0]->sanca_uk }}" readonly>
                            @if ($errors->has('sancdi_uk'))
                            <div class="text-danger">
                                {{ $errors->first('sancdi_uk') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            <label for="sancdi_disease_id">Sakit apa yang dialami ibu hami?</label>
                        </div>
                        <div class="col-md-8">
                            <select name="sancdi_disease_id" id="sancdi_disease_id" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                @foreach ($sdise as $sd)
                                    <option value="{{ $sd->sd_id }}" {{ (old('sancdi_disease_id') == $sd->sd_id) ? 'selected' : (($xdata[0]->sancdi_disease_id == $sd->sd_id) ? 'selected' : '') }}>{{ $sd->sd_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('sancdi_disease_id'))
                            <div class="text-danger">
                                {{ session()->get('sancdi_disease_id') }}
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
                            <label for="sancdi_tcompli">Penjelasan komplikasi apa yang dialami ibu hamil?</label>
                        </div>
                        <div class="col-md-8">
                            <select name="sancdi_tcompli" id="sancdi_tcompli" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                @foreach ($scom as $sc)
                                    <option value="{{ $sc->com_id }}" {{ ($sc->com_id == old('sancdi_tcompli')) ? 'selected' : (($sc->com_id == $xdata[0]->sancdi_tcompli) ? 'selected' : '') }}>{{ $sc->com_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            <label for="sancdi_compli">Komplikasi apa yang dialami ibu hamil?</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="sancdi_compli" id="sancdi_compli" class="form-control text-center" value="{{ (old('sancdi_compli')) ? old('sancdi_compli') : $xdata[0]->sancdi_compli }}" maxlength="255">
                            @if ($errors->has('sancdi_compli'))
                            <div class="text-danger">
                                {{ $errors->first('sancdi_compli') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            <label for="sancdi_sugg">Anjuran untuk ibu hamil?</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="sancdi_sugg" id="sancdi_sugg" class="form-control text-center" value="{{ (old('sancdi_sugg')) ? old('sancdi_sugg') : $xdata[0]->sancdi_sugg }}" maxlength="255">
                            @if ($errors->has('sancdi_sugg'))
                            <div class="text-danger">
                                {{ $errors->first('sancdi_sugg') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            <label for="sancdi_diag_marr">Diagnosa Kebidanan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="sancdi_diag_marr" id="sancdi_diag_marr" class="form-control text-center" value="{{ (isset($xdata[0]->sancdi_diag_marr)) ? $xdata[0]->sancdi_diag_marr : $anamdet[0]->sanc_gravida.';'.$anamdet[0]->sanc_partus.';'.$anamdet[0]->sanc_aborsi.';' }}" maxlength="255">
                            @if ($errors->has('sancdi_diag_marr'))
                            <div class="text-danger">
                                {{ $errors->first('sancdi_diag_marr') }}
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
            <a href="{{ route('service.anc.anc.treatment', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                <button class="btn btn-success" type="button">
                    <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
                </button>
            </a>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
