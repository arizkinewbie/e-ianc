@extends('layouts.main')

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('icebox') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Edit Harian Kulkas</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('icebox.update') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $data->ib_id }}">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ib_date">Tanggal</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="ib_date" id="ib_date" class="form-control" value="{{ (old('ib_date')) ? old('ib_date') : $data->ib_date }}">
                                @if ($errors->has('ib_date'))
                                <div class="text-danger">
                                    {{ $errors->first('ib_date') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ib_ibi_id">Kulkas</label>
                            </div>
                            <div class="col-md-8">
                                <select name="ib_ibi_id" id="ib_ibi_id" class="form-control">
                                    <option value="">-- PILIH KULKAS --</option>
                                    @foreach ($kulkas as $k)
                                        <option value="{{ $k->ibi_id }}" {{ ($k->ibi_id == $data->ib_ibi_id) ? 'selected' : '' }}>{{ $k->ibi_brand . ' - ' . $k->ibi_source_year }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('ib_ibi_id'))
                                <div class="text-danger">
                                    {{ session()->get('ib_ibi_id') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body">
                        <div class="text-center">
                            <img src="{{ asset('data/image/content/morning.png') }}" alt="" width="64">
                            <h3>SUHU PAGI</h3>
                        </div>
                        <input type="text" name="ib_morning" id="ib_morning" value="{{ (old('ib_morning')) ? old('ib_morning') : $data->ib_morning }}" class="form-control text-center" style="font-size: 32pt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        @if ($errors->has('ib_morning'))
                        <div class="text-danger">
                            {{ $errors->first('ib_morning') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body">
                        <div class="text-center">
                            <img src="{{ asset('data/image/content/afternoon.png') }}" alt="" width="64">
                            <h3>SUHU SORE</h3>
                        </div>
                        <input type="text" name="ib_afternoon" id="ib_afternoon" value="{{ (old('ib_afternoon')) ? old('ib_afternoon') : $data->ib_afternoon }}" class="form-control text-center" style="font-size: 32pt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        @if ($errors->has('ib_afternoon'))
                        <div class="text-danger">
                            {{ $errors->first('ib_afternoon') }}
                        </div>
                        @endif
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
