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
    <h3 style="text-align: center;">
        LAPORAN PELAYANAN KELUARGA BERENCANA INSTANSI
        <br>
        BULAN {{ strtoupper(DB::table('selec_months')->where('mon_id', $month)->value('mon_name')) }} TAHUN {{ $year }}
    </h3>
    <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 8pt;">
        <thead>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">No</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Tanggal</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="2">Identitas</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="3">Detail KB yang digunakan</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Petugas Pelayanan</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">NORM</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Nama</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Jenis KB</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Nama KB</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Dosis KB</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kb as $kb)
            @php
                $user = DB::table('users')->where('id', $kb->sanckb_user_id)
                            ->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
                            ->get();
            @endphp
                <tr>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ date('d-m-Y', strtotime($kb->created_at)) }}</td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $kb->sanckb_norm }}</td>
                    <td style="border: 1px solid black; border: 1px solid black;">
                        @php
                            $patient = DB::table('eianc_patients')->where('pat_norm', $kb->sanckb_norm)->get();

                            echo $patient[0]->pat_name;
                            @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            echo DB::table('eianc_kbs')->where('kb_id', $kb->sanckb_use)->join('selec_kb_tools','selec_kb_tools.kbt_id', '=', 'eianc_kbs.kb_kbt_id')->value('kbt_name');
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        @php
                            echo DB::table('eianc_kbs')->where('kb_id', $kb->sanckb_use)->value('kb_brand');
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                        {{ $kb->sanckb_dosis }}
                        @php
                            echo DB::table('eianc_kbs')->where('kb_id', $kb->sanckb_use)->value('kb_unit');
                        @endphp
                    </td>
                    <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $user[0]->nakes_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
