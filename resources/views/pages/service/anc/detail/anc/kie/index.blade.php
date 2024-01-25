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
    <h1>ANC - KIE</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.anc.kie.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            @if ($show == '0')
                @if (count($data) < 1)
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input type="hidden" name="anc" value="{{ $anc }}">
                    <input type="hidden" name="det" value="{{ $det }}">

                    <h4><b>Rencana Persalinan, Masalah Gizi, IMS-HIV/AIDS, KtP</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_mat_ass">Siapakah orang yang akan membantu persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_mat_ass" id="sanckie_mat_ass" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spaw as $paw)
                                                <option value="{{ $paw->pa_id }}" {{ ($paw->pa_id == old('sanckie_mat_ass')) ? 'selected' : '' }}>{{ $paw->pa_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_mat_ass'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_mat_ass') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_trans">Kendaraan apa yang akan digunakan untuk membantu persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_trans" id="sanckie_trans" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($strans as $str)
                                                <option value="{{ $str->pt_id }}" {{ ($str->pt_id == old('sanckie_trans')) ? 'selected' : '' }}>{{ $str->pt_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_trans'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_trans') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_sup_fe">Apakah mendapatkan suplement FE?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_sup_fe" id="sanckie_sup_fe" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_sup_fe') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_sup_fe') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_sup_fe'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_sup_fe') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_food_cal_fe">Apakah mendapatkan Makanan padat Kalori dan FE?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_food_cal_fe" id="sanckie_food_cal_fe" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_food_cal_fe') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_food_cal_fe') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_food_cal_fe'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_food_cal_fe') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_phbs">Apakah mendapatkan PHBS?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_phbs" id="sanckie_phbs" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_phbs') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_phbs') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_phbs'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_phbs') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_mat_place">Dimana tempat persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_mat_place" id="sanckie_mat_place" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spp as $spp)
                                                <option value="{{ $spp->pl_id }}" {{ ($spp->pl_id == old('sanckie_mat_place')) ? 'selected' : '' }}>{{ $spp->pl_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_mat_place'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_mat_place') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_blood_bank">Siapa yang akan menjadi pendonor darah?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_blood_bank" id="sanckie_blood_bank" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($sbb as $sbb)
                                                <option value="{{ $sbb->pda_id }}" {{ ($sbb->pda_id == old('sanckie_blood_bank')) ? 'selected' : '' }}>{{ $sbb->pda_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_blood_bank'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_blood_bank') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_pmt">Apakah mendapatkan makanan tambahan (PMT)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_pmt" id="sanckie_pmt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_pmt') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_pmt') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_pmt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_pmt') }}
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
                                        <label for="sanckie_dan_hm">Apakah mendapatkan penanganan Tanda Bahaya HM?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_dan_hm" id="sanckie_dan_hm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_dan_hm') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_dan_hm') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_dan_hm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_dan_hm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_def_hiv">Def HIV-IMS?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_def_hiv" id="sanckie_def_hiv" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_def_hiv') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_def_hiv') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_def_hiv'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_def_hiv') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_assis">Siapa yang mendampingi persalinan nanti?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_assis" id="sanckie_assis" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spa as $spa)
                                                <option value="{{ $spa->paw_id }}" {{ ($spa->paw_id == old('sanckie_assis')) ? 'selected' : '' }}>{{ $spa->paw_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_assis'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_assis') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kia_book">Apakah memiliki buku KIA?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                            $kia0 = DB::table('eianc_service_ancs')->where('sanc_id', Crypt::decrypt($anc))->value('sanc_kia');
                                        ?>

                                        <select name="sanckie_kia_book" id="sanckie_kia_book" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kia_book') == '0') ? 'selected' : (($kia0 == '0') ? 'selected' : '') }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckie_kia_book') == '1') ? 'selected' : (($kia0 == '1') ? 'selected' : '') }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckie_kia_book'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kia_book') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_yodium">Apakah mendapatkan Garam Yodium?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_yodium" id="sanckie_yodium" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_yodium') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_yodium') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_yodium'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_yodium') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_fis_hm">Apakah mendapatkan Fisiologi HM?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_fis_hm" id="sanckie_fis_hm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_fis_hm') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_fis_hm') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_fis_hm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_fis_hm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_motiv_kdrt">Pencegahan dan Penanganan Ktp/KDRT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_motiv_kdrt" id="sanckie_motiv_kdrt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_motiv_kdrt') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_motiv_kdrt') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_motiv_kdrt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_motiv_kdrt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4"><b>Imunisasi TT, Kelas Bumil, Brain Booster</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_tt">Apakah mendapatkan immunisasi TT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_tt" id="sanckie_tt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_tt') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_tt') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_tt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_tt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_tt_no">Immunisasi TT ke berapa?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sanckie_tt_no" id="sanckie_tt_no" class="form-control" value="{{ old('sanckie_tt_no') }}">
                                        @if ($errors->has('sanckie_tt_no'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanckie_tt_no') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_exer">Apakah mendapatkan Senam Hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_exer" id="sanckie_preg_exer" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_exer') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_exer') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_preg_exer'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_exer') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_ht_2">Apakah mendapatkan Penanganan Tanda Bahaya HT2?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_ht_2" id="sanckie_ht_2" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_ht_2') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_ht_2') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_ht_2'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_ht_2') }}
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
                                        <label for="sanckie_com_fetus">Apakah mendapatkan Cara Komunikasi dengan Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_com_fetus" id="sanckie_com_fetus" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_com_fetus') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_com_fetus') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_com_fetus'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_com_fetus') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_class">Berapa kali mendapatkan kelas ibu hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_class" id="sanckie_preg_class" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_class') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_class') == '1') ? 'selected' : '' }}>1 KALI</option>
                                            <option value="2" {{ (old('sanckie_preg_class') == '2') ? 'selected' : '' }}>2 KALI</option>
                                            <option value="3" {{ (old('sanckie_preg_class') == '3') ? 'selected' : '' }}>3 KALI</option>
                                        </select>
                                        @if(session()->has('sanckie_com_fetus'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_class') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_music">Apakah mendapatkan Cara Musik untuk Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_music" id="sanckie_music" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_music') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_music') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_music'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_music') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4"><b>Tanda Persalinan, Manajemen Laktasi, KB Paska Persalinan</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_imd">Apakah mendapatkan IMD?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_imd" id="sanckie_imd" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_imd') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_imd') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_imd'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_imd') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kolostrum">Apakah mendapatkan Kolostrum?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_kolostrum" id="sanckie_kolostrum" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kolostrum') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_kolostrum') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_kolostrum'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kolostrum') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_6">Apakah mendapatkan pemberian ASI eksklusif (6 Bulan)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_6" id="sanckie_asi_6" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_6') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_6') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_6'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_6') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_comp">Apakah mendapatkan penjalasan tentang Kandungan ASI?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_comp" id="sanckie_asi_comp" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_comp') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_comp') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_comp'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_comp') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_give">Apakah mendapatkan cara pemberian ASI yang benar?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_give" id="sanckie_asi_give" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_give') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_give') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_give'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_give') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_went">Apakah mendapatkan motivasi untuk menyusi?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_went" id="sanckie_asi_went" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_went') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_went') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_went'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_went') }}
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
                                        <label for="sanckie_boob_treatment">Apakah mendapatkan cara perawatan payudara?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_boob_treatment" id="sanckie_boob_treatment" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_boob_treatment') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_boob_treatment') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_boob_treatment'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_boob_treatment') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_ht3">Apakah mendapatkan Penanganan Tanda Bahaya HT3?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_ht3" id="sanckie_ht3" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_ht3') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_ht3') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_ht3'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_ht3') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_iden">Apakah mendapatkan Penjelasan Tentang Tanda Persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_iden" id="sanckie_preg_iden" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_iden') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_iden') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_preg_iden'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_iden') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_dan_nifas">Apakah mendapatkan Penjelasan Tentang Bahaya Nifas?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_dan_nifas" id="sanckie_dan_nifas" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_dan_nifas') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_dan_nifas') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_dan_nifas'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_dan_nifas') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_fm">Apakah mendapatkan cara berhubungan suami-istri?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_fm" id="sanckie_fm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_fm') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_fm') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_fm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_fm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kb_nifas">Apakah mendapatkan penjelasan KB setelah Nifas?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_kb_nifas" id="sanckie_kb_nifas" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kb_nifas') == '0') ? 'selected' :'' }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_kb_nifas') == '1') ? 'selected' : '' }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_kb_nifas'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kb_nifas') }}
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
                    <input type="hidden" name="idx" value="{{ $data[0]->sanckie_id }}">

                    <h4><b>Rencana Persalinan, Masalah Gizi, IMS-HIV/AIDS, KtP</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_mat_ass">Siapakah orang yang akan membantu persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_mat_ass" id="sanckie_mat_ass" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spaw as $paw)
                                                <option value="{{ $paw->pa_id }}" {{ ($paw->pa_id == old('sanckie_mat_ass')) ? 'selected' : (($paw->pa_id == $data[0]->sanckie_mat_ass) ? 'selected' : '') }}>{{ $paw->pa_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_mat_ass'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_mat_ass') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_trans">Kendaraan apa yang akan digunakan untuk membantu persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_trans" id="sanckie_trans" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($strans as $str)
                                                <option value="{{ $str->pt_id }}" {{ ($str->pt_id == old('sanckie_trans')) ? 'selected' : (($str->pt_id == $data[0]->sanckie_trans) ? 'selected' : '') }}>{{ $str->pt_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_trans'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_trans') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_sup_fe">Apakah mendapatkan suplement FE?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_sup_fe" id="sanckie_sup_fe" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_sup_fe') == '0') ? 'selected' : (($data[0]->sanckie_sup_fe == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_sup_fe') == '1') ? 'selected' : (($data[0]->sanckie_sup_fe == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_sup_fe'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_sup_fe') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_food_cal_fe">Apakah mendapatkan Makanan padat Kalori dan FE?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_food_cal_fe" id="sanckie_food_cal_fe" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_food_cal_fe') == '0') ? 'selected' : (($data[0]->sanckie_food_cal_fe == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_food_cal_fe') == '1') ? 'selected' : (($data[0]->sanckie_food_cal_fe == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_food_cal_fe'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_food_cal_fe') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_phbs">Apakah mendapatkan PHBS?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_phbs" id="sanckie_phbs" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_phbs') == '0') ? 'selected' : (($data[0]->sanckie_phbs == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_phbs') == '1') ? 'selected' : (($data[0]->sanckie_phbs == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_phbs'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_phbs') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_mat_place">Dimana tempat persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_mat_place" id="sanckie_mat_place" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spp as $spp)
                                                <option value="{{ $spp->pl_id }}" {{ ($spp->pl_id == old('sanckie_mat_place')) ? 'selected' : (($spp->pl_id == $data[0]->sanckie_mat_place) ? 'selected' : '') }}>{{ $spp->pl_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_mat_place'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_mat_place') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_blood_bank">Siapa yang akan menjadi pendonor darah?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_blood_bank" id="sanckie_blood_bank" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($sbb as $sbb)
                                                <option value="{{ $sbb->pda_id }}" {{ ($sbb->pda_id == old('sanckie_blood_bank')) ? 'selected' : (($sbb->pda_id == $data[0]->sanckie_blood_bank) ? 'selected' : '') }}>{{ $sbb->pda_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_blood_bank'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_blood_bank') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_pmt">Apakah mendapatkan makanan tambahan (PMT)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_pmt" id="sanckie_pmt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_pmt') == '0') ? 'selected' : (($data[0]->sanckie_pmt == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_pmt') == '1') ? 'selected' : (($data[0]->sanckie_pmt == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_pmt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_pmt') }}
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
                                        <label for="sanckie_dan_hm">Apakah mendapatkan penanganan Tanda Bahaya HM?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_dan_hm" id="sanckie_dan_hm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_dan_hm') == '0') ? 'selected' : (($data[0]->sanckie_dan_hm == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_dan_hm') == '1') ? 'selected' : (($data[0]->sanckie_dan_hm == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_dan_hm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_dan_hm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_def_hiv">Def HIV-IMS?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_def_hiv" id="sanckie_def_hiv" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_def_hiv') == '0') ? 'selected' : (($data[0]->sanckie_def_hiv == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_def_hiv') == '1') ? 'selected' : (($data[0]->sanckie_def_hiv == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_def_hiv'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_def_hiv') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_assis">Siapa yang mendampingi persalinan nanti?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_assis" id="sanckie_assis" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spa as $spa)
                                                <option value="{{ $spa->paw_id }}" {{ ($spa->paw_id == old('sanckie_assis')) ? 'selected' : (($spa->paw_id == $data[0]->sanckie_assis) ? 'selected' : '') }}>{{ $spa->paw_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_assis'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_assis') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kia_book">Apakah memiliki buku KIA?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_kia_book" id="sanckie_kia_book" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kia_book') == '0') ? 'selected' : (($data[0]->sanckie_kia_book == '0') ? 'selected' : '' ) }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckie_kia_book') == '1') ? 'selected' : (($data[0]->sanckie_kia_book == '1') ? 'selected' : '' ) }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckie_kia_book'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kia_book') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_yodium">Apakah mendapatkan Garam Yodium?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_yodium" id="sanckie_yodium" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_yodium') == '0') ? 'selected' : (($data[0]->sanckie_yodium == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_yodium') == '1') ? 'selected' : (($data[0]->sanckie_yodium == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_yodium'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_yodium') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_fis_hm">Apakah mendapatkan Fisiologi HM?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_fis_hm" id="sanckie_fis_hm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_fis_hm') == '0') ? 'selected' : (($data[0]->sanckie_fis_hm == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_fis_hm') == '1') ? 'selected' : (($data[0]->sanckie_fis_hm == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_fis_hm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_fis_hm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_motiv_kdrt">Pencegahan dan Penanganan Ktp/KDRT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_motiv_kdrt" id="sanckie_motiv_kdrt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_motiv_kdrt') == '0') ? 'selected' : (($data[0]->sanckie_motiv_kdrt == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_motiv_kdrt') == '1') ? 'selected' : (($data[0]->sanckie_motiv_kdrt == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_motiv_kdrt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_motiv_kdrt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4"><b>Imunisasi TT, Kelas Bumil, Brain Booster</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_tt">Apakah mendapatkan immunisasi TT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_tt" id="sanckie_tt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_tt') == '0') ? 'selected' : (($data[0]->sanckie_tt == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_tt') == '1') ? 'selected' : (($data[0]->sanckie_tt == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_tt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_tt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_tt_no">Immunisasi TT ke berapa?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sanckie_tt_no" id="sanckie_tt_no" class="form-control" value="{{ (old('sanckie_tt_no')) ? old('sanckie_tt_no') : $data[0]->sanckie_tt_no }}">
                                        @if ($errors->has('sanckie_tt_no'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanckie_tt_no') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_exer">Apakah mendapatkan Senam Hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_exer" id="sanckie_preg_exer" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_exer') == '0') ? 'selected' : (($data[0]->sanckie_preg_exer == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_exer') == '1') ? 'selected' : (($data[0]->sanckie_preg_exer == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_preg_exer'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_exer') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_ht_2">Apakah mendapatkan Penanganan Tanda Bahaya HT2?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_ht_2" id="sanckie_ht_2" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_ht_2') == '0') ? 'selected' : (($data[0]->sanckie_ht_2 == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_ht_2') == '1') ? 'selected' : (($data[0]->sanckie_ht_2 == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_ht_2'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_ht_2') }}
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
                                        <label for="sanckie_com_fetus">Apakah mendapatkan Cara Komunikasi dengan Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_com_fetus" id="sanckie_com_fetus" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_com_fetus') == '0') ? 'selected' : (($data[0]->sanckie_com_fetus == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_com_fetus') == '1') ? 'selected' : (($data[0]->sanckie_com_fetus == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_com_fetus'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_com_fetus') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_class">Berapa kali mendapatkan kelas ibu hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_class" id="sanckie_preg_class" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_class') == '0') ? 'selected' : (($data[0]->sanckie_preg_class == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_class') == '1') ? 'selected' : (($data[0]->sanckie_preg_class == '1') ? 'selected' : '' ) }}>1 KALI</option>
                                            <option value="2" {{ (old('sanckie_preg_class') == '2') ? 'selected' : (($data[0]->sanckie_preg_class == '2') ? 'selected' : '' ) }}>2 KALI</option>
                                            <option value="3" {{ (old('sanckie_preg_class') == '3') ? 'selected' : (($data[0]->sanckie_preg_class == '3') ? 'selected' : '' ) }}>3 KALI</option>
                                        </select>
                                        @if(session()->has('sanckie_com_fetus'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_class') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_music">Apakah mendapatkan Cara Musik untuk Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_music" id="sanckie_music" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_music') == '0') ? 'selected' : (($data[0]->sanckie_music == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_music') == '1') ? 'selected' : (($data[0]->sanckie_music == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_music'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_music') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4"><b>Tanda Persalinan, Manajemen Laktasi, KB Paska Persalinan</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_imd">Apakah mendapatkan IMD?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_imd" id="sanckie_imd" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_imd') == '0') ? 'selected' : (($data[0]->sanckie_imd == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_imd') == '1') ? 'selected' : (($data[0]->sanckie_imd == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_imd'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_imd') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kolostrum">Apakah mendapatkan Kolostrum?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_kolostrum" id="sanckie_kolostrum" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kolostrum') == '0') ? 'selected' : (($data[0]->sanckie_kolostrum == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_kolostrum') == '1') ? 'selected' : (($data[0]->sanckie_kolostrum == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_kolostrum'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kolostrum') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_6">Apakah mendapatkan pemberian ASI eksklusif (6 Bulan)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_6" id="sanckie_asi_6" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_6') == '0') ? 'selected' : (($data[0]->sanckie_asi_6 == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_6') == '1') ? 'selected' : (($data[0]->sanckie_asi_6 == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_6'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_6') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_comp">Apakah mendapatkan penjalasan tentang Kandungan ASI?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_comp" id="sanckie_asi_comp" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_comp') == '0') ? 'selected' : (($data[0]->sanckie_asi_comp == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_comp') == '1') ? 'selected' : (($data[0]->sanckie_asi_comp == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_comp'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_comp') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_give">Apakah mendapatkan cara pemberian ASI yang benar?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_give" id="sanckie_asi_give" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_give') == '0') ? 'selected' : (($data[0]->sanckie_asi_give == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_give') == '1') ? 'selected' : (($data[0]->sanckie_asi_give == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_give'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_give') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_went">Apakah mendapatkan motivasi untuk menyusi?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_went" id="sanckie_asi_went" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_went') == '0') ? 'selected' : (($data[0]->sanckie_asi_went == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_went') == '1') ? 'selected' : (($data[0]->sanckie_asi_went == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_went'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_went') }}
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
                                        <label for="sanckie_boob_treatment">Apakah mendapatkan cara perawatan payudara?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_boob_treatment" id="sanckie_boob_treatment" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_boob_treatment') == '0') ? 'selected' : (($data[0]->sanckie_boob_treatment == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_boob_treatment') == '1') ? 'selected' : (($data[0]->sanckie_boob_treatment == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_boob_treatment'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_boob_treatment') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_ht3">Apakah mendapatkan Penanganan Tanda Bahaya HT3?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_ht3" id="sanckie_ht3" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_ht3') == '0') ? 'selected' : (($data[0]->sanckie_ht3 == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_ht3') == '1') ? 'selected' : (($data[0]->sanckie_ht3 == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_ht3'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_ht3') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_iden">Apakah mendapatkan Penjelasan Tentang Tanda Persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_iden" id="sanckie_preg_iden" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_iden') == '0') ? 'selected' : (($data[0]->sanckie_preg_iden == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_iden') == '1') ? 'selected' : (($data[0]->sanckie_preg_iden == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_preg_iden'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_iden') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_dan_nifas">Apakah mendapatkan Penjelasan Tentang Bahaya Nifas?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_dan_nifas" id="sanckie_dan_nifas" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_dan_nifas') == '0') ? 'selected' : (($data[0]->sanckie_dan_nifas == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_dan_nifas') == '1') ? 'selected' : (($data[0]->sanckie_dan_nifas == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_dan_nifas'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_dan_nifas') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_fm">Apakah mendapatkan cara berhubungan suami-istri?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_fm" id="sanckie_fm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_fm') == '0') ? 'selected' : (($data[0]->sanckie_fm == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_fm') == '1') ? 'selected' : (($data[0]->sanckie_fm == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_fm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_fm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kb_nifas">Apakah mendapatkan penjelasan KB setelah Nifas?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_kb_nifas" id="sanckie_kb_nifas" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kb_nifas') == '0') ? 'selected' : (($data[0]->sanckie_kb_nifas == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_kb_nifas') == '1') ? 'selected' : (($data[0]->sanckie_kb_nifas == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_kb_nifas'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kb_nifas') }}
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
                    <input type="hidden" name="idx" value="{{ $xdata[0]->sanckie_id }}">

                    <h4><b>Rencana Persalinan, Masalah Gizi, IMS-HIV/AIDS, KtP</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_mat_ass">Siapakah orang yang akan membantu persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_mat_ass" id="sanckie_mat_ass" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spaw as $paw)
                                                <option value="{{ $paw->pa_id }}" {{ ($paw->pa_id == old('sanckie_mat_ass')) ? 'selected' : (($paw->pa_id == $xdata[0]->sanckie_mat_ass) ? 'selected' : '') }}>{{ $paw->pa_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_mat_ass'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_mat_ass') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_trans">Kendaraan apa yang akan digunakan untuk membantu persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-8">
                                            <select name="sanckie_trans" id="sanckie_trans" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                @foreach ($strans as $str)
                                                    <option value="{{ $str->pt_id }}" {{ ($str->pt_id == old('sanckie_trans')) ? 'selected' : (($str->pt_id == $xdata[0]->sanckie_trans) ? 'selected' : '') }}>{{ $str->pt_name }}</option>
                                                @endforeach
                                            </select>
                                            @if(session()->has('sanckie_trans'))
                                                <div class="text-danger">
                                                    {{ session()->get('sanckie_trans') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_sup_fe">Apakah mendapatkan suplement FE?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_sup_fe" id="sanckie_sup_fe" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_sup_fe') == '0') ? 'selected' : (($xdata[0]->sanckie_sup_fe == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_sup_fe') == '1') ? 'selected' : (($xdata[0]->sanckie_sup_fe == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_sup_fe'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_sup_fe') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_food_cal_fe">Apakah mendapatkan Makanan padat Kalori dan FE?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_food_cal_fe" id="sanckie_food_cal_fe" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_food_cal_fe') == '0') ? 'selected' : (($xdata[0]->sanckie_food_cal_fe == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_food_cal_fe') == '1') ? 'selected' : (($xdata[0]->sanckie_food_cal_fe == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_food_cal_fe'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_food_cal_fe') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_phbs">Apakah mendapatkan PHBS?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_phbs" id="sanckie_phbs" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_phbs') == '0') ? 'selected' : (($xdata[0]->sanckie_phbs == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_phbs') == '1') ? 'selected' : (($xdata[0]->sanckie_phbs == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_phbs'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_phbs') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_mat_place">Dimana tempat persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_mat_place" id="sanckie_mat_place" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spp as $spp)
                                                <option value="{{ $spp->pl_id }}" {{ ($spp->pl_id == old('sanckie_mat_place')) ? 'selected' : (($spp->pl_id == $xdata[0]->sanckie_mat_place) ? 'selected' : '') }}>{{ $spp->pl_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_mat_place'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_mat_place') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_blood_bank">Siapa yang akan menjadi pendonor darah?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_blood_bank" id="sanckie_blood_bank" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($sbb as $sbb)
                                                <option value="{{ $sbb->pda_id }}" {{ ($sbb->pda_id == old('sanckie_blood_bank')) ? 'selected' : (($sbb->pda_id == $xdata[0]->sanckie_blood_bank) ? 'selected' : '') }}>{{ $sbb->pda_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_blood_bank'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_blood_bank') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_pmt">Apakah mendapatkan makanan tambahan (PMT)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_pmt" id="sanckie_pmt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_pmt') == '0') ? 'selected' : (($xdata[0]->sanckie_pmt == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_pmt') == '1') ? 'selected' : (($xdata[0]->sanckie_pmt == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_pmt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_pmt') }}
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
                                        <label for="sanckie_dan_hm">Apakah mendapatkan penanganan Tanda Bahaya HM?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_dan_hm" id="sanckie_dan_hm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_dan_hm') == '0') ? 'selected' : (($xdata[0]->sanckie_dan_hm == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_dan_hm') == '1') ? 'selected' : (($xdata[0]->sanckie_dan_hm == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_dan_hm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_dan_hm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_def_hiv">Def HIV-IMS?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_def_hiv" id="sanckie_def_hiv" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_def_hiv') == '0') ? 'selected' : (($xdata[0]->sanckie_def_hiv == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_def_hiv') == '1') ? 'selected' : (($xdata[0]->sanckie_def_hiv == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_def_hiv'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_def_hiv') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_assis">Siapa yang mendampingi persalinan nanti?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_assis" id="sanckie_assis" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($spa as $spa)
                                                <option value="{{ $spa->paw_id }}" {{ ($spa->paw_id == old('sanckie_assis')) ? 'selected' : (($spa->paw_id == $xdata[0]->sanckie_assis) ? 'selected' : '') }}>{{ $spa->paw_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckie_assis'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckie_assis') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kia_book">Apakah memiliki buku KIA?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_kia_book" id="sanckie_kia_book" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kia_book') == '0') ? 'selected' : (($xdata[0]->sanckie_kia_book == '0') ? 'selected' : '' ) }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckie_kia_book') == '1') ? 'selected' : (($xdata[0]->sanckie_kia_book == '1') ? 'selected' : '' ) }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckie_kia_book'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kia_book') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_yodium">Apakah mendapatkan Garam Yodium?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_yodium" id="sanckie_yodium" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_yodium') == '0') ? 'selected' : (($xdata[0]->sanckie_yodium == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_yodium') == '1') ? 'selected' : (($xdata[0]->sanckie_yodium == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_yodium'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_yodium') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_fis_hm">Apakah mendapatkan Fisiologi HM?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_fis_hm" id="sanckie_fis_hm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_fis_hm') == '0') ? 'selected' : (($xdata[0]->sanckie_fis_hm == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_fis_hm') == '1') ? 'selected' : (($xdata[0]->sanckie_fis_hm == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_fis_hm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_fis_hm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_motiv_kdrt">Pencegahan dan Penanganan Ktp/KDRT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_motiv_kdrt" id="sanckie_motiv_kdrt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_motiv_kdrt') == '0') ? 'selected' : (($xdata[0]->sanckie_motiv_kdrt == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_motiv_kdrt') == '1') ? 'selected' : (($xdata[0]->sanckie_motiv_kdrt == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_motiv_kdrt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_motiv_kdrt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4"><b>Imunisasi TT, Kelas Bumil, Brain Booster</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_tt">Apakah mendapatkan immunisasi TT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_tt" id="sanckie_tt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_tt') == '0') ? 'selected' : (($xdata[0]->sanckie_tt == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_tt') == '1') ? 'selected' : (($xdata[0]->sanckie_tt == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_tt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_tt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_tt_no">Immunisasi TT ke berapa?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sanckie_tt_no" id="sanckie_tt_no" class="form-control" value="{{ (old('sanckie_tt_no')) ? old('sanckie_tt_no') : $xdata[0]->sanckie_tt_no }}">
                                        @if ($errors->has('sanckie_tt_no'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanckie_tt_no') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_exer">Apakah mendapatkan Senam Hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_exer" id="sanckie_preg_exer" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_exer') == '0') ? 'selected' : (($xdata[0]->sanckie_preg_exer == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_exer') == '1') ? 'selected' : (($xdata[0]->sanckie_preg_exer == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_preg_exer'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_exer') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_ht_2">Apakah mendapatkan Penanganan Tanda Bahaya HT2?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_ht_2" id="sanckie_ht_2" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_ht_2') == '0') ? 'selected' : (($xdata[0]->sanckie_ht_2 == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_ht_2') == '1') ? 'selected' : (($xdata[0]->sanckie_ht_2 == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_ht_2'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_ht_2') }}
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
                                        <label for="sanckie_com_fetus">Apakah mendapatkan Cara Komunikasi dengan Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_com_fetus" id="sanckie_com_fetus" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_com_fetus') == '0') ? 'selected' : (($xdata[0]->sanckie_com_fetus == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_com_fetus') == '1') ? 'selected' : (($xdata[0]->sanckie_com_fetus == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_com_fetus'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_com_fetus') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_class">Berapa kali mendapatkan kelas ibu hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_class" id="sanckie_preg_class" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_class') == '0') ? 'selected' : (($xdata[0]->sanckie_preg_class == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_class') == '1') ? 'selected' : (($xdata[0]->sanckie_preg_class == '1') ? 'selected' : '' ) }}>1 KALI</option>
                                            <option value="2" {{ (old('sanckie_preg_class') == '2') ? 'selected' : (($xdata[0]->sanckie_preg_class == '2') ? 'selected' : '' ) }}>2 KALI</option>
                                            <option value="3" {{ (old('sanckie_preg_class') == '3') ? 'selected' : (($xdata[0]->sanckie_preg_class == '3') ? 'selected' : '' ) }}>3 KALI</option>
                                        </select>
                                        @if(session()->has('sanckie_com_fetus'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_class') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_music">Apakah mendapatkan Cara Musik untuk Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_music" id="sanckie_music" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_music') == '0') ? 'selected' : (($xdata[0]->sanckie_music == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_music') == '1') ? 'selected' : (($xdata[0]->sanckie_music == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_music'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_music') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4"><b>Tanda Persalinan, Manajemen Laktasi, KB Paska Persalinan</b></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_imd">Apakah mendapatkan IMD?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_imd" id="sanckie_imd" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_imd') == '0') ? 'selected' : (($xdata[0]->sanckie_imd == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_imd') == '1') ? 'selected' : (($xdata[0]->sanckie_imd == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_imd'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_imd') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kolostrum">Apakah mendapatkan Kolostrum?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_kolostrum" id="sanckie_kolostrum" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kolostrum') == '0') ? 'selected' : (($xdata[0]->sanckie_kolostrum == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_kolostrum') == '1') ? 'selected' : (($xdata[0]->sanckie_kolostrum == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_kolostrum'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kolostrum') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_6">Apakah mendapatkan pemberian ASI eksklusif (6 Bulan)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_6" id="sanckie_asi_6" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_6') == '0') ? 'selected' : (($xdata[0]->sanckie_asi_6 == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_6') == '1') ? 'selected' : (($xdata[0]->sanckie_asi_6 == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_6'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_6') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_comp">Apakah mendapatkan penjalasan tentang Kandungan ASI?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_comp" id="sanckie_asi_comp" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_comp') == '0') ? 'selected' : (($xdata[0]->sanckie_asi_comp == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_comp') == '1') ? 'selected' : (($xdata[0]->sanckie_asi_comp == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_comp'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_comp') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_give">Apakah mendapatkan cara pemberian ASI yang benar?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_give" id="sanckie_asi_give" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_give') == '0') ? 'selected' : (($xdata[0]->sanckie_asi_give == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_give') == '1') ? 'selected' : (($xdata[0]->sanckie_asi_give == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_give'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_give') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_asi_went">Apakah mendapatkan motivasi untuk menyusi?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_asi_went" id="sanckie_asi_went" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_asi_went') == '0') ? 'selected' : (($xdata[0]->sanckie_asi_went == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_asi_went') == '1') ? 'selected' : (($xdata[0]->sanckie_asi_went == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_asi_went'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_asi_went') }}
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
                                        <label for="sanckie_boob_treatment">Apakah mendapatkan cara perawatan payudara?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_boob_treatment" id="sanckie_boob_treatment" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_boob_treatment') == '0') ? 'selected' : (($xdata[0]->sanckie_boob_treatment == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_boob_treatment') == '1') ? 'selected' : (($xdata[0]->sanckie_boob_treatment == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_boob_treatment'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_boob_treatment') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_ht3">Apakah mendapatkan Penanganan Tanda Bahaya HT3?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_ht3" id="sanckie_ht3" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_ht3') == '0') ? 'selected' : (($xdata[0]->sanckie_ht3 == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_ht3') == '1') ? 'selected' : (($xdata[0]->sanckie_ht3 == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_ht3'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_ht3') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_preg_iden">Apakah mendapatkan Penjelasan Tentang Tanda Persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_preg_iden" id="sanckie_preg_iden" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_preg_iden') == '0') ? 'selected' : (($xdata[0]->sanckie_preg_iden == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_preg_iden') == '1') ? 'selected' : (($xdata[0]->sanckie_preg_iden == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_preg_iden'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_preg_iden') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_dan_nifas">Apakah mendapatkan Penjelasan Tentang Bahaya Nifas?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_dan_nifas" id="sanckie_dan_nifas" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_dan_nifas') == '0') ? 'selected' : (($xdata[0]->sanckie_dan_nifas == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_dan_nifas') == '1') ? 'selected' : (($xdata[0]->sanckie_dan_nifas == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_dan_nifas'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_dan_nifas') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_fm">Apakah mendapatkan cara berhubungan suami-istri?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_fm" id="sanckie_fm" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_fm') == '0') ? 'selected' : (($xdata[0]->sanckie_fm == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_fm') == '1') ? 'selected' : (($xdata[0]->sanckie_fm == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_fm'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_fm') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckie_kb_nifas">Apakah mendapatkan penjelasan KB setelah Nifas?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckie_kb_nifas" id="sanckie_kb_nifas" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckie_kb_nifas') == '0') ? 'selected' : (($xdata[0]->sanckie_kb_nifas == '0') ? 'selected' : '' ) }}>TIDAK DAPAT</option>
                                            <option value="1" {{ (old('sanckie_kb_nifas') == '1') ? 'selected' : (($xdata[0]->sanckie_kb_nifas == '1') ? 'selected' : '' ) }}>DAPAT</option>
                                        </select>
                                        @if(session()->has('sanckie_kb_nifas'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckie_kb_nifas') }}
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
            <a href="{{ route('service.anc.anc.lab', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
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
