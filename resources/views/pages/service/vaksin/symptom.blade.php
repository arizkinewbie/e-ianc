@extends('layouts.main')

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('service.vaksin', Crypt::encrypt($data->svak_norm)) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Gajala Setelah Imunisasi</h1>
</div>
@endsection

@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    No Pasien
                </div>
                <div class="col-md-8">
                    <b>
                        {{ $data->svak_norm }}
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Nama Pasien
                </div>
                <div class="col-md-8">
                    <b>
                        {{ DB::table('eianc_patients')->where('pat_norm', $data->svak_norm)->value('pat_name') }}
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Tanggal Lahir
                </div>
                <div class="col-md-8">
                    <b>
                        {{ DB::table('eianc_patients')->where('pat_norm', $data->svak_norm)->value('pat_dob') }}
                    </b>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    Type Vaksin
                </div>
                <div class="col-md-8">
                    <b>
                        {{
                            DB::table('eianc_vaksins')->where('vak_id', $data->svak_vak_id)
                                        ->join('selec_vaksins', 'selec_vaksins.va_id', '=', 'eianc_vaksins.vak_type')
                                        ->value('va_name')
                        }}
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Nama Vaksin
                </div>
                <div class="col-md-8">
                    <b>
                        @php
                            $vaksin = DB::table('eianc_vaksins')->where('vak_id', $data->svak_vak_id)
                                        ->join('selec_vaksins', 'selec_vaksins.va_id', '=', 'eianc_vaksins.vak_type')
                                        ->get();

                            echo $vaksin[0]->vak_brand . ' (' . $vaksin[0]->vak_batch .')';
                        @endphp
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Dosis
                </div>
                <div class="col-md-8">
                    <b>
                        {{ $data->svak_dosis }}
                    </b>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <form action="{{ route('service.vaksin.update') }}" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="id" value="{{ $data->svak_id }}">
                <input type="hidden" name="norm" value="{{ $data->svak_norm }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Demam</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="svak_demam" id="svak_demam1" value="0" {{ (old('svak_demam') == '0') ? 'checked' : (($data->svak_demam == '0') ? 'checked' : '') }}>
                                            <label class="form-check-label" for="svak_demam1">
                                                Tidak
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="svak_demam" id="svak_demam2" value="1" {{ (old('svak_demam') == '1') ? 'checked' : (($data->svak_demam == '1') ? 'checked' : '') }}>
                                            <label class="form-check-label" for="svak_demam2">
                                                Ya
                                            </label>
                                        </div>
                                        @if ($errors->has('svak_demam'))
                                            <div class="text-danger">
                                                {{ $errors->first('svak_demam') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Bengkak</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="svak_bengkak" id="svak_bengkak1" value="0" {{ (old('svak_bengkak') == '0') ? 'checked' : (($data->svak_bengkak == '0') ? 'checked' : '') }}>
                                            <label class="form-check-label" for="svak_bengkak1">
                                                Tidak
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="svak_bengkak" id="svak_bengkak2" value="1" {{ (old('svak_bengkak') == '1') ? 'checked' : (($data->svak_bengkak == '1') ? 'checked' : '') }}>
                                            <label class="form-check-label" for="svak_bengkak2">
                                                Ya
                                            </label>
                                        </div>
                                        @if ($errors->has('svak_bengkak'))
                                            <div class="text-danger">
                                                {{ $errors->first('svak_bengkak') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Merah</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="svak_merah" id="svak_merah1" value="0" {{ (old('svak_merah') == '0') ? 'checked' : (($data->svak_merah == '0') ? 'checked' : '') }}>
                                            <label class="form-check-label" for="svak_merah1">
                                                Tidak
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="svak_merah" id="svak_merah2" value="1" {{ (old('svak_merah') == '1') ? 'checked' : (($data->svak_merah == '1') ? 'checked' : '') }}>
                                            <label class="form-check-label" for="svak_merah2">
                                                Ya
                                            </label>
                                        </div>
                                        @if ($errors->has('svak_merah'))
                                            <div class="text-danger">
                                                {{ $errors->first('svak_merah') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Muntah</label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="svak_muntah" id="svak_muntah1" value="0" {{ (old('svak_muntah') == '0') ? 'checked' : (($data->svak_muntah == '0') ? 'checked' : '') }}>
                                            <label class="form-check-label" for="svak_muntah1">
                                                Tidak
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="svak_muntah" id="svak_muntah2" value="1" {{ (old('svak_muntah') == '1') ? 'checked' : (($data->svak_muntah == '1') ? 'checked' : '') }}>
                                            <label class="form-check-label" for="svak_muntah2">
                                                Ya
                                            </label>
                                        </div>
                                        @if ($errors->has('svak_muntah'))
                                            <div class="text-danger">
                                                {{ $errors->first('svak_muntah') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="svak_lainnya">Gejala Lainnya</label>
                            <textarea name="svak_lainnya" id="svak_lainnya" cols="30" rows="5" class="form-control">{{ (old('svak_lainnya')) ? old('svak_lainnya') : $data->svak_lainnya }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
