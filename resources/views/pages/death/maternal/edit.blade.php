@extends('layouts.main')

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
    <a href="{{ route('maternal') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Maternal</h1>
</div>
@endsection

@section('content')
<form action="{{ route('maternal.update') }}" method="post" autocomplete="off">
    @csrf
    <input type="hidden" name="id" value="{{ $data->detm_id }}">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detm_pendarahan">Pendarahan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detm_pendarahan" id="detm_pendarahan" class="form-control text-center" value="{{ (old('detm_pendarahan')) ? old('detm_pendarahan') : $data->detm_pendarahan }}">
                                @if ($errors->has('detm_pendarahan'))
                                    <div class="text-danger">
                                        {{ $errors->first('detm_pendarahan') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detm_eklamsi">Eklamsi</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detm_eklamsi" id="detm_eklamsi" class="form-control text-center" value="{{ (old('detm_eklamsi')) ? old('detm_eklamsi') : $data->detm_eklamsi }}">
                                @if ($errors->has('detm_eklamsi'))
                                    <div class="text-danger">
                                        {{ $errors->first('detm_eklamsi') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detm_infeksi">Infeksi</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detm_infeksi" id="detm_infeksi" class="form-control text-center" value="{{ (old('detm_infeksi')) ? old('detm_infeksi') : $data->detm_infeksi }}">
                                @if ($errors->has('detm_infeksi'))
                                    <div class="text-danger">
                                        {{ $errors->first('detm_infeksi') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detm_abortus">Abortus</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detm_abortus" id="detm_abortus" class="form-control text-center" value="{{ (old('detm_abortus')) ?  old('detm_abortus') : $data->detm_abortus }}">
                                @if ($errors->has('detm_abortus'))
                                    <div class="text-danger">
                                        {{ $errors->first('detm_abortus') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detm_partus_lama">Partus Lama</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detm_partus_lama" id="detm_partus_lama" class="form-control text-center" value="{{ (old('detm_partus_lama')) ? old('detm_partus_lama') : $data->detm_partus_lama }}">
                                @if ($errors->has('detm_partus_lama'))
                                    <div class="text-danger">
                                        {{ $errors->first('detm_partus_lama') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detm_trauma_obsetrik">Trauma Obsetrik</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detm_trauma_obsetrik" id="detm_trauma_obsetrik" class="form-control text-center" value="{{ (old('detm_trauma_obsetrik')) ? old('detm_trauma_obsetrik') : $data->detm_trauma_obsetrik }}">
                                @if ($errors->has('detm_trauma_obsetrik'))
                                    <div class="text-danger">
                                        {{ $errors->first('detm_trauma_obsetrik') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detm_komplikasi_puerperium">Komplikasi Puerperim</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detm_komplikasi_puerperium" id="detm_komplikasi_puerperium" class="form-control text-center" value="{{ (old('detm_komplikasi_puerperium')) ? old('detm_komplikasi_puerperium') : $data->detm_komplikasi_puerperium }}">
                                @if ($errors->has('detm_komplikasi_puerperium'))
                                    <div class="text-danger">
                                        {{ $errors->first('detm_komplikasi_puerperium') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detm_other">Lainnya</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detm_other" id="detm_other" class="form-control text-center" value="{{ (old('detm_other')) ? old('detm_other') : $data->detm_other }}">
                                @if ($errors->has('detm_other'))
                                    <div class="text-danger">
                                        {{ $errors->first('detm_other') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
