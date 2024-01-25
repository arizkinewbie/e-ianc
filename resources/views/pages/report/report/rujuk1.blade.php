@php
    $baseurl = DB::table('sys_baseurls')->where('url_use','root')->where('url_status','1')->value('url_address');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rujuk</title>
</head>

<style>
    @page {
            margin: 10px 10px 10px 10px !important;
            /* padding: 0px 0px 0px 0px !important; */
        }
</style>

<body>
    <table width="100%">
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
    <h3 style="text-align: center; font-size: 10pt;">
        LAPORAN RUJUKAN KE FASKES
        <br>
        BULAN {{ strtoupper(DB::table('selec_months')->where('mon_id', $month)->value('mon_name')) }} TAHUN {{ $year }}
    </h3>
    <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 8pt;">
        <thead>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2" width="3%">No</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="2">Identitas</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">No Rujukan</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Diagnosis</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Telah Diberikan</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="2">Rujuk</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Norm</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Nama</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Unit Tujuan</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Faskes Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <?php
                    $dr0 = DB::table('eianc_service_anc_risks')->where('sancr_no_reg', $d->des_reg_no)
                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_anc_risks.sancr_anc_d_id')
                            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
                            ->value('sanc_norm');

                    $dr1 = DB::table('eianc_service_babies')->where('sbaby_no_reg', $d->des_reg_no)->value('sbaby_norm');

                    $dr2 = DB::table('eianc_service_kbs')->where('sanckb_no_reg', $d->des_reg_no)->value('sanckb_norm');

                    $dr3 = DB::table('eianc_service_marritals')->where('sancm_no_reg', $d->des_reg_no)->value('sancm_norm');

                    $dr4 = DB::table('eianc_service_neo28s')->where('neo28_no_reg', $d->des_reg_no)->value('neo28_norm');

                    $dr5 = DB::table('eianc_service_neo_bbs')->where('neobb_no_reg', $d->des_reg_no)->value('neobb_norm');

                    $dr6 = DB::table('eianc_service_nifas_controls')->where('sancnc_no_reg', $d->des_reg_no)
                    ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_nifas_controls.sancnc_anc_d_id')
                    ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
                    ->value('sanc_norm');

                    $dr7 = DB::table('eianc_service_nifas_obsers')->where('sancno_no_reg', $d->des_reg_no)
                    ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_nifas_obsers.sancno_anc_d_id')
                    ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
                    ->value('sanc_norm');

                    $dr8 = DB::table('eianc_service_vaksins')->where('svak_reg_no', $d->des_reg_no)->value('svak_norm');

                    if (isset($dr0)) {
                        $norm = $dr0;
                    } elseif (isset($dr1)){
                        $norm = $dr1;
                    } elseif (isset($dr2)){
                        $norm = $dr2;
                    } elseif (isset($dr3)){
                        $norm = $dr3;
                    } elseif (isset($dr4)){
                        $norm = $dr4;
                    } elseif (isset($dr5)){
                        $norm = $dr5;
                    } elseif (isset($dr6)){
                        $norm = $dr6;
                    } elseif (isset($dr7)){
                        $norm = $dr7;
                    } else {
                        $norm = $dr8;
                    }

                    $pasien = DB::table('eianc_patients')->where('pat_norm', $norm)->get();
                ?>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black; border: 1px solid black; text-align: right;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $pasien[0]->pat_norm }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $pasien[0]->pat_name }}</td>
                    <td style="border: 1px solid black; border: 1px solid black;">{{ $d->des_reg_no }}</td>
                    <td style="border: 1px solid black; border: 1px solid black;">{{ DB::table('selec_icds')->where('icd_code', $d->des_diagnose)->value('icd_code') . '-' . DB::table('selec_icds')->where('icd_code', $d->des_diagnose)->value('icd_name') }}</td>
                    <td style="border: 1px solid black; border: 1px solid black;">{{ $d->des_first_aid }}</td>
                    <td style="border: 1px solid black; border: 1px solid black;">{{ $d->des_des_unit }}</td>
                    <td style="border: 1px solid black; border: 1px solid black;">{{ $d->des_des_ins }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table width="100%" style="font-size: 8pt; margin-top: 10pt">
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
                Kepala Puskesmas Kecamatan {{ $al_subdis }}
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
                    $nakes1 = DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)
                                    ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=','eianc_temois.temoi_nakes_id')
                                    ->get();
                ?>
                {{ $al_dis . ', ' . date('d-m-Y') }}
                <br>
                Pelapor Rujukan
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
