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
    <a href="{{ route('service.anc.marr', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>ANC - BUAT SKL</h1>
</div>
@endsection

@section('content')
@php
    $skl = DB::table('eianc_service_marrital_skls')->where('sancmskl_id', $id2)->get();
@endphp

<div class="card">
    <form action="{{ route('service.anc.marr.skl') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="xid" value="{{ $id }}">
        <input type="hidden" name="anc" value="{{ $anc }}">
        <input type="hidden" name="det" value="{{ $det }}">

        @if (count($skl) < 1)
            <div class="card-body">
                <input type="hidden" name="id1" value="{{ $id1 }}">
                <input type="hidden" name="id2" value="{{ $id2 }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_date">Tanggal Lahir</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="sancmskl_date" id="sancmskl_date" class="form-control text-center" value="{{ (old('sancmskl_date')) ? old('sancmskl_date') : $mar->sancm_date }}">
                                    @if ($errors->has('sancmskl_date'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_date') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_time">Jam Lahir</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="time" name="sancmskl_time" id="sancmskl_time" class="form-control text-center" value="{{ (old('sancmskl_time')) ? old('sancmskl_time') : $mar->sancm_time }}">
                                    @if ($errors->has('sancmskl_time'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_time') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_name">Nama Bayi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancmskl_name" id="sancmskl_name" class="form-control text-center" value="{{ old('sancmskl_name') }}">
                                    @if ($errors->has('sancmskl_name'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_sex">Jenis Kelamin</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_sex" id="sancmskl_sex" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="1" {{ (old('sancmskl_sex') == '1') ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="2" {{ (old('sancmskl_sex') == '2') ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @if(session()->has('sancmskl_sex'))
                                        <div class="text-danger">
                                            {{ session()->get('sancmskl_sex') }}
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
                                    <label for="sancmskl_cond">Bagaimana Kondisi Bayi?</label>
                                </div>
                                <div class="col-md-3">
                                    <select name="sancmskl_cond" id="sancmskl_cond" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancmskl_cond') == '0') ? 'selected' : '' }}>Meninggal</option>
                                        <option value="1" {{ (old('sancmskl_cond') == '1') ? 'selected' : '' }}>Hidup</option>
                                    </select>
                                    @if(session()->has('sancmskl_cond'))
                                        <div class="text-danger">
                                            {{ session()->get('sancmskl_cond') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 text-right">
                                    <label for="sancmskl_cond_baby">Stabilitas bayi?</label>
                                </div>
                                <div class="col-md-3">
                                    <select name="sancmskl_cond_baby" id="sancmskl_cond_baby" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancmskl_cond_baby') == '0') ? 'selected' : '' }}>0 - 6 Jam Tidak Stabil</option>
                                        <option value="1" {{ (old('sancmskl_cond_baby') == '1') ? 'selected' : '' }}>0 - 6 Jam Stabil</option>
                                    </select>
                                    @if(session()->has('sancmskl_cond_baby'))
                                        <div class="text-danger">
                                            {{ session()->get('sancmskl_cond_baby') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <label for="sancmskl_weight">Berapa berat bayi(gram)?</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="sancmskl_weight" id="sancmskl_weight" class="form-control text-center" value="{{ old('sancmskl_weight') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('sancmskl_weight'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_weight') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 text-right">
                                    <label for="sancmskl_height">Berapa panjang bayi(cm)?</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="sancmskl_height" id="sancmskl_height" class="form-control text-center" value="{{ old('sancmskl_height') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('sancmskl_height'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_height') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_icd1">ICD Kelahiran Spontan</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_icd1" id="sancmskl_icd1" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($icd as $icd)
                                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('sancmskl_icd1')) ? 'selected' : '' }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_icd2">ICD Kelahiran dengan Tindakan </label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_icd2" id="sancmskl_icd2" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($icd2 as $icd)
                                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('sancmskl_icd2')) ? 'selected' : '' }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_icd3">ICD Kelahiran Kembar</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_icd3" id="sancmskl_icd3" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($icd3 as $icd)
                                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('sancmskl_icd3')) ? 'selected' : '' }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_icd4">ICD Kelahiran dengan Kelainan Bawaan</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_icd4" id="sancmskl_icd4" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($icd4 as $icd)
                                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('sancmskl_icd4')) ? 'selected' : '' }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <input type="hidden" name="id" value="{{ $skl[0]->sancmskl_id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_date">Tanggal Lahir</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="sancmskl_date" id="sancmskl_date" class="form-control text-center" value="{{ (old('sancmskl_date')) ? old('sancmskl_date') : $skl[0]->sancmskl_date }}">
                                    @if ($errors->has('sancmskl_date'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_date') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_time">Jam Lahir</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="time" name="sancmskl_time" id="sancmskl_time" class="form-control text-center" value="{{ (old('sancmskl_time')) ? old('sancmskl_time') : $skl[0]->sancmskl_time }}">
                                    @if ($errors->has('sancmskl_time'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_time') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_name">Nama Bayi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancmskl_name" id="sancmskl_name" class="form-control text-center" value="{{ (old('sancmskl_name')) ? old('sancmskl_name') : $skl[0]->sancmskl_name }}">
                                    @if ($errors->has('sancmskl_name'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_sex">Jenis Kelamin</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_sex" id="sancmskl_sex" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="1" {{ (old('sancmskl_sex') == '1') ? 'selected' : (($skl[0]->sancmskl_sex == '1') ? 'selected' : '') }}>Laki-laki</option>
                                        <option value="2" {{ (old('sancmskl_sex') == '2') ? 'selected' : (($skl[0]->sancmskl_sex == '2') ? 'selected' : '') }}>Perempuan</option>
                                    </select>
                                    @if(session()->has('sancmskl_sex'))
                                        <div class="text-danger">
                                            {{ session()->get('sancmskl_sex') }}
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
                                    <label for="sancmskl_cond">Bagaimana Kondisi Bayi?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_cond" id="sancmskl_cond" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancmskl_cond') == '0') ? 'selected' : (($skl[0]->sancmskl_cond == '0') ? 'selected' : '') }}>Meninggal</option>
                                        <option value="1" {{ (old('sancmskl_cond') == '1') ? 'selected' : (($skl[0]->sancmskl_cond == '1') ? 'selected' : '') }}>Hidup</option>
                                    </select>
                                    @if(session()->has('sancmskl_cond'))
                                        <div class="text-danger">
                                            {{ session()->get('sancmskl_cond') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_cond_baby">Stabilitas bayi?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_cond_baby" id="sancmskl_cond_baby" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancmskl_cond_baby') == '0') ? 'selected' : (($skl[0]->sancmskl_cond_baby == '0') ? 'selected' : '') }}>0 - 6 Jam Tidak Stabil</option>
                                        <option value="1" {{ (old('sancmskl_cond_baby') == '1') ? 'selected' : (($skl[0]->sancmskl_cond_baby == '1') ? 'selected' : '') }}>0 - 6 Jam Stabil</option>
                                    </select>
                                    @if(session()->has('sancmskl_cond_baby'))
                                        <div class="text-danger">
                                            {{ session()->get('sancmskl_cond_baby') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <label for="sancmskl_weight">Berapa berat bayi(gram)?</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="sancmskl_weight" id="sancmskl_weight" class="form-control text-center" value="{{ (old('sancmskl_weight')) ? old('sancmskl_weight') : $skl[0]->sancmskl_weight }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('sancmskl_weight'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_weight') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 text-right">
                                    <label for="sancmskl_height">Berapa panjang bayi(cm)?</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="sancmskl_height" id="sancmskl_height" class="form-control text-center" value="{{ (old('sancmskl_height')) ? old('sancmskl_height') : $skl[0]->sancmskl_height }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('sancmskl_height'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancmskl_height') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_icd1">ICD Kelahiran Spontan</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_icd1" id="sancmskl_icd1" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($icd as $icd)
                                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('sancmskl_icd1')) ? 'selected' : (($skl[0]->sancmskl_icd1 == $icd->icd_code) ? 'selected' : '') }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_icd2">ICD Kelahiran dengan Tindakan </label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_icd2" id="sancmskl_icd2" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($icd2 as $icd)
                                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('sancmskl_icd2')) ? 'selected' : (($skl[0]->sancmskl_icd2 == $icd->icd_code) ? 'selected' : '') }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_icd3">ICD Kelahiran Kembar</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_icd3" id="sancmskl_icd3" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($icd3 as $icd)
                                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('sancmskl_icd3')) ? 'selected' : (($skl[0]->sancmskl_icd3 == $icd->icd_code) ? 'selected' : '') }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancmskl_icd4">ICD Kelahiran dengan Kelainan Bawaan</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancmskl_icd4" id="sancmskl_icd4" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($icd4 as $icd)
                                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('sancmskl_icd4')) ? 'selected' : (($skl[0]->sancmskl_icd4 == $icd->icd_code) ? 'selected' : '') }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="card-footer text-right">
            <button class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
