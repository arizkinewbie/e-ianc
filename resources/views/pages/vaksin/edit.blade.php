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
    <a href="{{ route('vaksin') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Edit Vaksin</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('vaksin.update') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $data->vak_id }}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="vak_ib_id">Simpan Kulkas</label>
                            </div>
                            <div class="col-md-8">
                                <select name="vak_ib_id" id="vak_ib_id" class="form-control select2">
                                    <option value="">-- PILIH KULKAS --</option>
                                    @foreach ($ic as $ic)
                                        <option value="{{ $ic->ibi_id }}" {{ ($ic->ibi_id == old('vak_ib_id')) ? 'selected' : (($ic->ibi_id == $data->vak_ib_id) ? 'selected' : '') }}>{{ $ic->ibi_brand . '-' . $ic->ibi_source_year }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('vak_ib_id'))
                                    <div class="text-danger">
                                        {{ session()->get('vak_ib_id') }}
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
                                <label for="vak_type">Jenis Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <select name="vak_type" id="vak_type" class="form-control select2">
                                    <option value="">-- PILIH JENIS VAKSIN --</option>
                                    @foreach ($tvak as $tv)
                                        <option value="{{ $tv->va_id }}" {{ ($tv->va_id == old('vak_type')) ? 'selected' : (($tv->va_id == $data->vak_type) ? 'selected' : '') }}>{{ $tv->va_name}}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('vak_type'))
                                    <div class="text-danger">
                                        {{ session()->get('vak_type') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="vak_brand">Merk Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="vak_brand" id="vak_brand" class="form-control" value="{{ (old('vak_brand')) ? old('vak_brand') : $data->vak_brand }}">
                                @if ($errors->has('vak_brand'))
                                    <div class="text-danger">
                                        {{ $errors->first('vak_brand') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="vak_batch">Batch Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="vak_batch" id="vak_batch" class="form-control" value="{{ (old('vak_batch')) ? old('vak_batch') : $data->vak_batch }}">
                                @if ($errors->has('vak_batch'))
                                    <div class="text-danger">
                                        {{ $errors->first('vak_batch') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="vak_received_date">Tanggal Menerima Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="vak_received_date" id="vak_received_date" class="form-control text-center" value="{{ (old('vak_received_date')) ? old('vak_received_date') : $data->vak_received_date }}">
                                @if ($errors->has('vak_received_date'))
                                    <div class="text-danger">
                                        {{ $errors->first('vak_received_date') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="vak_expired_date">Tanggal Kadaluarsa Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="vak_expired_date" id="vak_expired_date" class="form-control text-center" value="{{ (old('vak_expired_date')) ? old('vak_expired_date') : $data->vak_expired_date }}">
                                @if ($errors->has('vak_expired_date'))
                                    <div class="text-danger">
                                        {{ $errors->first('vak_expired_date') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="vak_netto">Netto Vaksin</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" name="vak_netto" id="vak_netto" class="form-control text-right" value="{{ (old('vak_netto')) ? old('vak_netto') : $data->vak_netto }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <span class="input-group-text">ml</span>
                                </div>
                                @if ($errors->has('vak_netto'))
                                    <div class="text-danger">
                                        {{ $errors->first('vak_netto') }}
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
@endsection
