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
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('sel.sig') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Signature</h1>
</div>
@endsection

@section('content')
<form action="{{ route('sel.sig.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="row">
                        @if (empty($data))
                            <div class="col-md-4">
                                <label for="type">Jenis Jabatan</label>
                                <select name="type" id="type" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($sel as $sel)
                                        <option value="{{ $sel->ssig_id }}" {{ (old('type') == $sel->ssig_id) ? 'selected' : '' }}>{{ $sel->ssig_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('type'))
                                    <div class="text-danger">
                                        {{ session()->get('type') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <label for="nakes">Tenaga Medis</label>
                                <select name="nakes" id="nakes" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($nakes as $n)
                                        <option value="{{ $n->nakes_id }}" {{ (old('nakes') == $n->nakes_id) ? 'selected' : '' }}>{{ $n->nakes_name . ' - ' . $n->nakes_sip }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('nakes'))
                                    <div class="text-danger">
                                        {{ session()->get('nakes') }}
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="col-md-4">
                                <label for="type">Jenis Jabatan</label>
                                <select name="type" id="type" class="form-control select2" disabled>
                                    <option value="">-- PILIH --</option>
                                    @foreach ($sel as $sel)
                                        <option value="{{ $sel->ssig_id }}" {{ (old('type') == $sel->ssig_id) ? 'selected' : (($data->sig_type == $sel->ssig_id) ? 'selected' : '') }}>{{ $sel->ssig_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('type'))
                                    <div class="text-danger">
                                        {{ session()->get('type') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <label for="nakes">Tenaga Medis</label>
                                <select name="nakes" id="nakes" class="form-control select2">
                                    <option value="">-- PILIH --</option>
                                    @foreach ($nakes as $n)
                                        <option value="{{ $n->nakes_id }}" {{ (old('nakes') == $n->nakes_id) ? 'selected' : (($data->sig_nakes == $n->nakes_id) ? 'selected' : '') }}>{{ $n->nakes_name . ' - ' . $n->nakes_sip }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('nakes'))
                                    <div class="text-danger">
                                        {{ session()->get('nakes') }}
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
