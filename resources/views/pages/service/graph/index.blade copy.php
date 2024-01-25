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
    {{-- <h1>Tambah & Edit Layanan KB</h1> --}}
</div>
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

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Grafik Berat Badan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h4><b>Grafik Berat Badan 0 - 2 Tahun</b></h4>
                    <table width="100%" style="background-color: white;" border="0">
                        <tbody>
                            <tr>
                                <td class="rotate text-center" rowspan="18" style="font-size: 18pt; font-weight:bold;">Kenaikan BB (Kg)</td>
                                <td class="text-center" width="3%" style="background-color: pink">18</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 17 && floor($tb28[$x]['neo28_weigth']/1000) <= 18 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 17 && floor($tb02[$y]['neobb_nut_weight']) <= 18) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">17</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 16 && floor($tb28[$x]['neo28_weigth']/1000) <= 17 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 16 && floor($tb02[$y]['neobb_nut_weight']) <= 17) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">16</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 15 && floor($tb28[$x]['neo28_weigth']/1000) <= 16 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 15 && floor($tb02[$y]['neobb_nut_weight']) <= 16) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">15</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 14 && floor($tb28[$x]['neo28_weigth']/1000) <= 15 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 14 && floor($tb02[$y]['neobb_nut_weight']) <= 15) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">14</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 13 && floor($tb28[$x]['neo28_weigth']/1000) <= 14 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 13 && floor($tb02[$y]['neobb_nut_weight']) <= 14) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">13</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 12 && floor($tb28[$x]['neo28_weigth']/1000) <= 13 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 12 && floor($tb02[$y]['neobb_nut_weight']) <= 13) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">12</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 23)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 12 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 24)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 12.25 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 11 && floor($tb28[$x]['neo28_weigth']/1000) <= 12 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 11 && floor($tb02[$y]['neobb_nut_weight']) <= 12) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">11</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 18)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 11 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 19)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 11.18 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 20)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 11.35 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 21)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 11.54 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 22)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 11.75 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 22)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 11 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 23)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 11.25 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 24)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 11.5 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 10 && floor($tb28[$x]['neo28_weigth']/1000) <= 11 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 10 && floor($tb02[$y]['neobb_nut_weight']) <= 11) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">10</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 14)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10.2 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 15)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10.4 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 16)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10.6 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 17)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10.8 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 18)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10.25 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 19)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10.5 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 20)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10.7 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 21)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 10.9 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 9 && floor($tb28[$x]['neo28_weigth']/1000) <= 10 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 9 && floor($tb02[$y]['neobb_nut_weight']) <= 10) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">9</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 9)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 10)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9.25 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 11)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9.5 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 12)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9.75 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 13)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9.90 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9.25 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 14)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9.5 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 15)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9.70 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 16)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 9.80 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 8 && floor($tb28[$x]['neo28_weigth']/1000) <= 9 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 8 && floor($tb02[$y]['neobb_nut_weight']) <= 9) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">8</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 6)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 8 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 7)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 8.25 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 8)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 8.75 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 8 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 9)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 8.15 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 10)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 8.5 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 11)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 8.75 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 7 && floor($tb28[$x]['neo28_weigth']/1000) <= 8 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 7 && floor($tb02[$y]['neobb_nut_weight']) <= 8) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">7</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 4)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 7 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 5)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 7.5 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 7 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 6)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 7.25 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 7)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 7.75 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 6 && floor($tb28[$x]['neo28_weigth']/1000) <= 7 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 6 && floor($tb02[$y]['neobb_nut_weight']) <= 7) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">6</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 3)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 6.5 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 4)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 6.5 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 5 && floor($tb28[$x]['neo28_weigth']/1000) <= 6 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 5 && floor($tb02[$y]['neobb_nut_weight']) <= 6) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">5</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 2)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 5.5 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 5.25 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 3)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 5.8 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 4 && floor($tb28[$x]['neo28_weigth']/1000) <= 5 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 4 && floor($tb02[$y]['neobb_nut_weight']) <= 5) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">4</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 1)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 4.5 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 4.25 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 3 && floor($tb28[$x]['neo28_weigth']/1000) <= 4 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 3 && floor($tb02[$y]['neobb_nut_weight']) <= 4) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">3</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 0)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 3.5 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 3.25 Kg">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 2 && floor($tb28[$x]['neo28_weigth']/1000) <= 3 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 2 && floor($tb02[$y]['neobb_nut_weight']) <= 3) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">2</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000)> 1 && floor($tb28[$x]['neo28_weigth']/1000) <= 2 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']) > 1 && floor($tb02[$y]['neobb_nut_weight']) <= 2) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">1</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if (floor($tb28[$x]['neo28_weigth']/1000) <=1 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, BB : {{ $tb28[$x]['neo28_weigth']/1000 }} Kg">
                                        @endif
                                        @endfor

                                        @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && floor($tb02[$y]['neobb_nut_weight']/1000) <= 1) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                                @endif
                                                @endfor
                                                </td>
                                                @endfor
                            </tr>
                            <tr>
                                <td class="text-right" colspan="2" style="background-color: rgb(255, 211, 130)">Umur (Bulan)</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" width="3.5%" style="background-color: rgb(255, 211, 130)"><b>{{ $i }}</b></td>
                                    @endfor
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <b>Keterangan : </b>
                        <br>
                        <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16"> : Data Berat Badan Pasien
                        <br>
                        <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16"> : Anjuran Berat Badan WHO
                    </div>
                </div>
                <div class="carousel-item">
                    <h4><b>Grafik Berat Badan 2 - 20 Tahun</b></h4>
                    <table width="100%" style="background-color: white;" border="0">
                        <tbody>
                            <tr>
                                <td class="rotate text-center" rowspan="20" style="font-size: 18pt; font-weight:bold;">Kenaikan BB (Kg)</td>
                                <td class="text-center" width="3%" style="background-color: pink">105</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 100 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 105) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">100</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 95 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 100) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">95</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 90 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 95) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">90</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 85 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 90) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">85</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 80 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 85) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">80</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 75 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 80) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">75</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 20)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 70.5 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 70 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 75) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">70</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 18)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 67 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 19)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 69 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 65 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 70) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">65</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 16)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 61 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 17)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 64.5 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 60 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 65) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">60</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 15)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 56 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 18)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 56 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 19)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 57.2 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 20)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 58 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 55 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 60) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">55</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 14)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 51 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 15)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 52 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 16)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 54 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 17)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 55 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 50 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 55) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">50</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 13)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 46 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 14)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 49.5 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 45 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 50) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">45</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 12)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 41.5 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 13)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 45 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 40 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 45) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">40</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 11)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 36 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 37 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 12)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 40 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 35 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 40) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">35</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 10)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 32 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 33 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 30 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 35) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">30</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 8)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 25.5 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 25.5 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 9)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 27.5 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 27.5 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 25 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 30) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">25</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 6)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 20.5 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 7)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 23 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 22.5 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 20 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 25) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">20</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 4)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 16 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 16 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 5)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 18 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 18 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 6)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 20 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 15 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 20) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">15</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 2)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 13 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 12 Kg">
                                    @endif
                                    @endif

                                    @if ($i == 3)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 14 Kg">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran BB : 14 Kg">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) > 10 && floor($tb02[$y]['neobb_nut_weight']/1000) <= 15) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" width="3%" style="background-color: pink">10</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && floor($tb02[$y]['neobb_nut_weight']/1000) <= 10) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, BB : {{ $tb02[$y]['neobb_nut_weight']/1000 }} Kg">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-right" colspan="2" style="background-color: rgb(255, 211, 130)">Umur (Tahun)</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" width="4.5%" style="background-color: rgb(255, 211, 130)"><b>{{ $i }}</b></td>
                                    @endfor
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <b>Keterangan : </b>
                        <br>
                        <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16"> : Data Berat Badan Pasien
                        <br>
                        <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16"> : Anjuran Berat Badan WHO
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Grafik Tinggi Badan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h4><b>Grafik Tinggi Badan 0 - 2 Tahun</b></h4>
                    <table width="100%" style="background-color: white;" border="0">
                        <tbody>
                            <tr>
                                <td class="rotate text-center" rowspan="11" style="font-size: 18pt; font-weight:bold;">Kenaikan TB (cm)</td>
                                <td class="text-center" width="3%" style="background-color: pink">95</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 90 && $tb28[$x]['neo28_height'] <= 95 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 90 && $tb02[$y]['neobb_nut_height'] <= 95) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">90</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 22)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 86 cm">
                                    @endif
                                    @endif

                                    @if ($i == 23)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 87 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 85.5 cm">
                                    @endif
                                    @endif

                                    @if ($i == 24)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 88 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 86.5 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 85 && $tb28[$x]['neo28_height'] <= 90 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 85 && $tb02[$y]['neobb_nut_height'] <= 90) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">85</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 17)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 81 cm">
                                    @endif
                                    @endif

                                    @if ($i == 18)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 82 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 81 cm">
                                    @endif
                                    @endif

                                    @if ($i == 19)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 83 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 82 cm">
                                    @endif
                                    @endif

                                    @if ($i == 20)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 84 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 83 cm">
                                    @endif
                                    @endif

                                    @if ($i == 21)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 85 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 84 cm">
                                    @endif
                                    @endif

                                    @if ($i == 22)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 85 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 80 && $tb28[$x]['neo28_height'] <= 85 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 80 && $tb02[$y]['neobb_nut_height'] <= 85) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">80</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 12)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 76 cm">
                                    @endif
                                    @endif

                                    @if ($i == 13)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 77 cm">
                                    @endif
                                    @endif

                                    @if ($i == 14)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 78 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 76.5 cm">
                                    @endif
                                    @endif

                                    @if ($i == 15)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 79 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 77.5 cm">
                                    @endif
                                    @endif

                                    @if ($i == 16)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 80 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 78.5 cm">
                                    @endif
                                    @endif

                                    @if ($i == 17)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 80 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 75 && $tb28[$x]['neo28_height'] <= 80 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 75 && $tb02[$y]['neobb_nut_height'] <= 80) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">75</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 8)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 71 cm">
                                    @endif
                                    @endif

                                    @if ($i == 9)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 72 cm">
                                    @endif
                                    @endif

                                    @if ($i == 10)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 73 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 71 cm">
                                    @endif
                                    @endif

                                    @if ($i == 11)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 74.5 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 73 cm">
                                    @endif
                                    @endif

                                    @if ($i == 12)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 74 cm">
                                    @endif
                                    @endif

                                    @if ($i == 13)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 75 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 70 && $tb28[$x]['neo28_height'] <= 75 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 70 && $tb02[$y]['neobb_nut_height'] <= 75) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">70</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 5)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 66 cm">
                                    @endif
                                    @endif

                                    @if ($i == 6)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 68 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 66 cm">
                                    @endif
                                    @endif

                                    @if ($i == 7)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 69 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 67 cm">
                                    @endif
                                    @endif

                                    @if ($i == 8)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 69 cm">
                                    @endif
                                    @endif

                                    @if ($i == 9)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 70 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 65 && $tb28[$x]['neo28_height'] <= 70 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 65 && $tb02[$y]['neobb_nut_height'] <= 70) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">65</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 3)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 62 cm">
                                    @endif
                                    @endif

                                    @if ($i == 4)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 64 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 62 cm">
                                    @endif
                                    @endif

                                    @if ($i == 5)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 64 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 60 && $tb28[$x]['neo28_height'] <= 65 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 60 && $tb02[$y]['neobb_nut_height'] <= 65) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">60</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 2)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 58 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 57 cm">
                                    @endif
                                    @endif

                                    @if ($i == 3)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 60 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 55 && $tb28[$x]['neo28_height'] <= 60 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 55 && $tb02[$y]['neobb_nut_height'] <= 60) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">55</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 1)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 55 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 54 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 50 && $tb28[$x]['neo28_height'] <= 55 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 50 && $tb02[$y]['neobb_nut_height'] <= 55) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">50</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 0)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 50 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 49 cm">
                                    @endif
                                    @endif

                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height']> 45 && $tb28[$x]['neo28_height'] <= 50 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                            @endif
                                            @endfor

                                            @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] > 45 && $tb02[$y]['neobb_nut_height'] <= 50) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">45</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($x = 0; $x < count($tb28); $x++) @if ($tb28[$x]['neo28_height'] <=45 && $i==0) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb28[$x]['neo28_date'] }}, TB : {{ $tb28[$x]['neo28_height'] }} cm">
                                        @endif
                                        @endfor

                                        @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " months")) && $tb02[$y]['neobb_nut_height'] <= 45) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                                @endif
                                                @endfor
                                                </td>
                                                @endfor
                            </tr>
                            <tr>
                                <td class="text-right" colspan="2" style="background-color: rgb(255, 211, 130)">Umur (Bulan)</td>
                                @for ($i = 0; $i < 25; $i++) <td class="text-center" width="3.5%" style="background-color: rgb(255, 211, 130)"><b>{{ $i }}</b></td>
                                    @endfor
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <b>Keterangan : </b>
                        <br>
                        <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16"> : Data Tinggi Badan Pasien
                        <br>
                        <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16"> : Anjuran Tinggi Badan WHO
                    </div>
                </div>
                <div class="carousel-item">
                    <h4><b>Grafik Tinggi Badan 2 - 20 Tahun</b></h4>
                    <table width="100%" style="background-color: white;" border="0">
                        <tbody>
                            <tr>
                                <td class="rotate text-center" rowspan="23" style="font-size: 18pt; font-weight:bold;">Kenaikan TB (cm)</td>
                                <td class="text-center" width="3%" style="background-color: pink">190</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 185 && $tb02[$y]['neobb_nut_height'] <= 190) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">185</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 180 && $tb02[$y]['neobb_nut_height'] <= 185) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">180</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 18)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 176 cm">
                                    @endif
                                    @endif

                                    @if ($i == 19)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 176.5 cm">
                                    @endif
                                    @endif

                                    @if ($i == 20)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 177 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 175 && $tb02[$y]['neobb_nut_height'] <= 180) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">175</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 16)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 173 cm">
                                    @endif
                                    @endif

                                    @if ($i == 17)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 175 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 170 && $tb02[$y]['neobb_nut_height'] <= 175) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">170</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 15)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 170 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 165 && $tb02[$y]['neobb_nut_height'] <= 170) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">165</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 14)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 164 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 160.5 cm">
                                    @endif
                                    @endif

                                    @if ($i == 15)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 162 cm">
                                    @endif
                                    @endif

                                    @if ($i == 16)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 162.5 cm">
                                    @endif
                                    @endif

                                    @if ($i == 17)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 163 cm">
                                    @endif
                                    @endif

                                    @if ($i == 18)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 163 cm">
                                    @endif
                                    @endif

                                    @if ($i == 19)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 163 cm">
                                    @endif
                                    @endif

                                    @if ($i == 20)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 163 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 160 && $tb02[$y]['neobb_nut_height'] <= 165) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">160</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 13)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 156 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 157 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 155 && $tb02[$y]['neobb_nut_height'] <= 160) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">155</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 12)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 151 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 150 && $tb02[$y]['neobb_nut_height'] <= 155) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">150</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 12)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 149 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 145 && $tb02[$y]['neobb_nut_height'] <= 150) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">145</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 11)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 143.5 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 144 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 140 && $tb02[$y]['neobb_nut_height'] <= 145) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">140</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 10)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 138 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 138 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 135 && $tb02[$y]['neobb_nut_height'] <= 140) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">135</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 9)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 133 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 133 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 130 && $tb02[$y]['neobb_nut_height'] <= 135) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">130</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 8)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 128 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 128 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 125 && $tb02[$y]['neobb_nut_height'] <= 130) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">125</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 7)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 121 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 121 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 120 && $tb02[$y]['neobb_nut_height'] <= 125) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">120</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 115 && $tb02[$y]['neobb_nut_height'] <= 120) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">115</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 6)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 115 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 115 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 110 && $tb02[$y]['neobb_nut_height'] <= 115) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">110</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 5)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 109 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 108 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 105 && $tb02[$y]['neobb_nut_height'] <= 110) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">105</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 4)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 103 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 101 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 100 && $tb02[$y]['neobb_nut_height'] <= 105) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">100</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 95 && $tb02[$y]['neobb_nut_height'] <= 100) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">95</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 3)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 95 cm">
                                    @else
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 94 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 90 && $tb02[$y]['neobb_nut_height'] <= 95) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">90</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 2)
                                    @if ($pas[0]->pat_sex == 1)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 86 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 85 && $tb02[$y]['neobb_nut_height'] <= 90) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">85</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @if ($i == 2)
                                    @if ($pas[0]->pat_sex == 2)
                                    <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16" title="Saran TB : 85 cm">
                                    @endif
                                    @endif

                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] > 80 && $tb02[$y]['neobb_nut_height'] <= 85) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-center" style="background-color: pink">80</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" style="background-color: rgb(163, 255, 255);">
                                    @for ($y = 0; $y < count($tb02); $y++) @if (date('Y-m-d', strtotime($tb02[$y]['neobb_date']))>= date('Y-m-d', strtotime($pas[0]['pat_dob'] . "+" . $i . " years")) && $tb02[$y]['neobb_nut_height'] <= 80) <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16" title="Tgl : {{ $tb02[$y]['neobb_date'] }}, TB : {{ $tb02[$y]['neobb_nut_height'] }} cm">
                                            @endif
                                            @endfor
                                            </td>
                                            @endfor
                            </tr>
                            <tr>
                                <td class="text-right" colspan="2" style="background-color: rgb(255, 211, 130)">Umur (Tahun)</td>
                                @for ($i = 2; $i < 21; $i++) <td class="text-center" width="4.5%" style="background-color: rgb(255, 211, 130)"><b>{{ $i }}</b></td>
                                    @endfor
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <b>Keterangan : </b>
                        <br>
                        <img src="{{ asset('data/image/graph/green.png') }}" alt="" width="16"> : Data Tinggi Badan Pasien
                        <br>
                        <img src="{{ asset('data/image/graph/maroon.png') }}" alt="" width="16"> : Anjuran Tinggi Badan WHO
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
