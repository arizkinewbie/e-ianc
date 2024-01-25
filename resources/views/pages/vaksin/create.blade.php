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
    <h1>Tambah Vaksin</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('vaksin.store') }}" method="post" autocomplete="off">
        @csrf
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
                                        <option value="{{ $ic->ibi_id }}" {{ ($ic->ibi_id == old('vak_ib_id')) ? 'selected' : '' }}>{{ $ic->ibi_brand . '-' . $ic->ibi_source_year }}</option>
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
                                        <option value="{{ $tv->va_id }}" {{ ($tv->va_id == old('vak_type')) ? 'selected' : '' }}>{{ $tv->va_name}}</option>
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
                                <input type="text" name="vak_brand" id="vak_brand" class="form-control" value="{{ old('vak_brand') }}">
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
                                <input type="text" name="vak_batch" id="vak_batch" class="form-control" value="{{ old('vak_batch') }}">
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
                                <input type="date" name="vak_received_date" id="vak_received_date" class="form-control text-center" value="{{ old('vak_received_date') }}">
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
                                <input type="date" name="vak_expired_date" id="vak_expired_date" class="form-control text-center" value="{{ old('vak_expired_date') }}">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="vak_netto" id="vak_netto" class="form-control text-right" value="{{ old('vak_netto') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vak_unit" value="ml" id="flexRadioDefault1" {{ (old('vak_unit') == 'ml') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                ml
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vak_unit" value="Tetes" id="flexRadioDefault2" {{ (old('vak_unit') == 'tetes') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tetes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vak_unit" value="pcs" id="flexRadioDefault3" {{ (old('vak_unit') == 'pcs') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Pcs
                                            </label>
                                        </div>
                                        @if ($errors->has('vak_unit'))
                                            <div class="text-danger">
                                                {{ $errors->first('vak_unit') }}
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
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
