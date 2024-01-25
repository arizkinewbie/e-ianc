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

    .page_break { page-break-before: always; }

    body {
        position: relative;
    }
</style>

<body>
    <div style="font-size: 8pt">
        <div style="position: absolute; left: 10px;">
            LAPORAN PWS KESEHATAN IBU DAN ANAK
            <br>
            KECAMATAN {{ strtoupper($al_subdis) }}
            <br>
            DINAS KESEHATAN KOTA/KABUPATEN {{ strtoupper($al_dis) }}
            <br>
            BULAN {{ strtoupper(DB::table('selec_months')->where('mon_id', $month)->value('mon_name')) }} TAHUN {{ $year }}
        </div>
        <div style="text-align: right; position: absolute; right: 10px;">
            <b>Halaman 1</b>
        </div>
    </div>
    <table style="width: 100%; border-collapse: collapse; font-size: 8pt; position: absolute; top: 80px;">
        <thead style=" border: 1px solid black;">
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="4">No</th>
                <th style=" border: 1px solid black;" rowspan="4">Kelurahan/Desa</th>
                <th style=" border: 1px solid black;" rowspan="4">Jumlah Penduduk</th>
                <th style=" border: 1px solid black;" colspan="5">Sasaran</th>
                <th style=" border: 1px solid black;" colspan="5">K 1 58.30%</th>
                <th style=" border: 1px solid black;" colspan="5">K 4 58.30%</th>
                <th style=" border: 1px solid black;" colspan="10">Deteksi Dini Tinggi</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="3">Bumil</th>
                <th style=" border: 1px solid black;" rowspan="3">Bumil Risti</th>
                <th style=" border: 1px solid black;" rowspan="3">Bulin</th>
                <th style=" border: 1px solid black;" rowspan="3">Bufas</th>
                <th style=" border: 1px solid black;" rowspan="3">PUS</th>
                <th style=" border: 1px solid black;" rowspan="3">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="3">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="3">R</th>
                <th style=" border: 1px solid black;" rowspan="3">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="3">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="3">R</th>
                <th style=" border: 1px solid black;" colspan="5">Oleh Nakes 6.3%</th>
                <th style=" border: 1px solid black;" colspan="5">Oleh Non Nakes 3.5%</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="2">ABS</th>
                <th style=" border: 1px solid black;" rowspan="2">%</th>
                <th style=" border: 1px solid black;" rowspan="2">ABS</th>
                <th style=" border: 1px solid black;" rowspan="2">%</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
            </tr>
            <tr style=" border: 1px solid black;">
                @for ($i = 1; $i < 29; $i++)
                    <th style=" border: 1px solid black;">{{ $i }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            <tr style=" border: 1px solid black;">
                @for ($i = 1; $i < 29; $i++)
                    <td style=" border: 1px solid black; text-align: right;">&nbsp;</td>
                @endfor
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: right;" colspan="3">TOTAL PUSK KEL</td>
                @for ($i = 1; $i < 26; $i++)
                    <td style=" border: 1px solid black; text-align: right;">&nbsp;</td>
                @endfor
            </tr>
        </tbody>
    </table>

    <div class="page_break"></div>

    <div style="font-size: 8pt">
        <div style="text-align: right; position: absolute; right: 10px;">
            <b>Halaman 2</b>
        </div>
    </div>
    <table style="width: 100%; border-collapse: collapse; font-size: 8pt; position: absolute; top: 20px;">
        <thead style=" border: 1px solid black;">
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="3">No</th>
                <th style=" border: 1px solid black;" rowspan="3">Kelurahan/Desa</th>
                <th style=" border: 1px solid black;" rowspan="3">Jumlah Penduduk</th>
                <th style=" border: 1px solid black;" colspan="5">Sasaran</th>
                <th style=" border: 1px solid black;" colspan="5">Penanganan Komplikasi Bumil 100%</th>
                <th style=" border: 1px solid black;" colspan="5">Persalinan Nakes 100%</th>
                <th style=" border: 1px solid black;" colspan="5">Kunjungan Nifas 100%</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="2">Bumil</th>
                <th style=" border: 1px solid black;" rowspan="2">Bumil Risti</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulin</th>
                <th style=" border: 1px solid black;" rowspan="2">Bufas</th>
                <th style=" border: 1px solid black;" rowspan="2">PUS</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
            </tr>
            <tr style=" border: 1px solid black;">
                @for ($i = 1; $i < 24; $i++)
                    <th style=" border: 1px solid black;">{{ $i }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            <tr style=" border: 1px solid black;">
                @for ($i = 1; $i < 24; $i++)
                    <td style=" border: 1px solid black; text-align: right;">&nbsp;</td>
                @endfor
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: right;" colspan="3">TOTAL PUSK KEL</td>
                @for ($i = 1; $i < 21; $i++)
                    <td style=" border: 1px solid black; text-align: right;">&nbsp;</td>
                @endfor
            </tr>
        </tbody>
    </table>

    <div class="page_break"></div>

    <div style="font-size: 8pt">
        <div style="text-align: right; position: absolute; right: 10px;">
            <b>Halaman 3</b>
        </div>
    </div>
    <table style="width: 100%; border-collapse: collapse; font-size: 8pt; position: absolute; top: 20px;">
        <thead style=" border: 1px solid black;">
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="3">No</th>
                <th style=" border: 1px solid black;" rowspan="3">Kelurahan/Desa</th>
                <th style=" border: 1px solid black;" colspan="4">Sasaran</th>
                <th style=" border: 1px solid black;" colspan="5">KN 1 100%</th>
                <th style=" border: 1px solid black;" colspan="5">Kunjungan Neonatus (KN) 100%</th>
                <th style=" border: 1px solid black;" colspan="5">Penanganan Komplikasi Neonatus 100%</th>
                <th style=" border: 1px solid black;" colspan="5">Kunjungan Bayi 100%</th>
                <th style=" border: 1px solid black;" colspan="5">Kunjungan Balita 100%</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="2">Bayi Baru Lahir</th>
                <th style=" border: 1px solid black;" rowspan="2">Bayi</th>
                <th style=" border: 1px solid black;" rowspan="2">Bayi Resti</th>
                <th style=" border: 1px solid black;" rowspan="2">Balita</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Lalu</th>
                <th style=" border: 1px solid black;" rowspan="2">Bulan Ini</th>
                <th style=" border: 1px solid black;" colspan="2">Kumulatif</th>
                <th style=" border: 1px solid black;" rowspan="2">R</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
                <th style=" border: 1px solid black;">ABS</th>
                <th style=" border: 1px solid black;">%</th>
            </tr>
            <tr style=" border: 1px solid black;">
                @for ($i = 1; $i < 32; $i++)
                    <th style=" border: 1px solid black;">{{ $i }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            <tr style=" border: 1px solid black;">
                @for ($i = 1; $i < 32; $i++)
                    <td style=" border: 1px solid black; text-align: right;">&nbsp;</td>
                @endfor
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: right;" colspan="3">TOTAL PUSK KEL</td>
                @for ($i = 1; $i < 29; $i++)
                    <td style=" border: 1px solid black; text-align: right;">&nbsp;</td>
                @endfor
            </tr>
        </tbody>
    </table>

    <div class="page_break"></div>

    <table width="100%" style="font-size: 8pt; margin-top: 10pt; position: absolute; top: 10px;">
        <tr>
            <td style="text-align: center">
                <?php
                    $nakes = DB::table('eianc_sigs')->where('sig_type', '1')
                                    ->where('sig_ins', DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
                                    ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=','eianc_sigs.sig_nakes')
                                    ->get();
                ?>
                Mengetahui
                <br>
                Kepala Puskesmas Kelurahan/Desa {{ strtoupper($al_desa) }}
                <br>
                <br>
                <br>
                <br>
                <b><u>{{ $nakes[0]->nakes_name }}</u></b>
                <br>
                NIP. {{ $nakes[0]->nakes_nip }}
            </td>
            <td style="text-align: center">
                <?php
                    $nakes1 = DB::table('eianc_sigs')->where('sig_type', '3')
                                    ->where('sig_ins', DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
                                    ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=','eianc_sigs.sig_nakes')
                                    ->get();
                ?>
                {{ $al_dis . ', ' . date('d-m-Y') }}
                <br>
                Pengelola KIA Kelurahan/Desa {{ strtoupper($al_desa) }}
                <br>
                <br>
                <br>
                <br>
                <b><u>{{ $nakes1[0]->nakes_name }}</u></b>
                <br>
                NIP. {{ $nakes1[0]->nakes_nip }}
            </td>
        </tr>
    </table>
</body>
</html>
