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
    <h1>ANC - ANAMNESA</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.anc.anamnesa.store') }}" method="post" autocomplete="off">
        @csrf
        @if ($show == '0')
            @if (count($data) < 1)
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="anc" value="{{ $anc }}">
            <input type="hidden" name="det" value="{{ $det }}">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <label for="sanca_lpc">Pernah Berkunjung di Faskes?</label>
                    </div>
                    <div class="col-md-2">
                        <select name="sanca_lpc" id="sanca_lpc" class="form-control select2">
                            <option value="">-- PILIH --</option>
                            @foreach ($slpc as $s)
                                <option value="{{ $s->lpc_id }}" {{ (old('sanca_lpc') == $s->lpc_id) ? 'selected' : '' }}>{{ $s->lpc_name }}</option>
                            @endforeach
                        </select>
                        @if(session()->has('sanca_lpc'))
                            <div class="text-danger">
                                {{ session()->get('sanca_lpc') }}
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @php
                                        $date1 = strtotime(date('Y-m-d'));
                                        $date2 = strtotime($danc->sanc_hpht);

                                        $div = ($date1 - $date2)/ 60 / 60 / 24 / 7;
                                    @endphp
                                    <label for="sanca_uk">Usia Kehamilan(UK)</label>
                                    <input type="text" name="sanca_uk" id="sanca_uk" value="{{ floor($div) }} Minggu" class="form-control text-center" style="font-size: 18pt;" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="sanca_trimester">Trimester</label>
                                <input type="text" name="sanca_trimester" id="sanca_trimester" value="{{ (floor($div) < 12) ? 'I' : ((floor($div) < 24) ? 'II' : 'III') }}" class="form-control text-center" style="font-size: 18pt;" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_stomach">Apakah mengalami nyeri perut?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_stomach" id="sanca_stomach" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_stomach') == '0') ? 'selected' : '' }}>TIDAK</option>
                                        <option value="1" {{ (old('sanca_stomach') == '1') ? 'selected' : '' }}>YA</option>
                                    </select>
                                    @if(session()->has('sanca_stomach'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_stomach') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_dizzy">Apakah mengalami pusing?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_dizzy" id="sanca_dizzy" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_dizzy') == '0') ? 'selected' : '' }}>TIDAK</option>
                                        <option value="1" {{ (old('sanca_dizzy') == '1') ? 'selected' : '' }}>KADANG-KADANG</option>
                                        <option value="2" {{ (old('sanca_dizzy') == '2') ? 'selected' : '' }}>TERUS MENERUS</option>
                                    </select>
                                    @if(session()->has('sanca_dizzy'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_dizzy') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_gag">Apakah mengalami mual/muntah?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_gag" id="sanca_gag" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_gag') == '0') ? 'selected' : '' }}>TIDAK</option>
                                        <option value="1" {{ (old('sanca_gag') == '1') ? 'selected' : '' }}>KADANG-KADANG</option>
                                        <option value="2" {{ (old('sanca_gag') == '2') ? 'selected' : '' }}>TERUS MENERUS</option>
                                    </select>
                                    @if(session()->has('sanca_gag'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_gag') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_appetite">Bagaimana dengan nafsu makan?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_appetite" id="sanca_appetite" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_appetite') == '0') ? 'selected' : '' }}>MENURUN</option>
                                        <option value="1" {{ (old('sanca_appetite') == '1') ? 'selected' : '' }}>NORMAL</option>
                                    </select>
                                    @if(session()->has('sanca_appetite'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_appetite') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_bleeding">Apakah mengalami pendarahan?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_bleeding" id="sanca_bleeding" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_bleeding') == '0') ? 'selected' : '' }}>TIDAK</option>
                                        <option value="1" {{ (old('sanca_bleeding') == '1') ? 'selected' : '' }}>YA</option>
                                    </select>
                                    @if(session()->has('sanca_bleeding'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_bleeding') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sanca_kdrt">Apakah mengalami Kekerasan Terhadap Wanita(Ktp)/KDRT?</label>
                            <textarea name="sanca_kdrt" id="sanca_kdrt" cols="30" rows="5" class="form-control">{{ old('sanca_kdrt') }}</textarea>
                            @if ($errors->has('sanca_kdrt'))
                                <div class="text-danger">
                                    {{ $errors->first('sanca_kdrt') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sanca_allergy">Apakah mengalami Alergi terhadap makanan/minuman/obat-obatan/lainnya?</label>
                            <textarea name="sanca_allergy" id="sanca_allergy" cols="30" rows="5" class="form-control">{{ old('sanca_allergy') }}</textarea>
                            @if ($errors->has('sanca_allergy'))
                                <div class="text-danger">
                                    {{ $errors->first('sanca_allergy') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sanca_complaint">Apakah keluhan sebelum datang ke Faskes selama hamil ini?</label>
                            <textarea name="sanca_complaint" id="sanca_complaint" cols="30" rows="5" class="form-control">{{ old('sanca_complaint') }}</textarea>
                            @if ($errors->has('sanca_complaint'))
                                <div class="text-danger">
                                    {{ $errors->first('sanca_complaint') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @else
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="anc" value="{{ $anc }}">
            <input type="hidden" name="det" value="{{ $det }}">
            <input type="hidden" name="idx" value="{{ $data[0]->sanca_id }}">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <label for="sanca_lpc">Pernah Berkunjung di Faskes?</label>
                    </div>
                    <div class="col-md-2">
                        <select name="sanca_lpc" id="sanca_lpc" class="form-control select2">
                            <option value="">-- PILIH --</option>
                            @foreach ($slpc as $s)
                                <option value="{{ $s->lpc_id }}" {{ (old('sanca_lpc') == $s->lpc_id) ? 'selected' : (($data[0]->sanca_lpc == $s->lpc_id) ? 'selected' : '') }}>{{ $s->lpc_name }}</option>
                            @endforeach
                        </select>
                        @if(session()->has('sanca_lpc'))
                            <div class="text-danger">
                                {{ session()->get('sanca_lpc') }}
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sanca_uk">Usia Kehamilan(UK)</label>
                                    <input type="text" name="sanca_uk" id="sanca_uk" value="{{ $data[0]->sanca_uk }}" class="form-control text-center" style="font-size: 18pt;" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="sanca_trimester">Trimester</label>
                                <input type="text" name="sanca_trimester" id="sanca_trimester" value="{{ $data[0]->sanca_trimester }}" class="form-control text-center" style="font-size: 18pt;" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_stomach">Apakah mengalami nyeri perut?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_stomach" id="sanca_stomach" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_stomach') == '0') ? 'selected' : (($data[0]->sanca_stomach == '0') ? 'selected' : '') }}>TIDAK</option>
                                        <option value="1" {{ (old('sanca_stomach') == '1') ? 'selected' : (($data[0]->sanca_stomach == '1') ? 'selected' : '') }}>YA</option>
                                    </select>
                                    @if(session()->has('sanca_stomach'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_stomach') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_dizzy">Apakah mengalami pusing?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_dizzy" id="sanca_dizzy" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_dizzy') == '0') ? 'selected' : (($data[0]->sanca_dizzy == '0') ? 'selected' : '') }}>TIDAK</option>
                                        <option value="1" {{ (old('sanca_dizzy') == '1') ? 'selected' : (($data[0]->sanca_dizzy == '1') ? 'selected' : '') }}>KADANG-KADANG</option>
                                        <option value="2" {{ (old('sanca_dizzy') == '2') ? 'selected' : (($data[0]->sanca_dizzy == '2') ? 'selected' : '') }}>TERUS MENERUS</option>
                                    </select>
                                    @if(session()->has('sanca_dizzy'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_dizzy') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_gag">Apakah mengalami mual/muntah?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_gag" id="sanca_gag" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_gag') == '0') ? 'selected' : (($data[0]->sanca_gag == '0') ? 'selected' : '') }}>TIDAK</option>
                                        <option value="1" {{ (old('sanca_gag') == '1') ? 'selected' : (($data[0]->sanca_gag == '1') ? 'selected' : '') }}>KADANG-KADANG</option>
                                        <option value="2" {{ (old('sanca_gag') == '2') ? 'selected' : (($data[0]->sanca_gag == '2') ? 'selected' : '') }}>TERUS MENERUS</option>
                                    </select>
                                    @if(session()->has('sanca_gag'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_gag') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_appetite">Bagaimana dengan nafsu makan?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_appetite" id="sanca_appetite" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_appetite') == '0') ? 'selected' : (($data[0]->sanca_appetite == '0') ? 'selected' : '') }}>MENURUN</option>
                                        <option value="1" {{ (old('sanca_appetite') == '1') ? 'selected' : (($data[0]->sanca_appetite == '1') ? 'selected' : '') }}>NORMAL</option>
                                    </select>
                                    @if(session()->has('sanca_appetite'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_appetite') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sanca_bleeding">Apakah mengalami pendarahan?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanca_bleeding" id="sanca_bleeding" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanca_bleeding') == '0') ? 'selected' : (($data[0]->sanca_bleeding == '0') ? 'selected' : '') }}>TIDAK</option>
                                        <option value="1" {{ (old('sanca_bleeding') == '1') ? 'selected' : (($data[0]->sanca_bleeding == '1') ? 'selected' : '') }}>YA</option>
                                    </select>
                                    @if(session()->has('sanca_bleeding'))
                                        <div class="text-danger">
                                            {{ session()->get('sanca_bleeding') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sanca_kdrt">Apakah mengalami Kekerasan Terhadap Wanita(Ktp)/KDRT?</label>
                            <textarea name="sanca_kdrt" id="sanca_kdrt" cols="30" rows="5" class="form-control">{{ (old('sanca_kdrt')) ? old('sanca_kdrt') : $data[0]->sanca_kdrt }}</textarea>
                            @if ($errors->has('sanca_kdrt'))
                                <div class="text-danger">
                                    {{ $errors->first('sanca_kdrt') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sanca_allergy">Apakah mengalami Alergi terhadap makanan/minuman/obat-obatan/lainnya?</label>
                            <textarea name="sanca_allergy" id="sanca_allergy" cols="30" rows="5" class="form-control">{{ (old('sanca_allergy')) ? old('sanca_allergy') : $data[0]->sanca_allergy }}</textarea>
                            @if ($errors->has('sanca_allergy'))
                                <div class="text-danger">
                                    {{ $errors->first('sanca_allergy') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sanca_complaint">Apakah keluhan sebelum datang ke Faskes selama hamil ini?</label>
                            <textarea name="sanca_complaint" id="sanca_complaint" cols="30" rows="5" class="form-control">{{ (old('sanca_complaint')) ? old('sanca_complaint') : $data[0]->sanca_complaint }}</textarea>
                            @if ($errors->has('sanca_complaint'))
                                <div class="text-danger">
                                    {{ $errors->first('sanca_complaint') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @else
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="anc" value="{{ $anc }}">
        <input type="hidden" name="det" value="{{ $det }}">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <label for="sanca_lpc">Pernah Berkunjung di Faskes?</label>
                </div>
                <div class="col-md-2">
                    <select name="sanca_lpc" id="sanca_lpc" class="form-control select2">
                        <option value="">-- PILIH --</option>
                        @foreach ($slpc as $s)
                            <option value="{{ $s->lpc_id }}" {{ (old('sanca_lpc') == $s->lpc_id) ? 'selected' : (($xdata[0]->sanca_lpc == $s->lpc_id) ? 'selected' : '') }}>{{ $s->lpc_name }}</option>
                        @endforeach
                    </select>
                    @if(session()->has('sanca_lpc'))
                        <div class="text-danger">
                            {{ session()->get('sanca_lpc') }}
                        </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                @php
                                        $date1 = strtotime(date('Y-m-d'));
                                        $date2 = strtotime($danc->sanc_hpht);

                                        $div = ($date1 - $date2)/ 60 / 60 / 24 / 7;
                                    @endphp
                                <label for="sanca_uk">Usia Kehamilan(UK)</label>
                                <input type="text" name="sanca_uk" id="sanca_uk" value="{{ floor($div) }} Minggu" class="form-control text-center" style="font-size: 18pt;" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="sanca_trimester">Trimester</label>
                            <input type="text" name="sanca_trimester" id="sanca_trimester" value="{{ (floor($div) < 12) ? 'I' : ((floor($div) < 24) ? 'II' : 'III') }}" class="form-control text-center" style="font-size: 18pt;" readonly>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sanca_stomach">Apakah mengalami nyeri perut?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanca_stomach" id="sanca_stomach" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    <option value="0" {{ (old('sanca_stomach') == '0') ? 'selected' : (($xdata[0]->sanca_stomach == '0') ? 'selected' : '') }}>TIDAK</option>
                                    <option value="1" {{ (old('sanca_stomach') == '1') ? 'selected' : (($xdata[0]->sanca_stomach == '1') ? 'selected' : '') }}>YA</option>
                                </select>
                                @if(session()->has('sanca_stomach'))
                                    <div class="text-danger">
                                        {{ session()->get('sanca_stomach') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sanca_dizzy">Apakah mengalami pusing?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanca_dizzy" id="sanca_dizzy" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    <option value="0" {{ (old('sanca_dizzy') == '0') ? 'selected' : (($xdata[0]->sanca_dizzy == '0') ? 'selected' : '') }}>TIDAK</option>
                                    <option value="1" {{ (old('sanca_dizzy') == '1') ? 'selected' : (($xdata[0]->sanca_dizzy == '1') ? 'selected' : '') }}>KADANG-KADANG</option>
                                    <option value="2" {{ (old('sanca_dizzy') == '2') ? 'selected' : (($xdata[0]->sanca_dizzy == '2') ? 'selected' : '') }}>TERUS MENERUS</option>
                                </select>
                                @if(session()->has('sanca_dizzy'))
                                    <div class="text-danger">
                                        {{ session()->get('sanca_dizzy') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sanca_gag">Apakah mengalami mual/muntah?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanca_gag" id="sanca_gag" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    <option value="0" {{ (old('sanca_gag') == '0') ? 'selected' : (($xdata[0]->sanca_gag == '0') ? 'selected' : '') }}>TIDAK</option>
                                    <option value="1" {{ (old('sanca_gag') == '1') ? 'selected' : (($xdata[0]->sanca_gag == '1') ? 'selected' : '') }}>KADANG-KADANG</option>
                                    <option value="2" {{ (old('sanca_gag') == '2') ? 'selected' : (($xdata[0]->sanca_gag == '2') ? 'selected' : '') }}>TERUS MENERUS</option>
                                </select>
                                @if(session()->has('sanca_gag'))
                                    <div class="text-danger">
                                        {{ session()->get('sanca_gag') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sanca_appetite">Bagaimana dengan nafsu makan?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanca_appetite" id="sanca_appetite" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    <option value="0" {{ (old('sanca_appetite') == '0') ? 'selected' : (($xdata[0]->sanca_appetite == '0') ? 'selected' : '') }}>MENURUN</option>
                                    <option value="1" {{ (old('sanca_appetite') == '1') ? 'selected' : (($xdata[0]->sanca_appetite == '1') ? 'selected' : '') }}>NORMAL</option>
                                </select>
                                @if(session()->has('sanca_appetite'))
                                    <div class="text-danger">
                                        {{ session()->get('sanca_appetite') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sanca_bleeding">Apakah mengalami pendarahan?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanca_bleeding" id="sanca_bleeding" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    <option value="0" {{ (old('sanca_bleeding') == '0') ? 'selected' : (($xdata[0]->sanca_bleeding == '0') ? 'selected' : '') }}>TIDAK</option>
                                    <option value="1" {{ (old('sanca_bleeding') == '1') ? 'selected' : (($xdata[0]->sanca_bleeding == '1') ? 'selected' : '') }}>YA</option>
                                </select>
                                @if(session()->has('sanca_bleeding'))
                                    <div class="text-danger">
                                        {{ session()->get('sanca_bleeding') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sanca_kdrt">Apakah mengalami Kekerasan Terhadap Wanita(Ktp)/KDRT?</label>
                        <textarea name="sanca_kdrt" id="sanca_kdrt" cols="30" rows="5" class="form-control">{{ (old('sanca_kdrt')) ? old('sanca_kdrt') : $xdata[0]->sanca_kdrt }}</textarea>
                        @if ($errors->has('sanca_kdrt'))
                            <div class="text-danger">
                                {{ $errors->first('sanca_kdrt') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sanca_allergy">Apakah mengalami Alergi terhadap makanan/minuman/obat-obatan/lainnya?</label>
                        <textarea name="sanca_allergy" id="sanca_allergy" cols="30" rows="5" class="form-control">{{ (old('sanca_allergy')) ? old('sanca_allergy') : $xdata[0]->sanca_allergy }}</textarea>
                        @if ($errors->has('sanca_allergy'))
                            <div class="text-danger">
                                {{ $errors->first('sanca_allergy') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sanca_complaint">Apakah keluhan sebelum datang ke Faskes selama hamil ini?</label>
                        <textarea name="sanca_complaint" id="sanca_complaint" cols="30" rows="5" class="form-control">{{ (old('sanca_complaint')) ? old('sanca_complaint') : $xdata[0]->sanca_complaint }}</textarea>
                        @if ($errors->has('sanca_complaint'))
                            <div class="text-danger">
                                {{ $errors->first('sanca_complaint') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card-footer text-right">
            {{-- <a href="{{ route('service.anc.anc.anamnesa', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                <button class="btn btn-success">
                    <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
                </button>
            </a>
            &nbsp;&nbsp;|&nbsp;&nbsp; --}}
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
