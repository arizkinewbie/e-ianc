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

    .page_break {
        page-break-before: always;
    }

</style>

<body>
    <table style="width: 100%; font-size: 10pt;">
        <tr>
            <td width="25%">&nbsp;</td>
            <td>
                <b>LAPORAN BULANAN LB3-KIA</b>
                <br>
                INSTANSI {{ strtoupper($ins_name) }}
                <br>
                KELURAHAN {{ strtoupper($al_desa) }}
                <br>
                KECAMATAN {{ strtoupper($al_subdis) }}
                <br>
                DINAS KESEHATAN {{ strtoupper($al_dis) }}
                <br>
                BULAN {{ strtoupper(DB::table('selec_months')->where('mon_id', $month)->value('mon_name')) }} TAHUN {{ $year }}
            </td>
            <td width="15%" style="text-align: center">
                <img src="{{ $baseurl . '/data/image/about/logo.png' }}" alt="" width="64">
            </td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; font-size: 10pt; margin-top: 20px;">
        <thead style=" border: 1px solid black;">
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" colspan="5">Data</th>
                <th style=" border: 1px solid black;">PUSKESMAS</th>
                <th style=" border: 1px solid black;">PMB</th>
                <th style=" border: 1px solid black;">RS/RSIA/RSB</th>
                <th style=" border: 1px solid black;">POSYANDU</th>
                <th style=" border: 1px solid black;">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">Indikator Umum, SPM dan Renstra dan Lainnya</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil Mempunyai Buku KIA</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kiapus = [];

                        foreach ($kie as $a) {
                            if ($a->ins_type == 3 && $a->sanckie_kia_book == '1') {
                                $kiapus[] = array(
                                    'set' => $a->sanckie_kia_book
                                );
                            }
                        }

                        echo count($kiapus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kiapmb = [];

                        foreach ($kie as $a) {
                            if ($a->ins_type == 6 && $a->sanckie_kia_book == '1') {
                                $kiapmb[] = array(
                                    'set' => $a->sanckie_kia_book
                                );
                            }
                        }

                        echo count($kiapmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kiars = [];

                        foreach ($kie as $a) {
                            if (($a->ins_type == 1 && $a->sanckie_kia_book == '1') || ($a->ins_type == 2 && $a->sanckie_kia_book == '1') || ($a->ins_type == 4 && $a->sanckie_kia_book == '1')) {
                                $kiars[] = array(
                                    'set' => $a->sanckie_kia_book
                                );
                            }
                        }

                        echo count($kiars);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kiapos = [];

                        foreach ($kie as $a) {
                            if ($a->ins_type == 5 && $a->sanckie_kia_book == '1') {
                                $kiapos[] = array(
                                    'set' => $a->sanckie_kia_book
                                );
                            }
                        }

                        echo count($kiapos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        echo (count($kiapus) + count($kiapmb) + count($kiars) + count($kiapos));
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <?php
                    // K1 Murni
                    $k1murnipus = [];

                    foreach ($anamnesa as $a) {
                        if ($a->ins_type == 3 && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                            $k1murnipus[] = array(
                                'set' => $a->sanca_trimester
                            );
                        }
                    }

                    $k1murnipmb = [];

                    foreach ($anamnesa as $a) {
                        if ($a->ins_type == 6 && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                            $k1murnipmb[] = array(
                                'set' => $a->sanca_trimester
                            );
                        }
                    }

                    $k1murnirs = [];

                    foreach ($anamnesa as $a) {
                        if (($a->ins_type == 1 && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || $a->ins_type == 4 && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                            $k1murnirs[] = array(
                                'set' => $a->sanca_trimester
                            );
                        }
                    }

                    $k1murnipos = [];

                    foreach ($anamnesa as $a) {
                        if ($a->ins_type == 5 && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                            $k1murnipos[] = array(
                                'set' => $a->sanca_trimester
                            );
                        }
                    }

                    // K1 Akses
                    $k1aksespus = [];

                    foreach ($anamnesa as $a) {
                        if ($a->ins_type == 3 && $a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                            $k1aksespus[] = array(
                                'set' => $a->sanca_trimester
                            );
                        }
                    }

                    $k1aksespmb = [];

                    foreach ($anamnesa as $a) {
                        if ($a->ins_type == 6 && $a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                            $k1aksespmb[] = array(
                                'set' => $a->sanca_trimester
                            );
                        }
                    }

                    $k1aksesrs = [];

                    foreach ($anamnesa as $a) {
                        if (($a->ins_type == 1 && $a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                            $k1aksesrs[] = array(
                                'set' => $a->sanca_trimester
                            );
                        }
                    }

                    $k1aksespos = [];

                    foreach ($anamnesa as $a) {
                        if ($a->ins_type == 5 && $a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                            $k1aksespos[] = array(
                                'set' => $a->sanca_trimester
                            );
                        }
                    }
                ?>
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan K1 Ibu Hamil</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($k1murnipus) + count($k1aksespus)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($k1murnipmb) + count($k1aksespmb)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($k1murnirs) + count($k1aksesrs)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($k1murnipos) + count($k1aksespos)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($k1murnipus) + count($k1murnipmb) + count($k1murnirs) + count($k1murnipos)) + (count($k1aksespus) + count($k1aksespmb) + count($k1aksesrs) + count($k1aksespos))) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">1</td>
                <td style=" border: 1px solid black;" colspan="3">K1 Murni</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($k1murnipus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($k1murnipmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($k1murnirs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($k1murnipos) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($k1murnipus) + count($k1murnipmb) + count($k1murnirs) + count($k1murnipos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">2</td>
                <td style=" border: 1px solid black;" colspan="3">K1 Akses</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($k1aksespus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($k1aksespmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($k1aksesrs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($k1aksespos) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($k1aksespus) + count($k1aksespmb) + count($k1aksesrs) + count($k1aksespos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan K4 Ibu Hamil</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k4pus = [];

                        foreach ($anamnesa as $a) {
                            if ($a->ins_type == 3 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k4pus[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k4pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k4pmb = [];

                        foreach ($anamnesa as $a) {
                            if ($a->ins_type == 6 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k4pmb[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k4pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k4rs = [];

                        foreach ($anamnesa as $a) {
                            if (($a->ins_type == 1 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $k4rs[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k4rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k4pos = [];

                        foreach ($anamnesa as $a) {
                            if ($a->ins_type == 5 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k4pos[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k4pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($k4pus) + count($k4pmb) + count($k4rs) + count($k4pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan K6 Ibu Hamil</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k6pus = [];

                        foreach ($anamnesa as $a) {
                            if ($a->ins_type == 3 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k6pus[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k6pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k6pmb = [];

                        foreach ($anamnesa as $a) {
                            if ($a->ins_type == 6 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k6pmb[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k6pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k6rs = [];

                        foreach ($anamnesa as $a) {
                            if (($a->ins_type == 1 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $k6rs[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k6rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k6pos = [];

                        foreach ($anamnesa as $a) {
                            if ($a->ins_type == 5 && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k6pos[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k6pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($k6pus) + count($k6pmb) + count($k6rs) + count($k6pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">5</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa Dahak</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $btapus = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 3 && $a->sancl_bta == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 3 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $btapus[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($btapus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $btapmb = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 6 && $a->sancl_bta == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 6 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $btapmb[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($btapmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $btars = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_bta == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 1 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_bta == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) ||($a->ins_type == 2 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_bta == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $btars[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($btars);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $btapos = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 5 && $a->sancl_bta == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 5 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $btapos[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($btapos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($btapus) + count($btapmb) + count($btars) + count($btapos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Dahak TB (+)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pbtapus = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 3 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pbtapus[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($pbtapus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pbtapmb = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 6 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pbtapmb[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($pbtapmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pbtars = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pbtars[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($pbtars);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pbtapos = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 5 && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pbtapos[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($pbtapos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($pbtapus) + count($pbtapmb) + count($pbtars) + count($pbtapos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">6</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil TB yang Diberikan Obat</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa Ankylostoma (Kecacingan dalam Kehamilan)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">7</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Ankylostoma (+)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Ankylostoma (+) yang Diobati</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">8</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa IMS</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $imspus = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 3 && $a->sancl_sifilis == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 3 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $imspus[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($imspus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $imspmb = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 6 && $a->sancl_sifilis == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 6 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $imspmb[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($imspmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $imsrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_sifilis == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 1 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_sifilis == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) ||($a->ins_type == 2 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_sifilis == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $imsrs[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($imsrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $imspos = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 5 && $a->sancl_sifilis == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 5 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $imspos[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($imspos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($imspus) + count($imspmb) + count($imsrs) + count($imspos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes IMS (+)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pimspus = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 3 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pimspus[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($pimspus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pimspmb = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 6 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pimspmb[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($pimspmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pimsrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pimsrs[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($pimsrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pimspos = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 5 && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pimspos[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($pimspos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($pimspus) + count($pimspmb) + count($pimsrs) + count($pimspos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes IMS (+) yang Diobati</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="5">9</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Puskesmas Kecamatan yang Melaksanakan Kelas Ibu Hamil</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Puskesmas Kelurahan yang Melaksanakan Kelas Ibu Hamil</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kelas Ibu Hamil yang Terbentuk</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Mengikuti Kelas Ibu Hamil</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Suami/ Keluarga yang Mengikuti Kelas Ibu Hamil</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4">10</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Ibu Hamil, Bersalin dan Nifas yang Terdeteksi Komplikasi (PK Maternal)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Ibu Hamil, Bersalin dan Nifas yang Terdeteksi Komplikasi Pertama Kali oleh Nakes</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Ibu Hamil, Bersalin dan Nifas yang Terdeteksi Komplikasi Pertama Kali oleh Masyarakat</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Rujukan Kasus Risiko Tinggi Maternal</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">ANC Terpadu</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">1</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Yang Dilakukan Penimbangan Berat Badan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bbpus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sancpe_weight_now != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $bbpus[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count($bbpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bbpmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sancpe_weight_now != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $bbpmb[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count($bbpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bbrs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sancpe_weight_now != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancpe_weight_now != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancpe_weight_now != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $bbrs[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count($bbrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bbpos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sancpe_weight_now != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $bbpos[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count($bbpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($bbpus) + count($bbpmb) + count($bbrs) + count($bbpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Yang Dilakukan Pengukuran Tinggi Badan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbpus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sancpe_height != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tbpus[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count($tbpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbpmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sancpe_height != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tbpmb[] = array(
                                    'set' => $a->sancpe_height
                                );
                            }
                        }

                        echo count($tbpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbrs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sancpe_height != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancpe_height != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancpe_height != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $tbrs[] = array(
                                    'set' => $a->sancpe_height
                                );
                            }
                        }

                        echo count($tbrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbpos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sancpe_height != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tbpos[] = array(
                                    'set' => $a->sancpe_height
                                );
                            }
                        }

                        echo count($tbpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($tbpus) + count($tbpmb) + count($tbrs) + count($tbpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">2</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa Tekanan Darah (TD)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tdpus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tdpus[] = array(
                                    'set' => $a->sancpe_blood_pressure
                                );
                            }
                        }

                        echo count($tdpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tdpmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tdpmb[] = array(
                                    'set' => $a->sancpe_blood_pressure
                                );
                            }
                        }

                        echo count($tdpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tdrs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $tdrs[] = array(
                                    'set' => $a->sancpe_blood_pressure
                                );
                            }
                        }

                        echo count($tdrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tdpos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tdpos[] = array(
                                    'set' => $a->sancpe_blood_pressure
                                );
                            }
                        }

                        echo count($tdpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($tdpus) + count($tdpmb) + count($tdrs) + count($tdpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Hipertensi (TD Sistol >= 140 mmHg dan/atau TD Diastol >= 90 mmHg)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tddpus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $exp = explode('/', $a->sancpe_blood_pressure);

                                if ($exp[0] >= 140) {
                                    $tddpus[] = array(
                                        'set' => $a->sancpe_blood_pressure
                                    );
                                }
                            }
                        }

                        echo count($tddpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tddpmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $exp = explode('/', $a->sancpe_blood_pressure);

                                if ($exp[0] >= 140) {
                                    $tddpmb[] = array(
                                        'set' => $a->sancpe_blood_pressure
                                    );
                                }
                            }
                        }

                        echo count($tddpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tddrs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $exp = explode('/', $a->sancpe_blood_pressure);

                                if ($exp[0] >= 140) {
                                    $tddrs[] = array(
                                        'set' => $a->sancpe_blood_pressure
                                    );
                                }
                            }
                        }

                        echo count($tddrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tddpos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $exp = explode('/', $a->sancpe_blood_pressure);

                                if ($exp[0] >= 140) {
                                    $tddpos[] = array(
                                        'set' => $a->sancpe_blood_pressure
                                    );
                                }
                            }
                        }

                        echo count($tddpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($tddpus) + count($tddpmb) + count($tddrs) + count($tddpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">3</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa LILA</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $lilapus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sancpe_arm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $lilapus[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($lilapus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $lilapmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sancpe_arm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $lilapmb[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($lilapmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $lilars = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sancpe_arm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancpe_arm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancpe_arm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $lilars[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($lilars);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $lilapos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sancpe_arm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $lilapos[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($lilapos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($lilapus) + count($lilapmb) + count($lilars) + count($lilapos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil KEK (LILA kurang dari 23.5 cm)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $plilapus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sancpe_arm <= 23.5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $plilapus[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($plilapus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $plilapmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sancpe_arm <= 23.5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $plilapmb[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($plilapmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $plilars = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sancpe_arm <= 23.5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancpe_arm <= 23.5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancpe_arm <= 23.5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $plilars[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($plilars);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $plilapos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sancpe_arm <= 23.5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $plilapos[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($plilapos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($plilapus) + count($plilapmb) + count($plilars) + count($plilapos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Dilakukan Pemeriksaan Tinggi Fundus Uteri (TFU)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tfupus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sancpe_tfu_cm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_type == 3 && $a->sancpe_tfu_finger != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tfupus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($tfupus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tfupmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sancpe_tfu_cm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_type == 6 && $a->sancpe_tfu_finger != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tfupmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($tfupmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tfurs = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 1 && $a->sancpe_tfu_cm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_type == 1 && $a->sancpe_tfu_finger != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_type == 2 && $a->sancpe_tfu_cm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_type == 2 && $a->sancpe_tfu_finger != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) ||$a->ins_type == 3 && $a->sancpe_tfu_cm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_type == 3 && $a->sancpe_tfu_finger != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tfurs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($tfurs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tfupos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sancpe_tfu_cm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_type == 5 && $a->sancpe_tfu_finger != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tfupos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($tfupos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($tfupus) + count($tfupmb) + count($tfurs) + count($tfupos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">5</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Dilakukan Pemeriksaan Presentasi dan Denyut Jantung Janin (DJJ)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $djjpus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sancpe_djj != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $djjpus[] = array(
                                    'set' => $a->sancpe_djj
                                );
                            }
                        }

                        echo count($djjpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $djjpmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sancpe_djj != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $djjpmb[] = array(
                                    'set' => $a->sancpe_djj
                                );
                            }
                        }

                        echo count($djjpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $djjrs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sancpe_djj != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || $a->ins_type == 2 && $a->sancpe_djj != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_type == 4 && $a->sancpe_djj != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $djjrs[] = array(
                                    'set' => $a->sancpe_djj
                                );
                            }
                        }

                        echo count($djjrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $djjpos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sancpe_djj != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $djjpos[] = array(
                                    'set' => $a->sancpe_djj
                                );
                            }
                        }

                        echo count($djjpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($djjpus) + count($djjpmb) + count($djjrs) + count($djjpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">6</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T1 setelah pelayanan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t1pus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sanct_tt == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t1pus[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t1pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t1pmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sanct_tt == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t1pmb[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t1pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t1rs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sanct_tt == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sanct_tt == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sanct_tt == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $t1rs[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t1rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t1pos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sanct_tt == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t1pos[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t1pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($t1pus) + count($t1pmb) + count($t1rs) + count($t1pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T2 setelah pelayanan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t2pus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sanct_tt == 3 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t2pus[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t2pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t2pmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sanct_tt == 3 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t2pmb[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t2pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t2rs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sanct_tt == 3 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sanct_tt == 3 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sanct_tt == 3 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $t2rs[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t2rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t2pos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sanct_tt == 3 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t2pos[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t2pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($t2pus) + count($t2pmb) + count($t2rs) + count($t2pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T3 setelah pelayanan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t3pus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sanct_tt == 4 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t3pus[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t3pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t3pmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sanct_tt == 4 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t3pmb[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t3pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t3rs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sanct_tt == 4 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sanct_tt == 4 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sanct_tt == 4 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $t3rs[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t3rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t3pos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sanct_tt == 4 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t3pos[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t3pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($t3pus) + count($t3pmb) + count($t3rs) + count($t3pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T4 setelah pelayanan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t4pus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sanct_tt == 5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t4pus[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t4pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t4pmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sanct_tt == 5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t4pmb[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t4pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t4rs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sanct_tt == 5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sanct_tt == 5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sanct_tt == 5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $t4rs[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t4rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t4pos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sanct_tt == 5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t4pos[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t4pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($t4pus) + count($t4pmb) + count($t4rs) + count($t4pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T5 setelah pelayanan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t5pus = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 3 && $a->sanct_tt == 6 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t5pus[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t5pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t5pmb = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 6 && $a->sanct_tt == 6 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t5pmb[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t5pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t5rs = [];

                        foreach ($fisik as $a) {
                            if (($a->ins_type == 1 && $a->sanct_tt == 6 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sanct_tt == 6 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sanct_tt == 6 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $t5rs[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t5rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t5pos = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_type == 5 && $a->sanct_tt == 6 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t5pos[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t5pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($t5pus) + count($t5pmb) + count($t5rs) + count($t5pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T2+ setelah pelayanan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">7</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Mendapat Fe 3</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4">8</td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="4">a</td>
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil yang Periksa Hb (hanya dihitung satu kali)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbpus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_hb == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hbpus[] = array(
                                    'set' => $a->sancl_hb
                                );
                            }
                        }

                        echo count($hbpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbpmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_hb == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hbpmb[] = array(
                                    'set' => $a->sancl_hb
                                );
                            }
                        }

                        echo count($hbpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_hb == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_hb == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_hb == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $hbrs[] = array(
                                    'set' => $a->sancl_hb
                                );
                            }
                        }

                        echo count($hbrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbpos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_hb == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hbpos[] = array(
                                    'set' => $a->sancl_hb
                                );
                            }
                        }

                        echo count($hbpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($hbpus) + count($hbrs) + count($t5rs) + count($hbpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil Anemia Hb 8-11 mg/dl</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb811pus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_level_hb >= 8 && $a->sancl_level_hb <= 11 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb811pus[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb811pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb811pmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_level_hb >= 8 && $a->sancl_level_hb <= 11 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb811pmb[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb811pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb811rs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_level_hb >= 8 && $a->sancl_level_hb <= 11 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_level_hb >= 8 && $a->sancl_level_hb <= 11 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_level_hb >= 8 && $a->sancl_level_hb <= 11 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $hb811rs[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb811rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb811pos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_level_hb >= 8 && $a->sancl_level_hb <= 11 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb811pos[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb811pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($hb811pus) + count($hb811pmb) + count($hb811rs) + count($hb811pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iii</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil Anemia Hb kurang dari 8 mg/dl</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb8pus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 8 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb8pus[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb8pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb8pmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 8 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb8pmb[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb8pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb8rs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 8 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 8 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 8 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $hb8rs[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb8rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb8pos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 8 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb8pos[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb8pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($hb8pus) + count($hb8pmb) + count($hb8rs) + count($hb8pos)) }}</td>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iv</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil Anemia</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb12pus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 12 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb12pus[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb12pus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb12pmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 12 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb12pmb[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb12pmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb12rs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 12 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 12 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 12 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $hb12rs[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb12rs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb12pos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_level_hb != '' && $a->sancl_level_hb < 12 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb12pos[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb12pos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($hb12pus) + count($hb12pmb) + count($hb12rs) + count($hb12pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2"></td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">b</td>
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil yang Periksa Protein Urin (hanya dihitung satu kali)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $urinpus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_urine != 0 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $urinpus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($urinpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $urinpmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_urine != 0 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $urinpmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($urinpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $urinrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_urine != 0 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_urine != 0 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_urine != 0 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $urinrs[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($urinrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $urinpos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_urine != 0 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $urinpos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($urinpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($urinpus) + count($urinpmb) + count($urinrs) + count($urinpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil dengan Protein Urin Positif (+)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $purinpus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_urine > 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $purinpus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($purinpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $purinpmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_urine > 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $purinpmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($purinpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $purinrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_urine > 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_urine > 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_urine > 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $purinrs[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($purinrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $purinpos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_urine > 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $purinpos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($purinpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($purinpus) + count($purinpmb) + count($purinrs) + count($purinpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2"></td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">c</td>
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil yang Periksa Gula Darah (hanya dihitung satu kali)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $gulapus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_blood_sugar != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $gulapus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($gulapus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $gulapmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_blood_sugar != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $gulapmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($gulapmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $gulars = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_blood_sugar != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_blood_sugar != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_blood_sugar != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $gulars[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($gulars);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $gulapos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_blood_sugar != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $gulapos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($gulapos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($gulapus) + count($gulapmb) + count($gulars) + count($gulapos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil dengan Gula Darah Sewaktu >= 200 mg/dl atau Gula Darah Puasa >= 125 mg/dl</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pgulapus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_blood_sugar >= 200 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $pgulapus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($pgulapus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pgulapmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_blood_sugar >= 200 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $pgulapmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($pgulapmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pgulars = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_blood_sugar >= 200 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_blood_sugar >= 200 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) ||($a->ins_type == 4 && $a->sancl_blood_sugar >= 200 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pgulars[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($pgulars);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pgulapos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_blood_sugar >= 200 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $pgulapos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($pgulapos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($pgulapus) + count($pgulapmb) + count($pgulars) + count($pgulapos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">9</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Mendapatkan Tatalaksana Sesuai Kasus (hanya dihitung satu kali)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">10</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Mendapatkan Konseling / Temu Wicara (hanya dihitung satu kali)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pkiepus = [];

                        foreach ($kie as $a) {
                            if ($a->ins_type == 3) {
                                $pkiepus[] = array(
                                    'set' => $a->pkiepmb
                                );
                            }
                        }

                        echo count($pkiepus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pkiepmb = [];

                        foreach ($kie as $a) {
                            if ($a->ins_type == 6) {
                                $pkiepmb[] = array(
                                    'set' => $a->pkiepmb
                                );
                            }
                        }

                        echo count($pkiepmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pkiepmb = [];

                        foreach ($kie as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4) {
                                $pkiepmb[] = array(
                                    'set' => $a->pkiepmb
                                );
                            }
                        }

                        echo count($pkiepmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pkiepmb = [];

                        foreach ($kie as $a) {
                            if ($a->ins_type == 5) {
                                $pkiepmb[] = array(
                                    'set' => $a->pkiepmb
                                );
                            }
                        }

                        echo count($pkiepmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($pkiepus) + count($pkiepmb) + count($pkiepmb) + count($pkiepmb)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">PENCEGAHAN PENULARAN IBU KE ANAK (PPIA)</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Datang dengan HIV (+)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Dites HIV</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hivpus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_hiv != 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hivpus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hivpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hivpmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_hiv != 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hivpmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hivpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hivrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_hiv != 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_hiv != 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_hiv != 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $hivrs[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hivrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hivpos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_hiv != 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hivpos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hivpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($hivpus) + count($hivpmb) + count($hivrs) + count($hivpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil Yang Mengetahui Status HIVnya</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil dengan Hasil Tes HIV (+)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phivpus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_hiv == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $phivpus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phivpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phivpmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_hiv == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $phivpmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phivpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phivrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_hiv == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 2 && $a->sancl_hiv == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_type == 4 && $a->sancl_hiv == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $phivrs[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phivrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phivpos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_hiv == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $phivpos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phivpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($phivpus) + count($phivpmb) + count($phivrs) + count($phivpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">5</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil HIV (+) Mengakses Layanan PDP</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">6</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil mendapat ART</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">7</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pasangan Ibu Hamil dengan HIV (+) yang Dites HIV</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">8</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir dari Ibu HIV (+)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinhivpus = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 3) {
                                $salinhivpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinhivpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinhivpmb = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 6) {
                                $salinhivpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinhivpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinhivrs = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4) {
                                $salinhivrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinhivrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinhivpos = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 5) {
                                $salinhivpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinhivpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinhivpus) + count($salinhivpmb) + count($salinhivrs) + count($salinhivpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Secara Pervaginam</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorpus = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 3 && $a->sancm_met_marr == 2) {
                                $salinnorpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorpmb = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 6 && $a->sancm_met_marr == 2) {
                                $salinnorpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorrs = [];

                        foreach ($salinhiv as $a) {
                            if (($a->ins_type == 1 && $a->sancm_met_marr == 2) || ($a->ins_type == 2 && $a->sancm_met_marr == 2) || ($a->ins_type == 4 && $a->sancm_met_marr == 2)) {
                                $salinnorrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorpos = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 5 && $a->sancm_met_marr == 2) {
                                $salinnorpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinnorpus) + count($salinnorpmb) + count($salinnorrs) + count($salinnorpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorlpus = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 3 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                $salinnorlpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorlpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorlpmb = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 6 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                $salinnorlpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorlpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorlrs = [];

                        foreach ($salinhiv as $a) {
                            if (($a->ins_type == 1 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) || ($a->ins_type == 2 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) || ($a->ins_type == 4 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1)) {
                                $salinnorlrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorlrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorlpos = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 5 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                $salinnorlpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorlpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinnorlpus) + count($salinnorlpmb) + count($salinnorlrs) + count($salinnorlpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorppus = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 3 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 2) {
                                $salinnorppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorppus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorppmb = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 6 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 2) {
                                $salinnorppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorppmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorprs = [];

                        foreach ($salinhiv as $a) {
                            if (($a->ins_type == 1 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 2) || ($a->ins_type == 2 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 2) || ($a->ins_type == 4 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 2)) {
                                $salinnorprs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorprs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorppos = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 5 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 2) {
                                $salinnorppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorppos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinnorppus) + count($salinnorppmb) + count($salinnorprs) + count($salinnorppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Secara Sectio Cesarea (SC)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincspus = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 3 && $a->sancm_met_marr == 3) {
                                $salincspus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincspus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincspmb = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 6 && $a->sancm_met_marr == 3) {
                                $salincspmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincspmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincsrs = [];

                        foreach ($salinhiv as $a) {
                            if (($a->ins_type == 1 && $a->sancm_met_marr == 3) || ($a->ins_type == 2 && $a->sancm_met_marr == 3) || ($a->ins_type == 4 && $a->sancm_met_marr == 3)) {
                                $salincsrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincsrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincspos = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 5 && $a->sancm_met_marr == 3) {
                                $salinnorpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincspos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salincspus) + count($salincspmb) + count($salincsrs) + count($salincspos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincslpus = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 3 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                $salincslpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincslpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincslpmb = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 6 && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                $salincslpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincslpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincslrs = [];

                        foreach ($salinhiv as $a) {
                            if (($a->ins_type == 1 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 1) || ($a->ins_type == 2 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 1) || ($a->ins_type == 4 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 1)) {
                                $salincslrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincslrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincslpos = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 5 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 1) {
                                $salincslpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincslpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salincslpus) + count($salincslpmb) + count($salincslrs) + count($salincslpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincsppus = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 3 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 2) {
                                $salincsppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincsppus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincsppmb = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 6 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 2) {
                                $salincsppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincsppmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincsprs = [];

                        foreach ($salinhiv as $a) {
                            if (($a->ins_type == 1 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 2) || ($a->ins_type == 2 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 2) || ($a->ins_type == 4 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 2)) {
                                $salincsprs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincsprs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincsppos = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_type == 5 && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 2) {
                                $salincsppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincsppos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salincsppus) + count($salincsppmb) + count($salincsprs) + count($salincsppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">9</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir dari Ibu HIV (+) Mendapatkan Profilaksis</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Mendapatkan Profilaksis ARV</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Mendapatkan Profilaksis Kotrimoxazole</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="13">10</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir dari Ibu HIV (+) Dilakukan Tes EID</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Dilakukan Tes EID I Saat Usia Bayi kurang dari 2 bulan (6 minggu)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Hasil Tes EID I (+)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">c</td>
                <td style=" border: 1px solid black;" colspan="3">Dilakukan Tes EID II Saat Usia Bayi 18 bulan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">d</td>
                <td style=" border: 1px solid black;" colspan="3">Hasil Tes EID II (+)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">11</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir dari Ibu HIV (+) Dilakukan Tes Serologis (PCR)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Dilakukan Tes Serologis (PCR) usia > 9 bulan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Hasil Tes Serologis (PCR) (+)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">12</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Anak HIV (+) Setelah EID II atau dengan PCR</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Anak HIV(+) mengakses layanan PDP</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Anak HIV (+) Mendapatkan Pengobatan ARV</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">13</td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Dites Sifilis</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $sifilispus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_sifilis != 0) {
                                $sifilispus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($sifilispus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $sifilispmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_sifilis != 0) {
                                $sifilispmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($sifilispmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $sifilisrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_sifilis != 0) || ($a->ins_type == 2 && $a->sancl_sifilis != 0) || ($a->ins_type == 4 && $a->sancl_sifilis != 0)) {
                                $sifilisrs[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($sifilisrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $sifilispos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_sifilis != 0) {
                                $sifilispos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($sifilispos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($sifilispus) + count($sifilispmb) + count($sifilisrs) + count($sifilispos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Sifilis (+)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $psifilispus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_sifilis == 2) {
                                $psifilispus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($psifilispus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $psifilispmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_sifilis == 2) {
                                $psifilispmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($psifilispmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $psifilisrs = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_sifilis == 2) || ($a->ins_type == 2 && $a->sancl_sifilis == 2) || ($a->ins_type == 4 && $a->sancl_sifilis == 2)) {
                                $psifilisrs[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($psifilisrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $psifilispos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_sifilis == 2) {
                                $psifilispos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($psifilispos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($psifilispus) + count($psifilispmb) + count($psifilisrs) + count($psifilispos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4"></td>
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Sifilis (+) yang Diobati</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dengan Sifilis Kongenital</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dengan Sifilis Kongenital Yang Diobati</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Pasangan Ibu Hamil dengan Sifilis (+) yang Diobati</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">14</td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Diperiksa Hepatitis B</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbpus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_hbsag != 0) {
                                $hbpus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hbpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbpmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_hbsag != 0) {
                                $hbpmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hbpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbpos = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_hbsag != 0) || ($a->ins_type == 2 && $a->sancl_hbsag != 0) || ($a->ins_type == 4 && $a->sancl_hbsag != 0)) {
                                $hbpos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hbpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbpos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_hbsag != 0) {
                                $hbpos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hbpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($hbpus) + count($hbpmb) + count($hbpos) + count($hbpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Hepatitis B (+)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phbpus = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 3 && $a->sancl_hbsag == 2) {
                                $phbpus[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phbpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phbpmb = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 6 && $a->sancl_hbsag == 2) {
                                $phbpmb[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phbpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phbpos = [];

                        foreach ($lab as $a) {
                            if (($a->ins_type == 1 && $a->sancl_hbsag == 2) || ($a->ins_type == 2 && $a->sancl_hbsag == 2) || ($a->ins_type == 4 && $a->sancl_hbsag == 2)) {
                                $phbpos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phbpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phbpos = [];

                        foreach ($lab as $a) {
                            if ($a->ins_type == 5 && $a->sancl_hbsag == 2) {
                                $phbpos[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phbpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($phbpus) + count($phbpmb) + count($phbpos) + count($phbpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4"></td>
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Hepatitis B (+) yang Mendapatkan Tatalaksana (Rujukan)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dari Ibu Hepatitis B (+)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phepbpus = [];

                        foreach ($salinhb as $a) {
                            if ($a->ins_type == 3 && $a->sancl_hbsag == 2) {
                                $phepbpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($phepbpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phepbpmb = [];

                        foreach ($salinhb as $a) {
                            if ($a->ins_type == 6 && $a->sancl_hbsag == 2) {
                                $phepbpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($phepbpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phepbrs = [];

                        foreach ($salinhb as $a) {
                            if (($a->ins_type == 1 && $a->sancl_hbsag == 2) || ($a->ins_type == 2 && $a->sancl_hbsag == 2) || ($a->ins_type == 4 && $a->sancl_hbsag == 2)) {
                                $phepbrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($phepbrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phepbpos = [];

                        foreach ($salinhb as $a) {
                            if ($a->ins_type == 5 && $a->sancl_hbsag == 2) {
                                $phepbpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($phepbpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($phepbpus) + count($phepbpmb) + count($phepbrs) + count($phepbpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dari Ibu Hepatitis B (+) Usia 9-12 Bulan Diperiksa Hepatitis B</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dari Ibu Hepatitis B (+) Dengan Hasil Tes Hepatitis B (+)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">PERSALINAN DI RB PUSKESMAS</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="12">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Bersalin Yang Datang</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincpus = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 3 && $a->sancd_type == 1 && $a->sancd_no == 1) {
                                $salincpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincpmb = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 6 && $a->sancd_type == 1 && $a->sancd_no == 1) {
                                $salincpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincrs = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancd_type == 1 && $a->sancd_no == 1) {
                                $salincrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincpos = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 5 && $a->sancd_type == 1 && $a->sancd_no == 1) {
                                $salincpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salincpus) + count($salincpmb) + count($salincrs) + count($salincpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="5">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Yang Bersalin (Termasuk Yang dirujuk)</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salincpus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salincpmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salincrs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salincpos)  }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salincpus) + count($salincpmb) + count($salincrs) + count($salincpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Usia Ibu kurang dari 18 Tahun</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin18pus = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 3 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) < 18) {
                                $salin18pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin18pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin18pmb = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 6 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) < 18) {
                                $salin18pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin18pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin18rs = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) < 18) {
                                $salin18rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin18rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin18pos = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 5 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) < 18) {
                                $salin18pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin18pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salin18pus) + count($salin18pmb) + count($salin18rs) + count($salin18pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Usia Ibu 18 - 20 Tahun</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin1820pus = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 3 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 18 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 20) {
                                $salin1820pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin1820pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin1820pmb = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 6 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 18 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 20) {
                                $salin1820pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin1820pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin1820rs = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 18 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 20) {
                                $salin1820rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin1820rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin1820pos = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 5 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 18 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 20) {
                                $salin1820pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin1820pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salin1820pus) + count($salin1820pmb) + count($salin1820rs) + count($salin1820pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iii</td>
                <td style=" border: 1px solid black;" colspan="2">Usia Ibu 21 - 35 Tahun</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin2135pus = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 3 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 21 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 35) {
                                $salin2135pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin2135pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin2135pmb = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 6 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 21 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 35) {
                                $salin2135pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin2135pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin2135rs = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 21 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 35) {
                                $salin2135rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin2135rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin2135pos = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 5 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 21 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 35) {
                                $salin2135pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin2135pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salin2135pus) + count($salin2135pmb) + count($salin2135rs) + count($salin2135pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iv</td>
                <td style=" border: 1px solid black;" colspan="2">Usia Ibu > 35 Tahun</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin35pus = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 3 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) > 35) {
                                $salin35pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin35pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin35pmb = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 6 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) > 35) {
                                $salin35pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin35pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin35rs = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) > 35) {
                                $salin35rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin35rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin35pos = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_type == 5 && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) > 35) {
                                $salin35pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin35pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salin35pus) + count($salin35pmb) + count($salin35rs) + count($salin35pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kasus Rujukan Ibu Bersalin</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : HDK, PEB atau Eklampsi</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Perdarahan (antepartum atau post partum)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iii</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Penyakit Jantung</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iv</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Partus Sulit, CPD atau Distosia Bahu</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">v</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Bukan salah satu diatas</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="13">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Yang Dilahirkan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3) {
                                $salinlahirpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6) {
                                $salinlahirpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4) {
                                $salinlahirrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5) {
                                $salinlahirpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirpus) + count($salinlahirpmb) + count($salinlahirrs) + count($salinlahirpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Bayi Lahir Hidup</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond == 1) {
                                $salinlahirhpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond == 1) {
                                $salinlahirhpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond == 1) {
                                $salinlahirhrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond == 1) {
                                $salinlahirhpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirhpus) + count($salinlahirhpmb) + count($salinlahirhrs) + count($salinlahirhpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhlpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                $salinlahirhlpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhlpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhlpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                $salinlahirhlpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhlpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhlrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                $salinlahirhlrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhlrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhlpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                $salinlahirhlpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhlpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirhlpus) + count($salinlahirhlpmb) + count($salinlahirhlrs) + count($salinlahirhlpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhppus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                $salinlahirhppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhppmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                $salinlahirhppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhprs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                $salinlahirhprs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhprs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhppos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                $salinlahirhppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirhppus) + count($salinlahirhppmb) + count($salinlahirhprs) + count($salinlahirhppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Bayi Lahir Mati</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond == 0) {
                                $salinlahirmpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond == 0) {
                                $salinlahirmpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond == 0) {
                                $salinlahirmrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond == 0) {
                                $salinlahirmpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirmpus) + count($salinlahirmpmb) + count($salinlahirmrs) + count($salinlahirmpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmlpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond == 0 && $a->sancmskl_sex == 1) {
                                $salinlahirmlpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmlpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmlpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond == 0 && $a->sancmskl_sex == 1) {
                                $salinlahirmlpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmlpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmlrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond == 0 && $a->sancmskl_sex == 1) {
                                $salinlahirmlrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmlrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmlpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                $salinlahirmlpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmlpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirmlpus) + count($salinlahirmlpmb) + count($salinlahirmlrs) + count($salinlahirmlpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmppus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond == 0 && $a->sancmskl_sex == 2) {
                                $salinlahirmppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmppmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond == 0 && $a->sancmskl_sex == 2) {
                                $salinlahirmppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmprs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond == 0 && $a->sancmskl_sex == 2) {
                                $salinlahirmprs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmprs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmppos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                $salinlahirmppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirmppus) + count($salinlahirmppmb) + count($salinlahirmprs) + count($salinlahirmppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Yang Dirujuk</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Asfiksia</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Klasifikasi Berat MTBM</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iii</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Penyakit Bawaan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iv</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Tetanus Neonatorum</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">v</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Bukan salah satu diatas</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">KEMATIAN IBU</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Ibu</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">2</td>
                <td style=" border: 1px solid black;" colspan="4">Penyebab Kematian Ibu</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Perdarahan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Hipertensi dalam Kehamilan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Infeksi</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Gangguan Sistem Peredaran Darah (Jantung, Stroke dan lain-lain)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Gangguan Metabolik (DM dan lain-lain)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Lain-lain</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kematian Ibu yang Dilakukan Audit Maternal Perinatal (AMP)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kematian di Rumah Sakit Yang dilakukan Audit Medik</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kematian Selain di Rumah Sakit yang Dilakukan Pengkajian Kasus Oleh Puskesmas</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">KELUARGA BERENCANA</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="4">Pelayanan Keluarga Berencana</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Aktif</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Pasca Persalinan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="5"></td>
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah PUS 4T Ber-KB</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB yang Mengalami Efek Samping</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB yang Mengalami Komplikasi</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB yang Mengalami Kegagalan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">g</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB yang Drop Out</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Peserta KB Aktif Menurut Metode Kontrasepsi Cara Modern</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Kondom</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Pil</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Suntik</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB AKDR Pasca Plasenta</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB AKDR Sampai dengan 42 Hari</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3"></td>
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Implan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">g</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB MOW</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">h</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB MOP</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="9">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Peserta KB Pasca Salin Menurut Metode Kontrasepsi Cara Modern</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Kondom</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Pil</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Suntik</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB AKDR Pasca Plasenta</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB AKDR Sampai dengan 42 Hari</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Implan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">g</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB MOW</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">h</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB MOP</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">PERINATAL DAN BAYI</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir Hidup</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhpus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhpmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhrs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhpos) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirhpus) + count($salinlahirhpmb) + count($salinlahirhrs) + count($salinlahirhpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhlpus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhlpmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhlrs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhlpos) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirhlpus) + count($salinlahirhlpmb) + count($salinlahirhlrs) + count($salinlahirhlpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhppus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhppmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhprs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirhppos) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirhppus) + count($salinlahirhppmb) + count($salinlahirhprs) + count($salinlahirhppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir Prematur kurang dari 37 Minggu (259 hari)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37pus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37pmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37rs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37pos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salin37pus) + count($salin37pmb) + count($salin37rs) + count($salin37pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37lpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_sex == 1 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37lpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37lpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37lpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_sex == 1 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37lpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37lpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37lrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_sex == 1 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37lrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37lrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37lpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_sex == 1 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37lpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37lpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salin37lpus) + count($salin37lpmb) + count($salin37lrs) + count($salin37lpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37ppus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_sex == 2 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37ppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37ppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37ppmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_sex == 2 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37ppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37ppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37prs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_sex == 2 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37prs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37prs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37ppos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_sex == 2 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37ppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37ppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salin37ppus) + count($salin37ppmb) + count($salin37prs) + count($salin37ppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Berat Lahir Rendah kurang dari 2500 gram</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_weight < 2500) {
                                $salinbbpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_weight < 2500) {
                                $salinbbpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_weight < 2500) {
                                $salinbbrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_weight < 2500) {
                                $salinbbpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinbbpus) + count($salinbbpmb) + count($salinbbrs) + count($salinbbpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbblpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 1) {
                                $salinbblpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbblpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbblpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 1) {
                                $salinbblpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbblpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbblrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 1) {
                                $salinbblrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbblrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbblpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 1) {
                                $salinbblpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbblpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinbblpus) + count($salinbblpmb) + count($salinbblrs) + count($salinbblpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbppus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 2) {
                                $salinbbppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbppmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 2) {
                                $salinbbppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbprs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 1) {
                                $salinbbprs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbprs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbppos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 1) {
                                $salinbbppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinbbppus) + count($salinbbppmb) + count($salinbbprs) + count($salinbbppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Inisiasi Menyusu Dini</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Baru Lahir (0 - 6 Jam dengan Kondisi yang Stabil)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06pus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond_baby == 1) {
                                $salins06pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06pmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond_baby == 1) {
                                $salins06pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06rs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond_baby == 1) {
                                $salins06rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06pos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond_baby == 1) {
                                $salins06pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salins06pus) + count($salins06pmb) + count($salins06rs) + count($salins06pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06lpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 1) {
                                $salins06lpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06lpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06lpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 1) {
                                $salins06lpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06lpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06lrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 1) {
                                $salins06lrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06lrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06lpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 1) {
                                $salins06lpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06lpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salins06lpus) + count($salins06lpmb) + count($salins06lrs) + count($salins06lpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06ppus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 2) {
                                $salins06ppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06ppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06ppmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 2) {
                                $salins06ppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06ppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06prs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 2) {
                                $salins06prs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06prs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06ppos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 2) {
                                $salins06ppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06ppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salins06ppus) + count($salins06ppmb) + count($salins06prs) + count($salins06ppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Baru Lahir (0 - 6 Jam dengan Kondisi yang Tidak Stabil)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06pus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond_baby == 0) {
                                $salints06pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06pmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond_baby == 0) {
                                $salints06pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06rs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond_baby == 0) {
                                $salints06rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06pos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond_baby == 0) {
                                $salints06pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salints06pus) + count($salints06pmb) + count($salints06rs) + count($salints06pos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06lpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 1) {
                                $salints06lpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06lpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06lpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 1) {
                                $salints06lpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06lpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06lrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 1) {
                                $salints06lrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06lrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06lpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 1) {
                                $salints06lpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06lpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salints06lpus) + count($salints06lpmb) + count($salints06lrs) + count($salints06lpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06ppus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 2) {
                                $salints06ppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06ppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06ppmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 2) {
                                $salints06ppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06ppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06prs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 2) {
                                $salints06prs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06prs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06ppos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 2) {
                                $salints06ppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06ppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salints06ppus) + count($salints06ppmb) + count($salints06prs) + count($salints06ppos)) }}</td>A
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">7</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan Neonatal I (0 - 3 Hari)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28pus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) ) {
                                $neo28pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28pmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28rs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28pos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo28pus) + count($neo28pmb) + count($neo28rs) + count($neo28pus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28lpus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28lpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28lpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28lpmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28lpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28lpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28lrs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28lrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28lrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28lpos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 5 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28lpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28lpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo28lpus) + count($neo28lpmb) + count($neo28lrs) + count($neo28lpus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28ppus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28ppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28ppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28ppmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28ppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28ppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28prs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28prs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28prs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28ppos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 5 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28ppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28ppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo28ppus) + count($neo28ppmb) + count($neo28prs) + count($neo28ppus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">8</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan Neonatal II (4 - 7 Hari)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47pus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47pmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47rs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47pos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo47pus) + count($neo47pmb) + count($neo47rs) + count($neo47pus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47lpus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47lpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47lpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47lpmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47lpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47lpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47lrs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47lrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47lrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47lpos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47lpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47lpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo47lpus) + count($neo47lpmb) + count($neo47lrs) + count($neo47lpus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47ppus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47lpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47ppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47ppmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47ppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47ppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47prs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47prs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47prs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47ppos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47ppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47ppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo47ppus) + count($neo47ppmb) + count($neo47prs) + count($neo47ppus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">9</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan Neonatal III (8 - 28 Hari)</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828pus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828pus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828pus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828pmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828pmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828pmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828rs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828rs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828rs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828pos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828pos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828pos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo828pus) + count($neo828pmb) + count($neo828rs) + count($neo828pus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828lpus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828lpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828lpus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828lpmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828lpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828lpmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828lrs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828lrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828lrs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828lpos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828lpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828lpos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo828lpus) + count($neo828lpmb) + count($neo828lrs) + count($neo828lpus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828ppus = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828ppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828ppus);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828ppmb = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 6 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828ppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828ppmb);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828prs = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828prs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828prs);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828ppos = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_type == 3 && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828ppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828ppos);

                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($neo828ppus) + count($neo828ppmb) + count($neo828prs) + count($neo828ppus)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">10</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan Neonatal Lengkap</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">11</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Bayi Baru Lahir</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3) {
                                $salinpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6) {
                                $salinpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4) {
                                $salinrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5) {
                                $salinpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinpus) + count($salinpmb) + count($salinrs) + count($salinpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_sex == 1) {
                                $salinlpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_sex == 1) {
                                $salinlpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_sex == 1) {
                                $salinlrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_sex == 1) {
                                $salinlpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlpus) + count($salinlpmb) + count($salinlrs) + count($salinlpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinppus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_sex == 2) {
                                $salinppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinppus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinppmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_sex == 2) {
                                $salinppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinppmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinprs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_sex == 2) {
                                $salinprs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinprs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinppos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_sex == 2) {
                                $salinppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinppos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinppus) + count($salinppmb) + count($salinprs) + count($salinppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">12</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Imunisasi Dasar Lengkap (kurang dari 1 Tahun)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">13</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi yang Mendapat Vitamin A Biru</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">14</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi yang Mendapat Stimulasi, Deteksi dan Intervensi Dini Tumbuh Kembang (SDIDTK) 4 Kali</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">15</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Penyuluhan ASI Eksklusif</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">16</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi yang Mempunyai Buku KIA</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">17</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Neonatus (0 - 28 Hari) dengan Komplikasi yang Ditangani</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">18</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Perkembangan Motorik Kasar</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">19</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Perkembangan Motorik Halus</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">20</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Bicara dan Bahasa</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">21</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Sosialisasi dan Kemandirian</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">22</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Perilaku</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">23</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Pendengaran</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">24</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Penglihatan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">25</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Hasil KSPS Penyimpangan (Dp)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">26</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Hasil KSPS Meragukan (Dm)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">27</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi yang Mendapatkan Skrining Hipotiroid Kongenital (SHK)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">28</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Kesehatan Bayi</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">29</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir Mati</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmpus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmpmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmrs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmpos) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirmpus) + count($salinlahirmpmb) + count($salinlahirmrs) + count($salinlahirmpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmlpus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmlpmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmlrs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmlpos) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirmlpus) + count($salinlahirmlpmb) + count($salinlahirmlrs) + count($salinlahirmlpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmppus) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmppmb) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmprs) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($salinlahirmppos) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlahirmppus) + count($salinlahirmppmb) + count($salinlahirmprs) + count($salinlahirmppos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">30</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Neonatal 0 - 6 Hari</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">31</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Neonatal 7 -28 Hari</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">32</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Neonatal 0 - 28 Hari</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <div class="page_break"></div>

    <table style="width: 100%; border-collapse: collapse; font-size: 10pt; margin-top: 20px;">
        <thead style=" border: 1px solid black;">
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" colspan="5">Data</th>
                <th style=" border: 1px solid black;">PUSKESMAS</th>
                <th style=" border: 1px solid black;">PMB</th>
                <th style=" border: 1px solid black;">RS/RSIA/RSB</th>
                <th style=" border: 1px solid black;">POSYANDU</th>
                <th style=" border: 1px solid black;">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="19">33</td>
                <td style=" border: 1px solid black;" colspan="4">Penyebab Kematian Neonatal 0 - 28 Hari</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="3">BBLR</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="3">Asfiksia</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="3">Tetanus Neonatorum</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="3">Sepsis</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="3">Kelainan Bawaan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="3">Lain-lain</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">34</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Post Neonatal (29 Hari - 11 Bulan)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">35</td>
                <td style=" border: 1px solid black;" colspan="4">Penyebab Kematian Post Neonatal (29 Hari - 11 Bulan)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="21"></td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="3">Pneumonia</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Diare</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="3">Asfiksia</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="3">Kelainan Saluran Cerna</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="3">Tetanus</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="3">Kelainan Saraf</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="3">Malaria</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">7</td>
                <td style=" border: 1px solid black;" colspan="3">Lain-lain</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">36</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Bayi (0 - 11 Bulan) (Neonatal + Post Neonatal)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">37</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kasus Kematian Neonatal di wilayah kerja</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">38</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kasus Kematian Neonatal di wilayah kerja yang Di Otopsi Verbal</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">39</td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Puskesmas Kecamatan yang Melaksanakan Kelas Ibu Balita</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Puskesmas Kelurahan yang Melaksanakan Kelas Ibu Balita</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kelas Ibu Balita yang Terbentuk</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu yang mengikuti kelas Ibu Balita</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu yang Mengikuti Kelas Ibu Balita Lanjutan dari Kelas Ibu Hamil</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Suami/ Keluarga yang Mengikuti Kelas Ibu Balita</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">BALITA DAN PRASEKOLAH</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Kesehatan Anak Balita</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2"></td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Balita yang Mendapat Stimulasi, Deteksi dan Intervensi Dini Tumbuh Kembang (SDIDTK) 2 Kali</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Balita yang Mendapat Vitamin A 2 Kali Setahun</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Balita yang Mempunyai Buku KIA</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Balita dengan Penimbangan 8 Kali</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Anak Balita (12 - 59 Bulan)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4">7</td>
                <td style=" border: 1px solid black;" colspan="4">Penyebab Kematian Anak Balita (12 - 59 Bulan)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="3">Diare</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="18">7</td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="3">Pneumonia</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="3">Malaria</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="3">Campak</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="3">Demam Berdarah Dengue (DBD)</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="3">Difteri</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">7</td>
                <td style=" border: 1px solid black;" colspan="3">Lain-lain</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">8</td>
                <td style=" border: 1px solid black;" colspan="4">Pelayanan MTBS</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">PERSALINAN DAN NIFAS DI WILAYAH</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Persalinan di Fasilitas Kesehatan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3) {
                                $salinpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6) {
                                $salinpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4) {
                                $salinrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5) {
                                $salinpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinpus) + count($salinpmb) + count($salinrs) + count($salinpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Bayi Lahir Laki-laki</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlpus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_sex == 1) {
                                $salinlpus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlpus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlpmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_sex == 1) {
                                $salinlpmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlpmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlrs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_sex == 1) {
                                $salinlrs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlrs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlpos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_sex == 1) {
                                $salinlpos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlpos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinlpus) + count($salinlpmb) + count($salinlrs) + count($salinlpos)) }}</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Bayi Lahir Perempuan</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinppus = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 3 && $a->sancmskl_sex == 2) {
                                $salinppus[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinppus);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinppmb = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 6 && $a->sancmskl_sex == 2) {
                                $salinppmb[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinppmb);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinprs = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancmskl_sex == 2) {
                                $salinprs[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinprs);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinppos = [];

                        foreach ($salin as $a) {
                            if ($a->ins_type == 5 && $a->sancmskl_sex == 2) {
                                $salinppos[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinppos);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($salinppus) + count($salinppmb) + count($salinprs) + count($salinppos)) }}</td>
            </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;" rowspan="7">2</td>
                    <td style=" border: 1px solid black;" colspan="4">Jumlah Persalinan di Non-Fasilitas Kesehatan</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Persalinan Ditolong Tenaga Kesehatan</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">i</td>
                    <td style=" border: 1px solid black;" colspan="2">Bayi Lahir Laki-laki</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">ii</td>
                    <td style=" border: 1px solid black;" colspan="2">Bayi Lahir Perempuan</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Persalinan Ditolong Non Tenaga Kesehatan</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">i</td>
                    <td style=" border: 1px solid black;" colspan="2">Bayi Lahir Laki-laki</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">ii</td>
                    <td style=" border: 1px solid black;" colspan="2">Bayi Lahir Perempuan</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">3</td>
                    <td style=" border: 1px solid black;" colspan="4">Jumlah Persalinan Oleh Tenaga Kesehatan</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ count($salinpus) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ count($salinpmb) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ count($salinrs) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ count($salinpos) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count($salinpus) + count($salinpmb) + count($salinrs) + count($salinpos)) }}</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">4</td>
                    <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Nifas yang Mendapat Vitamin A</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                    <td style=" border: 1px solid black; text-align: center;">a</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Kunjungan Ibu Nifas KF1</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask1pus = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 3 && $a->sancd_type == 2 && $a->sancd_no == 1) {
                                    $nifask1pus[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask1pus);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask1pmb = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 6 && $a->sancd_type == 2 && $a->sancd_no == 1) {
                                    $nifask1pmb[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask1pmb);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask1rs = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancd_type == 2 && $a->sancd_no == 1) {
                                    $nifask1rs[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask1rs);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask1pos = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 5 && $a->sancd_type == 2 && $a->sancd_no == 1) {
                                    $nifask1pos[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask1pos);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count($nifask1pus) + count($nifask1pmb) + count($nifask1rs) + count($nifask1pos)) }}</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">b</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Kunjungan Ibu Nifas KF2</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask2pus = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 3 && $a->sancd_type == 2 && $a->sancd_no == 2) {
                                    $nifask2pus[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask2pus);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask2pmb = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 6 && $a->sancd_type == 2 && $a->sancd_no == 2) {
                                    $nifask2pmb[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask2pmb);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask2rs = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancd_type == 2 && $a->sancd_no == 2) {
                                    $nifask2rs[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask2rs);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask2pos = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 5 && $a->sancd_type == 2 && $a->sancd_no == 2) {
                                    $nifask2pos[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask2pos);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count($nifask2pus) + count($nifask2pmb) + count($nifask2rs) + count($nifask2pos)) }}</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">c</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Kunjungan Ibu Nifas KF3</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask3pus = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 3 && $a->sancd_type == 2 && $a->sancd_no == 3) {
                                    $nifask3pus[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask3pus);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask3pmb = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 6 && $a->sancd_type == 2 && $a->sancd_no == 3) {
                                    $nifask3pmb[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask3pmb);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask3rs = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 1 || $a->ins_type == 2 || $a->ins_type == 4 && $a->sancd_type == 2 && $a->sancd_no == 3) {
                                    $nifask3rs[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask3rs);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask3pos = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_type == 5 && $a->sancd_type == 2 && $a->sancd_no == 3) {
                                    $nifask3pos[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask3pos);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count($nifask1pus) + count($nifask1pmb) + count($nifask1rs) + count($nifask1pos)) }}</td>
                </tr>
        </tbody>
    </table>

    <table width="100%" style="font-size: 10pt; margin-top: 10pt;">
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
