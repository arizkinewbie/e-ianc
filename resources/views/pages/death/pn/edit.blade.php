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
    <a href="{{ route('pn') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah PN</h1>
</div>
@endsection

@section('content')
<form action="{{ route('pn.update') }}" method="post" autocomplete="off">
    @csrf
    <input type="hidden" name="id" value="{{ $data->det_pn_id }}">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center"><b>PERINATAL</b></div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_p_bblr">BBLR</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_p_bblr" id="det_p_bblr" class="form-control text-center" value="{{ (old('det_p_bblr')) ? old('det_p_bblr') : $data->det_p_bblr }}">
                                @if ($errors->has('det_p_bblr'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_p_bblr') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_p_asfiksia">Asfiksia</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_p_asfiksia" id="det_p_asfiksia" class="form-control text-center" value="{{ (old('det_p_asfiksia')) ? old('det_p_asfiksia') : $data->det_p_asfiksia }}">
                                @if ($errors->has('det_p_asfiksia'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_p_asfiksia') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_p_tetanus_neonatorum">Tetanus Neonatorum</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_p_tetanus_neonatorum" id="det_p_tetanus_neonatorum" class="form-control text-center" value="{{ (old('det_p_tetanus_neonatorum')) ? old('det_p_tetanus_neonatorum') : $data->det_p_tetanus_neonatorum }}">
                                @if ($errors->has('det_p_tetanus_neonatorum'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_p_tetanus_neonatorum') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_p_sepsis">Sepsis</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_p_sepsis" id="det_p_sepsis" class="form-control text-center" value="{{ (old('det_p_sepsis')) ? old('det_p_sepsis') : $data->det_p_sepsis }}">
                                @if ($errors->has('det_p_sepsis'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_p_sepsis') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_p_iketrus">Iketrus</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_p_iketrus" id="det_p_iketrus" class="form-control text-center" value="{{ (old('det_p_iketrus')) ? old('det_p_iketrus') : $data->det_p_iketrus }}">
                                @if ($errors->has('det_p_iketrus'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_p_iketrus') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_p_kel_kongenital">Kelainan Kongenital</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_p_kel_kongenital" id="det_p_kel_kongenital" class="form-control text-center" value="{{ (old('det_p_kel_kongenital')) ? old('det_p_kel_kongenital') : $data->det_p_kel_kongenital }}">
                                @if ($errors->has('det_p_kel_kongenital'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_p_kel_kongenital') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_p_other">Lainnya</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_p_other" id="det_p_other" class="form-control text-center" value="{{ (old('det_p_other')) ? old('det_p_other') : $data->det_p_other }}">
                                @if ($errors->has('det_p_other'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_p_other') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <b>NEONATAL</b>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_n_bblr">BBLR</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_n_bblr" id="det_n_bblr" class="form-control text-center" value="{{ (old('det_n_bblr')) ? old('det_n_bblr') : $data->det_n_bblr }}">
                                @if ($errors->has('det_n_bblr'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_n_bblr') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_n_asfiksia">Asfiksia</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_n_asfiksia" id="det_n_asfiksia" class="form-control text-center" value="{{ (old('det_n_asfiksia')) ? old('det_n_asfiksia') : $data->det_n_asfiksia }}">
                                @if ($errors->has('det_n_asfiksia'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_n_asfiksia') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_n_tetanus_neonatorum">Tetanus Neonatorum</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_n_tetanus_neonatorum" id="det_n_tetanus_neonatorum" class="form-control text-center" value="{{ (old('det_n_tetanus_neonatorum')) ? old('det_n_tetanus_neonatorum') : $data->det_n_tetanus_neonatorum }}">
                                @if ($errors->has('det_n_tetanus_neonatorum'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_n_tetanus_neonatorum') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_n_sepsis">Sepsis</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_n_sepsis" id="det_n_sepsis" class="form-control text-center" value="{{ (old('det_n_sepsis')) ? old('det_n_sepsis') : $data->det_n_sepsis }}">
                                @if ($errors->has('det_n_sepsis'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_n_sepsis') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_n_iketrus">Iketrus</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_n_iketrus" id="det_n_iketrus" class="form-control text-center" value="{{ (old('det_n_iketrus')) ? old('det_n_iketrus') : $data->det_n_iketrus }}">
                                @if ($errors->has('det_n_iketrus'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_n_iketrus') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_n_kel_kongenital">Kelainan Kongenital</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_n_kel_kongenital" id="det_n_kel_kongenital" class="form-control text-center" value="{{ (old('det_n_kel_kongenital')) ? old('det_n_kel_kongenital') : $data->det_n_kel_kongenital }}">
                                @if ($errors->has('det_n_kel_kongenital'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_n_kel_kongenital') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="det_n_other">Lainnya</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="det_n_other" id="det_n_other" class="form-control text-center" value="{{ (old('det_n_other')) ? old('det_n_other') : $data->det_n_other }}">
                                @if ($errors->has('det_n_other'))
                                    <div class="text-danger">
                                        {{ $errors->first('det_n_other') }}
                                    </div>
                                @endif
                            </div>
                        </div>
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
