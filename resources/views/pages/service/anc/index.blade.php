@extends('layouts/main')

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('service', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Layanan ANC</h1>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="{{ route('service.anc.create', $id) }}">
        <button class="btn btn-primary">
            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Tambah
        </button>
    </a>
</div>
@endsection

@section('content')
@foreach ($data as $d)
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <h4>
                            <b>
                                GRAVIDA
                            </b>
                        </h4>
                        <h4 style="font-size: 64pt; font-weight:bold; color: red;">
                            {{ $d->sanc_gravida }}
                        </h4>
                    </div>
                    <div class="col-md-8" style="font-size: 14pt;">
                        HPHT : <b>{{ $d->sanc_hpht }}</b>
                        <br>
                        HPL : <i><b>{{ $d->sanc_hpl }}</b></i>
                        <hr>
                        Ibu Hamil : <b>{{ DB::table('eianc_patients')->where('pat_norm', Crypt::decrypt($id))->value('pat_name') }}</b>
                        <br>
                        Nakes Pembuat ANC : <b>{{ DB::table('users')->where('id', $d->sanc_user_id)->value('name') }}</b>
                    </div>
                    <div class="col-md-2 text-center">
                        <?php
                            $par0 = DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id');

                            $par1 = DB::table('users')->where('id', $d->sanc_user_id)
                                        ->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')
                                        ->value('temoi_ins_id');

                            if ($par0 == $par1) {
                                $isdis = '';
                                $disa = '';
                            } else {
                                $isdis = 'isDisabled';
                                $disa = 'disabled';
                            }
                        ?>

                        <a href="{{ route('service.anc.d', ['id' => $id, 'anc' => Crypt::encrypt($d->sanc_id)]) }}">
                            <button class="btn btn-success btn-lg btn-block">
                                <i class="fas fa-swatchbook"></i>
                            </button>
                        </a>
                        <hr>
                        <a href="{{ route('service.anc.edit', ['id' => $id, 'anc' => Crypt::encrypt($d->sanc_id)]) }}" class="{{ $isdis }}">
                            <button class="btn btn-warning btn-lg" title="edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        @if (auth()->user()->role == '0')
                        &nbsp;&nbsp;&nbsp;
                        <form action="{{ route('service.anc.destroy') }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ Crypt::encrypt($d->sanc_id) }}">
                            <button class="btn btn-danger btn-lg" title="delete" onclick="return confirm('Are you sure you want to delete this data?');" {{ $disa }}>
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
