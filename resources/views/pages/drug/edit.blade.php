@extends('layouts.main')

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
    function validat() {
        var price = document.forms["formreg"]["dg_price"];
        var sell = document.forms["formreg"]["dg_sell"];

        if (price.value != "" && sell.value < price.value) {
            alert("HARGA JUAL HARUS LEBIH TINGGI DARI HARGA BELI");
            sell.focus();
            return false;
        }
    }
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('drug') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Obat-obatan</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <form action="{{ route('drug.update') }}" method="post" autocomplete="off" onsubmit="return validat();" name="formreg">
                @csrf
                <input type="hidden" name="id" value="{{ $data->dg_id }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="dg_code">Barcode/QR Code</label>
                                <input type="text" name="dg_code" id="dg_code" class="form-control text-center" value="{{ (old('dg_code')) ? old('dg_code') : $data->dg_code }}">
                                @if ($errors->has('dg_code'))
                                    <div class="text-danger">
                                        {{ $errors->first('dg_code') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="dg_brand">Merk Obat</label>
                                <input type="text" name="dg_brand" id="dg_brand" class="form-control" value="{{ (old('dg_brand')) ? old('dg_brand') : $data->dg_brand }}">
                                @if ($errors->has('dg_brand'))
                                    <div class="text-danger">
                                        {{ $errors->first('dg_brand') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="dg_batch">Batch Obat</label>
                                <input type="text" name="dg_batch" id="dg_batch" class="form-control" value="{{ (old('dg_batch')) ? old('dg_batch') : $data->dg_batch }}">
                                @if ($errors->has('dg_batch'))
                                    <div class="text-danger">
                                        {{ $errors->first('dg_batch') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Netto Obat</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="dg_netto" id="dg_netto" class="form-control text-right" value="{{ (old('dg_netto')) ? old('dg_netto') : $data->dg_netto }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @if ($errors->has('dg_netto'))
                                            <div class="text-danger">
                                                {{ $errors->first('dg_netto') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <select name="dg_unit" class="form-control select2">
                                            <option value="">PILIH JUMLAH</option>
                                            @foreach ($unit as $u)
                                                <option value="{{ $u->u_name }}" {{ (old('dg_unit') == $u->u_name) ? 'selected' : (($data->dg_unit == $u->u_name) ? 'selected' : '' ) }}>{{ $u->u_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('dg_unit'))
                                            <div class="text-danger">
                                                {{ session()->get('dg_unit') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="dg_received_date">Tanggal Terima</label>
                                        <input type="date" name="dg_received_date" id="dg_received_date" class="form-control text-center" value="{{ (old('dg_received_date')) ? old('dg_received_date') : $data->dg_received_date }}">
                                        @if ($errors->has('dg_received_date'))
                                            <div class="text-danger">
                                                {{ $errors->first('dg_received_date') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dg_expired_date">Tanggal Expried</label>
                                        <input type="date" name="dg_expired_date" id="dg_expired_date" class="form-control text-center" value="{{ (old('dg_expired_date')) ? old('dg_expired_date') : $data->dg_expired_date }}">
                                        @if ($errors->has('dg_expired_date'))
                                            <div class="text-danger">
                                                {{ $errors->first('dg_expired_date') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="dg_price">Harga Beli</label>
                                <input type="text" name="dg_price" id="dg_price" value="{{ (old('dg_price')) ? old('dg_price') : $data->dg_price }}" class="form-control text-right" style="font-size: 32pt;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            </div>
                            <div class="form-group">
                                <label for="dg_sell">Harga Jual</label>
                                <input type="text" name="dg_sell" id="dg_sell" value="{{ (old('dg_sell')) ? old('dg_sell') : $data->dg_sell }}" class="form-control text-right" style="font-size: 32pt;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
