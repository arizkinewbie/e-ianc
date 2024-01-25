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
    <a href="{{ route('baby') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Bayi Balita</h1>
</div>
@endsection

@section('content')
<form action="{{ route('baby.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="detb_year">Tahun</label>
                    <select name="detb_year" id="detb_year" class="form-control select2">
                        <option value="x">-- PILIH TAHUN --</option>
                        @for ($i = 0; $i < 10; $i++)
                            <option value="{{ date('Y') + $i }}" {{ ((date('Y') + $i) == old('detb_year')) ? 'selected' : '' }}>{{ date('Y') + $i }}</option>
                        @endfor
                    </select>
                    @if(session()->has('detb_year'))
                        <div class="text-danger">
                            {{ session()->get('detb_year') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="detb_month">Bulan</label>
                    <select name="detb_month" id="detb_month" class="form-control select2">
                        <option value="x">-- PILIH BULAN --</option>
                        @foreach ($month as $mon)
                            <option value="{{ $mon->mon_id }}" {{ (old('detb_month') == $mon->mon_id) ? 'selected' : '' }}>{{ $mon->mon_name }}</option>
                        @endforeach
                    </select>
                    @if(session()->has('detb_month'))
                        <div class="text-danger">
                            {{ session()->get('detb_month') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="detb_destination">RW</label>
                    <select name="detb_destination" id="detb_destination" class="form-control select2">
                        <option value="x">-- PILIH RW --</option>
                        @for ($i = 1; $i < 100; $i++)
                            <option value="{{ sprintf("%03s", ($i)) }}" {{ (sprintf("%03s", ($i)) == old('detb_destination')) ? 'selected' : '' }}>{{ sprintf("%03s", ($i)) }}</option>
                        @endfor
                    </select>
                    @if(session()->has('detb_destination'))
                        <div class="text-danger">
                            {{ session()->get('detb_destination') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <b>BAYI</b>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_by_pneunomia">Pneunomia</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_by_pneunomia" id="detb_by_pneunomia" class="form-control text-center" value="{{ old('detb_by_pneunomia') }}">
                                @if ($errors->has('detb_by_pneunomia'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_by_pneunomia') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_by_diare">Diare</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_by_diare" id="detb_by_diare" class="form-control text-center" value="{{ old('detb_by_diare') }}">
                                @if ($errors->has('detb_by_diare'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_by_diare') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_by_tetanus_neonatorum">Neonatorum</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_by_tetanus_neonatorum" id="detb_by_tetanus_neonatorum" class="form-control text-center" value="{{ old('detb_by_tetanus_neonatorum') }}">
                                @if ($errors->has('detb_by_tetanus_neonatorum'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_by_tetanus_neonatorum') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_by_kel_sal_cerna">Keluhan Saluran Pencernaan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_by_kel_sal_cerna" id="detb_by_kel_sal_cerna" class="form-control text-center" value="{{ old('detb_by_kel_sal_cerna') }}">
                                @if ($errors->has('detb_by_kel_sal_cerna'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_by_kel_sal_cerna') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_by_kelainan_saraf">Kelainan Saraf</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_by_kelainan_saraf" id="detb_by_kelainan_saraf" class="form-control text-center" value="{{ old('detb_by_kelainan_saraf') }}">
                                @if ($errors->has('detb_by_kelainan_saraf'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_by_kelainan_saraf') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_by_kelainan_kongenital">Kelainan Kongenital</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_by_kelainan_kongenital" id="detb_by_kelainan_kongenital" class="form-control text-center" value="{{ old('detb_by_kelainan_kongenital') }}">
                                @if ($errors->has('detb_by_kelainan_kongenital'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_by_kelainan_kongenital') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_by_other">Lainnya</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_by_other" id="detb_by_other" class="form-control text-center" value="{{ old('detb_by_other') }}">
                                @if ($errors->has('detb_by_other'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_by_other') }}
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
                        <b>BALITA</b>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_bl_ispa">ISPA</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_bl_ispa" id="detb_bl_ispa" class="form-control text-center" value="{{ old('detb_bl_ispa') }}">
                                @if ($errors->has('detb_bl_ispa'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_bl_ispa') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_bl_diare">Diare</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_bl_diare" id="detb_bl_diare" class="form-control text-center" value="{{ old('detb_bl_diare') }}">
                                @if ($errors->has('detb_bl_diare'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_bl_diare') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_bl_malaria">Malaria</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_bl_malaria" id="detb_bl_malaria" class="form-control text-center" value="{{ old('detb_bl_malaria') }}">
                                @if ($errors->has('detb_bl_malaria'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_bl_malaria') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_bl_dbd">DBD</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_bl_dbd" id="detb_bl_dbd" class="form-control text-center" value="{{ old('detb_bl_dbd') }}">
                                @if ($errors->has('detb_bl_dbd'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_bl_dbd') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_bl_typus">Typus</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_bl_typus" id="detb_bl_typus" class="form-control text-center" value="{{ old('detb_bl_typus') }}">
                                @if ($errors->has('detb_bl_typus'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_bl_typus') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_bl_kel_sal_cerna">Kelainan Suluran Pencernaan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_bl_kel_sal_cerna" id="detb_bl_kel_sal_cerna" class="form-control text-center" value="{{ old('detb_bl_kel_sal_cerna') }}">
                                @if ($errors->has('detb_bl_kel_sal_cerna'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_bl_kel_sal_cerna') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="detb_bl_other">Lainnya</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="detb_bl_other" id="detb_bl_other" class="form-control text-center" value="{{ old('detb_bl_other') }}">
                                @if ($errors->has('detb_bl_other'))
                                    <div class="text-danger">
                                        {{ $errors->first('detb_bl_other') }}
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
