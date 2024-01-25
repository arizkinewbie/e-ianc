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
            PUSKESMAS KELURAHAN/DESA {{ strtoupper($al_desa) }}
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
                <th style=" border: 1px solid black;" rowspan="4">RW</th>
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
            <?php
                $dateset = date('Y-m-d', strtotime($year . '-' . $month . '-1'));
                $date0 = date("Y-m", strtotime($dateset . "-1 months"));
                $date1 = date("Y-m", strtotime($dateset));
            ?>

            @foreach ($hal1 as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_destination }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_resident }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bumil }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bumil_resti }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bulin }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bufas }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_pus }}</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k1l' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_no', '1')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->get();

                            echo count(${'k1l' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k1i' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_no', '1')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->get();

                            echo count(${'k1i' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'k1l' . $loop->iteration}) + count(${'k1i' . $loop->iteration}))  }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'k1i' . $loop->iteration}) / $d->ds_bumil) * (100 / 100)  }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k4l' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_no', '4')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->get();

                            echo count(${'k4l' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'k4i' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_no', '4')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->get();

                            echo count(${'k4i' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'k4l' . $loop->iteration}) + count(${'k4i' . $loop->iteration}))  }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'k4i' . $loop->iteration}) / $d->ds_bumil) * (100 / 100)  }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'nakesl' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->get();

                            echo count(${'nakesl' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'nakesi' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->get();

                            echo count(${'nakesi' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'nakesl' . $loop->iteration}) + count(${'nakesi' . $loop->iteration}))  }}</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'nakesi' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->get();

                            echo (count(${'nakesi' . $loop->iteration})/(0.2 * $d->ds_bumil)) * (100 / 100);
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                </tr>
            @endforeach

            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: right;" colspan="3">TOTAL PUSK KEL</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbumil = $hal1[0]->ds_bumil;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tbumil .= $hal1[$i]->ds_bumil . '+';
                        }

                        echo $tbumil + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tburisti = $hal1[0]->ds_bumil_resti;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tburisti .= $hal1[$i]->ds_bumil_resti . '+';
                        }

                        echo $tburisti + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbulin = $hal1[0]->ds_bulin;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tbulin .= $hal1[$i]->ds_bulin . '+';
                        }

                        echo $tbulin + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbufas = $hal1[0]->ds_bufas;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tbufas .= $hal1[$i]->ds_bufas . '+';
                        }

                        echo $tbufas + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tpus = $hal1[0]->ds_pus;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tpus .= $hal1[$i]->ds_pus . '+';
                        }

                        echo $tpus + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k1l = DB::table('eianc_instansis')
                                    ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                    ->where('ins_village', $ins_village)
                                    ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                    ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                    ->where('sancd_type', '0')
                                    ->where('sancd_no', '1')
                                    ->where('sancd_date', 'like', '%' . $date0 . '%')
                                    ->get();

                        echo count($k1l);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k1i = DB::table('eianc_instansis')
                                    ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                    ->where('ins_village', $ins_village)
                                    ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                    ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                    ->where('sancd_type', '0')
                                    ->where('sancd_no', '1')
                                    ->where('sancd_date', 'like', '%' . $date1 . '%')
                                    ->get();

                        echo count($k1i);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        echo (count($k1l) + count($k1i));
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                       echo (count($k1i) / $hal1[0]->ds_bumil) * (100 / 100);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k4l = DB::table('eianc_instansis')
                                    ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                    ->where('ins_village', $ins_village)
                                    ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                    ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                    ->where('sancd_type', '0')
                                    ->where('sancd_no', '4')
                                    ->where('sancd_date', 'like', '%' . $date0 . '%')
                                    ->get();

                        echo count($k4l);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $k4i = DB::table('eianc_instansis')
                                    ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                    ->where('ins_village', $ins_village)
                                    ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                    ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                    ->where('sancd_type', '0')
                                    ->where('sancd_no', '4')
                                    ->where('sancd_date', 'like', '%' . $date1 . '%')
                                    ->get();

                        echo count($k4i);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        echo (count($k4l) + count($k4i));
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                       echo (count($k4i) / $hal1[0]->ds_bumil) * (100 / 100);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $nakeslt = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->get();

                        echo count($nakeslt);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $nakesit = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_type', '0')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->get();

                        echo count($nakesit);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        echo (count($nakeslt) + count($nakesit));
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $nakesp = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_type', '0')
                                                        ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                        ->get();

                        echo (count($nakesp)/(0.2 * $hal1[0]->ds_bumil)) * (100 / 100);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
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
                <th style=" border: 1px solid black;" rowspan="3">RW</th>
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
            <?php
                $dateset = date('Y-m-d', strtotime($year . '-' . $month . '-1'));
                $date0 = date("Y-m", strtotime($dateset . "-1 months"));
                $date1 = date("Y-m", strtotime($dateset));
            ?>

            @foreach ($hal2 as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_destination }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_resident }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bumil }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bumil_resti }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bulin }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bufas }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_pus }}</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'kbmill' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->where('sanca_complaint', '!=', '')
                                                            ->get();

                            ${'knifcl' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->where('sancnc_keluhan', '!=', '')
                                                            ->get();

                            ${'knifol' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->where('sancno_other', '!=', '')
                                                            ->get();

                            echo (count(${'kbmill' . $loop->iteration}) + count(${'knifcl' . $loop->iteration}) + count(${'knifol' . $loop->iteration}));
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'kbmili' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->where('sanca_complaint', '!=', '')
                                                            ->get();

                            ${'knifci' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->where('sancnc_keluhan', '!=', '')
                                                            ->get();

                            ${'knifoi' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->where('sancno_other', '!=', '')
                                                            ->get();

                            echo (count(${'kbmili' . $loop->iteration}) + count(${'knifci' . $loop->iteration}) + count(${'knifoi' . $loop->iteration}));
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'kbmill' . $loop->iteration}) + count(${'knifcl' . $loop->iteration}) + count(${'knifol' . $loop->iteration})) + (count(${'kbmili' . $loop->iteration}) + count(${'knifci' . $loop->iteration}) + count(${'knifoi' . $loop->iteration})) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ ((count(${'kbmill' . $loop->iteration}) + count(${'knifcl' . $loop->iteration}) + count(${'knifol' . $loop->iteration})) + (count(${'kbmili' . $loop->iteration}) + count(${'knifci' . $loop->iteration}) + count(${'knifoi' . $loop->iteration})) / ($d->ds_bumil * (20*100))) * (100/100) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'lahirl' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->get();

                            echo count(${'lahirl' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'lahiri' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->get();

                            echo count(${'lahiri' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'lahirl' . $loop->iteration}) + count(${'lahiri' . $loop->iteration})) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ ((count(${'lahirl' . $loop->iteration}) + count(${'lahiri' . $loop->iteration})) / $d->ds_bumil) * (100/100) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'knifcl' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_no', '3')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->get();

                            ${'knifol' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_no', '3')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->get();

                            echo (count(${'knifcl' . $loop->iteration}) + count(${'knifol' . $loop->iteration}));
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'knifci' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_no', '3')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->get();

                            ${'knifoi' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                            ->where('sancd_no', '3')
                                                            ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                            ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                            ->get();

                            echo (count(${'knifci' . $loop->iteration}) + count(${'knifoi' . $loop->iteration}));
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ ((count(${'knifcl' . $loop->iteration}) + count(${'knifol' . $loop->iteration})) + (count(${'knifci' . $loop->iteration}) + count(${'knifoi' . $loop->iteration}))) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (((count(${'knifcl' . $loop->iteration}) + count(${'knifol' . $loop->iteration})) + (count(${'knifci' . $loop->iteration}) + count(${'knifoi' . $loop->iteration}))) / $d->ds_bumil) * (100/100) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                </tr>
            @endforeach
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: right;" colspan="3">TOTAL PUSK KEL</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbumil = $hal1[0]->ds_bumil;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tbumil .= $hal1[$i]->ds_bumil . '+';
                        }

                        echo $tbumil + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tburisti = $hal1[0]->ds_bumil_resti;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tburisti .= $hal1[$i]->ds_bumil_resti . '+';
                        }

                        echo $tburisti + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbulin = $hal1[0]->ds_bulin;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tbulin .= $hal1[$i]->ds_bulin . '+';
                        }

                        echo $tbulin + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tbufas = $hal1[0]->ds_bufas;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tbufas .= $hal1[$i]->ds_bufas . '+';
                        }

                        echo $tbufas + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $tpus = $hal1[0]->ds_pus;

                        for ($i=1; $i < count($hal1) ; $i++) {
                            $tpus .= $hal1[$i]->ds_pus . '+';
                        }

                        echo $tpus + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kbmill = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                        ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->where('sanca_complaint', '!=', '')
                                                        ->get();

                        $knifcl = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                        ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->where('sancnc_keluhan', '!=', '')
                                                        ->get();

                        $knifol = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                        ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->where('sancno_other', '!=', '')
                                                        ->get();

                        echo (count($kbmill) + count($knifcl) + count($knifol));
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kbmili = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                        ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->where('sanca_complaint', '!=', '')
                                                        ->get();

                        $knifci = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                        ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->where('sancnc_keluhan', '!=', '')
                                                        ->get();

                        $knifoi = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                        ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->where('sancno_other', '!=', '')
                                                        ->get();

                        echo (count($kbmili) + count($knifci) + count($knifoi));
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($kbmili) + count($knifci) + count($knifoi)) + (count($kbmili) + count($knifci) + count($knifoi))) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (((count($kbmili) + count($knifci) + count($knifoi)) + (count($kbmili) + count($knifci) + count($knifoi))) / ($hal2[0]->ds_bumil * (20*100))) * (100/100) }}</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $lahirl = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                        ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->get();

                        echo count($lahirl);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $lahiri = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_date', 'like', '%' . $date1 . '%')
                                                        ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->get();

                        echo count($lahiri);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($lahirl) + count($lahiri)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($lahirl) + count($lahiri)) / $hal2[0]->ds_bumil) * (100/100) }}</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $knifcl = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_no', '3')
                                                        ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                        ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->get();

                        $knifol = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_no', '3')
                                                        ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                        ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->get();

                        echo (count($knifcl) + count($knifol));
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $knifci = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_no', '3')
                                                        ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                        ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->get();

                        $knifoi = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_user_id', '=', 'users.id')
                                                        ->where('sancd_no', '3')
                                                        ->where('sancd_date', 'like', '%' . $date0 . '%')
                                                        ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
                                                        ->get();

                        echo (count($knifci) + count($knifoi));
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($knifcl) + count($knifol)) + (count($knifci) + count($knifoi))) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (((count($knifcl) + count($knifol)) + (count($knifci) + count($knifoi))) / $hal2[0]->ds_bumil) * (100/100) }}</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
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
                <th style=" border: 1px solid black;" rowspan="3">RW</th>
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
            <?php
                $dateset = date('Y-m-d', strtotime($year . '-' . $month . '-1'));
                $date0 = date("Y-m", strtotime($dateset . "-1 months"));
                $date1 = date("Y-m", strtotime($dateset));
            ?>

            @foreach ($hal3 as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align: center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_destination }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bayi_new }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bayi }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_bayi_resti }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ $d->ds_balita }}</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'kn1l' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
                                                            ->where('neo28_date', 'like', '%' . $date0 . '%')
                                                            ->get();

                            echo count(${'kn1l' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'kn1i' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
                                                            ->where('neo28_date', 'like', '%' . $date1 . '%')
                                                            ->get();

                            echo count(${'kn1i' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'kn1l' . $loop->iteration}) + count(${'kn1i' . $loop->iteration})) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ ((count(${'kn1l' . $loop->iteration}) + count(${'kn1i' . $loop->iteration})) / $d->ds_bayi) * (100/100) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ count(${'kn1l' . $loop->iteration}) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ count(${'kn1i' . $loop->iteration}) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'kn1l' . $loop->iteration}) + count(${'kn1i' . $loop->iteration})) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ ((count(${'kn1l' . $loop->iteration}) + count(${'kn1i' . $loop->iteration})) / $d->ds_bayi) * (100/100) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'pknl' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
                                                            ->where('neo28_date', 'like', '%' . $date0 . '%')
                                                            ->where('neo28_infec', '!=', '')
                                                            ->where('neo28_iketrus', '!=', '')
                                                            ->where('neo28_diare', '!=', '')
                                                            ->get();

                            echo count(${'pknl' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'pkni' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
                                                            ->where('neo28_date', 'like', '%' . $date1 . '%')
                                                            ->where('neo28_infec', '!=', '')
                                                            ->where('neo28_iketrus', '!=', '')
                                                            ->where('neo28_diare', '!=', '')
                                                            ->get();

                            echo count(${'pkni' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'pknl' . $loop->iteration}) + count(${'pkni' . $loop->iteration})) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ ((count(${'pknl' . $loop->iteration}) + count(${'pkni' . $loop->iteration})) / ($d->ds_bayi / (15/100))) * (100/100) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'bayil' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
                                                            ->where('neobb_date', 'like', '%' . $date0 . '%')
                                                            ->where('neobb_y', '<', '2')
                                                            ->get();

                            echo count(${'bayil' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'bayii' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
                                                            ->where('neobb_date', 'like', '%' . $date1 . '%')
                                                            ->where('neobb_y', '<', '2')
                                                            ->get();

                            echo count(${'bayii' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'bayil' . $loop->iteration}) + count(${'bayii' . $loop->iteration})) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ ((count(${'bayil' . $loop->iteration}) + count(${'bayii' . $loop->iteration})) / $d->ds_bayi) * (100/100) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'ball' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
                                                            ->where('neobb_date', 'like', '%' . $date0 . '%')
                                                            ->where('neobb_y', '>=', '2')
                                                            ->get();

                            echo count(${'ball' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">
                        <?php
                            ${'bali' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
                                                            ->where('neobb_date', 'like', '%' . $date1 . '%')
                                                            ->where('neobb_y', '>=', '2')
                                                            ->get();

                            echo count(${'bali' . $loop->iteration});
                        ?>
                    </td>
                    <td style=" border: 1px solid black; text-align: center;">{{ (count(${'ball' . $loop->iteration}) + count(${'bali' . $loop->iteration})) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">{{ ((count(${'ball' . $loop->iteration}) + count(${'bali' . $loop->iteration})) / $d->ds_bayi) * (100/100) }}</td>
                    <td style=" border: 1px solid black; text-align: center;">-</td>
                </tr>
            @endforeach
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid black; text-align: right;" colspan="2">TOTAL PUSK KEL</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bayinew = $hal3[0]->ds_bayi_new;

                        for ($i=1; $i < count($hal3) ; $i++) {
                            $bayinew .= $hal3[$i]->ds_bayi_new . '+';
                        }

                        echo $bayinew + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bayi = $hal3[0]->ds_bayi;

                        for ($i=1; $i < count($hal3) ; $i++) {
                            $bayi .= $hal3[$i]->ds_bayi . '+';
                        }

                        echo $bayi + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bayiris = $hal3[0]->ds_bayi_resti;

                        for ($i=1; $i < count($hal3) ; $i++) {
                            $bayiris .= $hal3[$i]->ds_bayi_resti . '+';
                        }

                        echo $bayiris + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $balita = $hal3[0]->ds_balita;

                        for ($i=1; $i < count($hal3) ; $i++) {
                            $balita .= $hal3[$i]->ds_balita . '+';
                        }

                        echo $balita + 0;
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kn1l = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
                                                        ->where('neo28_date', 'like', '%' . $date0 . '%')
                                                        ->get();

                        echo count($kn1l);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $kn1i = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
                                                        ->where('neo28_date', 'like', '%' . $date1 . '%')
                                                        ->get();

                        echo count($kn1i);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($kn1l) + count($kn1i)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($kn1l) + count($kn1i)) / $hal3[0]->ds_bayi) * (100/100) }}</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($kn1l) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ count($kn1i) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($kn1l) + count($kn1i)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($kn1l) + count($kn1i)) / $hal3[0]->ds_bayi) * (100/100) }}</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pknl = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
                                                        ->where('neo28_date', 'like', '%' . $date0 . '%')
                                                        ->where('neo28_infec', '!=', '')
                                                        ->where('neo28_iketrus', '!=', '')
                                                        ->where('neo28_diare', '!=', '')
                                                        ->get();

                        echo count($pknl);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $pkni = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_neo28s', 'eianc_service_neo28s.neo28_user_id', '=', 'users.id')
                                                        ->where('neo28_date', 'like', '%' . $date1 . '%')
                                                        ->where('neo28_infec', '!=', '')
                                                        ->where('neo28_iketrus', '!=', '')
                                                        ->where('neo28_diare', '!=', '')
                                                        ->get();

                        echo count($pkni);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($pknl) + count($pkni)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($pknl) + count($pkni)) / ($hal3[0]->ds_bayi / (15/100))) * (100/100) }}</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bayil = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
                                                        ->where('neobb_date', 'like', '%' . $date0 . '%')
                                                        ->where('neobb_y', '<', '2')
                                                        ->get();

                        echo count($bayil);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bayii = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
                                                        ->where('neobb_date', 'like', '%' . $date1 . '%')
                                                        ->where('neobb_y', '<', '2')
                                                        ->get();

                        echo count($bayii);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($bayil) + count($bayii)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($bayil) + count($bayii)) / $hal3[0]->ds_bayi) * (100/100) }}</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $ball = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
                                                        ->where('neobb_date', 'like', '%' . $date0 . '%')
                                                        ->where('neobb_y', '>=', '2')
                                                        ->get();

                        echo count($ball);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">
                    <?php
                        $bali = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_neo_bbs', 'eianc_service_neo_bbs.neobb_user_id', '=', 'users.id')
                                                        ->where('neobb_date', 'like', '%' . $date1 . '%')
                                                        ->where('neobb_y', '>=', '2')
                                                        ->get();

                        echo count($bali);
                    ?>
                </td>
                <td style=" border: 1px solid black; text-align: center;">{{ (count($ball) + count($bali)) }}</td>
                <td style=" border: 1px solid black; text-align: center;">{{ ((count($ball) + count($bali)) / $hal3[0]->ds_bayi) * (100/100) }}</td>
                <td style=" border: 1px solid black; text-align: center;">-</td>
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
