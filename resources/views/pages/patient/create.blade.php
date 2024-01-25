@php
$baseurl = DB::table('sys_baseurls')->where('url_use','root')->where('url_status','1')->value('url_address');
@endphp

@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('template/vendor/datepicker/themes/hot-sneaks/jquery-ui.css') }}">
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

<script src="{{ asset('template/vendor/datepicker/jquery-ui.js') }}"></script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            minDate: 0,
            dateFormat: 'yy-mm-dd',
            changeMonth: true, // this will help you to change month as you like
            changeYear: true, // this will help you to change years as you like
            yearRange: "0:2200"
        });
    });

</script>

<script>
    jQuery(document).ready(function () {
        jQuery('select[name="pat_province"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="pat_district"]').empty();
                    $('select[name="pat_district"]').append('<option value="">-- PILIH KABUPATEN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="pat_district"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });
        });

        jQuery('select[name="pat_district"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="pat_subdistrict"]').empty();
                    $('select[name="pat_subdistrict"]').append('<option value="">-- PILIH KECAMATAN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="pat_subdistrict"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });
        });

        jQuery('select[name="pat_subdistrict"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="pat_village"]').empty();
                    $('select[name="pat_village"]').append('<option value="">-- PILIH DESA/KELURAHAN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="pat_village"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('patient') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah KIA</h1>
</div>
@endsection

@section('content')
<form action="{{ route('patient.store') }}" method="post" autocomplete="off">
    {{ csrf_field() }}
    <div class="card card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_bpjs_kesehatan">NO BPJS Kesehatan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="pat_bpjs_kesehatan" id="pat_bpjs_kesehatan" class="form-control" value="{{ old('pat_bpjs_kesehatan') }}" maxlength="13">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_nik">Nomor Induk Kependudukan (NIK)</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="pat_nik" id="pat_nik" class="form-control" value="{{ old('pat_nik') }}" maxlength="16">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_called">Panggilan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_called" id="pat_called" class="form-control text-center select2">
                                <option value="">-- PILIH PANGGILAN --</option>
                                @foreach ($call as $cal)
                                    <option value="{{ $cal->cal_id }}" {{ (old('pat_called') == $cal->cal_id) ? 'selected' : '' }}>{{ $cal->cal_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('pat_called'))
                                <div class="text-danger">
                                    {{ session()->get('pat_called') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_status">Status Dalam Keluarga</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_status" id="pat_status" class="form-control text-center select2">
                                <option value="">-- PILIH STATUS --</option>
                                @foreach ($status as $ssp)
                                    <option value="{{ $ssp->ssp_id }}" {{ (old('pat_status') == $ssp->ssp_id) ? 'selected' : '' }}>{{ $ssp->ssp_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('pat_status'))
                                <div class="text-danger">
                                    {{ session()->get('pat_status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_name">Nama</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="pat_name" id="pat_name" class="form-control" value="{{ old('pat_name') }}" maxlength="255">
                            @if ($errors->has('pat_name'))
                                <div class="text-danger">
                                    {{ $errors->first('pat_name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_sex">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_sex" id="pat_sex" class="form-control text-center select2">
                                <option value="">-- PILIH JENIS KELAMIN --</option>
                                @foreach ($sex as $sex)
                                    <option value="{{ $sex->sex_id }}" {{ (old('pat_sex') == $sex->sex_id) ? 'selected' : '' }}>{{ $sex->sex_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('pat_sex'))
                                <div class="text-danger">
                                    {{ session()->get('pat_sex') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_religion">Agama</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_religion" id="pat_religion" class="form-control text-center select2">
                                <option value="">-- PILIH AGAMA --</option>
                                @foreach ($religion as $rel)
                                    <option value="{{ $rel->rel_id }}" {{ (old('pat_religion') == $rel->rel_id) ? 'selected' : '' }}>{{ $rel->rel_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('pat_religion'))
                                <div class="text-danger">
                                    {{ session()->get('pat_religion') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_pob">Tempat Lahir</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="pat_pob" id="pat_pob" class="form-control" value="{{ old('pat_pob') }}" maxlength="255">
                            @if ($errors->has('pat_pob'))
                                <div class="text-danger">
                                    {{ $errors->first('pat_pob') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_dob">Tanggal Lahir</label>
                        </div>
                        <div class="col-md-8">
                            <input type="date" name="pat_dob" id="pat_dob" class="form-control" value="{{ old('pat_dob') }}">
                            @if ($errors->has('pat_dob'))
                                <div class="text-danger">
                                    {{ $errors->first('pat_dob') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_tob">Jam Lahir</label>
                            <br>
                            <i class="text-danger">(Hanya diisi untuk bayi/anak, Jika ibu hamil atau lainnya dibiarkan saja)</i>
                        </div>
                        <div class="col-md-8">
                            <input type="time" name="pat_tob" id="pat_tob" class="form-control" value="{{ (old('pat_tob')) ? old('pat_tob') : '00:00' }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_education">Pendidikan Terakhir</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_education" id="pat_education" class="form-control text-center select2">
                                <option value="">-- PILIH PENDIDIKAN --</option>
                                @foreach ($education as $edu)
                                    <option value="{{ $edu->edu_id }}" {{ (old('pat_education') == $edu->edu_id) ? 'selected' : '' }}>{{ $edu->edu_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('pat_education'))
                                <div class="text-danger">
                                    {{ session()->get('pat_education') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_work">Pekerjaan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_work" id="pat_work" class="form-control text-center select2">
                                <option value="">-- PILIH PEKERJAAN --</option>
                                @foreach ($work as $w)
                                    <option value="{{ $w->w_id }}" {{ (old('pat_work') == $w->w_id) ? 'selected' : '' }}>{{ $w->w_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('pat_work'))
                                <div class="text-danger">
                                    {{ session()->get('pat_work') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_blood">Golongan Darah</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_blood" id="pat_blood" class="form-control text-center select2">
                                <option value="">-- PILIH GOLONGAN DARAH --</option>
                                @foreach ($blood as $bl)
                                    <option value="{{ $bl->blo_id }}" {{ (old('pat_blood') == $bl->blo_id) ? 'selected' : '' }}>{{ $bl->blo_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('pat_blood'))
                                <div class="text-danger">
                                    {{ session()->get('pat_blood') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_marital">Status Perkawinan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_marital" id="pat_marital" class="form-control text-center select2">
                                <option value="">-- PILIH PERKAWINAN --</option>
                                @foreach ($marital as $mr)
                                    <option value="{{ $mr->mar_id }}" {{ (old('pat_marital') == $mr->mar_id) ? 'selected' : '' }}>{{ $mr->mar_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('pat_marital'))
                                <div class="text-danger">
                                    {{ session()->get('pat_marital') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_telp">No Telp/Whatsapp</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="pat_telp" id="pat_telp" class="form-control" value="{{ old('pat_telp') }}" maxlength="15">
                            @if ($errors->has('pat_telp'))
                                <div class="text-danger">
                                    {{ $errors->first('pat_telp') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_biological_mother">Nama Ibu Kandung</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="pat_biological_mother" id="pat_biological_mother" class="form-control" value="{{ old('pat_biological_mother') }}" maxlength="255">
                            @if ($errors->has('pat_biological_mother'))
                                <div class="text-danger">
                                    {{ $errors->first('pat_biological_mother') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_province">Provinsi</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_province" id="pat_province" class="form-control select2">
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach ($province as $pro)
                                <option value="{{ $pro->kode }}">{{ $pro->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_district">Kabupaten/Kota</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_district" id="pat_district" class="form-control select2"></select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_subdistrict">Kecamatan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_subdistrict" id="pat_subdistrict" class="form-control select2"></select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_village">Desa/Kelurahan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="pat_village" id="pat_village" class="form-control select2"></select>
                            @if(session()->has('pat_village'))
                                <div class="text-danger">
                                    {{ session()->get('pat_village') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pat_rw">RW</label>
                                    <input type="text" name="pat_rw" id="pat_rw" class="form-control text-center"
                                        value="{{ old('pat_rw') }}">
                                    @if ($errors->has('pat_rw'))
                                    <div class="text-danger">
                                        {{ $errors->first('pat_rw') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="pat_rt">RT</label>
                                    <input type="text" name="pat_rt" id="pat_rt" class="form-control text-center"
                                        value="{{ old('pat_rt') }}">
                                    @if ($errors->has('pat_rt'))
                                    <div class="text-danger">
                                        {{ $errors->first('pat_rt') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_address">Detail Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="pat_address" id="pat_address" cols="30" rows="3" class="form-control">{{ old('pat_address') }}</textarea>
                            @if ($errors->has('pat_address'))
                                <div class="text-danger">
                                    {{ $errors->first('pat_address') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pat_zip_code">Kode Pos</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="pat_zip_code" id="pat_zip_code" class="form-control text-center" value="{{ old('pat_zip_code') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_husband_nik">NIK Suami</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pat_husband_nik" id="pat_husband_nik" class="form-control" value="{{ old('pat_husband_nik') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_husband">Nama Suami</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pat_husband" id="pat_husband" class="form-control" value="{{ old('pat_husband') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_husband_work">Pekerjaan Suami</label>
                            </div>
                            <div class="col-md-8">
                                <select name="pat_husband_work" id="pat_husband_work" class="form-control text-center select2">
                                    <option value="">-- PILIH PEKERJAAN --</option>
                                    @foreach ($work as $w)
                                        <option value="{{ $w->w_id }}" {{ (old('pat_husband_work') == $w->w_id) ? 'selected' : '' }}>{{ $w->w_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_wife_nik">NIK Istri</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pat_wife_nik" id="pat_wife_nik" class="form-control" value="{{ old('pat_wife_nik') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_wife">Nama Istri</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pat_wife" id="pat_wife" class="form-control" value="{{ old('pat_wife') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_wife_work">Pekerjaan Istri</label>
                            </div>
                            <div class="col-md-8">
                                <select name="pat_wife_work" id="pat_wife_work" class="form-control text-center select2">
                                    <option value="">-- PILIH PEKERJAAN --</option>
                                    @foreach ($work as $w)
                                        <option value="{{ $w->w_id }}" {{ (old('pat_wife_work') == $w->w_id) ? 'selected' : '' }}>{{ $w->w_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_father_nik">NIK Ayah</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pat_father_nik" id="pat_father_nik" class="form-control" value="{{ old('pat_father_nik') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_father">Nama Ayah</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pat_father" id="pat_father" class="form-control" value="{{ old('pat_father') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_father_work">Pekerjaan Ayah</label>
                            </div>
                            <div class="col-md-8">
                                <select name="pat_father_work" id="pat_father_work" class="form-control text-center select2">
                                    <option value="">-- PILIH PEKERJAAN --</option>
                                    @foreach ($work as $w)
                                        <option value="{{ $w->w_id }}" {{ (old('pat_father_work') == $w->w_id) ? 'selected' : '' }}>{{ $w->w_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_mother_nik">NIK Ibu</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pat_mother_nik" id="pat_mother_nik" class="form-control" value="{{ old('pat_mother_nik') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_mother">Nama Ibu</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="pat_mother" id="pat_mother" class="form-control" value="{{ old('pat_mother') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pat_mother_work">Pekerjaan Ibu</label>
                            </div>
                            <div class="col-md-8">
                                <select name="pat_mother_work" id="pat_mother_work" class="form-control text-center select2">
                                    <option value="">-- PILIH PEKERJAAN --</option>
                                    @foreach ($work as $w)
                                        <option value="{{ $w->w_id }}" {{ (old('pat_mother_work') == $w->w_id) ? 'selected' : '' }}>{{ $w->w_name }}</option>
                                    @endforeach
                                </select>
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
