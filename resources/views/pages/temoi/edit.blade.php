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
                    jQuery('select[name="ins_subdistrict"]').empty();
                    jQuery('select[name="temoi_ins_id"]').empty();
                    $('select[name="ins_district"]').append(
                        '<option value="">-- PILIH KABUPATEN --</option>');
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
                    $('select[name="ins_subdistrict"]').append(
                        '<option value="">-- PILIH KECAMATAN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="ins_subdistrict"]').append(
                            '<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
            });

        });
        jQuery('select[name="ins_subdistrict"]').on('change', function () {
            $.ajax({
                url: "{{ $baseurl }}/getinstansi/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="temoi_ins_id"]').empty();
                    jQuery.each(data, function (key, val) {
                        $('select[name="temoi_ins_id"]').append('<option value="' +
                            val['ins_id'] + '">' + val['ins_name'] + ' - ' + val['ins_code'] + '</option>'
                        );
                    });
                }
            });
        });
    });
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('temoi') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Edit Tenaga Medis On Instansi</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('temoi.update') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $data[0]->temoi_id }}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="ins_province">Provinsi</label>
                        <select name="ins_province" id="ins_province" class="form-control select2">
                            <option value="x">-- Pilih Provinsi --</option>
                            @foreach ($province as $pro)
                            <option value="{{ $pro->kode }}" {{ ($pro->kode == old('ins_province')) ? 'selected' : (($pro->kode == $data[0]->ins_province) ? 'selected' : '' ) }}>{{ $pro->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ins_district">Kabupaten/Kota</label>
                        <select name="ins_district" id="ins_district" class="form-control select2">
                            @php
                            $kab = DB::table('sys_alamats')->where('kode', $data[0]->ins_district)->get();
                            @endphp
                            <option value="{{ $kab[0]->kode }}">{{ $kab[0]->nama }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ins_subdistrict">Kecamatan</label>
                        <select name="ins_subdistrict" id="ins_subdistrict" class="form-control select2">
                            @php
                            $kab = DB::table('sys_alamats')->where('kode', $data[0]->ins_subdistrict)->get();
                            @endphp
                            <option value="{{ $kab[0]->kode }}">{{ $kab[0]->nama }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="temoi_ins_id">Instansi</label>
                        <select name="temoi_ins_id" id="temoi_ins_id" class="form-control select2">
                            @php
                            $kab = DB::table('eianc_instansis')->where('ins_id', $data[0]->temoi_ins_id)->get();
                            @endphp
                            <option value="{{ $kab[0]->ins_id }}">{{ $kab[0]->ins_name . ' - ' . $kab[0]->ins_code }}</option>
                        </select>
                        @if(session()->has('temoi_ins_id'))
                        <div class="text-danger">
                            {{ session()->get('temoi_ins_id') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2" style="margin: auto; width: 50%; color: red; text-align: center;">
                    <b>Hubungkan Dengan</b>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="temoi_nakes_id">Tenaga Kesehatan</label>
                        <select name="temoi_nakes_id" id="temoi_nakes_id" class="form-control select2">
                            <option value="x">-- PILIH NAKES --</option>
                            @foreach ($nakes as $nk)
                            <option value="{{ $nk->nakes_id }}" {{ (old('temoi_nakes_id') == $nk->nakes_id) ? 'selected' : (($nk->nakes_id == $data[0]->temoi_nakes_id) ? 'selected' : '') }}>
                                {{ $nk->nakes_name }} - {{ $nk->nakes_sip }}
                            </option>
                            @endforeach
                        </select>
                        @if(session()->has('temoi_nakes_id'))
                        <div class="text-danger">
                            {{ session()->get('temoi_nakes_id') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <div class="row justify-content-end">
                <div class="col-md-3">
                    <select name="temoi_status" id="ins_status" class="form-control">
                        <option value="0" {{ ($data[0]->temoi_status == '0') ? 'selected' : '' }}>Blocked</option>
                        <option value="1" {{ ($data[0]->temoi_status == '1') ? 'selected' : '' }}>Active</option>
                        @if (auth()->user()->role == '0')
                        <option value="2" {{ ($data[0]->temoi_status == '2') ? 'selected' : '' }}>Suspend</option>
                        @endif
                    </select>
                </div>
                |
                <div class="col-md-1 justify-content-center">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
