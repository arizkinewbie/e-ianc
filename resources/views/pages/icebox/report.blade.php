@php
    $baseurl = DB::table('sys_baseurls')->where('url_use','root')->where('url_status','1')->value('url_address');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    @page {
        margin: 10px 10px 10px 10px !important;
        /* padding: 0px 0px 0px 0px !important; */
    }

    .rotate {
        -ms-writing-mode: tb-rl;
        -webkit-writing-mode: vertical-rl;
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        white-space: nowrap;
        text-align: center;
    }
</style>

<body>
    <table width="100%" style="font-size: 10pt;">
        <tr>
            <td width="15%" style="text-align: center">
                <img src="{{ $baseurl . '/data/image/instansi/' . $ins_thumb }}" alt="" width="64">
            </td>
            <td>
                <b>{{ $ins_name }}</b>
                <br>
                <div style="font-size: 9pt">
                    Faskes/Izin Praktik <b>{{ $ins_code }}</b>
                </div>
                Alamat : {{ ucwords($ins_add) }}, RT.{{ $ins_rt }}, RW.{{ $ins_rw }}, {{ ucwords($al_desa) }}, {{ ucwords($al_subdis) }}, {{ ucwords($al_dis) }}, {{ ucwords($al_prov) }}
                <br>
                {{ $ins_telp }}
            </td>
            <td width="15%" style="text-align: center">
                <img src="{{ $baseurl . '/data/image/about/logo.png' }}" alt="" width="64">
            </td>
        </tr>
    </table>
    <hr>
    <table width="100%" style="font-size: 8pt;">
        <tr>
            <td width="20%">
                Merk Lemari Es
            </td>
            <td>
                : {{ $icebox->ibi_brand }}
            </td>
            <td width="20%">
                Tahun Pengadaan
            </td>
            <td>
                : {{ $icebox->ibi_source_year }}
            </td>
        </tr>
        <tr>
            <td width="20%">
                No. Seri
            </td>
            <td>
                : {{ $icebox->ibi_series }}
            </td>
            <td width="20%">
                Sumber Pengadaan
            </td>
            <td>
                : {{ strtoupper($icebox->ibi_source) }}
            </td>
        </tr>
    </table>
    <h3 style="text-align: center; font-size: 8pt;">
        PENCACATANAN SUHU LEMARI ES HARIAN
        <br>
        BULAN {{ strtoupper(DB::table('selec_months')->where('mon_id', $month)->value('mon_name')) }} TAHUN {{ $year }}
    </h3>
    <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 6pt;">
        <tr style="border: 1px solid black;">
            <td colspan="2" rowspan="2" style="border: 1px solid black; border: 1px solid black; text-align: center;">TGL</td>
            @for ($i = 1; $i < 32; $i++)
                <td colspan="2" style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $i }}</td>
            @endfor
        </tr>
        <tr>
            @for ($i = 1; $i < 32; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">P</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">S</td>
            @endfor
        </tr>
        <tr>
            <td rowspan="22" style="border: 1px solid black; border: 1px solid black; text-align: center;">SUHU (C)</td>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">16</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '16')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '16')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">15</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '15')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '15')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">14</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '14')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111)">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '14')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">13</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '13')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '13')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">12</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '12')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '12')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">11</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '11')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '11')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">10</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '10')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '10')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">9</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '9')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '9')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">8</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '8')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(255, 111, 111);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '8')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">7</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '7')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '7')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">6</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '6')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '6')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">5</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '5')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '5')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">4</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '4')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '4')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">3</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '3')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(155, 255, 155);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '3')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">2</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '2')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '2')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">1</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '1')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '1')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">0</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '0')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '0')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-1</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '-1')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '-1')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-2</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '-2')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '-2')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-3</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '-3')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '-3')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-4</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '-4')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '-4')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
        <tr>
            <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-5</td>
            @for ($i = 0; $i < 31; $i++)
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $pagi = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_morning', '-5')->value('ib_morning');
                    @endphp

                    @if (isset($pagi) )

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center; background-color: rgb(119, 255, 255);">
                    @php
                        $sore = DB::table('eianc_ice_boxes')->where('ib_ibi_id', $ibi)->where('ib_date', date('Y-m-d', strtotime(implode('-', [$i, $month, $year]))))->where('ib_afternoon', '-5')->value('ib_afternoon');
                    @endphp

                    @if (isset($sore))

                        <img src="{{ $baseurl . '/data/image/graph/black.png' }}" alt="" width="7">
                    @endif
                </td>
            @endfor
        </tr>
    </table>
    <br>
    <table width="100%" style="font-size: 10pt;">
        <tr>
            <td></td>
            <td width="25%">
                {{ ucwords($al_dis) . ', ' . date('d-m-Y')}}
                <br>
                Penanggung Jawab
                <br>
                <br>
                <br>
                <?php
                    $nakes = DB::table('eianc_sigs')->where('sig_type', '4')
                                    ->where('sig_ins', DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
                                    ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=','eianc_sigs.sig_nakes')
                                    ->get();
                ?>
                <b><u>{{ $nakes[0]->nakes_name }}</u></b>
                <br>
                NIP. {{ $nakes[0]->nakes_nip }}
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 10pt;">
        <tr style="border: 1px solid black;">
            <td  style="border: 1px solid black;">
                Kerusakan yang terjadi :
                <br>
                <br>
                <br>
            </td>
        </tr>
        <tr style="border: 1px solid black;">
            <td  style="border: 1px solid black;">
                Penanganan yang dilakukan :
                <br>
                <br>
                <br>
            </td>
        </tr>
    </table>
    <br>
    <div style="font-size: 10pt;">
        <b>Keterangan : </b> P : Pagi, S : Sore, <i style="background-color: rgb(255, 111, 111)">&nbsp;&nbsp;&nbsp;&nbsp;</i> Kurang Dingin, <i style="background-color: rgb(155, 255, 155)">&nbsp;&nbsp;&nbsp;&nbsp;</i> Ideal, <i style="background-color: rgb(119, 255, 255)">&nbsp;&nbsp;&nbsp;&nbsp;</i> Terlalu Dingin
    </div>
</body>

</html>
