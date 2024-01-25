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
    <table style="width: 100%; font-size: 8pt;">
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
                <th style=" border: 1px solid black;" colspan="5" rowspan="2">Data</th>
                <th style=" border: 1px solid black; text-align: center" colspan="{{ count($dest) }}">RW</th>
                <th style=" border: 1px solid black;" rowspan="2">TOTAL</th>
            </tr>
            <tr style=" border: 1px solid black;">
                @foreach ($dest as $d)
                    <th style=" border: 1px solid black;">{{ strtoupper($d->ds_destination) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">Indikator Umum, SPM dan Renstra dan Lainnya</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="{{ count($dest) + 1 }}">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil Mempunyai Buku KIA</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'kia' . $d->ds_destination} = [];

                            foreach ($kie as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sanckie_kia_book == '1') {
                                    ${'kia' . $d->ds_destination}[] = array(
                                        'set' => $a->sanckie_kia_book
                                    );
                                }
                            }

                            echo count(${'kia' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kiatotal = [];

                        foreach ($kie as $a) {
                            if ($a->sanckie_kia_book == '1') {
                                $kiatotal[] = array(
                                    'set' => $a->sanckie_kia_book
                                );
                            }
                        }

                        echo count($kiatotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan K1 Ibu Hamil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k1murni' . $d->ds_destination} = [];

                            foreach ($anamnesa as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                    ${'k1murni' . $d->ds_destination}[] = array(
                                        'set' => $a->sanca_trimester
                                    );
                                }
                            }

                            ${'k1akses' . $d->ds_destination} = [];

                            foreach ($anamnesa as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                    ${'k1akses' . $d->ds_destination}[] = array(
                                        'set' => $a->sanca_trimester
                                    );
                                }
                            }

                            echo count(${'k1akses' . $d->ds_destination}) + count(${'k1akses' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k1murnitotal = [];

                        foreach ($anamnesa as $a) {
                            if ($a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k1murnitotal[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        $k1aksestotal = [];

                        foreach ($anamnesa as $a) {
                            if ($a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k1aksestotal[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k1murnitotal) + count($k1aksestotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">1</td>
                <td style=" border: 1px solid black;" colspan="3">K1 Murni</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k1murni' . $d->ds_destination} = [];

                            foreach ($anamnesa as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                    ${'k1murni' . $d->ds_destination}[] = array(
                                        'set' => $a->sanca_trimester
                                    );
                                }
                            }

                            echo count(${'k1akses' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k1murnitotal = [];

                        foreach ($anamnesa as $a) {
                            if ($a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k1murnitotal[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k1murnitotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">2</td>
                <td style=" border: 1px solid black;" colspan="3">K1 Akses</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k1murni' . $d->ds_destination} = [];

                            foreach ($anamnesa as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sanca_trimester == 'I' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                    ${'k1murni' . $d->ds_destination}[] = array(
                                        'set' => $a->sanca_trimester
                                    );
                                }
                            }

                            echo count(${'k1akses' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k1aksestotal = [];

                        foreach ($anamnesa as $a) {
                            if ($a->sanca_trimester != 'I' && $a->sancd_no == '1' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k1aksestotal[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k1aksestotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan K4 Ibu Hamil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k4' . $d->ds_destination} = [];

                            foreach ($anamnesa as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                    ${'k4' . $d->ds_destination}[] = array(
                                        'set' => $a->sanca_trimester
                                    );
                                }
                            }

                            echo count(${'k4' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k4total = [];

                        foreach ($anamnesa as $a) {
                            if ($a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k4total[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k4total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan K6 Ibu Hamil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k6' . $d->ds_destination} = [];

                            foreach ($anamnesa as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                    ${'k6' . $d->ds_destination}[] = array(
                                        'set' => $a->sanca_trimester
                                    );
                                }
                            }

                            echo count(${'k6' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k6total = [];

                        foreach ($anamnesa as $a) {
                            if ($a->sancd_no == '4' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $k6total[] = array(
                                    'set' => $a->sanca_trimester
                                );
                            }
                        }

                        echo count($k6total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">5</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa Dahak</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'bta' . $d->ds_destination} = [];

                            foreach ($lab as $a) {
                                if (($a->ins_rw == $d->ds_destination && $a->sancl_bta == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_rw == $d->ds_destination && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                    ${'bta' . $d->ds_destination}[] = array(
                                        'set' => $a->sancl_bta
                                    );
                                }
                            }

                            echo count(${'bta' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $btatotal = [];

                        foreach ($lab as $a) {
                            if (($a->sancl_bta == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $btatotal[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($btatotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Dahak TB (+)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'pbta' . $d->ds_destination} = [];

                            foreach ($lab as $a) {
                                if (($a->ins_rw == $d->ds_destination && $a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                    ${'pbta' . $d->ds_destination}[] = array(
                                        'set' => $a->sancl_bta
                                    );
                                }
                            }

                            echo count(${'pbta' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pbtatotal = [];

                        foreach ($lab as $a) {
                            if (($a->sancl_bta == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pbtatotal[] = array(
                                    'set' => $a->sancl_bta
                                );
                            }
                        }

                        echo count($pbtatotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">6</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil TB yang Diberikan Obat</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa Ankylostoma (Kecacingan dalam Kehamilan)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">7</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Ankylostoma (+)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Ankylostoma (+) yang Diobati</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">8</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa IMS</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'ims' . $d->ds_destination} = [];

                            foreach ($lab as $a) {
                                if (($a->ins_rw == $d->ds_destination && $a->sancl_sifilis == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->ins_rw == $d->ds_destination && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                    ${'ims' . $d->ds_destination}[] = array(
                                        'set' => $a->sancl_sifilis
                                    );
                                }
                            }

                            echo count(${'ims' . $d->ds_destination});
                        ?>
                    </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $imstotal = [];

                        foreach ($lab as $a) {
                            if (($a->sancl_sifilis == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) || ($a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $imstotal[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($imstotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes IMS (+)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'pims' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if (($a->ins_rw == $d->ds_destination && $a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                ${'pims' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count(${'pims' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pimstotal = [];

                        foreach ($lab as $a) {
                            if (($a->sancl_sifilis == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)))) {
                                $pimstotal[] = array(
                                    'set' => $a->sancl_sifilis
                                );
                            }
                        }

                        echo count($pimstotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes IMS (+) yang Diobati</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="5">9</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Puskesmas Kecamatan yang Melaksanakan Kelas Ibu Hamil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Puskesmas Kelurahan yang Melaksanakan Kelas Ibu Hamil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kelas Ibu Hamil yang Terbentuk</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Mengikuti Kelas Ibu Hamil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Suami/ Keluarga yang Mengikuti Kelas Ibu Hamil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4">10</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Ibu Hamil, Bersalin dan Nifas yang Terdeteksi Komplikasi (PK Maternal)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Ibu Hamil, Bersalin dan Nifas yang Terdeteksi Komplikasi Pertama Kali oleh Nakes</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Ibu Hamil, Bersalin dan Nifas yang Terdeteksi Komplikasi Pertama Kali oleh Masyarakat</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Rujukan Kasus Risiko Tinggi Maternal</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">ANC Terpadu</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="{{ count($dest) + 1 }}">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">1</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Yang Dilakukan Penimbangan Berat Badan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'bb' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancpe_weight_now != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'bb' . $d->ds_destination}[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count(${'bb' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bbtotal = [];

                        foreach ($fisik as $a) {
                            if ($a->sancpe_weight_now != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $bbtotal[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count($bbtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Yang Dilakukan Pengukuran Tinggi Badan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'tb' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancpe_height != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'tb' . $d->ds_destination}[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count(${'tb' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbtotal = [];

                        foreach ($fisik as $a) {
                            if ($a->sancpe_height != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tbtotal[] = array(
                                    'set' => $a->sancpe_weight_now
                                );
                            }
                        }

                        echo count($tbtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">2</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa Tekanan Darah (TD)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'td' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'td' . $d->ds_destination}[] = array(
                                    'set' => $a->sancpe_blood_pressure
                                );
                            }
                        }

                        echo count(${'td' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tdtotal = [];

                        foreach ($fisik as $a) {
                            if ($a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tdtotal[] = array(
                                    'set' => $a->sancpe_blood_pressure
                                );
                            }
                        }

                        echo count($tdtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Hipertensi (TD Sistol >= 140 mmHg dan/atau TD Diastol >= 90 mmHg)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'tdd' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $exp = explode('/', $a->sancpe_blood_pressure);

                                if ($exp[0] >= 140) {
                                    ${'tdd' . $d->ds_destination}[] = array(
                                        'set' => $a->sancpe_blood_pressure
                                    );
                                }
                            }
                        }

                        echo count(${'tdd' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tddtotal = [];

                        foreach ($fisik as $a) {
                            if ($a->sancpe_blood_pressure != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $exp = explode('/', $a->sancpe_blood_pressure);

                                if ($exp[0] >= 140) {
                                    $tddtotal[] = array(
                                        'set' => $a->sancpe_blood_pressure
                                    );
                                }
                            }
                        }

                        echo count($tddtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">3</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Periksa LILA</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'lila' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancpe_arm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'lila' . $d->ds_destination}[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count(${'lila' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $lilatotal = [];

                        foreach ($fisik as $a) {
                            if ($a->sancpe_arm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $lilatotal[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($lilatotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil KEK (LILA kurang dari 23.5 cm)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'plila' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancpe_arm <= 23.5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'plila' . $d->ds_destination}[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count(${'plila' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $plilatotal = [];

                        foreach ($fisik as $a) {
                            if ($a->sancpe_arm <= 23.5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $plilatotal[] = array(
                                    'set' => $a->sancpe_arm
                                );
                            }
                        }

                        echo count($plilatotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Dilakukan Pemeriksaan Tinggi Fundus Uteri (TFU)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'tfu' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancpe_tfu_cm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->ins_rw == $d->ds_destination && $a->sancpe_tfu_finger != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'tfu' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'tfu' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tfutotal = [];

                        foreach ($fisik as $a) {
                            if ($a->sancpe_tfu_cm != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month)) || $a->sancpe_tfu_finger != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $tfutotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($tfutotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">5</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Dilakukan Pemeriksaan Presentasi dan Denyut Jantung Janin (DJJ)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'djj' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancpe_djj != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'djj' . $d->ds_destination}[] = array(
                                    'set' => $a->sancpe_djj
                                );
                            }
                        }

                        echo count(${'djj' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $djjtotal = [];

                        foreach ($fisik as $a) {
                            if ($a->sancpe_djj != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $djjtotal[] = array(
                                    'set' => $a->sancpe_djj
                                );
                            }
                        }

                        echo count($djjtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">6</td>
                <td style=" border: 1px solid black;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T1 setelah pelayanan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'t1' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sanct_tt == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'t1' . $d->ds_destination}[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count(${'t1' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t1total = [];

                        foreach ($fisik as $a) {
                            if ($a->sanct_tt == 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t1total[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t1total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T2 setelah pelayanan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'t2' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sanct_tt == 3 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'t2' . $d->ds_destination}[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count(${'t2' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t2total = [];

                        foreach ($fisik as $a) {
                            if ($a->sanct_tt == 3 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t2total[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t2total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T3 setelah pelayanan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'t3' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sanct_tt == 4 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'t3' . $d->ds_destination}[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count(${'t3' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t3total = [];

                        foreach ($fisik as $a) {
                            if ($a->sanct_tt == 4 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t3total[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t3total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T4 setelah pelayanan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'t4' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sanct_tt == 5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'t4' . $d->ds_destination}[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count(${'t4' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t4total = [];

                        foreach ($fisik as $a) {
                            if ($a->sanct_tt == 5 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t4total[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t4total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T5 setelah pelayanan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'t5' . $d->ds_destination} = [];

                        foreach ($fisik as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sanct_tt == 6 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'t5' . $d->ds_destination}[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count(${'t5' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $t5total = [];

                        foreach ($fisik as $a) {
                            if ($a->sanct_tt == 6 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $t5total[] = array(
                                    'set' => $a->sanct_tt
                                );
                            }
                        }

                        echo count($t5total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil Status T2+ setelah pelayanan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">7</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Mendapat Fe 3</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4">8</td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="4">a</td>
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil yang Periksa Hb (hanya dihitung satu kali)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'hb' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_hb == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'hb' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_hb
                                );
                            }
                        }

                        echo count(${'hb' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbtotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_hb == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hbtotal[] = array(
                                    'set' => $a->sancl_hb
                                );
                            }
                        }

                        echo count($hbtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil Anemia Hb 8-11 mg/dl</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'hb811' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_level_hb >= 8 && $a->sancl_level_hb <= 11 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'hb811' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count(${'hb811' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb811total = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_level_hb >= 8 && $a->sancl_level_hb <= 11 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb811total[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb811total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iii</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil Anemia Hb kurang dari 8 mg/dl</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'hb8' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_level_hb != '' && $a->sancl_level_hb < 8 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'hb8' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count(${'hb8' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb8total = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_level_hb != '' && $a->sancl_level_hb < 8 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb8total[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb8total);
                    ?>
                </td>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iv</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil Anemia</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'hb12' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_level_hb != '' && $a->sancl_level_hb < 12 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'hb12' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count(${'hb12' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hb12total = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_level_hb != '' && $a->sancl_level_hb < 12 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hb12total[] = array(
                                    'set' => $a->sancl_level_hb
                                );
                            }
                        }

                        echo count($hb12total);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2"></td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">b</td>
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil yang Periksa Protein Urin (hanya dihitung satu kali)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'urin' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_urine != 0 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'urin' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'urin' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $urintotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_urine != 0 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $urintotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($urintotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil dengan Protein Urin Positif (+)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'purin' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_urine > 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'purin' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'purin' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $purintotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_urine > 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $purintotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($purintotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2"></td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">c</td>
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil yang Periksa Gula Darah (hanya dihitung satu kali)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'gula' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_blood_sugar != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'gula' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'gula' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $gulatotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_blood_sugar != '' && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $gulatotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($gulatotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Jumlah Ibu Hamil dengan Gula Darah Sewaktu >= 200 mg/dl atau Gula Darah Puasa >= 125 mg/dl</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'pgula' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_blood_sugar >= 200 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'pgula' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'pgula' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pgulatotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_blood_sugar >= 200 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $pgulatotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($pgulatotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">9</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Mendapatkan Tatalaksana Sesuai Kasus (hanya dihitung satu kali)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">10</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Mendapatkan Konseling / Temu Wicara (hanya dihitung satu kali)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'pkie' . $d->ds_destination} = [];

                        foreach ($kie as $a) {
                            if ($a->ins_rw == $d->ds_destination) {
                                ${'pkie' . $d->ds_destination}[] = array(
                                    'set' => $a->pkiepmb
                                );
                            }
                        }

                        echo count(${'pkie' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pkietotal = [];

                        foreach ($kie as $a) {
                            $pkietotal[] = array(
                                'set' => $a->pkiepmb
                            );
                        }

                        echo count($pkietotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">PENCEGAHAN PENULARAN IBU KE ANAK (PPIA)</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="{{ count($dest) + 1 }}">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Datang dengan HIV (+)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil yang Dites HIV</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'hiv' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_hiv != 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'hiv' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'hiv' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hivtotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_hiv != 2 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $hivtotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hivtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil Yang Mengetahui Status HIVnya</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil dengan Hasil Tes HIV (+)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'phiv' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_hiv == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                ${'phiv' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'phiv' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phivtotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_hiv == 1 && date('Y-m', strtotime($a->sancd_date)) == date('Y-m', strtotime($year . '-' . $month))) {
                                $phivtotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phivtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">5</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil HIV (+) Mengakses Layanan PDP</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">6</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Hamil mendapat ART</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">7</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pasangan Ibu Hamil dengan HIV (+) yang Dites HIV</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">8</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir dari Ibu HIV (+)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinhiv' . $d->ds_destination} = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_rw == $d->ds_destination) {
                                ${'salinhiv' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinhiv' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinhivtotal = [];

                        foreach ($salinhiv as $a) {
                            $salinhivtotal[] = array(
                                'set' => 1
                            );
                        }

                        echo count($salinhivtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">a</td>
                <td style=" border: 1px solid black;" colspan="3">Secara Pervaginam</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinnor' . $d->ds_destination} = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancm_met_marr == 2) {
                                ${'salinnor' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinnor' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnortotal = [];

                        foreach ($salinhiv as $a) {
                            if ($a->sancm_met_marr == 2) {
                                $salinnortotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnortotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinnorl' . $d->ds_destination} = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                ${'salinnorl' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinnorl' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorltotal = [];

                        foreach ($salinhiv as $a) {
                            if ($a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                $salinnorltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorltotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4"></td>
                <td style=" border: 1px solid black; text-align: center;"></td>
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinnorp' . $d->ds_destination} = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 2) {
                                ${'salinnorp' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinnorp' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinnorptotal = [];

                        foreach ($salinhiv as $a) {
                            if ($a->sancm_met_marr == 2 && $a->sancmskl_sex == 2) {
                                $salinnorptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinnorptotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Secara Sectio Cesarea (SC)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salincs' . $d->ds_destination} = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancm_met_marr == 3) {
                                ${'salincs' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salincs' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincstotal = [];

                        foreach ($salinhiv as $a) {
                            if ($a->sancm_met_marr == 3) {
                                $salincstotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincstotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salincsl' . $d->ds_destination} = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                ${'salincsl' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salincsl' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincsltotal = [];

                        foreach ($salinhiv as $a) {
                            if ($a->sancm_met_marr == 2 && $a->sancmskl_sex == 1) {
                                $salincsltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincsltotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salincsp' . $d->ds_destination} = [];

                        foreach ($salinhiv as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancm_met_marr == 3 && $a->sancmskl_sex == 2) {
                                ${'salincsp' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salincsp' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salincsptotal = [];

                        foreach ($salinhiv as $a) {
                            if ($a->sancm_met_marr == 3 && $a->sancmskl_sex == 2) {
                                $salincsptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salincsptotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">9</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir dari Ibu HIV (+) Mendapatkan Profilaksis</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Mendapatkan Profilaksis ARV</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Mendapatkan Profilaksis Kotrimoxazole</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="13">10</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir dari Ibu HIV (+) Dilakukan Tes EID</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Dilakukan Tes EID I Saat Usia Bayi kurang dari 2 bulan (6 minggu)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Hasil Tes EID I (+)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">c</td>
                <td style=" border: 1px solid black;" colspan="3">Dilakukan Tes EID II Saat Usia Bayi 18 bulan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">d</td>
                <td style=" border: 1px solid black;" colspan="3">Hasil Tes EID II (+)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">11</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir dari Ibu HIV (+) Dilakukan Tes Serologis (PCR)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Dilakukan Tes Serologis (PCR) usia > 9 bulan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Hasil Tes Serologis (PCR) (+)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">12</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Anak HIV (+) Setelah EID II atau dengan PCR</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Anak HIV(+) mengakses layanan PDP</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Anak HIV (+) Mendapatkan Pengobatan ARV</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">2</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">13</td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Dites Sifilis</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'sifilis' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_sifilis != 0) {
                                ${'sifilis' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'sifilis' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $sifilistotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_sifilis != 0) {
                                $sifilistotal [] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($sifilistotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Sifilis (+)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'psifilis' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_sifilis == 2) {
                                ${'psifilis' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'psifilis' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $psifilistotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_sifilis == 2) {
                                $psifilistotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($psifilistotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4"></td>
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Sifilis (+) yang Diobati</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dengan Sifilis Kongenital</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dengan Sifilis Kongenital Yang Diobati</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Pasangan Ibu Hamil dengan Sifilis (+) yang Diobati</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">14</td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil yang Diperiksa Hepatitis B</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'hb' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_hbsag != 0) {
                                ${'hb' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'hb' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $hbtotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_hbsag != 0) {
                                $hbtotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($hbtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Hepatitis B (+)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'phb' . $d->ds_destination} = [];

                        foreach ($lab as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_hbsag == 2) {
                                ${'phb' . $d->ds_destination}[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count(${'phb' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phbtotal = [];

                        foreach ($lab as $a) {
                            if ($a->sancl_hbsag == 2) {
                                $phbtotal[] = array(
                                    'set' => $a->sancl_urine
                                );
                            }
                        }

                        echo count($phbtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4"></td>
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Hamil dengan Hasil Tes Hepatitis B (+) yang Mendapatkan Tatalaksana (Rujukan)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dari Ibu Hepatitis B (+)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'phepb' . $d->ds_destination} = [];

                        foreach ($salinhb as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancl_hbsag == 2) {
                                ${'phepb' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'phepb' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $phepbtotal = [];

                        foreach ($salinhb as $a) {
                            if ($a->sancl_hbsag == 2) {
                                $phepbtotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($phepbtotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dari Ibu Hepatitis B (+) Usia 9-12 Bulan Diperiksa Hepatitis B</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Baru Lahir dari Ibu Hepatitis B (+) Dengan Hasil Tes Hepatitis B (+)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">PERSALINAN DI RB PUSKESMAS</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="{{ count($dest) + 1 }}">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="12">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Bersalin Yang Datang</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinc' . $d->ds_destination} = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 1 && $a->sancd_no == 1) {
                                ${'salinc' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinc' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinctotal = [];

                        foreach ($salin2 as $a) {
                            if ($a->sancd_type == 1 && $a->sancd_no == 1) {
                                $salinctotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinctotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="5">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu Yang Bersalin (Termasuk Yang dirujuk)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinc' . $d->ds_destination} = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 1 && $a->sancd_no == 1) {
                                ${'salinc' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinc' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinctotal = [];

                        foreach ($salin2 as $a) {
                            if ($a->sancd_type == 1 && $a->sancd_no == 1) {
                                $salinctotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinctotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Usia Ibu kurang dari 18 Tahun</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin18' . $d->ds_destination} = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) < 18) {
                                ${'salin18' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin18' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin18total = [];

                        foreach ($salin2 as $a) {
                            if ($a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) < 18) {
                                $salin18total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin18total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Usia Ibu 18 - 20 Tahun</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin1820' . $d->ds_destination} = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 18 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 20) {
                                ${'salin1820' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin1820' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin1820total = [];

                        foreach ($salin2 as $a) {
                            if ($a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 18 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 20) {
                                $salin1820total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin1820total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iii</td>
                <td style=" border: 1px solid black;" colspan="2">Usia Ibu 21 - 35 Tahun</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin2135' . $d->ds_destination} = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 21 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 35) {
                                ${'salin2135' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin2135' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $totalsalin2135 = [];

                        foreach ($salin2 as $a) {
                            if ($a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) >= 21 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) <= 35) {
                                $totalsalin2135[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($totalsalin2135);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iv</td>
                <td style=" border: 1px solid black;" colspan="2">Usia Ibu > 35 Tahun</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin35' . $d->ds_destination} = [];

                        foreach ($salin2 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) > 35) {
                                ${'salin35' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin35' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin35total = [];

                        foreach ($salin2 as $a) {
                            if ($a->sancd_type == 1 && $a->sancd_no == 1 && (date('Y', strtotime(DB::table('eianc_patients')->where('pat_norm', $a->sanc_norm)->value('pat_dob'))) - date('Y', strtotime($a->sancd_date))) > 35) {
                                $salin35total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin35total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kasus Rujukan Ibu Bersalin</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : HDK, PEB atau Eklampsi</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Perdarahan (antepartum atau post partum)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iii</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Penyakit Jantung</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iv</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Partus Sulit, CPD atau Distosia Bahu</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">v</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Bukan salah satu diatas</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="5">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Yang Dilahirkan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahir' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination) {
                                ${'salinlahir' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahir' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirtotal = [];

                        foreach ($salin as $a) {
                            $salinlahirtotal[] = array(
                                'set' => 1
                            );
                        }

                        echo count($salinlahirtotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                <td style=" border: 1px solid black;" colspan="3">Bayi Lahir Hidup</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirh' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 1) {
                                ${'salinlahirh' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirh' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhtotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 1) {
                                $salinlahirhtotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhtotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirhl' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                ${'salinlahirhl' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirhl' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                $salinlahirhltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirhp' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                ${'salinlahirhp' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirhp' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                $salinlahirhptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhptotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Bayi Lahir Mati</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirm' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 0) {
                                ${'salinlahirm' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirm' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmtotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 0) {
                                $salinlahirmtotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmtotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="8"></td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="2"></td>
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirml' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 0 && $a->sancmskl_sex == 1) {
                                ${'salinlahirml' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirml' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 0 && $a->sancmskl_sex == 1) {
                                $salinlahirmltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirmp' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 0 && $a->sancmskl_sex == 2) {
                                ${'salinlahirmp' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirmp' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 0 && $a->sancmskl_sex == 2) {
                                $salinlahirmptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Bayi Yang Dirujuk</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">i</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Asfiksia</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">ii</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Klasifikasi Berat MTBM</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iii</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Penyakit Bawaan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">iv</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Tetanus Neonatorum</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">v</td>
                <td style=" border: 1px solid black;" colspan="2">Diagnosa Rujukan : Bukan salah satu diatas</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">KEMATIAN IBU</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="{{ count($dest) + 1 }}">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Ibu</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="7">2</td>
                <td style=" border: 1px solid black;" colspan="4">Penyebab Kematian Ibu</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Perdarahan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Hipertensi dalam Kehamilan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Infeksi</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Gangguan Sistem Peredaran Darah (Jantung, Stroke dan lain-lain)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Gangguan Metabolik (DM dan lain-lain)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Lain-lain</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kematian Ibu yang Dilakukan Audit Maternal Perinatal (AMP)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kematian di Rumah Sakit Yang dilakukan Audit Medik</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kematian Selain di Rumah Sakit yang Dilakukan Pengkajian Kasus Oleh Puskesmas</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">KELUARGA BERENCANA</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="{{ count($dest) + 1 }}">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="4">Pelayanan Keluarga Berencana</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Aktif</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Pasca Persalinan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="5"></td>
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah PUS 4T Ber-KB</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB yang Mengalami Efek Samping</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB yang Mengalami Komplikasi</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB yang Mengalami Kegagalan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">g</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB yang Drop Out</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Peserta KB Aktif Menurut Metode Kontrasepsi Cara Modern</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Kondom</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Pil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Suntik</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB AKDR Pasca Plasenta</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB AKDR Sampai dengan 42 Hari</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3"></td>
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Implan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">g</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB MOW</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">h</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB MOP</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="9">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Peserta KB Pasca Salin Menurut Metode Kontrasepsi Cara Modern</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Kondom</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Pil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Suntik</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB AKDR Pasca Plasenta</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB AKDR Sampai dengan 42 Hari</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB Implan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">g</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB MOW</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">h</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Akseptor KB MOP</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">PERINATAL DAN BAYI</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir Hidup</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirh' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 1) {
                                ${'salinlahirh' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirh' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhtotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 1) {
                                $salinlahirhtotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhtotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirhl' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                ${'salinlahirhl' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirhl' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 1 && $a->sancmskl_sex == 1) {
                                $salinlahirhltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirhp' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                ${'salinlahirhp' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirhp' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirhptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 1 && $a->sancmskl_sex == 2) {
                                $salinlahirhptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirhptotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir Prematur kurang dari 37 Minggu (259 hari)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin37' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                ${'salin37' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin37' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37total = [];

                        foreach ($salin as $a) {
                            if ((date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin37l' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_sex == 1 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                ${'salin37l' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin37l' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37ltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_sex == 1 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37ltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37ltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin37p' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_sex == 2 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                ${'salin37p' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin37p' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salin37ptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_sex == 2 && (date('Y-m-d', strtotime($a->sancmskl_date)) < date('Y-m-d', strtotime($a->sanc_hpl . '-7 days')))) {
                                $salin37ptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salin37ptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Berat Lahir Rendah kurang dari 2500 gram</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinbb' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_weight < 2500) {
                                ${'salinbb' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinbb' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbtotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_weight < 2500) {
                                $salinbbtotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbtotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinbbl' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 1) {
                                ${'salinbbl' . $d->ds_destination} = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinbbl' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_weight < 2500 && $a->sancmskl_sex == 1) {
                                $salinbbltotal = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinbbp' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_weight < 2500 && $a->sancmskl_sex == 2) {
                                ${'salinbbp' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinbbp' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinbbptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_weight < 2500 && $a->sancmskl_sex == 2) {
                                $salinbbptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinbbptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Inisiasi Menyusu Dini</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Baru Lahir (0 - 6 Jam dengan Kondisi yang Stabil)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salins06' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond_baby == 1) {
                                ${'salins06' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salins06' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06total = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond_baby == 1) {
                                $salins06total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salins06l' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 1) {
                                ${'salins06l' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salins06l' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06ltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 1) {
                                $salins06ltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06ltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salins06p' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 2) {
                                ${'salins06p' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salins06p' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salins06ptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond_baby == 1 && $a->sancmskl_sex == 2) {
                                $salins06ptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salins06ptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Baru Lahir (0 - 6 Jam dengan Kondisi yang Tidak Stabil)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salints06' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond_baby == 0) {
                                ${'salints06' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salints06' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06total = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond_baby == 0) {
                                $salints06total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salints06l' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 1) {
                                ${'salints06l' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salints06l' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06ltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 1) {
                                $salints06ltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06ltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salints06p' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 2) {
                                ${'salints06p' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salints06p' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salints06ptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond_baby == 0 && $a->sancmskl_sex == 2) {
                                $salints06ptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salints06ptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2">7</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan Neonatal I (0 - 3 Hari)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo28' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) ) {
                                ${'neo28' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo28' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28total = [];

                        foreach ($neo28 as $a) {
                            if ((date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) ) {
                                $neo28total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo28l' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                ${'neo28l' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo28l' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28ltotal = [];

                        foreach ($neo28 as $a) {
                            if ($a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28ltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28ltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;"></td>
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo28p' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                ${'neo28p' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo28p' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo28ptotal = [];

                        foreach ($neo28 as $a) {
                            if ($a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) < date('Y-m-d', strtotime($a->pat_dob . '+4 days')))) {
                                $neo28ptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo28ptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">8</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan Neonatal II (4 - 7 Hari)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo47' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                ${'neo47' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo47' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47total = [];

                        foreach ($neo28 as $a) {
                            if ((date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo47l' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                ${'neo47l' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo47l' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47ltotal = [];

                        foreach ($neo28 as $a) {
                            if ($a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47ltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47ltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo47p' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                ${'neo47p' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo47p' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo47ptotal = [];

                        foreach ($neo28 as $a) {
                            if ($a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+4 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+7 days'))) ) {
                                $neo47ptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo47ptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">9</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan Neonatal III (8 - 28 Hari)</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo828' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                ${'neo828' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo828' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828total = [];

                        foreach ($neo28 as $a) {
                            if ((date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828total[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828total);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo828l' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                ${'neo828l' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo828l' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828ltotal = [];

                        foreach ($neo28 as $a) {
                            if ($a->pat_sex == 1 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828ltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828ltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'neo828p' . $d->ds_destination} = [];

                        foreach ($neo28 as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                ${'neo828p' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'neo828p' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $neo828ptotal = [];

                        foreach ($neo28 as $a) {
                            if ($a->pat_sex == 2 && (date('Y-m-d', strtotime($a->neo28_date)) >= date('Y-m-d', strtotime($a->pat_dob . '+8 days'))) && (date('Y-m-d', strtotime($a->neo28_date)) <= date('Y-m-d', strtotime($a->pat_dob . '+28 days'))) ) {
                                $neo828ptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($neo828ptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">10</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kunjungan Neonatal Lengkap</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">11</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Bayi Baru Lahir</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination) {
                                ${'salin' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salintotal = [];

                        foreach ($salin as $a) {
                            $salintotal[] = array(
                                    'set' => 1
                                );
                        }

                        echo count($salintotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinl' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_sex == 1) {
                                ${'salinl' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinl' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_sex == 1) {
                                $salinltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinltotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinp' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_sex == 2) {
                                ${'salinp' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinp' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_sex == 2) {
                                $salinptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinptotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">12</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Imunisasi Dasar Lengkap (kurang dari 1 Tahun)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">13</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi yang Mendapat Vitamin A Biru</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">14</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi yang Mendapat Stimulasi, Deteksi dan Intervensi Dini Tumbuh Kembang (SDIDTK) 4 Kali</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">15</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Penyuluhan ASI Eksklusif</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">16</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi yang Mempunyai Buku KIA</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">17</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Neonatus (0 - 28 Hari) dengan Komplikasi yang Ditangani</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">18</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Perkembangan Motorik Kasar</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">19</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Perkembangan Motorik Halus</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">20</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Bicara dan Bahasa</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">21</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Sosialisasi dan Kemandirian</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">22</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Perilaku</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">23</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Pendengaran</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">24</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Gangguan Penglihatan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">25</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Hasil KSPS Penyimpangan (Dp)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">26</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi dengan Hasil KSPS Meragukan (Dm)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">27</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi yang Mendapatkan Skrining Hipotiroid Kongenital (SHK)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">28</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Kesehatan Bayi</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">29</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Bayi Lahir Mati</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirm' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 0) {
                                ${'salinlahirm' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirm' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmtotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 0) {
                                $salinlahirmtotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmtotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirml' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 0) {
                                ${'salinlahirml' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirml' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 0) {
                                $salinlahirmltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmltotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinlahirmp' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_cond == 0) {
                                ${'salinlahirmp' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinlahirmp' . $d->ds_destination});

                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinlahirmptotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_cond == 0) {
                                $salinlahirmptotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinlahirmptotal);

                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">30</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Neonatal 0 - 6 Hari</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2"></td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">31</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Neonatal 7 -28 Hari</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">32</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Neonatal 0 - 28 Hari</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="19">33</td>
                <td style=" border: 1px solid black;" colspan="4">Penyebab Kematian Neonatal 0 - 28 Hari</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="3">BBLR</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="3">Asfiksia</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="3">Tetanus Neonatorum</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="3">Sepsis</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="3">Kelainan Bawaan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="3">Lain-lain</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">34</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Post Neonatal (29 Hari - 11 Bulan)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">35</td>
                <td style=" border: 1px solid black;" colspan="4">Penyebab Kematian Post Neonatal (29 Hari - 11 Bulan)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="21"></td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="3">Pneumonia</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Diare</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="3">Asfiksia</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="3">Kelainan Saluran Cerna</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="3">Tetanus</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="3">Kelainan Saraf</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="3">Malaria</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">7</td>
                <td style=" border: 1px solid black;" colspan="3">Lain-lain</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">36</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Bayi (0 - 11 Bulan) (Neonatal + Post Neonatal)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">37</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kasus Kematian Neonatal di wilayah kerja</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">38</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kasus Kematian Neonatal di wilayah kerja yang Di Otopsi Verbal</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="6">39</td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Puskesmas Kecamatan yang Melaksanakan Kelas Ibu Balita</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Puskesmas Kelurahan yang Melaksanakan Kelas Ibu Balita</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">c</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Kelas Ibu Balita yang Terbentuk</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">d</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu yang mengikuti kelas Ibu Balita</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">e</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Ibu yang Mengikuti Kelas Ibu Balita Lanjutan dari Kelas Ibu Hamil</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">f</td>
                <td style=" border: 1px solid black;" colspan="3">Jumlah Suami/ Keluarga yang Mengikuti Kelas Ibu Balita</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">BALITA DAN PRASEKOLAH</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="5">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Pelayanan Kesehatan Anak Balita</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="2"></td>
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Balita yang Mendapat Stimulasi, Deteksi dan Intervensi Dini Tumbuh Kembang (SDIDTK) 2 Kali</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Balita yang Mendapat Vitamin A 2 Kali Setahun</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Balita yang Mempunyai Buku KIA</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Balita dengan Penimbangan 8 Kali</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Kematian Anak Balita (12 - 59 Bulan)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="4">7</td>
                <td style=" border: 1px solid black;" colspan="4">Penyebab Kematian Anak Balita (12 - 59 Bulan)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="3">Diare</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="18">7</td>
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">2</td>
                <td style=" border: 1px solid black;" colspan="3">Pneumonia</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">3</td>
                <td style=" border: 1px solid black;" colspan="3">Malaria</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">4</td>
                <td style=" border: 1px solid black;" colspan="3">Campak</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                <td style=" border: 1px solid black;" colspan="3">Demam Berdarah Dengue (DBD)</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">6</td>
                <td style=" border: 1px solid black;" colspan="3">Difteri</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">7</td>
                <td style=" border: 1px solid black;" colspan="3">Lain-lain</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="2">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="2">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">8</td>
                <td style=" border: 1px solid black;" colspan="4">Pelayanan MTBS</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Laki-laki</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Perempuan</td>
                @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black;" colspan="5">PERSALINAN DAN NIFAS DI WILAYAH</td>
                <td style=" border: 1px solid black; background-color: rgb(29, 29, 29)" colspan="{{ count($dest) + 1 }}">&nbsp;</td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;" rowspan="3">1</td>
                <td style=" border: 1px solid black;" colspan="4">Jumlah Persalinan di Fasilitas Kesehatan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salin' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination) {
                                ${'salin' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salin' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salintotal = [];

                        foreach ($salin as $a) {
                            $salintotal[] = array(
                                    'set' => 1
                                );
                        }

                        echo count($salintotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">a</td>
                <td style=" border: 1px solid black;" colspan="3">Bayi Lahir Laki-laki</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinl' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_sex == 1) {
                                ${'salinl' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinl' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_sex == 1) {
                                $salinltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinltotal);
                    ?>
                </td>
            </tr>
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: center;">b</td>
                <td style=" border: 1px solid black;" colspan="3">Bayi Lahir Perempuan</td>
                @foreach ($dest as $d)
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        ${'salinl' . $d->ds_destination} = [];

                        foreach ($salin as $a) {
                            if ($a->ins_rw == $d->ds_destination && $a->sancmskl_sex == 2) {
                                ${'salinl' . $d->ds_destination}[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count(${'salinl' . $d->ds_destination});
                    ?>
                </td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $salinltotal = [];

                        foreach ($salin as $a) {
                            if ($a->sancmskl_sex == 2) {
                                $salinltotal[] = array(
                                    'set' => 1
                                );
                            }
                        }

                        echo count($salinltotal);
                    ?>
                </td>
            </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;" rowspan="7">2</td>
                    <td style=" border: 1px solid black;" colspan="4">Jumlah Persalinan di Non-Fasilitas Kesehatan</td>
                    @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                @endforeach
                <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;" rowspan="3">a</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Persalinan Ditolong Tenaga Kesehatan</td>
                    @foreach ($dest as $d)
                        <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">i</td>
                    <td style=" border: 1px solid black;" colspan="2">Bayi Lahir Laki-laki</td>
                    @foreach ($dest as $d)
                        <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">ii</td>
                    <td style=" border: 1px solid black;" colspan="2">Bayi Lahir Perempuan</td>
                    @foreach ($dest as $d)
                        <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;" rowspan="3">b</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Persalinan Ditolong Non Tenaga Kesehatan</td>
                    @foreach ($dest as $d)
                        <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">i</td>
                    <td style=" border: 1px solid black;" colspan="2">Bayi Lahir Laki-laki</td>
                    @foreach ($dest as $d)
                        <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">ii</td>
                    <td style=" border: 1px solid black;" colspan="2">Bayi Lahir Perempuan</td>
                    @foreach ($dest as $d)
                        <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">3</td>
                    <td style=" border: 1px solid black;" colspan="4">Jumlah Persalinan Oleh Tenaga Kesehatan</td>
                    @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'salin' . $d->ds_destination} = [];

                            foreach ($salin as $a) {
                                if ($a->ins_rw == $d->ds_destination) {
                                    ${'salin' . $d->ds_destination}[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count(${'salin' . $d->ds_destination});
                        ?>
                    </td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $salintotal = [];

                            foreach ($salin as $a) {
                                $salintotal[] = array(
                                        'set' => 1
                                    );
                            }

                            echo count($salintotal);
                        ?>
                    </td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">4</td>
                    <td style=" border: 1px solid black;" colspan="4">Jumlah Ibu Nifas yang Mendapat Vitamin A</td>
                    @foreach ($dest as $d)
                        <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">&nbsp;</td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;" rowspan="3">5</td>
                    <td style=" border: 1px solid black; text-align: center;">a</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Kunjungan Ibu Nifas KF1</td>
                    @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'nifask1' . $d->ds_destination} = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 2 && $a->sancd_no == 1) {
                                    ${'nifask1' . $d->ds_destination}[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count(${'nifask1' . $d->ds_destination});
                        ?>
                    </td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask1total = [];

                            foreach ($nifas as $a) {
                                if ($a->sancd_type == 2 && $a->sancd_no == 1) {
                                    $nifask1total[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask1total);
                        ?>
                    </td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">b</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Kunjungan Ibu Nifas KF2</td>
                    @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'nifask1' . $d->ds_destination} = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 2 && $a->sancd_no == 2) {
                                    ${'nifask1' . $d->ds_destination}[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count(${'nifask1' . $d->ds_destination});
                        ?>
                    </td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask1total = [];

                            foreach ($nifas as $a) {
                                if ($a->sancd_type == 2 && $a->sancd_no == 2) {
                                    $nifask1total[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask1total);
                        ?>
                    </td>
                </tr>
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">c</td>
                    <td style=" border: 1px solid black;" colspan="3">Jumlah Kunjungan Ibu Nifas KF3</td>
                    @foreach ($dest as $d)
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'nifask1' . $d->ds_destination} = [];

                            foreach ($nifas as $a) {
                                if ($a->ins_rw == $d->ds_destination && $a->sancd_type == 2 && $a->sancd_no == 3) {
                                    ${'nifask1' . $d->ds_destination}[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count(${'nifask1' . $d->ds_destination});
                        ?>
                    </td>
                    @endforeach
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            $nifask1total = [];

                            foreach ($nifas as $a) {
                                if ($a->sancd_no == 3) {
                                    $nifask1total[] = array(
                                        'set' => 1
                                    );
                                }
                            }

                            echo count($nifask1total);
                        ?>
                    </td>
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
