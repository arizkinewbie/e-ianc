<?php
    $bulan  = [];

    foreach ($graph as $g) {
        if ($g->sanca_uk == '0 Minggu') {
            $setbulan = 1;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 1;
        } elseif ($g->sanca_uk == '1 Minggu') {
            $setbulan = 1;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 1;
        } elseif ($g->sanca_uk == '2 Minggu') {
            $setbulan = 1;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 1;
        } elseif ($g->sanca_uk == '3 Minggu') {
            $setbulan = 1;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 1;
        } elseif ($g->sanca_uk == '4 Minggu') {
            $setbulan = 1;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 1;
        } elseif ($g->sanca_uk == '5 Minggu') {
            $setbulan = 2;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 2;
        } elseif ($g->sanca_uk == '6 Minggu') {
            $setbulan = 2;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 2;
        } elseif ($g->sanca_uk == '7 Minggu') {
            $setbulan = 2;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 2;
        } elseif ($g->sanca_uk == '8 Minggu') {
            $setbulan = 2;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 2;
        } elseif ($g->sanca_uk == '9 Minggu') {
            $setbulan = 3;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 3;
        } elseif ($g->sanca_uk == '10 Minggu') {
            $setbulan = 3;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 3;
        } elseif ($g->sanca_uk == '11 Minggu') {
            $setbulan = 3;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 3;
        } elseif ($g->sanca_uk == '12 Minggu') {
            $setbulan = 3;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 3;
        } elseif ($g->sanca_uk == '13 Minggu') {
            $setbulan = 4;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 4;
        } elseif ($g->sanca_uk == '14 Minggu') {
            $setbulan = 4;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 5;
        } elseif ($g->sanca_uk == '15 Minggu') {
            $setbulan = 4;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 6;
        } elseif ($g->sanca_uk == '16 Minggu') {
            $setbulan = 4;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 7;
        } elseif ($g->sanca_uk == '17 Minggu') {
            $setbulan = 5;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 8;
        } elseif ($g->sanca_uk == '18 Minggu') {
            $setbulan = 5;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 9;
        } elseif ($g->sanca_uk == '19 Minggu') {
            $setbulan = 5;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 10;
        } elseif ($g->sanca_uk == '20 Minggu') {
            $setbulan = 5;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 11;
        } elseif ($g->sanca_uk == '21 Minggu') {
            $setbulan = 6;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 12;
        } elseif ($g->sanca_uk == '22 Minggu') {
            $setbulan = 6;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 13;
        } elseif ($g->sanca_uk == '23 Minggu') {
            $setbulan = 6;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 14;
        } elseif ($g->sanca_uk == '24 Minggu') {
            $setbulan = 6;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 15;
        } elseif ($g->sanca_uk == '25 Minggu') {
            $setbulan = 7;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 16;
        } elseif ($g->sanca_uk == '26 Minggu') {
            $setbulan = 7;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 17;
        } elseif ($g->sanca_uk == '27 Minggu') {
            $setbulan = 7;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 18;
        } elseif ($g->sanca_uk == '28 Minggu') {
            $setbulan = 7;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 19;
        } elseif ($g->sanca_uk == '29 Minggu') {
            $setbulan = 8;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 20;
        } elseif ($g->sanca_uk == '30 Minggu') {
            $setbulan = 8;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 21;
        } elseif ($g->sanca_uk == '31 Minggu') {
            $setbulan = 8;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 22;
        } elseif ($g->sanca_uk == '32 Minggu') {
            $setbulan = 8;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 23;
        } elseif ($g->sanca_uk == '33 Minggu') {
            $setbulan = 9;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 24;
        } elseif ($g->sanca_uk == '34 Minggu') {
            $setbulan = 9;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 25;
        } elseif ($g->sanca_uk == '35 Minggu') {
            $setbulan = 9;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 26;
        } elseif ($g->sanca_uk == '36 Minggu') {
            $setbulan = 9;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 27;
        } elseif ($g->sanca_uk == '37 Minggu') {
            $setbulan = 10;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 28;
        } elseif ($g->sanca_uk == '38 Minggu') {
            $setbulan = 10;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 29;
        } elseif ($g->sanca_uk == '39 Minggu') {
            $setbulan = 10;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 30;
        } elseif ($g->sanca_uk == '40 Minggu') {
            $setbulan = 10;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 31;
        } elseif ($g->sanca_uk == '41 Minggu') {
            $setbulan = 11;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 32;
        } else {
            $setbulan = 11;
            $setup = (float)$g->sancpe_weight_now - (float)$g->sancpe_weight;
            $setkali = 33;
        }

        if ($g->sancpe_imt < 18) {
            $bb = 0.51 * $setkali;
        } elseif ($g->sancpe_imt > 18 || $g->sancpe_imt < 25) {
            $bb = 0.42 * $setkali;
        } elseif ($g->sancpe_imt > 25 || $g->sancpe_imt < 30) {
            $bb = 0.28 * $setkali;
        } else {
            $bb = 0.22 * $setkali;
        }

        $bulan[] = array(
            'setbulan' => $setbulan,
            'setup' => $setup,
            'bbnow' => (float)$g->sancpe_weight_now,
            'bb' => $bb,
            'imt' => $g->sancpe_imt,
            'uk' => $g->sanca_uk,
            'no' => $g->sancd_no,
        );
    }

    // $implo = implode(',', $bulan);

    // print_r(explode(',', $bulan[0]));
    // print_r($bulan[0]['setbulan']);
?>

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

<script>
    function validat() {
        var visit = document.forms["formreg"]["sancd_visit"];
        var type = document.forms["formreg"]["sancd_type"];

        if (visit.selectedIndex < 1) {
            alert("Kunjungan belum dipilih.");
            visit.focus();
            return false;
        }

        if (type.selectedIndex < 1) {
            alert("Type belum dipilih.");
            type.focus();
            return false;
        }

        return true;
    }

</script>
@endsection

<style>
    .rotate {
        -ms-writing-mode: tb-rl;
        -webkit-writing-mode: vertical-rl;
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        white-space: nowrap;
        text-align: center;
    }

</style>

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('service.anc', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Kunjungan ANC</h1>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-xl">
        <i class="fas fa-female"></i>&nbsp;&nbsp;Kohort
    </button>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Tambah
    </button>
</div>
@endsection

@section('content')
<div class="row mb-5">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h6>
                    <b>Kenaikan Berat Badan Ibu Hamil</b>
                </h6>
            </div>
            <div class="card-body">
                <table width="100%" style="background-color: white;">
                    <tbody>
                        <tr>
                            <td class="rotate text-center" rowspan="20" style="font-size: 18pt; font-weight:bold;">Kenaikan BB (Kg)</td>
                            <td class="text-center" width="10%">20</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 20 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">19</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 19 && floor($bulan[$i]['setup']) < 20 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">18</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 18 && floor($bulan[$i]['setup']) < 19 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">17</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 17 && floor($bulan[$i]['setup']) < 18 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">16</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 16 && floor($bulan[$i]['setup']) < 17 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">15</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 15 && floor($bulan[$i]['setup']) < 16 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">14</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 14 && floor($bulan[$i]['setup']) < 15 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">13</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 13 && floor($bulan[$i]['setup']) < 14 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">12</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 12 && floor($bulan[$i]['setup']) < 13 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">11</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 11 && floor($bulan[$i]['setup']) < 12 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">10</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 10 && floor($bulan[$i]['setup']) < 11 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 9 && floor($bulan[$i]['setup']) < 10 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 8 && floor($bulan[$i]['setup']) < 9 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 7 && floor($bulan[$i]['setup']) < 8 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 6 && floor($bulan[$i]['setup']) < 7 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 5 && floor($bulan[$i]['setup']) < 6 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 4 && floor($bulan[$i]['setup']) < 5 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 3 && floor($bulan[$i]['setup']) < 4 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) >= 2 && floor($bulan[$i]['setup']) < 3 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            @for ($x = 1; $x < 11; $x++)
                                <td class="text-center" style="background-color: {{ ($x< 4) ? '#fd74ff' : (($x < 7) ? '#ffde71' : '#89ffa4') }};">
                                    @for ($i = 0; $i < count($bulan); $i++)
                                        @if (floor($bulan[$i]['setup']) < 2 && $bulan[$i]['setbulan'] == $x)
                                            @if ($bulan[$i]['imt'] < 18)
                                                <img src="{{ asset('data/image/graph/red.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 18 || $bulan[$i]['imt'] < 25)
                                                <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @elseif ($bulan[$i]['imt'] > 25 || $bulan[$i]['imt'] < 30)
                                                <img src="{{ asset('data/image/graph/blue.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @else
                                                <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Kunj {{ $bulan[$i]['no'] }}, bb : {{ $bulan[$i]['bbnow'] }} Kg, naik : {{ $bulan[$i]['setup'] }} Kg, Imt : {{ $bulan[$i]['imt'] }}">
                                            @endif
                                        @endif
                                    @endfor
                                </td>
                            @endfor
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-right"><b>Bulan Kehamilan</b></td>
                            @for ($i = 1; $i < 11; $i++)
                                <td class="text-center" width="8%" style="background-color: {{ ($i < 4) ? '#fd74ff' : (($i < 7) ? '#ffde71' : '#89ffa4') }}; color: black;"><b>{{ $i }}</b></td>
                            @endfor
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right"><b>Trimester</b></td>
                            <td colspan="3" class="text-center" style="background-color: #fd74ff; color: black"><b>I</b></td>
                            <td colspan="3" class="text-center" style="background-color: #ffde71; color: black"><b>II</b></td>
                            <td colspan="4" class="text-center" style="background-color: #89ffa4; color: black"><b>III</b></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td class="text-center" colspan="10" style="background-color: #69a5ff; color: white; font-size: 16pt;"><b>Usia Kehamilan</b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="20%" class="text-center">Kunj</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($graph as $g)
                    <tr>
                        <td class="text-center">{{ $g->sancd_no }}</td>
                        <td>
                            Berat Badan : <b>{{ $g->sancpe_weight_now }} Kg</b>
                            <br>
                            Kenaikan BB : <b>{{ (float)$g->sancpe_weight_now - (float)$g->sancpe_weight }} Kg</b>
                            <br>
                            <?php
                                    if ($g->sancpe_imt < 18) {
                                        $bb = 0.51;
                                        $setstatus = 'Berat Badan Kurang (12.5 - 18 Kg)';
                                        $setcolor = 'text-danger';
                                    } elseif ($g->sancpe_imt > 18 || $g->sancpe_imt < 25) {
                                        $bb = 0.42;
                                        $setstatus = 'Normal (11.5 - 16 Kg)';
                                        $setcolor = 'text-success';
                                    } elseif ($g->sancpe_imt > 25 || $g->sancpe_imt < 30) {
                                        $bb = 0.28;
                                        $setstatus = 'Berat Badan Berlebih (7 - 11.5 Kg)';
                                        $setcolor = 'text-primary';
                                    } else {
                                        $bb = 0.22;
                                        $setstatus = 'Obesitas (5 - 9 Kg)';
                                        $setcolor = 'text-warning';
                                    }

                                    if ($g->sanca_uk == '1 Minggu' || $g->sanca_uk == '2 Minggu' || $g->sanca_uk == '3 Minggu' || $g->sanca_uk == '4 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 2);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } elseif ($g->sanca_uk == '5 Minggu' || $g->sanca_uk == '6 Minggu' || $g->sanca_uk == '7 Minggu' || $g->sanca_uk == '8 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 3);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } elseif ($g->sanca_uk == '9 Minggu' || $g->sanca_uk == '10 Minggu' || $g->sanca_uk == '11 Minggu' || $g->sanca_uk == '12 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 7);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } elseif ($g->sanca_uk == '13 Minggu' || $g->sanca_uk == '14 Minggu' || $g->sanca_uk == '15 Minggu' || $g->sanca_uk == '16 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 11);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } elseif ($g->sanca_uk == '17 Minggu' || $g->sanca_uk == '18 Minggu' || $g->sanca_uk == '19 Minggu' || $g->sanca_uk == '20 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 15);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } elseif ($g->sanca_uk == '21 Minggu' || $g->sanca_uk == '22 Minggu' || $g->sanca_uk == '23 Minggu' || $g->sanca_uk == '24 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 19);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } elseif ($g->sanca_uk == '25 Minggu' || $g->sanca_uk == '26 Minggu' || $g->sanca_uk == '27 Minggu' || $g->sanca_uk == '28 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 23);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } elseif ($g->sanca_uk == '29 Minggu' || $g->sanca_uk == '30 Minggu' || $g->sanca_uk == '31 Minggu' || $g->sanca_uk == '32 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 27);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } elseif ($g->sanca_uk == '33 Minggu' || $g->sanca_uk == '34 Minggu' || $g->sanca_uk == '35 Minggu' || $g->sanca_uk == '36 Minggu') {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 31);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    } else {
                                        $rbb = (float)$g->sancpe_weight + ($bb * 35);
                                        $saranbb = $rbb . " (" . ($rbb - (float)$g->sancpe_weight_now) . ")";
                                    }
                                ?>

                            IMT Pra-Hamil : <b class="{{ $setcolor }}">{{ $setstatus }}</b>
                            {{-- <br>
                            Min BB Kunj Berikutnya : <b class="text-danger">{{ $saranbb }} Kg</b> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($data as $d)
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <h5>
                            <b>
                                {{ ($d->sancd_type == '0') ? 'ANC' : (($d->sancd_type == '1') ? 'PERSALINAN' : ((($d->sancd_type == '2') ? 'NIFAS OBSERVASI' : 'NIFAS KONTROL'))) }}
                            </b>
                        </h5>
                        <h1>
                            <b>
                                {{ $d->sancd_no }}
                            </b>
                        </h1>
                    </div>
                    <div class="col-md-8">
                        @php
                        $pasien = DB::table('eianc_patients')->where('pat_norm', $d->sancd_norm)->get();
                        @endphp

                        <h5>Ibu Hamil
                            <b>
                                {{ $pasien[0]->pat_name }}
                            </b>
                        </h5>
                    </div>
                    <div class="col-md-2 text-center">
                        <?php
                            $par0 = DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id');

                            $par1 = DB::table('users')->where('id', $d->sancd_user_id)
                                        ->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')
                                        ->value('temoi_ins_id');

                            if ($par0 == $par1) {
                                $isdis = '';
                            } else {
                                $isdis = 'isDisabled';
                            }
                        ?>

                        @if ($d->sancd_type == '0')
                        <a
                            href="{{ route('service.anc.anc', ['id' => $id, 'anc' => $anc, 'det' => Crypt::encrypt($d->sancd_id)]) }}" class="{{ $isdis }}">
                            <button class="btn btn-warning">
                                Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                            </button>
                        </a>
                        @elseif ($d->sancd_type == '1')
                        <a
                            href="{{ route('service.anc.marr', ['id' => $id, 'anc' => $anc, 'det' => Crypt::encrypt($d->sancd_id)]) }}" class="{{ $isdis }}">
                            <button class="btn btn-warning">
                                Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                            </button>
                        </a>
                        @elseif ($d->sancd_type == '2')
                        <a
                            href="{{ route('service.anc.no', ['id' => $id, 'anc' => $anc, 'det' => Crypt::encrypt($d->sancd_id)]) }}" class="{{ $isdis }}">
                            <button class="btn btn-warning">
                                Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                            </button>
                        </a>
                        @else
                        <a
                            href="{{ route('service.anc.con', ['id' => $id, 'anc' => $anc, 'det' => Crypt::encrypt($d->sancd_id)]) }}" class="{{ $isdis }}">
                            <button class="btn btn-warning">
                                Proses&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
                            </button>
                        </a>
                        @endif
                        <br>
                        &nbsp;&nbsp;&nbsp;
                        @if ($d->sancd_type == '2' || $d->sancd_type == '3')
                        <form action="{{ route('service.anc.d.destroy') }}" method="post" style="display: {{ (DB::table('users')->where('id', $d->sancd_user_id)->value('id') != auth()->user()->id || auth()->user()->role != 0) ? 'none' : 'block' }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $d->sancd_id }}" readonly>
                            <input type="hidden" name="type" value="{{ $d->sancd_type }}" readonly>
                            <button class="btn btn-danger btn-lg" title="delete" onclick="return confirm('Are you sure you want to delete this data?');">
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('service.anc.d.store') }}" method="post" autocomplete="off" name="formreg"
                onsubmit="return validat();">
                @csrf
                <input type="hidden" name="norm" value="{{ $id }}">
                <input type="hidden" name="id" value="{{ $anc }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sancd_visit">Kedatangan Pasien berdasarkan?</label>
                        <select name="sancd_visit" id="sancd_visit" class="form-control select2">
                            <option value="">-- PILIH --</option>
                            @foreach ($svis as $v)
                            <option value="{{ $v->spv_id }}" {{ (old('sancd_visit') == $v->spv_id) ? 'selected' : '' }}>
                                {{ $v->spv_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sancd_type">Kedatangan Pasien berdasarkan?</label>
                        <select name="sancd_type" id="sancd_type" class="form-control select2">
                            <option value="">-- PILIH --</option>
                            <option value="0" {{ (old('sancd_type') == '0') ? 'selected' : '' }}>ANC</option>
                            <option value="1" {{ (old('sancd_type') == '1') ? 'selected' : '' }}>PERSALINAN</option>
                            <option value="2" {{ (old('sancd_type') == '2') ? 'selected' : '' }}>NIFAS OBSERVASI</option>
                            <option value="3" {{ (old('sancd_type') == '3') ? 'selected' : '' }}>NIFAS KONTROL</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (count($hisanc) > 0)
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kohort Ibu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr class="text-center" style="background-color: pink;">
                        <td width="20%">No Rekam Medik</td>
                        <td>Nama</td>
                        <td>Suami</td>
                        <td>Tanggal Lahir</td>
                        <td>Jenis Kelamin</td>
                    </tr>
                    <tr class="text-center">
                        <td><b>{{ $patient[0]->pat_norm }}</b></td>
                        <td><b>{{ $patient[0]->pat_name }}</b></td>
                        <td><b>{{ $patient[0]->pat_husband }}</b></td>
                        <td><b>{{ date('d-m-Y', strtotime($patient[0]->pat_dob)) }}</b></td>
                        <td><b>{{ ($patient[0]->pat_sex == 1) ? 'Laki-laki' : 'Perempuan' }}</b></td>
                    </tr>
                    <tr class="text-center" style="background-color: pink;">
                        <td colspan="4">Alamat</td>
                        <td>No. Telp/Wa</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="4">
                            <b>
                                {{ $patient[0]->pat_address }}, RT.{{ $patient[0]->pat_rt }}, RW.{{ $patient[0]->pat_rw }},
                                {{ DB::table('sys_alamats')->where('kode', $patient[0]->pat_village)->value('nama') }},
                                {{ DB::table('sys_alamats')->where('kode', $patient[0]->pat_subdistrict)->value('nama') }},
                                {{ DB::table('sys_alamats')->where('kode', $patient[0]->pat_district)->value('nama') }},
                                {{ DB::table('sys_alamats')->where('kode', $patient[0]->pat_province)->value('nama') }}
                            </b>
                        </td>
                        <td><b>{{ $patient[0]->pat_telp }}</b></td>
                    </tr>
                </table>
                <table class="table table-bordered mt-3">
                    <tr class="text-center" style="background-color: pink;">
                        <td colspan="6"><b>Riwayat ANC</b></td>
                    </tr>
                    <tr class="text-center" style="background-color: pink;">
                        <td>BB/TB/IMT/LILA</td>
                        <td>Status Imunisasi</td>
                        <td>HPHT</td>
                        <td>HPL</td>
                        <td>GPA</td>
                        <td>Jarak Hamil</td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>{{ $hisanc[0]->sancpe_weight }} / {{ $hisanc[0]->sancpe_height }} / {{ $hisanc[0]->sancpe_imt }} / {{ $hisanc[0]->sancpe_arm }}</b></td>
                        <td class="text-center"><b>{{ DB::table('selec_tts')->where('tt_id', $hisanc[0]->sancpe_tt)->value('tt_name') }}</b></td>
                        <td class="text-center"><b>{{ date('d-m-Y', strtotime($hisanc[0]->sanc_hpht)) }}</b></td>
                        <td class="text-center"><b>{{ date('d-m-Y', strtotime($hisanc[0]->sanc_hpl)) }}</b></td>
                        <td class="text-center"><b>G : {{ $hisanc[0]->sanc_gravida }}, P : {{ $hisanc[0]->sanc_aborsi }}, A : {{ $hisanc[0]->sanc_partus }}</b></td>
                        <td class="text-center"><b>{{ DB::table('selec_preg_des')->where('pd_id', $hisanc[0]->sanc_distance_pregnancy)->value('pd_name') }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            @foreach ($hisanc as $hs)
                                <b>ANC {{ $hs->sancd_no }}</b> -
                                {{ DB::table('users')->where('id', $hs->sancd_user_id)->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')->value('ins_name') }};
                                {{ DB::table('users')->where('id', $hs->sancd_user_id)->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')->value('nakes_name') }};
                                {{ $hs->sanca_uk }};
                                Trimester {{ $hs->sanca_trimester }};
                                Naik {{ ($hs->sancpe_weight_now - $hs->sancpe_weight) }} Kg;
                                Keluhan : {{ $hs->sanca_complaint }};
                                Obat : (
                                    @php
                                        $fobat = DB::table('eianc_service_anc_treatment_recipes')->where('sanctr_t_id', $hs->sanct_id)->get();
                                    @endphp

                                    @foreach ($fobat as $fo)
                                        {{ DB::table('eianc_drugs')->where('dg_id', $fo->sanctr_drug_id)->value('dg_brand') . '(' . $fo->sanctr_dosis . '), ' }}
                                    @endforeach
                                );
                                Risk : {{ ($hs->sancr_score < 3) ? 'KRR' : (($hs->sancr_score < 11) ? 'KRT' : 'KRST') }};
                                {{ (DB::table('eianc_desposisis')->where('des_reg_no', $hs->sancr_no_reg)->value('des_de_id') == 1) ? 'Pulang' : 'Rujuk : ' . DB::table('eianc_desposisis')->where('des_reg_no', $hs->sancr_no_reg)->value('des_des_ins') . '-' . DB::table('eianc_desposisis')->where('des_reg_no', $hs->sancr_no_reg)->value('des_des_unit') }}
                            @endforeach
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered mt-3">
                    <tr class="text-center">
                        <td colspan="6" style="background-color: pink;"><b>Perencanaan Persalinan dan Pencegahan Komplikasi (P4K) - Menuju Persalinan Aman dan Selamat</b></td>
                    </tr>
                    <tr class="text-center" style="background-color: pink;">
                        <td>Taksiran Persalinan</td>
                        <td>Penolong</td>
                        <td>Tempat Persalinan</td>
                        <td>Pendamping Persalinan</td>
                        <td>Transportasi Persalinan</td>
                        <td>Calon Pendonor Darah</td>
                    </tr>
                    <tr class="text-center">
                        <td><b>{{ date('d-m-Y', strtotime($kie[0]->sanc_hpl)) }}</b></td>
                        <td><b>{{ DB::table('selec_prag_asses')->where('pa_id', $kie[0]->sanckie_mat_ass)->value('pa_name') }}</b></td>
                        <td><b>{{ DB::table('selec_prag_places')->where('pl_id', $kie[0]->sanckie_mat_place)->value('pl_name') }}</b></td>
                        <td><b>{{ DB::table('selec_prag_assis_withs')->where('paw_id', $kie[0]->sanckie_assis)->value('paw_name') }}</b></td>
                        <td><b>{{ DB::table('selec_prag_trans')->where('pt_id', $kie[0]->sanckie_trans)->value('pt_name') }}</b></td>
                        <td><b>{{ DB::table('selec_prag_blood_asses')->where('pda_id', $kie[0]->sanckie_blood_bank)->value('pda_name') }}</b></td>
                    </tr>
                </table>
                <table class="table table-bordered mt-3">
                    <tr class="text-center" style="background-color: pink;">
                        <td colspan="8"><b>Riwayat Persalinan Dan Nifas</b></td>
                    </tr>
                    <tr class="text-center" style="background-color: pink;">
                        <td>Penolong</td>
                        <td>Kelahiran (H/M)</td>
                        <td>Metode</td>
                        <td>Berat Bayi Lahir</td>
                        <td>Panjang Bayi Lahir</td>
                        <td>Ibu Nifas (1 - 3 Hari)</td>
                        <td>Ibu Nifas (4 - 28 Hari)</td>
                        <td>Ibu Nifas (29 - 42 Hari)</td>
                    </tr>
                    @foreach ($persalinan as $per)
                    <tr class="text-center">
                        <td>
                            <b>{{ DB::table('users')->where('id', $per->sancm_user_id)->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')->value('nakes_name') }}</b>
                            <br>
                            {{ DB::table('users')->where('id', $per->sancm_user_id)->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')->value('ins_name') }}
                        </td>
                        <td><b>{{ ($per->sancmskl_cond == '0') ? 'Meninggal' : 'Hidup' }}</b></td>
                        <td><b>{{ DB::table('selec_preg_withs')->where('pw_id', DB::table('eianc_service_marritals')->where('sancm_id', $per->sancmskl_marr_id)->value('sancm_met_marr'))->value('pw_name') }}</b></td>
                        <td><b>{{ $per->sancmskl_weight }} gram</b></td>
                        <td><b>{{ $per->sancmskl_height }} cm</b></td>
                        <td class="text-left">
                            <?php
                                $nifas0 = DB::table('eianc_service_anc_details')
                                                ->where('sancd_anc_id', $per->sanc_id)
                                                ->where('sancd_type', '2')
                                                ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                ->get();
                            ?>

                            @foreach ($nifas0 as $n0)
                                Kunj : <b>{{ $n0->sancd_no }}</b>; Hari : {{ $n0->sancno_day }} Jam {{ $n0->sancno_time }}; Tensi : {{ $n0->sancno_tensi }}; Nadi : {{ $n0->sancno_nadi }}; Suhu : {{ $n0->sancno_suhu }} C; Kesimpulan : {{ $n0->sancno_other }}
                            @endforeach
                        </td>
                        <td class="text-left">
                            <?php
                                $nifas1 = DB::table('eianc_service_anc_details')
                                                ->where('sancd_anc_id', $per->sanc_id)
                                                ->where('sancd_type', '3')
                                                ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                ->whereBetween('sancnc_date', [date('Y-m-d', strtotime($per->sancm_date. ' + 3 days')), date('Y-m-d', strtotime($per->sancm_date. ' + 27 days'))])
                                                ->get();
                            ?>

                            @foreach ($nifas1 as $n0)
                                Kunj : <b>{{ $n0->sancd_no }}</b>; {{ $n0->sancnc_keluhan }}; {{ $n0->sancnc_diagnosis }}; {{ $n0->sancnc_tindakan }}; Kesimpulan : {{ $n0->sancno_other }}
                            @endforeach
                        </td>
                        <td class="text-left">
                            <?php
                                $nifas2 = DB::table('eianc_service_anc_details')
                                                ->where('sancd_anc_id', $per->sanc_id)
                                                ->where('sancd_type', '3')
                                                ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                ->whereBetween('sancnc_date', [date('Y-m-d', strtotime($per->sancm_date. ' + 28 days')), date('Y-m-d', strtotime($per->sancm_date. ' + 41 days'))])
                                                ->get();
                            ?>

                            @foreach ($nifas2 as $n0)
                                Kunj : <b>{{ $n0->sancd_no }}</b>; {{ $n0->sancnc_keluhan }}; {{ $n0->sancnc_diagnosis }}; {{ $n0->sancnc_tindakan }}; Kesimpulan : {{ $n0->sancno_other }}
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
