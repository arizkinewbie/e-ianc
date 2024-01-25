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
        jQuery('select[name="nakes_province"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="nakes_district"]').empty();
                    $('select[name="nakes_district"]').append('<option value="">-- PILIH KABUPATEN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="nakes_district"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });
        });

        jQuery('select[name="nakes_district"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="nakes_subdistrict"]').empty();
                    $('select[name="nakes_subdistrict"]').append('<option value="">-- PILIH KECAMATAN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="nakes_subdistrict"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });
        });

        jQuery('select[name="nakes_subdistrict"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="nakes_village"]').empty();
                    $('select[name="nakes_village"]').append('<option value="">-- PILIH DESA/KELURAHAN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="nakes_village"]').append('<option value="' +
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
    <a href="{{ route('nakes') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Tenaga Kesehatan</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <form action="{{ route('nakes.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nakes_name">Nama Tenaga Kesehatan</label>
                                <input type="text" name="nakes_name" id="nakes_name" class="form-control"
                                    value="{{ old('nakes_name') }}">
                                @if ($errors->has('nakes_name'))
                                <div class="text-danger">
                                    {{ $errors->first('nakes_name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nakes_nip">NIP Tenaga Kesehatan</label>
                                <input type="text" name="nakes_nip" id="nakes_nip" class="form-control"
                                    value="{{ (old('nakes_nip')) ? old('nakes_nip') : '-' }}">
                                @if ($errors->has('nakes_nip'))
                                <div class="text-danger">
                                    {{ $errors->first('nakes_nip') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nakes_sip">SIP Tenaga Kesehatan</label>
                                <input type="text" name="nakes_sip" id="nakes_sip" class="form-control"
                                    value="{{ (old('nakes_sip')) ? old('nakes_sip') : '-' }}">
                                @if ($errors->has('nakes_sip'))
                                <div class="text-danger">
                                    {{ $errors->first('nakes_sip') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nakes_sip_date">Masa Berlaku SIP</label>
                                <input type="text" name="nakes_sip_date" id="nakes_sip_date" class="form-control datepicker"
                                    value="{{ old('nakes_sip_date') }}" readonly>
                                @if ($errors->has('nakes_sip_date'))
                                <div class="text-danger">
                                    {{ $errors->first('nakes_sip_date') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nakes_telp">No Telp/Whatsapp</label>
                                <input type="text" name="nakes_telp" id="nakes_telp" class="form-control"
                                    value="{{ old('nakes_telp') }}" maxlength="15">
                                @if ($errors->has('nakes_telp'))
                                <div class="text-danger">
                                    {{ $errors->first('nakes_telp') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nakes_province">Provinsi</label>
                                <select name="nakes_province" id="nakes_province" class="form-control select2">
                                    <option value="x">-- Pilih Provinsi --</option>
                                    @foreach ($province as $pro)
                                    <option value="{{ $pro->kode }}" {{ ($pro->kode == old('nakes_province')) ? 'selected' : '' }}>{{ $pro->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nakes_district">Kabupaten/Kota</label>
                                <select name="nakes_district" id="nakes_district" class="form-control select2">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nakes_subdistrict">Kecamatan</label>
                                <select name="nakes_subdistrict" id="nakes_subdistrict" class="form-control select2">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nakes_village">Desa/Kelurahan</label>
                                <select name="nakes_village" id="nakes_village" class="form-control select2">
                                </select>
                                @if(session()->has('nakes_village'))
                                <div class="text-danger">
                                    {{ session()->get('nakes_village') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nakes_rw">RW</label>
                                        <select name="nakes_rw" id="nakes_rw" class="form-control select2">
                                            <option value="x">-- PILIH RW --</option>
                                            @for ($i = 1; $i < 100; $i++)
                                                <option value="{{ sprintf("%03s", ($i)) }}" {{ (sprintf("%03s", ($i)) == old('rw')) ? 'selected' : '' }}>{{ sprintf("%03s", ($i)) }}</option>
                                            @endfor
                                        </select>
                                        @if(session()->has('nakes_rw'))
                                            <div class="text-danger">
                                                {{ session()->get('nakes_rw') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nakes_rt">RT</label>
                                        <select name="nakes_rt" id="nakes_rt" class="form-control select2">
                                            <option value="x">-- PILIH RT --</option>
                                            @for ($i = 1; $i < 100; $i++)
                                                <option value="{{ sprintf("%03s", ($i)) }}" {{ (sprintf("%03s", ($i)) == old('rw')) ? 'selected' : '' }}>{{ sprintf("%03s", ($i)) }}</option>
                                            @endfor
                                        </select>
                                        @if(session()->has('nakes_rt'))
                                            <div class="text-danger">
                                                {{ session()->get('nakes_rt') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nakes_address">Detail Alamat</label>
                                <textarea name="nakes_address" id="nakes_address" cols="30" rows="3"
                                    class="form-control">{{ old('nakes_address') }}</textarea>
                                @if ($errors->has('nakes_address'))
                                <div class="text-danger">
                                    {{ $errors->first('nakes_address') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nakes_zip_code">Kode Pos</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="nakes_zip_code" id="nakes_zip_code" class="form-control text-center" value="{{ old('nakes_zip_code') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
