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
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('kb') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Edit Alat Kontrasepsi</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <form action="{{ route('kb.update') }}" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="id" value="{{ $data->kb_id }}">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="kb_kbt_id">Tipe Alat Kontrasepsi</label>
                            </div>
                            <div class="col-md-8">
                                <select name="kb_kbt_id" id="kb_kbt_id" class="form-control select2">
                                    <option value="">-- PILIH TYPE KONTRASEPSI --</option>
                                    @foreach ($type as $t)
                                        <option value="{{ $t->kbt_id }}" {{ ($t->kbt_id == old('kb_kbt_id')) ? 'selected' : (($data->kb_kbt_id == $t->kbt_id) ? 'selected' : '') }}>{{ $t->kbt_name}}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('kb_kbt_id'))
                                    <div class="text-danger">
                                        {{ session()->get('kb_kbt_id') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="kb_brand">Merk Alat Kontrasepsi</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="kb_brand" id="kb_brand" class="form-control" value="{{ (old('kb_brand')) ? old('kb_brand') : $data->kb_brand }}">
                                @if ($errors->has('kb_brand'))
                                    <div class="text-danger">
                                        {{ $errors->first('kb_brand') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="kb_batch">Kode Produksi Alat Kontrasepsi</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="kb_batch" id="kb_batch" class="form-control" value="{{ (old('kb_batch')) ? old('kb_batch') : $data->kb_batch }}">
                                @if ($errors->has('kb_batch'))
                                    <div class="text-danger">
                                        {{ $errors->first('kb_batch') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="kb_netto">Jumlah Alat Kontrasepsi</label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="kb_netto" id="kb_netto" value="{{ (old('kb_netto')) ? old('kb_netto') : $data->kb_netto }}" class="form-control text-right" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        @if ($errors->has('kb_netto'))
                                            <div class="text-danger">
                                                {{ $errors->first('kb_netto') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <select name="kb_unit" class="form-control select2">
                                            <option value="">PILIH JUMLAH</option>
                                            @foreach ($unit as $u)
                                                <option value="{{ $u->u_name }}" {{ (old('kb_unit') == $u->u_name) ? 'selected' : (($u->u_name == $data->kb_unit) ? 'selected' : '') }}>{{ $u->u_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('kb_unit'))
                                            <div class="text-danger">
                                                {{ session()->get('kb_unit') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="kb_received_date">Tanggal Terima</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="kb_received_date" id="kb_received_date" class="form-control text-center" value="{{ (old('kb_received_date')) ? old('kb_received_date') : $data->kb_received_date }}">
                                        @if ($errors->has('kb_received_date'))
                                            <div class="text-danger">
                                                {{ $errors->first('kb_received_date') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="kb_expired_date">Tanggal Expried</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="kb_expired_date" id="kb_expired_date" class="form-control text-center" value="{{ (old('kb_expired_date')) ? old('kb_expired_date') : $data->kb_expired_date }}">
                                        @if ($errors->has('kb_expired_date'))
                                            <div class="text-danger">
                                                {{ $errors->first('kb_expired_date') }}
                                            </div>
                                        @endif
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
    </div>
</div>
@endsection
