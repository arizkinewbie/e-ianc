@extends('layouts/main')

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('patient') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Layanan Pasien</h1>
</div>
@endsection

@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    No Pasien
                </div>
                <div class="col-md-8">
                    <b>{{ $data[0]->pat_norm }}</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Nama Pasien
                </div>
                <div class="col-md-8">
                    <b>{{ $data[0]->pat_name }}</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Tanggal Lahir
                </div>
                <div class="col-md-8">
                    <b>{{ $data[0]->pat_pob . ' | ' . $data[0]->pat_dob }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    Alamat
                </div>
                <div class="col-md-8">
                    <b>
                        @php
                            echo $data[0]->pat_address . ', ' .
                            $data[0]->pat_rt . ', ' .
                            $data[0]->pat_rw . ', ' .
                            DB::table('sys_alamats')->where('kode', $data[0]->pat_village)->value('nama') . ',' .
                            DB::table('sys_alamats')->where('kode', $data[0]->pat_subdistrict)->value('nama') . ',' .
                            DB::table('sys_alamats')->where('kode', $data[0]->pat_district)->value('nama') . ','
                            ;
                        @endphp
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Ibu Kandung
                </div>
                <div class="col-md-8">
                    <b>{{ $data[0]->pat_biological_mother }}</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Umur
                </div>
                <div class="col-md-8">
                    <b>{{ date('Y') - date('Y', strtotime($data[0]->pat_dob)) }} Tahun</b>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-body">
    <div class="text-danger">
        Silahkan pilih menu dibawah ini untuk melanjutkan pelayanan kepada pasien.
    </div>
    <div class="mt-3">
        <div class="row justify-content-center">
            @if ($data[0]->pat_sex == 2)
            <div class="col-md-4">
                <a href="{{ route('service.anc', $id) }}">
                    <button class="btn btn-warning btn-lg btn-block mt-3">
                        ANC
                    </button>
                </a>
            </div>
            @endif
            <div class="col-md-4">
                <a href="{{ route('service.vaksin', $id) }}">
                    <button class="btn btn-success btn-lg btn-block mt-3">
                        IMUNISASI
                    </button>
                </a>
                <a href="{{ route('service.kb', $id) }}">
                    <button class="btn btn-success btn-lg btn-block mt-3">
                        KELUARGA BERENCANA
                    </button>
                </a>
                {{-- <a href="{{ route('service.neo', $id) }}" class="{{ (date('Y') - date('Y', strtotime($data[0]->pat_dob)) > 5) ? 'isDisabled' : '' }}"> --}}
                <a href="{{ route('service.neo', $id) }}">
                    <button class="btn btn-success btn-lg btn-block mt-3">
                        BAYI
                    </button>
                </a>
                {{-- <a href="{{ route('service.baby', $id) }}" class="{{ (date('Y') - date('Y', strtotime($data[0]->pat_dob)) < 5) ? 'isDisabled' : ((date('Y') - date('Y', strtotime($data[0]->pat_dob)) >= 20) ? 'isDisabled' : '') }}"> --}}
                <a href="{{ route('service.baby', $id) }}">
                    <button class="btn btn-success btn-lg btn-block mt-3">
                        ANAK
                    </button>
                </a>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <a href="{{ route('service.desposisi', $id) }}">
                <button class="btn btn-primary btn-lg">HISTORY RUJUKAN</button>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            {{-- <a href="{{ route('service.gr', $id) }}" class="{{ (date('Y') - date('Y', strtotime($data[0]->pat_dob)) > 20) ? 'isDisabled' : '' }}"> --}}
            <a href="{{ route('service.gr', $id) }}">
                <button class="btn btn-info btn-lg">GRAFIK PERTUMBUHAN</button>
            </a>
        </div>
    </div>
</div>
@endsection
