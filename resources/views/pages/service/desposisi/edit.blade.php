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
    <a href="{{ route('service.desposisi', $norm) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Edit Disposisi Pasien</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <form action="{{ route('service.desposisi.update') }}" method="post" autocomplete="off">
            @csrf
            <input type="hidden" name="norm" value="{{ $norm }}">
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="unit">Tujuan Poliklinik/Unit</label>
                        <input type="text" name="unit" id="unit" class="form-control" value="{{ (old('unit')) ? old('unit') : $data->des_des_unit }}">
                    </div>
                    <div class="form-group">
                        <label for="rs">Tujuan RS/Puskesmas/PMB</label>
                        <input type="text" name="rs" id="rs" class="form-control" value="{{ (old('rs')) ? old('rs') : $data->des_des_ins }}">
                    </div>
                    <div class="form-group">
                        <label for="icd">Diagnosis</label>
                        <select name="icd" id="icd" class="form-control select2">
                            <option value="">-- PILIH --</option>
                            @foreach ($icd as $icd)
                            <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('icd')) ? 'selected' : (($icd->icd_code == $data->des_diagnose) ? 'selected' : '' ) }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="first">Tindakan yang sudah diberikan</label>
                        <textarea name="first" id="first" class="form-control" cols="30" rows="3">{{ (old('first')) ? old('first') : $data->des_first_aid }}</textarea>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
