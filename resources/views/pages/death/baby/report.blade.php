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
</style>

<body>
    <h4 style="text-align: center;">
        LAPORAN KEMATIAN BAYI DAN BALITA
        <br>
        KELURAHAN/DESA {{ strtoupper($al_desa) }}, {{ strtoupper($al_subdis) }}, {{ strtoupper($al_dis) }}, {{ strtoupper($al_prov) }}
        <br>
        BULAN {{ strtoupper(DB::table('selec_months')->where('mon_id', $month)->value('mon_name')) }} TAHUN {{ $year }}
    </h4>
    <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 8pt;">
        <thead>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="3">No</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="3">Wilayah</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="8">Kematian Bayi</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="8">Kematian Anak Balita (12-59BL)</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Total</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="7">Sebab Kematian</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Total</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="7">Sebab Kematian</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Pneumonia</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Diare</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Tatanus Neonatorum</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Kel. Sal Cerna</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Kelainan Syaraf</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Kelainan Kongenital</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Lainnya</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">ISPA</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Diare</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Malaria</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">DBD</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Typus</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Kelainan Sal.Cerna</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Lainnya</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($find as $d)
                <tr>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ 'RW '. $d->detb_destination }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_by_pneunomia }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_by_diare }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_by_tetanus_neonatorum }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_by_kel_sal_cerna }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_by_kelainan_saraf }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_by_kelainan_kongenital }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_by_other }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_bl_ispa }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_bl_diare }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_bl_malaria }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_bl_dbd }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_bl_typus }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_bl_kel_sal_cerna }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->detb_bl_other }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="100%" style="font-size: 8pt; margin-top: 10pt;">
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
                SIP. {{ $nakes[0]->nakes_sip }}
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
                SIP. {{ $nakes1[0]->nakes_sip }}
            </td>
        </tr>
    </table>
</body>

</html>
