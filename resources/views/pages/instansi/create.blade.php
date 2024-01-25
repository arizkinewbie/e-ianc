@php
$baseurl = DB::table('sys_baseurls')->where('url_use','root')->where('url_status','1')->value('url_address');
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
    jQuery(document).ready(function () {
        jQuery('select[name="ins_province"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="ins_district"]').empty();
                    $('select[name="ins_district"]').append('<option value="">-- PILIH KABUPATEN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="ins_district"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });
        });

        jQuery('select[name="ins_district"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="ins_subdistrict"]').empty();
                    $('select[name="ins_subdistrict"]').append('<option value="">-- PILIH KECAMATAN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="ins_subdistrict"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });
        });

        jQuery('select[name="ins_subdistrict"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getadd/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="ins_village"]').empty();
                    $('select[name="ins_village"]').append('<option value="">-- PILIH DESA/KELURAHAN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="ins_village"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });
        });
    });
</script>

<script>
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("thumb").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };

</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('instansi') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Instansi</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <form action="{{ route('instansi.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ins_type">Type Instansi</label>
                                <select name="ins_type" id="ins_type" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($type as $t)
                                        <option value="{{ $t->ti_id }}" {{ (old('ins_type') == $t->ti_id) ? 'selected' : '' }}>{{ $t->ti_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('ins_type'))
                                <div class="text-danger">
                                    {{ session()->get('ins_type') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="ins_name">Nama Instansi</label>
                                <input type="text" name="ins_name" id="ins_name" class="form-control"
                                    value="{{ old('ins_name') }}">
                                @if ($errors->has('ins_name'))
                                <div class="text-danger">
                                    {{ $errors->first('ins_name') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="ins_telp">No Telp/Whatsapp</label>
                                <input type="text" name="ins_telp" id="ins_telp" class="form-control"
                                    value="{{ old('ins_telp') }}" maxlength="15">
                                @if ($errors->has('ins_telp'))
                                <div class="text-danger">
                                    {{ $errors->first('ins_telp') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ins_code">Nomor Faskes/Ijin Praktik PMB</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="ins_code" id="ins_code" class="form-control" value="{{ old('ins_code') }}">
                                        @if ($errors->has('ins_code'))
                                        <div class="text-danger">
                                            {{ $errors->first('ins_code') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="ins_BPJS">Pelayanan BPJS</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="ins_bpjs" name="ins_bpjs" {{ (old('ins_bpjs') == '1') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="ins_bpjs">
                                                    *) Centang Jika Iya
                                                </label>
                                            </div>
                                            @if ($errors->has('ins_bpjs'))
                                            <div class="text-danger">
                                                {{ $errors->first('ins_bpjs') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <img src="{{ asset('data/image/instansi/icon.jpg') }}" id="image-preview" height="256">
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="thumb" class="custom-file-input" id="thumb" onchange="previewImage();">
                                            <label class="custom-file-label" for="thumb">Choose file</label>
                                            @if ($errors->has('thumb'))
                                            <div class="text-danger">
                                                {{ $errors->first('thumb') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ins_province">Provinsi</label>
                                <select name="ins_province" id="ins_province" class="form-control select2">
                                    <option value="x">-- Pilih Provinsi --</option>
                                    @foreach ($province as $pro)
                                    <option value="{{ $pro->kode }}" {{ ($pro->kode == old('ins_province')) ? 'selected' : '' }}>{{ $pro->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ins_district">Kabupaten/Kota</label>
                                <select name="ins_district" id="ins_district" class="form-control select2">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ins_subdistrict">Kecamatan</label>
                                <select name="ins_subdistrict" id="ins_subdistrict" class="form-control select2">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ins_village">Desa/Kelurahan</label>
                                <select name="ins_village" id="ins_village" class="form-control select2">
                                </select>
                                @if(session()->has('ins_village'))
                                <div class="text-danger">
                                    {{ session()->get('ins_village') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ins_rw">RW</label>
                                        <select name="ins_rw" id="ins_rw" class="form-control select2">
                                            <option value="x">-- PILIH RW --</option>
                                            @for ($i = 1; $i < 100; $i++)
                                                <option value="{{ sprintf("%03s", ($i)) }}" {{ (sprintf("%03s", ($i)) == old('ins_rw')) ? 'selected' : '' }}>{{ sprintf("%03s", ($i)) }}</option>
                                            @endfor
                                        </select>
                                        @if(session()->has('ins_rw'))
                                            <div class="text-danger">
                                                {{ session()->get('ins_rw') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ins_rt">RT</label>
                                        <select name="ins_rt" id="ins_rt" class="form-control select2">
                                            <option value="x">-- PILIH RW --</option>
                                            @for ($i = 1; $i < 100; $i++)
                                                <option value="{{ sprintf("%03s", ($i)) }}" {{ (sprintf("%03s", ($i)) == old('ins_rt')) ? 'selected' : '' }}>{{ sprintf("%03s", ($i)) }}</option>
                                            @endfor
                                        </select>
                                        @if(session()->has('ins_rt'))
                                            <div class="text-danger">
                                                {{ session()->get('ins_rt') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ins_address">Detail Alamat</label>
                                <textarea name="ins_address" id="ins_address" cols="30" rows="3"
                                    class="form-control">{{ old('ins_address') }}</textarea>
                                @if ($errors->has('ins_address'))
                                <div class="text-danger">
                                    {{ $errors->first('ins_address') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="ins_zip_code">Kode Pos</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="ins_zip_code" id="ins_zip_code" class="form-control text-center" value="{{ old('ins_zip_code') }}">
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
