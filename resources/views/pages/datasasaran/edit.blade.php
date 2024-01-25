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

@if (auth()->user()->role == 0 || auth()->user()->role == 1 || auth()->user()->role == 2)
@php
    $addsub = DB::table('eianc_temois')
                    ->where('temoi_id', auth()->user()->temoi)
                    ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                    ->get();
@endphp

<script>
    jQuery(document).ready(function () {
        $('#showvillage').show();
        $.ajax({
            url: "{{ $baseurl }}/getadd/{{ $addsub[0]->ins_subdistrict }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                jQuery('select[name="village"]').empty();
                    $('select[name="village"]').append('<option value="">-- PILIH DESA/KELURAHAN --</option>');
                    jQuery.each(data, function (key, val) {
                        $('select[name="village"]').append('<option value="' +
                            val['kode'] + '">' + val['nama'] + '</option>');
                    });
                }
        });
    });
</script>
@endif

@if(auth()->user()->role == 0 || auth()->user()->role == 1 || auth()->user()->role == 3)
<script>
    jQuery(document).ready(function () {
        $('#showrw').show();
    });
</script>
@endif

@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('datasasaran') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Data Sasaran</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('datasasaran.update') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $data->ds_id }}">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_resident">Jumlah Penduduk</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_resident" id="ds_resident" class="form-control text-right" value="{{ (old('ds_resident')) ? old('ds_resident') : $data->ds_resident }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_resident'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_resident') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_bumil">Ibu Hamil</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_bumil" id="ds_bumil" class="form-control text-right" value="{{ (old('ds_bumil')) ? old('ds_bumil') : $data->ds_bumil }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_bumil'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_bumil') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_bumil_resti">Ibu Hamil Resti</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_bumil_resti" id="ds_bumil_resti" class="form-control text-right" value="{{ (old('ds_bumil_resti')) ? old('ds_bumil_resti') : $data->ds_bumil_resti }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_bumil_resti'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_bumil_resti') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_bulin">Bulin</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_bulin" id="ds_bulin" class="form-control text-right" value="{{ (old('ds_bulin')) ? old('ds_bulin') : $data->ds_bulin }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_bulin'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_bulin') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_bufas">Bufas</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_bufas" id="ds_bufas" class="form-control text-right" value="{{ (old('ds_bufas')) ? old('ds_bufas') : $data->ds_bufas }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_bufas'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_bufas') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_pus">PUS</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_pus" id="ds_pus" class="form-control text-right" value="{{ (old('ds_pus')) ? old('ds_pus') : $data->ds_pus }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_pus'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_pus') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_bayi_new">Bayi Baru Lahir</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_bayi_new" id="ds_bayi_new" class="form-control text-right" value="{{ (old('ds_bayi_new')) ? old('ds_bayi_new') : $data->ds_bayi_new }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_bayi_new'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_bayi_new') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_bayi">Bayi</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_bayi" id="ds_bayi" class="form-control text-right" value="{{ (old('ds_bayi')) ? old('ds_bayi') : $data->ds_bayi }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_bayi'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_bayi') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_bayi_resti">Bayi Resti</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_bayi_resti" id="ds_bayi_resti" class="form-control text-right" value="{{ (old('ds_bayi_resti')) ? old('ds_bayi_resti') : $data->ds_bayi_resti }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_bayi_resti'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_bayi_resti') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ds_balita">Balita</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ds_balita" id="ds_balita" class="form-control text-right" value="{{ (old('ds_balita')) ? old('ds_balita') : $data->ds_balita }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @if ($errors->has('ds_balita'))
                                    <div class="text-danger">
                                        {{ $errors->first('ds_balita') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            @if (auth()->user()->role == 2 || auth()->user()->role == 3)
                <button class="btn btn-primary">Submit</button>
            @endif
        </div>
    </form>
</div>
@endsection
