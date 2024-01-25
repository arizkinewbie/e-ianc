@php
    $date1 = strtotime(date('Y-m-d'));
    $date2 = strtotime($danc->sanc_hpht);

    $div = ($date1 - $date2)/ 60 / 60 / 24 / 7;
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

<script>
    function imt(){
        var bb = $('#sancpe_weight').val();
        var tb = $('#sancpe_height').val();

        var btb = tb/100;

        var hit = bb / (btb*btb);

        if (hit < 18.5) {
            var cat = 'Tidak Normal/Kurang';
        }else if (hit < 25.1) {
            var cat = 'Normal';
        }else if (hit < 30) {
            var cat = 'Kegemukan';
        }else{
            var cat = 'Obesitas';
        }

        $('#sancpe_imt').val(Math.floor(hit));
        $('#imt_cat').val(cat);
    }

    function keke(){
        var arm = $('#sancpe_arm').val();

        if (arm < 23.5) {
            $('#kek').val('Ada Resiko KEK');
        }else{
            $('#kek').val('Tidak Ada Resiko');
        }
    }

    function cpde(){
        var p = $('#sancpe_pelvis').val();

        if (p < 80) {
            $('#cpd').val('Ada Resiko CPD');
        }else{
            $('#cpd').val('Tidak Ada Resiko');
        }
    }

    function tbje(){
        var pap = $('#sancpe_pap').val();
        var tfu1 = $('#sancpe_tfu_cm').val();
        var tfu2 = $('#sancpe_tfu_finger').val();

        if (tfu2 == '') {
            var tfu = tfu1;
        } else {
            var tfu = tfu2;
        }

        if (pap == '') {
            alert('Kepala Terhadap PAP, belum dipilih!');
        } else {
            // console.log(pap);
            var ht = (tfu - pap) * 155
            $('#tbj').val(ht);
        }
    }
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
    <h1>ANC - PEMERIKSAAN FISIK</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.anc.physical.store') }}" method="post" autocomplete="off">
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
                                        <label for="sancpe_weight">Berat Badan sebelum hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_weight" id="sancpe_weight" class="form-control text-center" value="{{ old('sancpe_weight') }}" onkeyup="return imt();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @if ($errors->has('sancpe_weight'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_weight') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_weight_now">Berat Badan saat ini?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_weight_now" id="sancpe_weight_now" class="form-control text-center" value="{{ old('sancpe_weight_now') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @if ($errors->has('sancpe_weight_now'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_weight_now') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_height">Tinggi Badan berapa?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_height" id="sancpe_height" class="form-control text-center" value="{{ old('sancpe_height') }}" onkeyup="return imt();">
                                        @if ($errors->has('sancpe_height'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_height') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <label for="sancpe_imt">IMT</label>
                                        <input type="text" name="sancpe_imt" id="sancpe_imt" class="form-control text-center" value="{{ old('sancpe_imt') }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="imt_cat">Kategori IMT</label>
                                        <input type="text" name="imt_cat" id="imt_cat" class="form-control text-center" value="{{ old('imt_cat') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_tt">Apakah sudah mendapatkan TT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_tt" id="sancpe_tt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($stt as $tt)
                                                <option value="{{ $tt->tt_id }}" {{ (old('sancpe_tt') == $tt->tt_id) ? 'selected' : '' }}>{{ $tt->tt_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sancpe_tt'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_tt') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sancpe_nadi">Nadi</label>
                                        <input type="text" name="sancpe_nadi" id="sancpe_nadi" value="{{ old('sancpe_nadi') }}" class="form-control text-center">
                                        @if ($errors->has('sancpe_nadi'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_nadi') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sancpe_r_rate">Respiratory Rate</label>
                                        <input type="text" name="sancpe_r_rate" id="sancpe_r_rate" value="{{ old('sancpe_r_rate') }}" class="form-control text-center">
                                        @if ($errors->has('sancpe_r_rate'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_r_rate') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sancpe_tempe">Suhu Badan</label>
                                        <input type="text" name="sancpe_tempe" id="sancpe_tempe" value="{{ old('sancpe_tempe') }}" class="form-control text-center">
                                        @if ($errors->has('sancpe_tempe'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_tempe') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sancpe_blood_pressure">Tekanan Darah</label>
                                        <input type="text" name="sancpe_blood_pressure" id="sancpe_blood_pressure" value="{{ old('sancpe_blood_pressure') }}" class="form-control text-center" placeholder="100/90">
                                        @if ($errors->has('sancpe_blood_pressure'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_blood_pressure') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_awareness">Kesandaran ibu hamil bagaimana?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_awareness" id="sancpe_awareness" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_awareness') == '0') ? 'selected' : '' }}>Compose Mentis</option>
                                            <option value="1" {{ (old('sancpe_awareness') == '1') ? 'selected' : '' }}>Somnolence</option>
                                            <option value="2" {{ (old('sancpe_awareness') == '2') ? 'selected' : '' }}>Sopor</option>
                                            <option value="3" {{ (old('sancpe_awareness') == '3') ? 'selected' : '' }}>Coma</option>
                                        </select>
                                        @if(session()->has('sancpe_awareness'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_awareness') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_body_shape">Bagaimana Bantuk Tubuh?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_body_shape" id="sancpe_body_shape" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_body_shape') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_body_shape') == '1') ? 'selected' : '' }}>Kelainan Tulang Belakang</option>
                                            <option value="2" {{ (old('sancpe_body_shape') == '2') ? 'selected' : '' }}>Kelainan Tungkai</option>
                                            <option value="3" {{ (old('sancpe_body_shape') == '3') ? 'selected' : '' }}>Kelainan Bentuk Panggul</option>
                                        </select>
                                        @if(session()->has('sancpe_body_shape'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_body_shape') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_face">Bagaimana Kondisi Muka?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_face" id="sancpe_face" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_face') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_face') == '1') ? 'selected' : '' }}>Pucat</option>
                                            <option value="2" {{ (old('sancpe_face') == '2') ? 'selected' : '' }}>Kuning</option>
                                        </select>
                                        @if(session()->has('sancpe_face'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_face') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_eye">Bagaimana Kondisi Mata?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_eye" id="sancpe_eye" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_eye') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_eye') == '1') ? 'selected' : '' }}>Oedema Palpebra</option>
                                            <option value="2" {{ (old('sancpe_eye') == '2') ? 'selected' : '' }}>Conjunctiva Pucat</option>
                                            <option value="3" {{ (old('sancpe_eye') == '3') ? 'selected' : '' }}>Icterus</option>
                                        </select>
                                        @if(session()->has('sancpe_eye'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_eye') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_tooth">Bagaimana Kondisi Gigi?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_tooth" id="sancpe_tooth" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_tooth') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_tooth') == '1') ? 'selected' : '' }}>Karies</option>
                                            <option value="2" {{ (old('sancpe_tooth') == '2') ? 'selected' : '' }}>Berlubang</option>
                                        </select>
                                        @if(session()->has('sancpe_tooth'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_tooth') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_mouth">Bagaimana Kondisi Mulut?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_mouth" id="sancpe_mouth" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_mouth') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_mouth') == '1') ? 'selected' : '' }}>Cyanosis</option>
                                            <option value="2" {{ (old('sancpe_mouth') == '2') ? 'selected' : '' }}>Stomatitis</option>
                                            <option value="3" {{ (old('sancpe_mouth') == '3') ? 'selected' : '' }}>Tonsilitis</option>
                                            <option value="4" {{ (old('sancpe_mouth') == '4') ? 'selected' : '' }}>Faringitis</option>
                                        </select>
                                        @if(session()->has('sancpe_mouth'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_mouth') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sancpe_arm">Lingkar Lengan Atas</label>
                                        <input type="text" name="sancpe_arm" id="sancpe_arm" class="form-control text-center" onkeyup="return keke();" value="{{ old('sancpe_arm') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kek">Resiko KEK</label>
                                        <input type="text" name="kek" id="kek" class="form-control text-center" readonly value="{{ old('kek') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sancpe_pelvis">Lingkar Panggul</label>
                                        <input type="text" name="sancpe_pelvis" id="sancpe_pelvis" class="form-control text-center" onkeyup="return cpde();" value="{{ old('sancpe_pelvis') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cpd">Resiko CPD</label>
                                        <input type="text" name="cpd" id="cpd" class="form-control text-center" readonly value="{{ old('cpd') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_chest">Bagaimana Kondisi Dada?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_chest" id="sancpe_chest" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_chest') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_chest') == '1') ? 'selected' : '' }}>Abnormal</option>
                                        </select>
                                        @if(session()->has('sancpe_chest'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_chest') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_heart">Bagaimana Kondisi Jantung?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_heart" id="sancpe_heart" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_heart') == '0') ? 'selected' : '' }}>Tidak ada keluhan</option>
                                            <option value="1" {{ (old('sancpe_heart') == '1') ? 'selected' : '' }}>Berdebar-debar</option>
                                            <option value="2" {{ (old('sancpe_heart') == '2') ? 'selected' : '' }}>Mudah sesak nafas</option>
                                        </select>
                                        @if(session()->has('sancpe_heart'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_heart') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_lungs">Bagaimana Kondisi Paru?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_lungs" id="sancpe_lungs" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_lungs') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_lungs') == '1') ? 'selected' : '' }}>Sesak Nafas</option>
                                        </select>
                                        @if(session()->has('sancpe_lungs'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_lungs') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_patella">Bagaimana Reflek Patella?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_patella" id="sancpe_patella" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_patella') == '0') ? 'selected' : '' }}>Negatif</option>
                                            <option value="1" {{ (old('sancpe_patella') == '1') ? 'selected' : '' }}>Positif</option>
                                        </select>
                                        @if(session()->has('sancpe_patella'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_patella') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_boobs">Bagaimana Kondisi Payudara?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_boobs" id="sancpe_boobs" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_boobs') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_boobs') == '1') ? 'selected' : '' }}>Kemerahan</option>
                                            <option value="2" {{ (old('sancpe_boobs') == '2') ? 'selected' : '' }}>Benjolan</option>
                                            <option value="3" {{ (old('sancpe_boobs') == '3') ? 'selected' : '' }}>Puting Susu Masuk</option>
                                            <option value="4" {{ (old('sancpe_boobs') == '4') ? 'selected' : '' }}>Kulit Jeruk</option>
                                            <option value="5" {{ (old('sancpe_boobs') == '5') ? 'selected' : '' }}>Keluar Cairan</option>
                                        </select>
                                        @if(session()->has('sancpe_boobs'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_boobs') }}
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
                                        <label for="sancpe_ex_top">Bagaimana Ekstermitas Atas?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_ex_top" id="sancpe_ex_top" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_ex_top') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_ex_top') == '1') ? 'selected' : '' }}>Oedema</option>
                                        </select>
                                        @if(session()->has('sancpe_ex_top'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_ex_top') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_ex_bottom">Bagaimana Ekstermitas Bawah?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_ex_bottom" id="sancpe_ex_bottom" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_ex_bottom') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_ex_bottom') == '1') ? 'selected' : '' }}>Oedema</option>
                                        </select>
                                        @if(session()->has('sancpe_ex_bottom'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_ex_bottom') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_ex_gland">Bagaimana Pembesaran Kelenjar?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_ex_gland" id="sancpe_ex_gland" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_ex_gland') == '0') ? 'selected' : '' }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_ex_gland') == '1') ? 'selected' : '' }}>Leher</option>
                                            <option value="2" {{ (old('sancpe_ex_gland') == '2') ? 'selected' : '' }}>Ketiak</option>
                                            <option value="3" {{ (old('sancpe_ex_gland') == '3') ? 'selected' : '' }}>Lipatan Paha</option>
                                            <option value="4" {{ (old('sancpe_ex_gland') == '4') ? 'selected' : '' }}>Tiroid</option>
                                            <option value="5" {{ (old('sancpe_ex_gland') == '5') ? 'selected' : '' }}>Lemfe</option>
                                        </select>
                                        @if(session()->has('sancpe_ex_gland'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_ex_gland') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_oodena">Bagaimana Oedema?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_oodena" id="sancpe_oodena" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_oodena') == '0') ? 'selected' : '' }}>Tidak ada</option>
                                            <option value="1" {{ (old('sancpe_oodena') == '1') ? 'selected' : '' }}>Ada</option>
                                        </select>
                                        @if(session()->has('sancpe_oodena'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_oodena') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_caesar">Apakah Operasi Caesar?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_caesar" id="sancpe_caesar" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_caesar') == '0') ? 'selected' : '' }}>BELUM PERNAH</option>
                                            <option value="1" {{ (old('sancpe_caesar') == '1') ? 'selected' : '' }}>SUDAH</option>
                                        </select>
                                        @if(session()->has('sancpe_caesar'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_caesar') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_fetus">Jumlah Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_fetus" id="sancpe_fetus" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_fetus') == '0') ? 'selected' : '' }}>TUNGGAL</option>
                                            <option value="1" {{ (old('sancpe_fetus') == '1') ? 'selected' : '' }}>GANDA/KEMBAR</option>
                                        </select>
                                        @if(session()->has('sancpe_fetus'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_fetus') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pros_fetus">Posisi Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_pros_fetus" id="sancpe_pros_fetus" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_pros_fetus') == '0') ? 'selected' : '' }}>KEPALA</option>
                                            <option value="1" {{ (old('sancpe_pros_fetus') == '1') ? 'selected' : '' }}>BOKONG/SUNGSANG</option>
                                            <option value="2" {{ (old('sancpe_pros_fetus') == '2') ? 'selected' : '' }}>LETAK LINTANG/OBLIQUE</option>
                                            <option value="3" {{ (old('sancpe_pros_fetus') == '3') ? 'selected' : '' }}>BALOTEMEN</option>
                                        </select>
                                        @if(session()->has('sancpe_pros_fetus'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_pros_fetus') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pap">Posisi Kepala Terhadap PAP?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_pap" id="sancpe_pap" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="11" {{ (old('sancpe_pap') == '11') ? 'selected' : '' }}>MASUK</option>
                                            <option value="12" {{ (old('sancpe_pap') == '12') ? 'selected' : '' }}>MASUK SEBAGIAN</option>
                                            <option value="13" {{ (old('sancpe_pap') == '13') ? 'selected' : '' }}>BELUM MASUK</option>
                                        </select>
                                        @if(session()->has('sancpe_pap'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_pap') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <label for="sancpe_tfu_finger">TFU dalam Jari</label>
                                        <input type="text" name="sancpe_tfu_finger" id="sancpe_tfu_finger" class="form-control text-center" value="{{ old('sancpe_tfu_finger') }}" {{ (floor($div) < 24) ? '' : 'readonly' }} oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <label for="sancpe_tfu_cm">TFU dalam CM</label>
                                        <input type="text" name="sancpe_tfu_cm" id="sancpe_tfu_cm" class="form-control text-center" value="{{ old('sancpe_tfu_cm') }}" onkeyup="return tbje();" {{ (floor($div) > 24) ? '' : 'readonly' }} oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6 text-center">
                                        <label for="tbj">TBJ</label>
                                        <input type="text" name="tbj" id="tbj" class="form-control text-center" readonly value="{{ old('tbj') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_tfu_finger_pos">Posisi TFU Jari?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_tfu_finger_pos" id="sancpe_tfu_finger_pos" class="form-control select2" {{ (floor($div) < 24) ?'' : 'disabled' }}>
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_tfu_finger_pos') == '0') ? 'selected' : '' }}>Diatas Pusar</option>
                                            <option value="1" {{ (old('sancpe_tfu_finger_pos') == '1') ? 'selected' : '' }}>Diatas Tulang Kelamin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_djj">Berapa Detak Jantung Janin (DJJ/min)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_djj" id="sancpe_djj" class="form-control" value="{{ old('sancpe_djj') }}">
                                        @if ($errors->has('sancpe_djj'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_djj') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_djj_id">Kategori Detak Jantung Janin (DJJ/min)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_djj_id" id="sancpe_djj_id" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($djj as $djj)
                                                <option value="{{ $djj->djj_id }}" {{ ($djj->djj_id == old('sancpe_djj_id')) ? 'selected' : '' }}>{{ $djj->djj_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sancpe_djj_id'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_djj_id') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pl1">Perut: Leopold I</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_pl1" id="sancpe_pl1" class="form-control" value="{{ old('sancpe_pl1') }}">
                                        @if ($errors->has('sancpe_pl1'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_pl1') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pl2">Perut: Leopold II</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_pl2" id="sancpe_pl2" class="form-control" value="{{ old('sancpe_pl2') }}">
                                        @if ($errors->has('sancpe_pl2'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_pl2') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pl3">Perut: Leopold III</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_pl3" id="sancpe_pl3" class="form-control" value="{{ old('sancpe_pl3') }}">
                                        @if ($errors->has('sancpe_pl3'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_pl3') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pl4">Perut: Leopold IV</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_pl4" id="sancpe_pl4" class="form-control" value="{{ old('sancpe_pl4') }}">
                                        @if ($errors->has('sancpe_pl4'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_pl4') }}
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
                    <input type="hidden" name="idx" value="{{ $data[0]->sancpe_id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_weight">Berat Badan sebelum hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_weight" id="sancpe_weight" class="form-control text-center" value="{{ (old('sancpe_weight')) ? old('sancpe_weight') : $data[0]->sancpe_weight }}" onkeyup="return imt();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @if ($errors->has('sancpe_weight'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_weight') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_weight_now">Berat Badan saat ini?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_weight_now" id="sancpe_weight_now" class="form-control text-center" value="{{ (old('sancpe_weight_now')) ? old('sancpe_weight_now') : $data[0]->sancpe_weight_now }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @if ($errors->has('sancpe_weight_now'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_weight_now') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_height">Tinggi Badan berapa?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_height" id="sancpe_height" class="form-control text-center" value="{{ (old('sancpe_height')) ? old('sancpe_height') : $data[0]->sancpe_height }}" onkeyup="return imt();">
                                        @if ($errors->has('sancpe_height'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_height') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <label for="sancpe_imt">IMT</label>
                                        <input type="text" name="sancpe_imt" id="sancpe_imt" class="form-control text-center" value="{{ (old('sancpe_imt')) ? old('sancpe_imt') : $data[0]->sancpe_imt }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            $cat = ($data[0]->sancpe_imt < 18.5) ? 'Tidak Normal/Kurang' : (($data[0]->sancpe_imt < 25.1) ? 'Normal' : (($data[0]->sancpe_imt < 30) ? 'Kegemukan' : 'Obesitas'));
                                        @endphp
                                        <label for="imt_cat">Kategori IMT</label>
                                        <input type="text" name="imt_cat" id="imt_cat" class="form-control text-center" value="{{ (old('imt_cat')) ? old('imt_cat') : $cat }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_tt">Apakah sudah mendapatkan TT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_tt" id="sancpe_tt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($stt as $tt)
                                                <option value="{{ $tt->tt_id }}" {{ (old('sancpe_tt') == $tt->tt_id) ? 'selected' : (($data[0]->sancpe_tt == $tt->tt_id) ? 'selected' : '') }}>{{ $tt->tt_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sancpe_tt'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_tt') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sancpe_nadi">Nadi</label>
                                        <input type="text" name="sancpe_nadi" id="sancpe_nadi" value="{{ (old('sancpe_nadi')) ? old('sancpe_nadi') : $data[0]->sancpe_nadi }}" class="form-control text-center">
                                        @if ($errors->has('sancpe_nadi'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_nadi') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sancpe_r_rate">Respiratory Rate</label>
                                        <input type="text" name="sancpe_r_rate" id="sancpe_r_rate" value="{{ (old('sancpe_r_rate')) ? old('sancpe_r_rate') : $data[0]->sancpe_r_rate }}" class="form-control text-center">
                                        @if ($errors->has('sancpe_r_rate'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_r_rate') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sancpe_tempe">Suhu Badan</label>
                                        <input type="text" name="sancpe_tempe" id="sancpe_tempe" value="{{ (old('sancpe_tempe')) ? old('sancpe_tempe') : $data[0]->sancpe_tempe }}" class="form-control text-center">
                                        @if ($errors->has('sancpe_tempe'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_tempe') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sancpe_blood_pressure">Tekanan Darah</label>
                                        <input type="text" name="sancpe_blood_pressure" id="sancpe_blood_pressure" value="{{ (old('sancpe_blood_pressure')) ? old('sancpe_blood_pressure') : $data[0]->sancpe_blood_pressure }}" class="form-control text-center" placeholder="100/90">
                                        @if ($errors->has('sancpe_blood_pressure'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_blood_pressure') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_awareness">Kesandaran ibu hamil bagaimana?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_awareness" id="sancpe_awareness" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_awareness') == '0') ? 'selected' : (($data[0]->sancpe_awareness == '0') ? 'selected' : '') }}>Compose Mentis</option>
                                            <option value="1" {{ (old('sancpe_awareness') == '1') ? 'selected' : (($data[0]->sancpe_awareness == '1') ? 'selected' : '') }}>Somnolence</option>
                                            <option value="2" {{ (old('sancpe_awareness') == '2') ? 'selected' : (($data[0]->sancpe_awareness == '2') ? 'selected' : '') }}>Sopor</option>
                                            <option value="3" {{ (old('sancpe_awareness') == '3') ? 'selected' : (($data[0]->sancpe_awareness == '3') ? 'selected' : '') }}>Coma</option>
                                        </select>
                                        @if(session()->has('sancpe_awareness'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_awareness') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_body_shape">Bagaimana Bantuk Tubuh?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_body_shape" id="sancpe_body_shape" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_body_shape') == '0') ? 'selected' : (($data[0]->sancpe_body_shape == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_body_shape') == '1') ? 'selected' : (($data[0]->sancpe_body_shape == '1') ? 'selected' : '') }}>Kelainan Tulang Belakang</option>
                                            <option value="2" {{ (old('sancpe_body_shape') == '2') ? 'selected' : (($data[0]->sancpe_body_shape == '2') ? 'selected' : '') }}>Kelainan Tungkai</option>
                                            <option value="3" {{ (old('sancpe_body_shape') == '3') ? 'selected' : (($data[0]->sancpe_body_shape == '3') ? 'selected' : '') }}>Kelainan Bentuk Panggul</option>
                                        </select>
                                        @if(session()->has('sancpe_body_shape'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_body_shape') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_face">Bagaimana Kondisi Muka?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_face" id="sancpe_face" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_face') == '0') ? 'selected' : (($data[0]->sancpe_face == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_face') == '1') ? 'selected' : (($data[0]->sancpe_face == '1') ? 'selected' : '') }}>Pucat</option>
                                            <option value="2" {{ (old('sancpe_face') == '2') ? 'selected' : (($data[0]->sancpe_face == '2') ? 'selected' : '') }}>Kuning</option>
                                        </select>
                                        @if(session()->has('sancpe_face'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_face') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_eye">Bagaimana Kondisi Mata?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_eye" id="sancpe_eye" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_eye') == '0') ? 'selected' : (($data[0]->sancpe_eye == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_eye') == '1') ? 'selected' : (($data[0]->sancpe_eye == '1') ? 'selected' : '') }}>Oedema Palpebra</option>
                                            <option value="2" {{ (old('sancpe_eye') == '2') ? 'selected' : (($data[0]->sancpe_eye == '2') ? 'selected' : '') }}>Conjunctiva Pucat</option>
                                            <option value="3" {{ (old('sancpe_eye') == '3') ? 'selected' : (($data[0]->sancpe_eye == '3') ? 'selected' : '') }}>Icterus</option>
                                        </select>
                                        @if(session()->has('sancpe_eye'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_eye') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_tooth">Bagaimana Kondisi Gigi?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_tooth" id="sancpe_tooth" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_tooth') == '0') ? 'selected' : (($data[0]->sancpe_tooth == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_tooth') == '1') ? 'selected' : (($data[0]->sancpe_tooth == '1') ? 'selected' : '') }}>Karies</option>
                                            <option value="2" {{ (old('sancpe_tooth') == '2') ? 'selected' : (($data[0]->sancpe_tooth == '2') ? 'selected' : '') }}>Berlubang</option>
                                        </select>
                                        @if(session()->has('sancpe_tooth'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_tooth') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_mouth">Bagaimana Kondisi Mulut?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_mouth" id="sancpe_mouth" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_mouth') == '0') ? 'selected' : (($data[0]->sancpe_mouth == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_mouth') == '1') ? 'selected' : (($data[0]->sancpe_mouth == '1') ? 'selected' : '') }}>Cyanosis</option>
                                            <option value="2" {{ (old('sancpe_mouth') == '2') ? 'selected' : (($data[0]->sancpe_mouth == '2') ? 'selected' : '') }}>Stomatitis</option>
                                            <option value="3" {{ (old('sancpe_mouth') == '3') ? 'selected' : (($data[0]->sancpe_mouth == '3') ? 'selected' : '') }}>Tonsilitis</option>
                                            <option value="4" {{ (old('sancpe_mouth') == '4') ? 'selected' : (($data[0]->sancpe_mouth == '4') ? 'selected' : '') }}>Faringitis</option>
                                        </select>
                                        @if(session()->has('sancpe_mouth'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_mouth') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sancpe_arm">Lingkar Lengan Atas</label>
                                        <input type="text" name="sancpe_arm" id="sancpe_arm" class="form-control text-center" onkeyup="return keke();" value="{{ (old('sancpe_arm')) ? old('sancpe_arm') : $data[0]->sancpe_arm }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            $kek = ($data[0]->sancpe_arm < 23.5) ? 'Ada Resiko KEK' : 'Tidak ada resiko';
                                        @endphp
                                        <label for="kek">Resiko KEK</label>
                                        <input type="text" name="kek" id="kek" class="form-control text-center" readonly value="{{ (old('kek')) ? old('kek') : $kek }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sancpe_pelvis">Lingkar Panggul</label>
                                        <input type="text" name="sancpe_pelvis" id="sancpe_pelvis" class="form-control text-center" onkeyup="return cpde();" value="{{ (old('sancpe_pelvis')) ? old('sancpe_pelvis') : $data[0]->sancpe_pelvis }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            $cpd = ($data[0]->sancpe_pelvis < 80) ? 'Ada Resiko KEK' : 'Tidak ada resiko';
                                        @endphp
                                        <label for="cpd">Resiko CPD</label>
                                        <input type="text" name="cpd" id="cpd" class="form-control text-center" readonly value="{{ (old('cpd')) ? old('cpd') : $cpd }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_chest">Bagaimana Kondisi Dada?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_chest" id="sancpe_chest" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_chest') == '0') ? 'selected' : (($data[0]->sancpe_chest == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_chest') == '1') ? 'selected' : (($data[0]->sancpe_chest == '1') ? 'selected' : '') }}>Abnormal</option>
                                        </select>
                                        @if(session()->has('sancpe_chest'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_chest') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_heart">Bagaimana Kondisi Jantung?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_heart" id="sancpe_heart" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_heart') == '0') ? 'selected' : (($data[0]->sancpe_heart == '0') ? 'selected' : '') }}>Tidak ada keluhan</option>
                                            <option value="1" {{ (old('sancpe_heart') == '1') ? 'selected' : (($data[0]->sancpe_heart == '1') ? 'selected' : '') }}>Berdebar-debar</option>
                                            <option value="2" {{ (old('sancpe_heart') == '2') ? 'selected' : (($data[0]->sancpe_heart == '2') ? 'selected' : '') }}>Mudah sesak nafas</option>
                                        </select>
                                        @if(session()->has('sancpe_heart'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_heart') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_lungs">Bagaimana Kondisi Paru?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_lungs" id="sancpe_lungs" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_lungs') == '0') ? 'selected' : (($data[0]->sancpe_lungs == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_lungs') == '1') ? 'selected' : (($data[0]->sancpe_lungs == '1') ? 'selected' : '') }}>Sesak Nafas</option>
                                        </select>
                                        @if(session()->has('sancpe_lungs'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_lungs') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_patella">Bagaimana Reflek Patella?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_patella" id="sancpe_patella" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_patella') == '0') ? 'selected' : (($data[0]->sancpe_patella == '0') ? 'selected' : '') }}>Negatif</option>
                                            <option value="1" {{ (old('sancpe_patella') == '1') ? 'selected' : (($data[0]->sancpe_patella == '1') ? 'selected' : '') }}>Positif</option>
                                        </select>
                                        @if(session()->has('sancpe_patella'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_patella') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_boobs">Bagaimana Kondisi Payudara?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_boobs" id="sancpe_boobs" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_boobs') == '0') ? 'selected' : (($data[0]->sancpe_boobs == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_boobs') == '1') ? 'selected' : (($data[0]->sancpe_boobs == '1') ? 'selected' : '') }}>Kemerahan</option>
                                            <option value="2" {{ (old('sancpe_boobs') == '2') ? 'selected' : (($data[0]->sancpe_boobs == '2') ? 'selected' : '') }}>Benjolan</option>
                                            <option value="3" {{ (old('sancpe_boobs') == '3') ? 'selected' : (($data[0]->sancpe_boobs == '3') ? 'selected' : '') }}>Puting Susu Masuk</option>
                                            <option value="4" {{ (old('sancpe_boobs') == '4') ? 'selected' : (($data[0]->sancpe_boobs == '4') ? 'selected' : '') }}>Kulit Jeruk</option>
                                            <option value="5" {{ (old('sancpe_boobs') == '5') ? 'selected' : (($data[0]->sancpe_boobs == '5') ? 'selected' : '') }}>Keluar Cairan</option>
                                        </select>
                                        @if(session()->has('sancpe_boobs'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_boobs') }}
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
                                        <label for="sancpe_ex_top">Bagaimana Ekstermitas Atas?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_ex_top" id="sancpe_ex_top" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_ex_top') == '0') ? 'selected' : (($data[0]->sancpe_ex_top == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_ex_top') == '1') ? 'selected' : (($data[0]->sancpe_ex_top == '1') ? 'selected' : '') }}>Oedema</option>
                                        </select>
                                        @if(session()->has('sancpe_ex_top'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_ex_top') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_ex_bottom">Bagaimana Ekstermitas Bawah?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_ex_bottom" id="sancpe_ex_bottom" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_ex_bottom') == '0') ? 'selected' : (($data[0]->sancpe_ex_bottom == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_ex_bottom') == '1') ? 'selected' : (($data[0]->sancpe_ex_bottom == '1') ? 'selected' : '') }}>Oedema</option>
                                        </select>
                                        @if(session()->has('sancpe_ex_bottom'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_ex_bottom') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_ex_gland">Bagaimana Pembesaran Kelenjar?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_ex_gland" id="sancpe_ex_gland" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_ex_gland') == '0') ? 'selected' : (($data[0]->sancpe_ex_gland == '0') ? 'selected' : '') }}>Normal</option>
                                            <option value="1" {{ (old('sancpe_ex_gland') == '1') ? 'selected' : (($data[0]->sancpe_ex_gland == '1') ? 'selected' : '') }}>Leher</option>
                                            <option value="2" {{ (old('sancpe_ex_gland') == '2') ? 'selected' : (($data[0]->sancpe_ex_gland == '2') ? 'selected' : '') }}>Ketiak</option>
                                            <option value="3" {{ (old('sancpe_ex_gland') == '3') ? 'selected' : (($data[0]->sancpe_ex_gland == '3') ? 'selected' : '') }}>Lipatan Paha</option>
                                            <option value="4" {{ (old('sancpe_ex_gland') == '4') ? 'selected' : (($data[0]->sancpe_ex_gland == '4') ? 'selected' : '') }}>Tiroid</option>
                                            <option value="5" {{ (old('sancpe_ex_gland') == '5') ? 'selected' : (($data[0]->sancpe_ex_gland == '5') ? 'selected' : '') }}>Lemfe</option>
                                        </select>
                                        @if(session()->has('sancpe_ex_gland'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_ex_gland') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_oodena">Bagaimana Oedema?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_oodena" id="sancpe_oodena" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_oodena') == '0') ? 'selected' : (($data[0]->sancpe_oodena == '0') ? 'selected' : '') }}>Tidak ada</option>
                                            <option value="1" {{ (old('sancpe_oodena') == '1') ? 'selected' : (($data[0]->sancpe_oodena == '1') ? 'selected' : '') }}>Ada</option>
                                        </select>
                                        @if(session()->has('sancpe_oodena'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_oodena') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_caesar">Apakah Operasi Caesar?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_caesar" id="sancpe_caesar" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_caesar') == '0') ? 'selected' : (($data[0]->sancpe_caesar == '0') ? 'selected' : '') }}>BELUM PERNAH</option>
                                            <option value="1" {{ (old('sancpe_caesar') == '1') ? 'selected' : (($data[0]->sancpe_caesar == '1') ? 'selected' : '') }}>SUDAH</option>
                                        </select>
                                        @if(session()->has('sancpe_caesar'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_caesar') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_fetus">Jumlah Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_fetus" id="sancpe_fetus" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_fetus') == '0') ? 'selected' : (($data[0]->sancpe_fetus == '0') ? 'selected' : '') }}>TUNGGAL</option>
                                            <option value="1" {{ (old('sancpe_fetus') == '1') ? 'selected' : (($data[0]->sancpe_fetus == '1') ? 'selected' : '') }}>GANDA/KEMBAR</option>
                                        </select>
                                        @if(session()->has('sancpe_fetus'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_fetus') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pros_fetus">Posisi Janin?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_pros_fetus" id="sancpe_pros_fetus" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_pros_fetus') == '0') ? 'selected' : (($data[0]->sancpe_pros_fetus == '0') ? 'selected' : '') }}>KEPALA</option>
                                            <option value="1" {{ (old('sancpe_pros_fetus') == '1') ? 'selected' : (($data[0]->sancpe_pros_fetus == '1') ? 'selected' : '') }}>BOKONG/SUNGSANG</option>
                                            <option value="2" {{ (old('sancpe_pros_fetus') == '2') ? 'selected' : (($data[0]->sancpe_pros_fetus == '2') ? 'selected' : '') }}>LETAK LINTANG/OBLIQUE</option>
                                            <option value="3" {{ (old('sancpe_pros_fetus') == '3') ? 'selected' : (($data[0]->sancpe_pros_fetus == '3') ? 'selected' : '') }}>BALOTEMEN</option>
                                        </select>
                                        @if(session()->has('sancpe_pros_fetus'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_pros_fetus') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pap">Posisi Kepala Terhadap PAP?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_pap" id="sancpe_pap" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="11" {{ (old('sancpe_pap') == '11') ? 'selected' : (($data[0]->sancpe_pap == '11') ? 'selected' : '') }}>MASUK</option>
                                            <option value="12" {{ (old('sancpe_pap') == '12') ? 'selected' : (($data[0]->sancpe_pap == '12') ? 'selected' : '') }}>MASUK SEBAGIAN</option>
                                            <option value="13" {{ (old('sancpe_pap') == '13') ? 'selected' : (($data[0]->sancpe_pap == '13') ? 'selected' : '') }}>BELUM MASUK</option>
                                        </select>
                                        @if(session()->has('sancpe_pap'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_pap') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <label for="sancpe_tfu_finger">TFU dalam Jari</label>
                                        <input type="text" name="sancpe_tfu_finger" id="sancpe_tfu_finger" class="form-control text-center" value="{{ (old('sancpe_tfu_finger')) ? old('sancpe_tfu_finger') : $data[0]->sancpe_tfu_finger }}" {{ (floor($div) < 24) ? '' : 'readonly' }} oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <label for="sancpe_tfu_cm">TFU dalam CM</label>
                                        <input type="text" name="sancpe_tfu_cm" id="sancpe_tfu_cm" class="form-control text-center" value="{{ (old('sancpe_tfu_cm')) ? old('sancpe_tfu_cm') : $data[0]->sancpe_tfu_cm }}" {{ (floor($div) > 24) ? '' : 'readonly' }} onkeyup="return tbje();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    @php
                                        $tbj = ($data[0]->sancpe_tfu_cm - $data[0]->sancpe_pap) * 155;
                                    @endphp
                                    <div class="col-md-6 text-center">
                                        <label for="tbj">TBJ</label>
                                        <input type="text" name="tbj" id="tbj" class="form-control text-center" readonly value="{{ (old('tbj')) ? old('tbj') : (($data[0]->sancpe_tfu_cm != '') ? $tbj : '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_tfu_finger_pos">Posisi TFU Jari?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_tfu_finger_pos" id="sancpe_tfu_finger_pos" class="form-control select2" {{ (floor($div) < 24) ? '' : 'disabled' }}>
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sancpe_tfu_finger_pos') == '0') ? 'selected' : (($data[0]->sancpe_pap == '0') ? 'selected' : '') }}>Diatas Pusar</option>
                                            <option value="1" {{ (old('sancpe_tfu_finger_pos') == '1') ? 'selected' : (($data[0]->sancpe_pap == '1') ? 'selected' : '') }}>Diatas Tulang Kelamin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_djj">Berapa Detak Jantung Janin (DJJ/min)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_djj" id="sancpe_djj" class="form-control" value="{{ (old('sancpe_djj')) ? old('sancpe_djj') : $data[0]->sancpe_djj }}">
                                        @if ($errors->has('sancpe_djj'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_djj') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_djj_id">Kategori Detak Jantung Janin (DJJ/min)?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sancpe_djj_id" id="sancpe_djj_id" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($djj as $djj)
                                                <option value="{{ $djj->djj_id }}" {{ ($djj->djj_id == old('sancpe_djj_id')) ? 'selected' : (($data[0]->sancpe_djj_id == $djj->djj_id) ? 'selected' : '') }}>{{ $djj->djj_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sancpe_djj_id'))
                                            <div class="text-danger">
                                                {{ session()->get('sancpe_djj_id') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pl1">Perut: Leopold I</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_pl1" id="sancpe_pl1" class="form-control" value="{{ (old('sancpe_pl1')) ? old('sancpe_pl1') : $data[0]->sancpe_pl1 }}">
                                        @if ($errors->has('sancpe_pl1'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_pl1') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pl2">Perut: Leopold II</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_pl2" id="sancpe_pl2" class="form-control" value="{{ (old('sancpe_pl2')) ? old('sancpe_pl2') : $data[0]->sancpe_pl2 }}">
                                        @if ($errors->has('sancpe_pl2'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_pl2') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pl3">Perut: Leopold III</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_pl3" id="sancpe_pl3" class="form-control" value="{{ (old('sancpe_pl3')) ? old('sancpe_pl3') : $data[0]->sancpe_pl3 }}">
                                        @if ($errors->has('sancpe_pl3'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_pl3') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sancpe_pl4">Perut: Leopold IV</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="sancpe_pl4" id="sancpe_pl4" class="form-control" value="{{ (old('sancpe_pl4')) ? old('sancpe_pl4') : $data[0]->sancpe_pl4 }}">
                                        @if ($errors->has('sancpe_pl4'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancpe_pl4') }}
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
                <input type="hidden" name="idx" value="{{ $xdata[0]->sancpe_id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_weight">Berat Badan sebelum hamil?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancpe_weight" id="sancpe_weight" class="form-control text-center" value="{{ (old('sancpe_weight')) ? old('sancpe_weight') : $xdata[0]->sancpe_weight }}" onkeyup="return imt();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('sancpe_weight'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_weight') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_weight_now">Berat Badan saat ini?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancpe_weight_now" id="sancpe_weight_now" class="form-control text-center" value="{{ (old('sancpe_weight_now')) ? old('sancpe_weight_now') : $xdata[0]->sancpe_weight_now }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('sancpe_weight_now'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_weight_now') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_height">Tinggi Badan berapa?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancpe_height" id="sancpe_height" class="form-control text-center" value="{{ (old('sancpe_height')) ? old('sancpe_height') : $xdata[0]->sancpe_height }}" onkeyup="return imt();">
                                    @if ($errors->has('sancpe_height'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_height') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="sancpe_imt">IMT</label>
                                    <input type="text" name="sancpe_imt" id="sancpe_imt" class="form-control text-center" value="{{ (old('sancpe_imt')) ? old('sancpe_imt') : $xdata[0]->sancpe_imt }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    @php
                                        $cat = ($xdata[0]->sancpe_imt < 18.5) ? 'Tidak Normal/Kurang' : (($xdata[0]->sancpe_imt < 25.1) ? 'Normal' : (($xdata[0]->sancpe_imt < 30) ? 'Kegemukan' : 'Obesitas'));
                                    @endphp
                                    <label for="imt_cat">Kategori IMT</label>
                                    <input type="text" name="imt_cat" id="imt_cat" class="form-control text-center" value="{{ (old('imt_cat')) ? old('imt_cat') : $cat }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_tt">Apakah sudah mendapatkan TT?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_tt" id="sancpe_tt" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($stt as $tt)
                                            <option value="{{ $tt->tt_id }}" {{ (old('sancpe_tt') == $tt->tt_id) ? 'selected' : (($xdata[0]->sancpe_tt == $tt->tt_id) ? 'selected' : '') }}>{{ $tt->tt_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sancpe_tt'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_tt') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sancpe_nadi">Nadi</label>
                                    <input type="text" name="sancpe_nadi" id="sancpe_nadi" value="{{ (old('sancpe_nadi')) ? old('sancpe_nadi') : $xdata[0]->sancpe_nadi }}" class="form-control text-center">
                                    @if ($errors->has('sancpe_nadi'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_nadi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="sancpe_r_rate">Respiratory Rate</label>
                                    <input type="text" name="sancpe_r_rate" id="sancpe_r_rate" value="{{ (old('sancpe_r_rate')) ? old('sancpe_r_rate') : $xdata[0]->sancpe_r_rate }}" class="form-control text-center">
                                    @if ($errors->has('sancpe_r_rate'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_r_rate') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sancpe_tempe">Suhu Badan</label>
                                    <input type="text" name="sancpe_tempe" id="sancpe_tempe" value="{{ (old('sancpe_tempe')) ? old('sancpe_tempe') : $xdata[0]->sancpe_tempe }}" class="form-control text-center">
                                    @if ($errors->has('sancpe_tempe'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_tempe') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="sancpe_blood_pressure">Tekanan Darah</label>
                                    <input type="text" name="sancpe_blood_pressure" id="sancpe_blood_pressure" value="{{ (old('sancpe_blood_pressure')) ? old('sancpe_blood_pressure') : $xdata[0]->sancpe_blood_pressure }}" class="form-control text-center" placeholder="100/90">
                                    @if ($errors->has('sancpe_blood_pressure'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_blood_pressure') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_awareness">Kesandaran ibu hamil bagaimana?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_awareness" id="sancpe_awareness" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_awareness') == '0') ? 'selected' : (($xdata[0]->sancpe_awareness == '0') ? 'selected' : '') }}>Compose Mentis</option>
                                        <option value="1" {{ (old('sancpe_awareness') == '1') ? 'selected' : (($xdata[0]->sancpe_awareness == '1') ? 'selected' : '') }}>Somnolence</option>
                                        <option value="2" {{ (old('sancpe_awareness') == '2') ? 'selected' : (($xdata[0]->sancpe_awareness == '2') ? 'selected' : '') }}>Sopor</option>
                                        <option value="3" {{ (old('sancpe_awareness') == '3') ? 'selected' : (($xdata[0]->sancpe_awareness == '3') ? 'selected' : '') }}>Coma</option>
                                    </select>
                                    @if(session()->has('sancpe_awareness'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_awareness') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_body_shape">Bagaimana Bantuk Tubuh?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_body_shape" id="sancpe_body_shape" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_body_shape') == '0') ? 'selected' : (($xdata[0]->sancpe_body_shape == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_body_shape') == '1') ? 'selected' : (($xdata[0]->sancpe_body_shape == '1') ? 'selected' : '') }}>Kelainan Tulang Belakang</option>
                                        <option value="2" {{ (old('sancpe_body_shape') == '2') ? 'selected' : (($xdata[0]->sancpe_body_shape == '2') ? 'selected' : '') }}>Kelainan Tungkai</option>
                                        <option value="3" {{ (old('sancpe_body_shape') == '3') ? 'selected' : (($xdata[0]->sancpe_body_shape == '3') ? 'selected' : '') }}>Kelainan Bentuk Panggul</option>
                                    </select>
                                    @if(session()->has('sancpe_body_shape'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_body_shape') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_face">Bagaimana Kondisi Muka?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_face" id="sancpe_face" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_face') == '0') ? 'selected' : (($xdata[0]->sancpe_face == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_face') == '1') ? 'selected' : (($xdata[0]->sancpe_face == '1') ? 'selected' : '') }}>Pucat</option>
                                        <option value="2" {{ (old('sancpe_face') == '2') ? 'selected' : (($xdata[0]->sancpe_face == '2') ? 'selected' : '') }}>Kuning</option>
                                    </select>
                                    @if(session()->has('sancpe_face'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_face') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_eye">Bagaimana Kondisi Mata?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_eye" id="sancpe_eye" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_eye') == '0') ? 'selected' : (($xdata[0]->sancpe_eye == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_eye') == '1') ? 'selected' : (($xdata[0]->sancpe_eye == '1') ? 'selected' : '') }}>Oedema Palpebra</option>
                                        <option value="2" {{ (old('sancpe_eye') == '2') ? 'selected' : (($xdata[0]->sancpe_eye == '2') ? 'selected' : '') }}>Conjunctiva Pucat</option>
                                        <option value="3" {{ (old('sancpe_eye') == '3') ? 'selected' : (($xdata[0]->sancpe_eye == '3') ? 'selected' : '') }}>Icterus</option>
                                    </select>
                                    @if(session()->has('sancpe_eye'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_eye') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_tooth">Bagaimana Kondisi Gigi?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_tooth" id="sancpe_tooth" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_tooth') == '0') ? 'selected' : (($xdata[0]->sancpe_tooth == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_tooth') == '1') ? 'selected' : (($xdata[0]->sancpe_tooth == '1') ? 'selected' : '') }}>Karies</option>
                                        <option value="2" {{ (old('sancpe_tooth') == '2') ? 'selected' : (($xdata[0]->sancpe_tooth == '2') ? 'selected' : '') }}>Berlubang</option>
                                    </select>
                                    @if(session()->has('sancpe_tooth'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_tooth') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_mouth">Bagaimana Kondisi Mulut?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_mouth" id="sancpe_mouth" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_mouth') == '0') ? 'selected' : (($xdata[0]->sancpe_mouth == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_mouth') == '1') ? 'selected' : (($xdata[0]->sancpe_mouth == '1') ? 'selected' : '') }}>Cyanosis</option>
                                        <option value="2" {{ (old('sancpe_mouth') == '2') ? 'selected' : (($xdata[0]->sancpe_mouth == '2') ? 'selected' : '') }}>Stomatitis</option>
                                        <option value="3" {{ (old('sancpe_mouth') == '3') ? 'selected' : (($xdata[0]->sancpe_mouth == '3') ? 'selected' : '') }}>Tonsilitis</option>
                                        <option value="4" {{ (old('sancpe_mouth') == '4') ? 'selected' : (($xdata[0]->sancpe_mouth == '4') ? 'selected' : '') }}>Faringitis</option>
                                    </select>
                                    @if(session()->has('sancpe_mouth'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_mouth') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sancpe_arm">Lingkar Lengan Atas</label>
                                    <input type="text" name="sancpe_arm" id="sancpe_arm" class="form-control text-center" onkeyup="return keke();" value="{{ (old('sancpe_arm')) ? old('sancpe_arm') : $xdata[0]->sancpe_arm }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                <div class="col-md-6">
                                    @php
                                        $kek = ($xdata[0]->sancpe_arm < 23.5) ? 'Ada Resiko KEK' : 'Tidak ada resiko';
                                    @endphp
                                    <label for="kek">Resiko KEK</label>
                                    <input type="text" name="kek" id="kek" class="form-control text-center" readonly value="{{ (old('kek')) ? old('kek') : $kek }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sancpe_pelvis">Lingkar Panggul</label>
                                    <input type="text" name="sancpe_pelvis" id="sancpe_pelvis" class="form-control text-center" onkeyup="return cpde();" value="{{ (old('sancpe_pelvis')) ? old('sancpe_pelvis') : $xdata[0]->sancpe_pelvis }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                <div class="col-md-6">
                                    @php
                                        $cpd = ($xdata[0]->sancpe_pelvis < 80) ? 'Ada Resiko KEK' : 'Tidak ada resiko';
                                    @endphp
                                    <label for="cpd">Resiko CPD</label>
                                    <input type="text" name="cpd" id="cpd" class="form-control text-center" readonly value="{{ (old('cpd')) ? old('cpd') : $cpd }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_chest">Bagaimana Kondisi Dada?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_chest" id="sancpe_chest" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_chest') == '0') ? 'selected' : (($xdata[0]->sancpe_chest == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_chest') == '1') ? 'selected' : (($xdata[0]->sancpe_chest == '1') ? 'selected' : '') }}>Abnormal</option>
                                    </select>
                                    @if(session()->has('sancpe_chest'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_chest') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_heart">Bagaimana Kondisi Jantung?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_heart" id="sancpe_heart" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_heart') == '0') ? 'selected' : (($xdata[0]->sancpe_heart == '0') ? 'selected' : '') }}>Tidak ada keluhan</option>
                                        <option value="1" {{ (old('sancpe_heart') == '1') ? 'selected' : (($xdata[0]->sancpe_heart == '1') ? 'selected' : '') }}>Berdebar-debar</option>
                                        <option value="2" {{ (old('sancpe_heart') == '2') ? 'selected' : (($xdata[0]->sancpe_heart == '2') ? 'selected' : '') }}>Mudah sesak nafas</option>
                                    </select>
                                    @if(session()->has('sancpe_heart'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_heart') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_lungs">Bagaimana Kondisi Paru?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_lungs" id="sancpe_lungs" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_lungs') == '0') ? 'selected' : (($xdata[0]->sancpe_lungs == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_lungs') == '1') ? 'selected' : (($xdata[0]->sancpe_lungs == '1') ? 'selected' : '') }}>Sesak Nafas</option>
                                    </select>
                                    @if(session()->has('sancpe_lungs'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_lungs') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_patella">Bagaimana Reflek Patella?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_patella" id="sancpe_patella" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_patella') == '0') ? 'selected' : (($xdata[0]->sancpe_patella == '0') ? 'selected' : '') }}>Negatif</option>
                                        <option value="1" {{ (old('sancpe_patella') == '1') ? 'selected' : (($xdata[0]->sancpe_patella == '1') ? 'selected' : '') }}>Positif</option>
                                    </select>
                                    @if(session()->has('sancpe_patella'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_patella') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_boobs">Bagaimana Kondisi Payudara?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_boobs" id="sancpe_boobs" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_boobs') == '0') ? 'selected' : (($xdata[0]->sancpe_boobs == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_boobs') == '1') ? 'selected' : (($xdata[0]->sancpe_boobs == '1') ? 'selected' : '') }}>Kemerahan</option>
                                        <option value="2" {{ (old('sancpe_boobs') == '2') ? 'selected' : (($xdata[0]->sancpe_boobs == '2') ? 'selected' : '') }}>Benjolan</option>
                                        <option value="3" {{ (old('sancpe_boobs') == '3') ? 'selected' : (($xdata[0]->sancpe_boobs == '3') ? 'selected' : '') }}>Puting Susu Masuk</option>
                                        <option value="4" {{ (old('sancpe_boobs') == '4') ? 'selected' : (($xdata[0]->sancpe_boobs == '4') ? 'selected' : '') }}>Kulit Jeruk</option>
                                        <option value="5" {{ (old('sancpe_boobs') == '5') ? 'selected' : (($xdata[0]->sancpe_boobs == '5') ? 'selected' : '') }}>Keluar Cairan</option>
                                    </select>
                                    @if(session()->has('sancpe_boobs'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_boobs') }}
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
                                    <label for="sancpe_ex_top">Bagaimana Ekstermitas Atas?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_ex_top" id="sancpe_ex_top" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_ex_top') == '0') ? 'selected' : (($xdata[0]->sancpe_ex_top == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_ex_top') == '1') ? 'selected' : (($xdata[0]->sancpe_ex_top == '1') ? 'selected' : '') }}>Oedema</option>
                                    </select>
                                    @if(session()->has('sancpe_ex_top'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_ex_top') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_ex_bottom">Bagaimana Ekstermitas Bawah?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_ex_bottom" id="sancpe_ex_bottom" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_ex_bottom') == '0') ? 'selected' : (($xdata[0]->sancpe_ex_bottom == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_ex_bottom') == '1') ? 'selected' : (($xdata[0]->sancpe_ex_bottom == '1') ? 'selected' : '') }}>Oedema</option>
                                    </select>
                                    @if(session()->has('sancpe_ex_bottom'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_ex_bottom') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_ex_gland">Bagaimana Pembesaran Kelenjar?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_ex_gland" id="sancpe_ex_gland" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_ex_gland') == '0') ? 'selected' : (($xdata[0]->sancpe_ex_gland == '0') ? 'selected' : '') }}>Normal</option>
                                        <option value="1" {{ (old('sancpe_ex_gland') == '1') ? 'selected' : (($xdata[0]->sancpe_ex_gland == '1') ? 'selected' : '') }}>Leher</option>
                                        <option value="2" {{ (old('sancpe_ex_gland') == '2') ? 'selected' : (($xdata[0]->sancpe_ex_gland == '2') ? 'selected' : '') }}>Ketiak</option>
                                        <option value="3" {{ (old('sancpe_ex_gland') == '3') ? 'selected' : (($xdata[0]->sancpe_ex_gland == '3') ? 'selected' : '') }}>Lipatan Paha</option>
                                        <option value="4" {{ (old('sancpe_ex_gland') == '4') ? 'selected' : (($xdata[0]->sancpe_ex_gland == '4') ? 'selected' : '') }}>Tiroid</option>
                                        <option value="5" {{ (old('sancpe_ex_gland') == '5') ? 'selected' : (($xdata[0]->sancpe_ex_gland == '5') ? 'selected' : '') }}>Lemfe</option>
                                    </select>
                                    @if(session()->has('sancpe_ex_gland'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_ex_gland') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_oodena">Bagaimana Oedema?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_oodena" id="sancpe_oodena" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_oodena') == '0') ? 'selected' : (($xdata[0]->sancpe_oodena == '0') ? 'selected' : '') }}>Tidak ada</option>
                                        <option value="1" {{ (old('sancpe_oodena') == '1') ? 'selected' : (($xdata[0]->sancpe_oodena == '1') ? 'selected' : '') }}>Ada</option>
                                    </select>
                                    @if(session()->has('sancpe_oodena'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_oodena') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_caesar">Apakah Operasi Caesar?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_caesar" id="sancpe_caesar" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_caesar') == '0') ? 'selected' : (($xdata[0]->sancpe_caesar == '0') ? 'selected' : '') }}>BELUM PERNAH</option>
                                        <option value="1" {{ (old('sancpe_caesar') == '1') ? 'selected' : (($xdata[0]->sancpe_caesar == '1') ? 'selected' : '') }}>SUDAH</option>
                                    </select>
                                    @if(session()->has('sancpe_caesar'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_caesar') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_fetus">Jumlah Janin?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_fetus" id="sancpe_fetus" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_fetus') == '0') ? 'selected' : (($xdata[0]->sancpe_fetus == '0') ? 'selected' : '') }}>TUNGGAL</option>
                                        <option value="1" {{ (old('sancpe_fetus') == '1') ? 'selected' : (($xdata[0]->sancpe_fetus == '1') ? 'selected' : '') }}>GANDA/KEMBAR</option>
                                    </select>
                                    @if(session()->has('sancpe_fetus'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_fetus') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_pros_fetus">Posisi Janin?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_pros_fetus" id="sancpe_pros_fetus" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_pros_fetus') == '0') ? 'selected' : (($xdata[0]->sancpe_pros_fetus == '0') ? 'selected' : '') }}>KEPALA</option>
                                        <option value="1" {{ (old('sancpe_pros_fetus') == '1') ? 'selected' : (($xdata[0]->sancpe_pros_fetus == '1') ? 'selected' : '') }}>BOKONG/SUNGSANG</option>
                                        <option value="2" {{ (old('sancpe_pros_fetus') == '2') ? 'selected' : (($xdata[0]->sancpe_pros_fetus == '2') ? 'selected' : '') }}>LETAK LINTANG/OBLIQUE</option>
                                        <option value="3" {{ (old('sancpe_pros_fetus') == '3') ? 'selected' : (($xdata[0]->sancpe_pros_fetus == '3') ? 'selected' : '') }}>BALOTEMEN</option>
                                    </select>
                                    @if(session()->has('sancpe_pros_fetus'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_pros_fetus') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_pap">Posisi Kepala Terhadap PAP?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_pap" id="sancpe_pap" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="11" {{ (old('sancpe_pap') == '11') ? 'selected' : (($xdata[0]->sancpe_pap == '11') ? 'selected' : '') }}>MASUK</option>
                                        <option value="12" {{ (old('sancpe_pap') == '12') ? 'selected' : (($xdata[0]->sancpe_pap == '12') ? 'selected' : '') }}>MASUK SEBAGIAN</option>
                                        <option value="13" {{ (old('sancpe_pap') == '13') ? 'selected' : (($xdata[0]->sancpe_pap == '13') ? 'selected' : '') }}>BELUM MASUK</option>
                                    </select>
                                    @if(session()->has('sancpe_pap'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_pap') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <label for="sancpe_tfu_finger">TFU dalam Jari</label>
                                    <input type="text" name="sancpe_tfu_finger" id="sancpe_tfu_finger" class="form-control text-center" value="{{ (old('sancpe_tfu_finger')) ? old('sancpe_tfu_finger') : $xdata[0]->sancpe_tfu_finger }}" {{ (floor($div) < 24) ? '' : 'readonly' }} oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                                <div class="col-md-6 text-center">
                                    <label for="sancpe_tfu_cm">TFU dalam CM</label>
                                    <input type="text" name="sancpe_tfu_cm" id="sancpe_tfu_cm" class="form-control text-center" value="{{ (old('sancpe_tfu_cm')) ? old('sancpe_tfu_cm') : $xdata[0]->sancpe_tfu_cm }}" onkeyup="return tbje();" {{ (floor($div) > 24) ? '' : 'readonly' }} oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                @php
                                    $tbj = ($xdata[0]->sancpe_tfu_cm - $xdata[0]->sancpe_pap) * 155;
                                @endphp
                                <div class="col-md-6 text-center">
                                    <label for="tbj">TBJ</label>
                                    <input type="text" name="tbj" id="tbj" class="form-control text-center" readonly value="{{ (old('tbj')) ? old('tbj') : (($xdata[0]->sancpe_tfu_cm != '') ? $tbj : '') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_tfu_finger_pos">Posisi TFU Jari?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_tfu_finger_pos" id="sancpe_tfu_finger_pos" class="form-control select2" {{ (floor($div) < 24) ? '' : 'disabled' }}>
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sancpe_tfu_finger_pos') == '0') ? 'selected' : (($xdata[0]->sancpe_pap == '0') ? 'selected' : '') }}>Diatas Pusar</option>
                                        <option value="1" {{ (old('sancpe_tfu_finger_pos') == '1') ? 'selected' : (($xdata[0]->sancpe_pap == '1') ? 'selected' : '') }}>Diatas Tulang Kelamin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_djj">Berapa Detak Jantung Janin (DJJ/min)?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancpe_djj" id="sancpe_djj" class="form-control" value="{{ (old('sancpe_djj')) ? old('sancpe_djj') : $xdata[0]->sancpe_djj }}">
                                    @if ($errors->has('sancpe_djj'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_djj') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_djj_id">Kategori Detak Jantung Janin (DJJ/min)?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancpe_djj_id" id="sancpe_djj_id" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($djj as $djj)
                                            <option value="{{ $djj->djj_id }}" {{ ($djj->djj_id == old('sancpe_djj_id')) ? 'selected' : (($xdata[0]->sancpe_djj_id == $djj->djj_id) ? 'selected' : '') }}>{{ $djj->djj_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sancpe_djj_id'))
                                        <div class="text-danger">
                                            {{ session()->get('sancpe_djj_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_pl1">Perut: Leopold I</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancpe_pl1" id="sancpe_pl1" class="form-control" value="{{ (old('sancpe_pl1')) ? old('sancpe_pl1') : $xdata[0]->sancpe_pl1 }}">
                                    @if ($errors->has('sancpe_pl1'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_pl1') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_pl2">Perut: Leopold II</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancpe_pl2" id="sancpe_pl2" class="form-control" value="{{ (old('sancpe_pl2')) ? old('sancpe_pl2') : $xdata[0]->sancpe_pl2 }}">
                                    @if ($errors->has('sancpe_pl2'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_pl2') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_pl3">Perut: Leopold III</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancpe_pl3" id="sancpe_pl3" class="form-control" value="{{ (old('sancpe_pl3')) ? old('sancpe_pl3') : $xdata[0]->sancpe_pl3 }}">
                                    @if ($errors->has('sancpe_pl3'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_pl3') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancpe_pl4">Perut: Leopold IV</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancpe_pl4" id="sancpe_pl4" class="form-control" value="{{ (old('sancpe_pl4')) ? old('sancpe_pl4') : $xdata[0]->sancpe_pl4 }}">
                                    @if ($errors->has('sancpe_pl4'))
                                        <div class="text-danger">
                                            {{ $errors->first('sancpe_pl4') }}
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
            <a href="{{ route('service.anc.anc.anamnesa', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
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
