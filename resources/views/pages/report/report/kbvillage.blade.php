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
        LAPORAN PELAYANAN KELUARGA BERENCANA
        <br>
        KELURAHAN/DESA {{ strtoupper($al_desa) }}
        <br>
        BULAN {{ strtoupper(DB::table('selec_months')->where('mon_id', $month)->value('mon_name')) }} TAHUN {{ $year }}
    </h3>
    <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 6pt;">
        <thead>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="3">No</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="3">RW</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="2">Jml Sasaran</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="24">Pelayanan Keluarga Berencana</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="7">Jumlah KB Aktif Menurut Metode Konstrapsi Cara Modern</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="7">Jumlah KB Nifas Menurut Metode Konstrapsi Cara Modern</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">PUS</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Bulin</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="4">KB Aktif</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="4">PUS 4T</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="4">Komplikasi</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="4">Kegagalan</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="4">Drop Out</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="4">Pasca Salin</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Kondom</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Pil</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Suntik</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">AKDR</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Implant</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">MOW</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">MOP</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Kondom</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Pil</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Suntik</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">AKDR</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Implant</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">MOW</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">MOP</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Lalu</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Ini</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">abs</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">%</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Lalu</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Ini</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">abs</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">%</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Lalu</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Ini</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">abs</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">%</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Lalu</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Ini</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">abs</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">%</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Lalu</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Ini</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">abs</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">%</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Lalu</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bulan Ini</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">abs</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">%</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $dateset = date('Y-m-d', strtotime($year . '-' . $month . '-1'));
                $date0 = date("Y-m", strtotime($dateset . "-1 months"));
                $date1 = date("Y-m", strtotime($dateset));
            ?>

            @foreach ($rw as $rw)
                <tr>
                    <td style="text-align: right; border: 1px solid black;">{{ $loop->iteration }}</td>
                    <td style="text-align: center; border: 1px solid black;">{{ $rw->ds_destination }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $rw->ds_pus }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $rw->ds_bulin }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'kbal' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                            ->get();

                            echo count(${'kbal' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'kbai' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                            ->get();

                            echo count(${'kbai' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count(${'kbal' . $loop->iteration}) + count(${'kbai' . $loop->iteration})) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count(${'kbal' . $loop->iteration}) + count(${'kbai' . $loop->iteration})) / $rw->ds_pus) * (100/100) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'koml' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                            ->where('sanckb_compli_id', '!=', '')
                                                            ->orWhere('sanckb_compli', '!=', '')
                                                            ->get();

                            echo count(${'koml' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'komi' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                            ->where('sanckb_compli_id', '!=', '')
                                                            ->orWhere('sanckb_compli', '!=', '')
                                                            ->get();

                            echo count(${'komi' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count(${'koml' . $loop->iteration}) + count(${'komi' . $loop->iteration})) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count(${'koml' . $loop->iteration}) + count(${'komi' . $loop->iteration})) / $rw->ds_pus) * (100/100) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'gagl' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                            ->where('sanckb_failed_id', '!=', '')
                                                            ->orWhere('sanckb_failed', '!=', '')
                                                            ->get();

                            echo count(${'gagl' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'gagi' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                            ->where('sanckb_failed_id', '!=', '')
                                                            ->orWhere('sanckb_failed', '!=', '')
                                                            ->get();

                            echo count(${'gagi' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count(${'gagl' . $loop->iteration}) + count(${'gagi' . $loop->iteration})) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count(${'gagl' . $loop->iteration}) + count(${'gagi' . $loop->iteration})) / $rw->ds_pus) * (100/100) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'dol' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                            ->where('sanckb_remove', '!=', '')
                                                            ->get();

                            echo count(${'dol' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'doi' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                            ->where('sanckb_remove', '!=', '')
                                                            ->get();

                            echo count(${'doi' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count(${'dol' . $loop->iteration}) + count(${'doi' . $loop->iteration})) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count(${'dol' . $loop->iteration}) + count(${'doi' . $loop->iteration})) / $rw->ds_pus) * (100/100) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'sall' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                            ->where('sanckb_nifas', '=', '1')
                                                            ->get();

                            echo count(${'sall' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        <?php
                            ${'sali' . $loop->iteration} = DB::table('eianc_instansis')
                                                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                            ->where('ins_village', $ins_village)
                                                            ->where('ins_rw', $ins_rw)
                                                            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                            ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                            ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                            ->where('sanckb_nifas', '=', '1')
                                                            ->get();

                            echo count(${'sali' . $loop->iteration});
                        ?>
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count(${'sall' . $loop->iteration}) + count(${'sali' . $loop->iteration})) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count(${'sall' . $loop->iteration}) + count(${'sali' . $loop->iteration})) / $rw->ds_pus) * (100/100) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 2)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 1)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 4)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 6)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 5)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 13)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 14)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>

                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 2)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 1)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 4)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 6)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 5)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 13)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 14)
                            ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->where('ins_village', $ins_village)
                                                        ->where('ins_rw', $ins_rw)
                            ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                            ->get();

                            echo count($cpil0);
                        @endphp
                    </td>
                </tr>
            @endforeach
            <tr>
                <td style="text-align: right; border: 1px solid black;" colspan="2">TOTAL</td>
                <td style="text-align: center; border: 1px solid black;">
                    <?php
                        $pus = $des[0]->ds_pus;

                        for ($i=1; $i < count($des) ; $i++) {
                            $pus .= $des[$i]->ds_pus . '+';
                        }

                        echo $pus + 0;
                    ?>
                </td>
                <td style="text-align: center; border: 1px solid black;">
                    <?php
                        $bulin = $des[0]->ds_bulin;

                        for ($i=1; $i < count($des) ; $i++) {
                            $bulin .= $des[$i]->ds_bulin . '+';
                        }

                        echo $bulin + 0;
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $kbal = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                        ->get();

                        echo count($kbal);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $kbai = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                        ->get();

                        echo count($kbai);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count($kbal) + count($kbai)) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count($kbal) + count($kbai)) / $des[0]->ds_pus) * (100/100) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">-</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $koml = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                        ->where('sanckb_compli_id', '!=', '')
                                                        ->orWhere('sanckb_compli', '!=', '')
                                                        ->get();

                        echo count($koml);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $komi = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                        ->where('sanckb_compli_id', '!=', '')
                                                        ->orWhere('sanckb_compli', '!=', '')
                                                        ->get();

                        echo count($komi);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count($koml) + count($komi)) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count($koml) + count($komi)) / $des[0]->ds_pus) * (100/100) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $gagl = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                        ->where('sanckb_failed_id', '!=', '')
                                                        ->orWhere('sanckb_failed', '!=', '')
                                                        ->get();

                        echo count($gagl);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $gagi = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                        ->where('sanckb_failed_id', '!=', '')
                                                        ->orWhere('sanckb_failed', '!=', '')
                                                        ->get();

                        echo count($gagi);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count($gagl) + count($gagi)) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count($gagl) + count($gagi)) / $rw->ds_pus) * (100/100) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $dol = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                        ->where('sanckb_remove', '!=', '')
                                                        ->get();

                        echo count($dol);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $doi = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                        ->where('sanckb_remove', '!=', '')
                                                        ->get();

                        echo count($doi);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count($dol) + count($doi)) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count($dol) + count($doi)) / $des[0]->ds_pus) * (100/100) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $sall = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date0 . '%')
                                                        ->where('sanckb_nifas', '=', '1')
                                                        ->get();

                        echo count($sall);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    <?php
                        $sali = DB::table('eianc_instansis')
                                                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_instansis.ins_id')
                                                        ->where('ins_village', $ins_village)
                                                        ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
                                                        ->join('eianc_service_kbs', 'eianc_service_kbs.sanckb_user_id', '=', 'users.id')
                                                        ->where('sanckb_date', 'LIKE', '%' . $date1 . '%')
                                                        ->where('sanckb_nifas', '=', '1')
                                                        ->get();

                        echo count($sali);
                    ?>
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ (count($sall) + count($sali)) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ((count($sall) + count($sali)) / $rw->ds_pus) * (100/100) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 2)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 1)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 4)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 6)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 5)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 13)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '0')->where('sanckb_kbt_id', 14)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>

                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 2)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 1)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 4)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 6)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 5)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 13)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        $cpil0 = DB::table('eianc_service_kbs')->where('sanckb_nifas', '1')->where('sanckb_kbt_id', 14)
                        ->join('eianc_temois', 'eianc_temois.temoi_ins_id', '=', 'eianc_service_kbs.sanckb_ins_id')
                        ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                        ->where('ins_village', $ins_village)
                        ->where('eianc_service_kbs.created_at', 'LIKE', '%' . implode('-', [$year, sprintf("%02s", $month)]) . '%')
                        ->get();

                        echo count($cpil0);
                    @endphp
                </td>
            </tr>
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
                Kepala Puskesmas Kelurahan {{ strtoupper($al_desa) }}
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
                    $nakes1 = DB::table('eianc_sigs')->where('sig_type', '2')
                                    ->where('sig_ins', DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
                                    ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=','eianc_sigs.sig_nakes')
                                    ->get();
                ?>
                {{ $al_dis . ', ' . date('d-m-Y') }}
                <br>
                Pengelola KB Kelurahan {{ strtoupper($al_desa) }}
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
