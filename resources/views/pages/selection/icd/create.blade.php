@extends('layouts/main')

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('sel.icd') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah ICD</h1>
</div>
@endsection

@section('content')
<form action="{{ route('sel.icd.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if (count($data) < 1)
                        <div class="form-group">
                            <label for="icd_code">Code ICD</label>
                            <input type="text" name="icd_code" id="icd_code" class="form-control" value="{{ old('icd_code') }}">
                            @if ($errors->has('icd_code'))
                                <div class="text-danger">
                                    {{ $errors->first('icd_code') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="icd_name">Code ICD</label>
                            <textarea name="icd_name" id="icd_name" cols="30" rows="5" class="form-control">{{ old('icd_name') }}</textarea>
                            @if ($errors->has('icd_name'))
                                <div class="text-danger">
                                    {{ $errors->first('icd_name') }}
                                </div>
                            @endif
                        </div>
                    @else
                        <input type="hidden" name="id" value="{{ $data[0]->icd_id }}">
                        <div class="form-group">
                            <label for="icd_code">Code ICD</label>
                            <input type="text" name="icd_code" id="icd_code" class="form-control" value="{{ (old('icd_code')) ? old('icd_code') : $data[0]->icd_code }}">
                            @if ($errors->has('icd_code'))
                                <div class="text-danger">
                                    {{ $errors->first('icd_code') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="icd_name">Code ICD</label>
                            <textarea name="icd_name" id="icd_name" cols="30" rows="5" class="form-control">{{ (old('icd_name')) ? old('icd_name') : $data[0]->icd_name }}</textarea>
                            @if ($errors->has('icd_name'))
                                <div class="text-danger">
                                    {{ $errors->first('icd_name') }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
