@extends('layouts/main')

@section('js')
<script>
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
    <a href="{{ route('service.neo', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Layanan Neonatal 0 - 28 Hari</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.neo.store28') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            <input type="hidden" name="norm" value="{{ $id }}">

            @if (count($data) < 1)
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_weigth">Berat Badan (gram)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_weigth" id="neo28_weigth" class="form-control text-center" value="{{ old('neo28_weigth') }}">
                                    @if ($errors->has('neo28_weigth'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_weigth') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_height">Panjang Badan (cm)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_height" id="neo28_height" class="form-control text-center" value="{{ old('neo28_height') }}">
                                    @if ($errors->has('neo28_height'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_height') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_temp">Suhu Badan (C)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_temp" id="neo28_temp" class="form-control text-center" value="{{ old('neo28_temp') }}">
                                    @if ($errors->has('neo28_temp'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_temp') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_freq_breath">Frekuensi Nafas (x / menit)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_freq_breath" id="neo28_freq_breath" class="form-control text-center" value="{{ old('neo28_freq_breath') }}">
                                    @if ($errors->has('neo28_freq_breath'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_freq_breath') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_freq_heart">Frekuensi Jantung (x / menit)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_freq_heart" id="neo28_freq_heart" class="form-control text-center" value="{{ old('neo28_freq_heart') }}">
                                    @if ($errors->has('neo28_freq_heart'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_freq_heart') }}
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
                                    <label for="neo28_infec">Memeriksa kemungkinan penyakit sangat berat atau infeksi bakteri</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_infec" id="neo28_infec" class="form-control" cols="30" rows="5">{{ old('neo28_infec') }}</textarea>
                                    @if ($errors->has('neo28_infec'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_infec') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_iketrus">Memeriksa Iketrus</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_iketrus" id="neo28_iketrus" class="form-control" cols="30" rows="5">{{ old('neo28_iketrus') }}</textarea>
                                    @if ($errors->has('neo28_iketrus'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_iketrus') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_diare">Memeriksa Diare</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_diare" id="neo28_diare" class="form-control" cols="30" rows="5">{{ old('neo28_diare') }}</textarea>
                                    @if ($errors->has('neo28_diare'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_diare') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_asi">Memeriksa kemungkinan berat badan rendah dan masalah pemberian ASI/minum</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_asi" id="neo28_asi" class="form-control" cols="30" rows="5">{{ old('neo28_asi') }}</textarea>
                                    @if ($errors->has('neo28_asi'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_asi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_vit">Memeriksa status Vit K1</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_vit" id="neo28_vit" class="form-control" cols="30" rows="5">{{ old('neo28_vit') }}</textarea>
                                    @if ($errors->has('neo28_vit'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_vit') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_vacc">Memeriksa status imunisasi HB-0, BCG, Poli 1</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_vacc" id="neo28_vacc" class="form-control" cols="30" rows="5">{{ old('neo28_vacc') }}</textarea>
                                    @if ($errors->has('neo28_vacc'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_vacc') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h5>
                            <b>Bagi daerah yang sudah melakukan skrining Hipotiroid Kongenital (SHK)</b>
                        </h4>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_shk">SHK Ya/Tidak</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_shk" id="neo28_shk" class="form-control" value="{{ old('neo28_shk') }}">
                                    @if ($errors->has('neo28_shk'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_shk') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_shk_tes">Hasil tes SHK (-) / (+)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_shk_tes" id="neo28_shk_tes" class="form-control" value="{{ old('neo28_shk_tes') }}">
                                    @if ($errors->has('neo28_shk_tes'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_shk_tes') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_shk_confrim">Konfirmasi hasil SHK</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_shk_confrim" id="neo28_shk_confrim" class="form-control" cols="30" rows="5">{{ old('neo28_shk_confrim') }}</textarea>
                                    @if ($errors->has('neo28_shk_confrim'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_shk_confrim') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_shk_treatment">Tindakan (terapi/rujukan/umpan balik)</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_shk_treatment" id="neo28_shk_treatment" class="form-control" cols="30" rows="5">{{ old('neo28_shk_treatment') }}</textarea>
                                    @if ($errors->has('neo28_shk_treatment'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_shk_treatment') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Disposisi</h4>
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
                <input type="hidden" name="id" value="{{ $data[0]->neo28_id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_weigth">Berat Badan (gram)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_weigth" id="neo28_weigth" class="form-control text-center" value="{{ (old('neo28_weigth')) ? old('neo28_weigth') : $data[0]->neo28_weigth }}">
                                    @if ($errors->has('neo28_weigth'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_weigth') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_height">Panjang Badan (cm)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_height" id="neo28_height" class="form-control text-center" value="{{ (old('neo28_height')) ? old('neo28_height') : $data[0]->neo28_height }}">
                                    @if ($errors->has('neo28_height'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_height') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_temp">Suhu Badan (C)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_temp" id="neo28_temp" class="form-control text-center" value="{{ (old('neo28_temp')) ? old('neo28_temp') : $data[0]->neo28_temp }}">
                                    @if ($errors->has('neo28_temp'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_temp') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_freq_breath">Frekuensi Nafas (x / menit)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_freq_breath" id="neo28_freq_breath" class="form-control text-center" value="{{ (old('neo28_freq_breath')) ? old('neo28_freq_breath') : $data[0]->neo28_freq_breath }}">
                                    @if ($errors->has('neo28_freq_breath'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_freq_breath') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_freq_heart">Frekuensi Jantung (x / menit)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_freq_heart" id="neo28_freq_heart" class="form-control text-center" value="{{ (old('neo28_freq_heart')) ? old('neo28_freq_heart') : $data[0]->neo28_freq_heart }}">
                                    @if ($errors->has('neo28_freq_heart'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_freq_heart') }}
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
                                    <label for="neo28_infec">Memeriksa kemungkinan penyakit sangat berat atau infeksi bakteri</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_infec" id="neo28_infec" class="form-control" cols="30" rows="5">{{ (old('neo28_infec')) ? old('neo28_infec') : $data[0]->neo28_infec }}</textarea>
                                    @if ($errors->has('neo28_infec'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_infec') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_iketrus">Memeriksa Iketrus</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_iketrus" id="neo28_iketrus" class="form-control" cols="30" rows="5">{{ (old('neo28_iketrus')) ? old('neo28_iketrus') : $data[0]->neo28_iketrus }}</textarea>
                                    @if ($errors->has('neo28_iketrus'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_iketrus') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_diare">Memeriksa Diare</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_diare" id="neo28_diare" class="form-control" cols="30" rows="5">{{ (old('neo28_diare')) ? old('neo28_diare') : $data[0]->neo28_diare }}</textarea>
                                    @if ($errors->has('neo28_diare'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_diare') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_asi">Memeriksa kemungkinan berat badan rendah dan masalah pemberian ASI/minum</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_asi" id="neo28_asi" class="form-control" cols="30" rows="5">{{ (old('neo28_asi')) ? old('neo28_asi') : $data[0]->neo28_asi }}</textarea>
                                    @if ($errors->has('neo28_asi'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_asi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_vit">Memeriksa status Vit K1</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_vit" id="neo28_vit" class="form-control" cols="30" rows="5">{{ (old('neo28_vit')) ? old('neo28_vit') : $data[0]->neo28_vit }}</textarea>
                                    @if ($errors->has('neo28_vit'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_vit') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_vacc">Memeriksa status imunisasi HB-0, BCG, Poli 1</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_vacc" id="neo28_vacc" class="form-control" cols="30" rows="5">{{ (old('neo28_vacc')) ? old('neo28_vacc') : $data[0]->neo28_vacc }}</textarea>
                                    @if ($errors->has('neo28_vacc'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_vacc') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h5>
                            <b>Bagi daerah yang sudah melakukan skrining Hipotiroid Kongenital (SHK)</b>
                        </h4>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_shk">SHK Ya/Tidak</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_shk" id="neo28_shk" class="form-control" value="{{ (old('neo28_shk')) ? old('neo28_shk') : $data[0]->neo28_shk }}">
                                    @if ($errors->has('neo28_shk'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_shk') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_shk_tes">Hasil tes SHK (-) / (+)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neo28_shk_tes" id="neo28_shk_tes" class="form-control" value="{{ (old('neo28_shk_tes')) ? old('neo28_shk_tes') : $data[0]->neo28_shk_tes }}">
                                    @if ($errors->has('neo28_shk_tes'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_shk_tes') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_shk_confrim">Konfirmasi hasil SHK</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_shk_confrim" id="neo28_shk_confrim" class="form-control" cols="30" rows="5">{{ (old('neo28_shk_confrim')) ? old('neo28_shk_confrim') : $data[0]->neo28_shk_confrim }}</textarea>
                                    @if ($errors->has('neo28_shk_confrim'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_shk_confrim') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neo28_shk_treatment">Tindakan (terapi/rujukan/umpan balik)</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neo28_shk_treatment" id="neo28_shk_treatment" class="form-control" cols="30" rows="5">{{ (old('neo28_shk_treatment')) ? old('neo28_shk_treatment') : $data[0]->neo28_shk_treatment }}</textarea>
                                    @if ($errors->has('neo28_shk_treatment'))
                                        <div class="text-danger">
                                            {{ $errors->first('neo28_shk_treatment') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Disposisi</h4>
                <?php
                    $ds = DB::table('eianc_desposisis')->where('des_reg_no', $data[0]->neo28_no_reg)->get();
                ?>
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
@endsection
