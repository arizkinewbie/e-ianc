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
        jQuery('select[name="svak_pay"]').on('change', function () {
            $('#svak_noka').val('');
            $('#noka').hide();

            if(jQuery(this).val() == '002') {
                $('#noka').show();
            }
        });

        jQuery('select[name="tvak"]').on('change', function () {
            var id = jQuery(this).val();
            $("#infovaksin").hide();
            console.log(id);

            $.ajax({
                url: "{{ $baseurl }}/layanan/vaksin/search/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="svak_vak_id"]').empty();
                    $('select[name="svak_vak_id"]').append('<option value="">-- PILIH VAKSIN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="svak_vak_id"]').append('<option value="' +
                            val['vak_id'] + '">' + val['vak_brand'] + ' - ' + val['vak_batch'] + ' ('+val['vak_expired_date'] + ') </option>');
                    });
                }
            })
        });

        jQuery('select[name="svak_vak_id"]').on('change', function () {
            var id = jQuery(this).val();
            $("#infovaksin").hide();

            $.ajax({
                url: "{{ $baseurl }}/layanan/vaksin/detail/" + jQuery(this).val(),
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#infovaksin").show();
                    $("#info").html('Vaksin <b>' + data.vak_brand + '</b> <i>' + data.vak_batch + '</i> masih tersedia sebanyak <b>' + data.vak_remainder + ' ' + data.vak_unit + '</b>');
                }
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
    });
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('service.vaksin', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Layanan Imunisasi</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.vaksin.store') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="norm" value="{{ $id }}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="svak_pay">Penjaminan</label>
                            </div>
                            <div class="col-md-8">
                                <select name="svak_pay" id="svak_pay" class="form-control select2">
                                    <option value="">-- PILIH PENJAMINAN --</option>
                                    @foreach ($pay as $p)
                                        <option value="{{ $p->pay_code }}" {{ (old('svak_pay') == $p->pay_code) ? 'selected' : '' }}>{{ $p->pay_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('svak_pay'))
                                    <div class="text-danger">
                                        {{ session()->get('svak_pay') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="noka" style="display: {{ (old('svak_pay') == '002') ? 'block' : 'none' }};">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="svak_noka">Nomor Kartu</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="svak_noka" id="svak_noka" class="form-control" value="{{ old('svak_noka') }}" maxlength="13">
                                @if ($errors->has('svak_noka'))
                                    <div class="text-danger">
                                        {{ $errors->first('svak_noka') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="suhu">Suhu Badan (Celcius)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="suhu" id="suhu" class="form-control" value="{{ old('suhu') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('suhu'))
                                    <div class="text-danger">
                                        {{ $errors->first('suhu') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="svak_servak_id">Layanan Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <select name="svak_servak_id" id="svak_servak_id" class="form-control select2">
                                    <option value="">-- PILIH LAYANAN --</option>
                                    @foreach ($svaksin as $sv)
                                        <option value="{{ $sv->vas_id }}" {{ (old('svak_servak_id') == $sv->vas_id) ? 'selected' : '' }}>{{ $sv->vas_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('svak_servak_id'))
                                    <div class="text-danger">
                                        {{ session()->get('svak_servak_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tvak">Jenis Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <select name="tvak" id="tvak" class="form-control select2">
                                    <option value="">-- PILIH JENIS VAKSIN --</option>
                                    @foreach ($tvaksin as $tv)
                                        <option value="{{ $tv->va_id }}">{{ $tv->va_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="svak_vak_id">Nama Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <select name="svak_vak_id" id="svak_vak_id" class="form-control select2">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="infovaksin" style="display: none;">
                        <div class="alert alert-warning">
                            <div class="text-center">
                                <span id="info"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="svak_dosis">Dosis Vaksin</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="svak_dosis" id="svak_dosis" class="form-control text-right" value="{{ old('svak_dosis') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            @if ($errors->has('svak_dosis'))
                                                <div class="text-danger">
                                                    {{ $errors->first('svak_dosis') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
