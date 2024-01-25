@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content-headers')
<div class="col-sm-6">
    <h1>Dashboard</h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    @php
                        echo count(DB::table('eianc_patients')
                        ->join('users', 'users.id', '=', 'eianc_patients.pat_user_id')
                        ->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')
                        ->where('temoi_id', auth()->user()->temoi)
                        ->get());
                    @endphp
                </h3>

                <p>Pasien</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
        </div>
    </div>
</div>
<div class="text-center" style="margin-top: 50px;">
    <img src="{{ asset('data/image/about/logo.png') }}" alt="" width="256">
    <div class="mt-5"></div>
    <h3><b>SELAMAT DATANG</b></h3>
    <h4>Electronic Integrated Antenatal Care Indonesia</h4>
</div>
@endsection
