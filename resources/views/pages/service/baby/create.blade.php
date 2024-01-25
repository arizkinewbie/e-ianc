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
    <a href="{{ route('service.baby', ['id' => $id]) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Tumbuh Kembang BB</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.baby.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            @if (empty($data))
                <input type="hidden" name="norm" value="{{ $id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_no">Anak ke berapa?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sbaby_no" id="sbaby_no" value="{{ old('sbaby_no') }}" class="form-control text-center" maxlength="2">
                                    @if ($errors->has('sbaby_no'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_no') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_weight_born">Berat Bayi/Balita Ketika Lahir (gram)</label>
                                    <input type="text" name="sbaby_weight_born" id="sbaby_weight_born" class="form-control text-center" value="{{ old('sbaby_weight_born') }}" maxlength="10">
                                    @if ($errors->has('sbaby_weight_born'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_weight_born') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_height_born">Panjang Bayi/Balita Ketika Lahir (cm)</label>
                                    <input type="text" name="sbaby_height_born" id="sbaby_height_born" class="form-control text-center" value="{{ old('sbaby_height_born') }}" maxlength="10">
                                    @if ($errors->has('sbaby_height_born'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_height_born') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_pragwith_id">Bagaimana Proses Persalinan Bayi?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sbaby_pragwith_id" id="sbaby_pragwith_id" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($spw as $pw)
                                            <option value="{{ $pw->pw_id }}" {{ (old('sbaby_pragwith_id') == $pw->pw_id) ? 'selected' : '' }}>{{ $pw->pw_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sbaby_pragwith_id'))
                                        <div class="text-danger">
                                            {{ session()->get('sbaby_pragwith_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_mat_assis">Siapa yang membantu persalinan?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sbaby_mat_assis" id="sbaby_mat_assis" value="{{ old('sbaby_mat_assis') }}" class="form-control text-center">
                                    @if ($errors->has('sbaby_mat_assis'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_mat_assis') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_cond">Apakah Bayi mengalami kelainan bawaan?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sbaby_cond" id="sbaby_cond" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sbaby_cond') == '0') ? 'selected' : '' }}>Tidak ada Kelainan</option>
                                        <option value="1" {{ (old('sbaby_cond') == '1') ? 'selected' : '' }}>Kelainan Letak</option>
                                        <option value="2" {{ (old('sbaby_cond') == '2') ? 'selected' : '' }}>CPC</option>
                                        <option value="3" {{ (old('sbaby_cond') == '3') ? 'selected' : '' }}>Cacat Bawaan</option>
                                    </select>
                                    @if(session()->has('sbaby_cond'))
                                        <div class="text-danger">
                                            {{ session()->get('sbaby_cond') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_asi">Apakah sedang diberi Asi?</label>
                                    <select name="sbaby_asi" id="sbaby_asi" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sbaby_asi') == '0') ? 'selected' : '' }}>Tidak</option>
                                        <option value="1" {{ (old('sbaby_asi') == '1') ? 'selected' : '' }}>Ya</option>
                                    </select>
                                    @if(session()->has('sbaby_asi'))
                                        <div class="text-danger">
                                            {{ session()->get('sbaby_asi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_asi_give">Berapa lama pemberian Asi? (Bulan)</label>
                                    <input type="text" name="sbaby_asi_give" id="sbaby_asi_give" class="form-control text-center" value="{{ old('sbaby_asi_give') }}" maxlength="2" placeholder="24">
                                    @if ($errors->has('sbaby_asi_give'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_asi_give') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_weight_now">Berat Bayi/Balita saat ini? (gram)</label>
                                    <input type="text" name="sbaby_weight_now" id="sbaby_weight_now" class="form-control text-center" value="{{ old('sbaby_weight_now') }}" maxlength="10">
                                    @if ($errors->has('sbaby_weight_now'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_weight_now') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_height_now">Panjang Bayi/Balita saat ini? (cm)</label>
                                    <input type="text" name="sbaby_height_now" id="sbaby_height_now" class="form-control text-center" value="{{ old('sbaby_height_now') }}" maxlength="10">
                                    @if ($errors->has('sbaby_height_now'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_height_now') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_sym">Apakah ada gejala yang ditemukan?</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sbaby_sym" id="sbaby_sym" cols="30" rows="3" class="form-control">{{ old('sbaby_sym') }}</textarea>
                                    @if ($errors->has('sbaby_sym'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_sym') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_physical">Bagaimana pemeriksaan fisik yang dilakukan?</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sbaby_physical" id="sbaby_physical" cols="30" rows="3" class="form-control">{{ old('sbaby_physical') }}</textarea>
                                    @if ($errors->has('sbaby_physical'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_physical') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_diagnose">Bagaimana diagnosa yang dilakukan?</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sbaby_diagnose" id="sbaby_diagnose" cols="30" rows="3" class="form-control">{{ old('sbaby_diagnose') }}</textarea>
                                    @if ($errors->has('sbaby_diagnose'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_diagnose') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_sugg">Bagaimana Anjuran yang diberikan?</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sbaby_sugg" id="sbaby_sugg" cols="30" rows="3" class="form-control">{{ old('sbaby_sugg') }}</textarea>
                                    @if ($errors->has('sbaby_sugg'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_sugg') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Disposisi Pasien</h4>
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
                <input type="hidden" name="norm" value="{{ $id }}">
                <input type="hidden" name="id" value="{{ Crypt::decrypt($xid) }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_no">Anak ke berapa?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sbaby_no" id="sbaby_no" value="{{ (old('sbaby_no')) ? old('sbaby_no') : $data->sbaby_no }}" class="form-control text-center" maxlength="2">
                                    @if ($errors->has('sbaby_no'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_no') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_weight_born">Berat Bayi/Balita Ketika Lahir (gram)</label>
                                    <input type="text" name="sbaby_weight_born" id="sbaby_weight_born" class="form-control text-center" value="{{ (old('sbaby_weight_born')) ? old('sbaby_weight_born') : $data->sbaby_weight_born }}" maxlength="10">
                                    @if ($errors->has('sbaby_weight_born'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_weight_born') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_height_born">Panjang Bayi/Balita Ketika Lahir (cm)</label>
                                    <input type="text" name="sbaby_height_born" id="sbaby_height_born" class="form-control text-center" value="{{ (old('sbaby_height_born')) ? old('sbaby_height_born') : $data->sbaby_height_born }}" maxlength="10">
                                    @if ($errors->has('sbaby_height_born'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_height_born') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_pragwith_id">Bagaimana Proses Persalinan Bayi?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sbaby_pragwith_id" id="sbaby_pragwith_id" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($spw as $pw)
                                            <option value="{{ $pw->pw_id }}" {{ (old('sbaby_pragwith_id') == $pw->pw_id) ? 'selected' : (($data->sbaby_pragwith_id == $pw->pw_id) ? 'selected' : '') }}>{{ $pw->pw_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sbaby_pragwith_id'))
                                        <div class="text-danger">
                                            {{ session()->get('sbaby_pragwith_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_mat_assis">Siapa yang membantu persalinan?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sbaby_mat_assis" id="sbaby_mat_assis" value="{{ (old('sbaby_mat_assis')) ? old('sbaby_mat_assis') : $data->sbaby_mat_assis }}" class="form-control text-center">
                                    @if ($errors->has('sbaby_mat_assis'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_mat_assis') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_cond">Apakah Bayi mengalami kelainan bawaan?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sbaby_cond" id="sbaby_cond" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sbaby_cond') == '0') ? 'selected' : (($data->sbaby_cond == '0') ? 'selected' : '') }}>Tidak ada Kelainan</option>
                                        <option value="1" {{ (old('sbaby_cond') == '1') ? 'selected' : (($data->sbaby_cond == '1') ? 'selected' : '') }}>Kelainan Letak</option>
                                        <option value="2" {{ (old('sbaby_cond') == '2') ? 'selected' : (($data->sbaby_cond == '2') ? 'selected' : '') }}>CPC</option>
                                        <option value="3" {{ (old('sbaby_cond') == '3') ? 'selected' : (($data->sbaby_cond == '3') ? 'selected' : '') }}>Cacat Bawaan</option>
                                    </select>
                                    @if(session()->has('sbaby_cond'))
                                        <div class="text-danger">
                                            {{ session()->get('sbaby_cond') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_asi">Apakah sedang diberi Asi?</label>
                                    <select name="sbaby_asi" id="sbaby_asi" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sbaby_asi') == '0') ? 'selected' : (($data->sbaby_asi == '0') ? 'selected' : '') }}>Tidak</option>
                                        <option value="1" {{ (old('sbaby_asi') == '1') ? 'selected' : (($data->sbaby_asi == '1') ? 'selected' : '') }}>Ya</option>
                                    </select>
                                    @if(session()->has('sbaby_asi'))
                                        <div class="text-danger">
                                            {{ session()->get('sbaby_asi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_asi_give">Berapa lama pemberian Asi? (Bulan)</label>
                                    <input type="text" name="sbaby_asi_give" id="sbaby_asi_give" class="form-control text-center" value="{{ (old('sbaby_asi_give')) ? old('sbaby_asi_give') : $data->sbaby_asi_give }}" maxlength="2" placeholder="24">
                                    @if ($errors->has('sbaby_asi_give'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_asi_give') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_weight_now">Berat Bayi/Balita saat ini? (gram)</label>
                                    <input type="text" name="sbaby_weight_now" id="sbaby_weight_now" class="form-control text-center" value="{{ (old('sbaby_weight_now')) ? old('sbaby_weight_now') : $data->sbaby_weight_now }}" maxlength="10">
                                    @if ($errors->has('sbaby_weight_now'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_weight_now') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 text-center">
                                    <label for="sbaby_height_now">Panjang Bayi/Balita saat ini? (cm)</label>
                                    <input type="text" name="sbaby_height_now" id="sbaby_height_now" class="form-control text-center" value="{{ (old('sbaby_height_now')) ? old('sbaby_height_now') : $data->sbaby_height_now }}" maxlength="10">
                                    @if ($errors->has('sbaby_height_now'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_height_now') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_sym">Apakah ada gejala yang ditemukan?</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sbaby_sym" id="sbaby_sym" cols="30" rows="3" class="form-control">{{ (old('sbaby_sym')) ? old('sbaby_sym') : $data->sbaby_sym }}</textarea>
                                    @if ($errors->has('sbaby_sym'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_sym') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_physical">Bagaimana pemeriksaan fisik yang dilakukan?</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sbaby_physical" id="sbaby_physical" cols="30" rows="3" class="form-control">{{ (old('sbaby_physical')) ? old('sbaby_physical') : $data->sbaby_physical }}</textarea>
                                    @if ($errors->has('sbaby_physical'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_physical') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_diagnose">Bagaimana diagnosa yang dilakukan?</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sbaby_diagnose" id="sbaby_diagnose" cols="30" rows="3" class="form-control">{{ (old('sbaby_diagnose')) ? old('sbaby_diagnose') : $data->sbaby_diagnose }}</textarea>
                                    @if ($errors->has('sbaby_diagnose'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_diagnose') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sbaby_sugg">Bagaimana Anjuran yang diberikan?</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="sbaby_sugg" id="sbaby_sugg" cols="30" rows="3" class="form-control">{{ (old('sbaby_sugg')) ? old('sbaby_sugg') : $data->sbaby_sugg }}</textarea>
                                    @if ($errors->has('sbaby_sugg'))
                                        <div class="text-danger">
                                            {{ $errors->first('sbaby_sugg') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Disposisi Pasien</h4>
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
