@extends('layouts.main')

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('iceboxid') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Edit Kulkas</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <form action="{{ route('iceboxid.update') }}" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="id" value="{{ $data->ibi_id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="ibi_brand">Kulkas Merk</label>
                        <input type="text" name="ibi_brand" id="ibi_brand" class="form-control"
                            value="{{ (old('ibi_brand')) ? old('ibi_brand') : $data->ibi_brand }}">
                        @if ($errors->has('ibi_brand'))
                        <div class="text-danger">
                            {{ $errors->first('ibi_brand') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ibi_series">Kulkas Seri</label>
                        <input type="text" name="ibi_series" id="ibi_series" class="form-control"
                            value="{{ (old('ibi_series')) ? old('ibi_series') : $data->ibi_series }}">
                        @if ($errors->has('ibi_series'))
                        <div class="text-danger">
                            {{ $errors->first('ibi_series') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ibi_source">Kulkas Sumber Pengadaan</label>
                        <input type="text" name="ibi_source" id="ibi_source" class="form-control"
                            value="{{ (old('ibi_source')) ? old('ibi_source') : $data->ibi_source }}">
                        @if ($errors->has('ibi_source'))
                        <div class="text-danger">
                            {{ $errors->first('ibi_source') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ibi_source_year">Kulkas Tahun Pengadaan</label>
                        <input type="text" name="ibi_source_year" id="ibi_source_year" class="form-control"
                            value="{{ (old('ibi_source_year')) ? old('ibi_source_year') : $data->ibi_source_year }}">
                        @if ($errors->has('ibi_source_year'))
                        <div class="text-danger">
                            {{ $errors->first('ibi_source_year') }}
                        </div>
                        @endif
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
