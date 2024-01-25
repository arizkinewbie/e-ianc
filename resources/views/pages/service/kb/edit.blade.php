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
    <a href="{{ route('service.kb', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Gejala dan Pencopotan KB</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.kb.update') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="xid" value="{{ $data->sanckb_id }}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sanckb_allergy">Apakah ada Efek Samping</label> <span style="color: red;"><i>*) Jika Tidak ada kosongkan saja</i></span>
                        <div class="row">
                            <div class="col-md-6">
                                <select name="sanckb_allergy_id" id="sanckb_allergy_id" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($efek as $e)
                                        <option value="{{ $e->kbe_id }}" {{ ($e->kbe_id == old('sanckb_allergy_id')) ? 'selected' : '' }}>{{ $e->kbe_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <textarea name="sanckb_allergy" id="sanckb_allergy" cols="30" rows="5" class="form-control">{{ (old('sanckb_allergy')) ? old('sanckb_allergy') : $data->sanckb_allergy }}</textarea>
                                @if ($errors->has('sanckb_allergy'))
                                    <div class="text-danger">
                                        {{ $errors->first('sanckb_allergy') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sanckb_compli">Apakah ada Komplikasi</label> <span style="color: red;"><i>*) Jika Tidak ada kosongkan saja</i></span>
                        <div class="row">
                            <div class="col-md-6">
                                <select name="sanckb_compli_id" id="sanckb_compli_id" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($kompli as $e)
                                        <option value="{{ $e->kbk_id }}" {{ ($e->kbk_id == old('sanckb_compli_id')) ? 'selected' : '' }}>{{ $e->kbk_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <textarea name="sanckb_compli" id="sanckb_compli" cols="30" rows="5" class="form-control">{{ (old('sanckb_compli')) ? old('sanckb_compli') : $data->sanckb_compli }}</textarea>
                                @if ($errors->has('sanckb_compli'))
                                    <div class="text-danger">
                                        {{ $errors->first('sanckb_compli') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sanckb_failed">Apakah KB mengalami Kegagalan</label> <span style="color: red;"><i>*) Jika Tidak ada kosongkan saja</i></span>
                        <div class="row">
                            <div class="col-md-6">
                                <select name="sanckb_failed_id" id="sanckb_failed_id" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($fail as $e)
                                        <option value="{{ $e->kbf_id }}" {{ ($e->kbf_id == old('sanckb_failed_id')) ? 'selected' : '' }}>{{ $e->kbf_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <textarea name="sanckb_failed" id="sanckb_failed" cols="30" rows="5" class="form-control">{{ (old('sanckb_failed')) ? old('sanckb_failed') : $data->sanckb_failed }}</textarea>
                                @if ($errors->has('sanckb_failed'))
                                    <div class="text-danger">
                                        {{ $errors->first('sanckb_failed') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sanckb_respon">Tindakan apa yang dilakukan</label> <span style="color: red;"><i>*) Jika Tidak ada kosongkan saja</i></span>
                        <textarea name="sanckb_respon" id="sanckb_respon" cols="30" rows="5" class="form-control">{{ (old('sanckb_respon')) ? old('sanckb_respon') : $data->sanckb_respon }}</textarea>
                        @if ($errors->has('sanckb_respon'))
                            <div class="text-danger">
                                {{ $errors->first('sanckb_respon') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanckb_remove">Tanggal pencabutan/pegeluaran alat KB (IUD)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="sanckb_remove" id="sanckb_remove" class="form-control text-center" value="{{ (old('sanckb_remove')) ? old('sanckb_remove') : $data->sanckb_remove }}">
                                @if ($errors->has('sanckb_remove'))
                                <div class="text-danger">
                                    {{ $errors->first('sanckb_remove') }}
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
    </form>
</div>
@endsection
