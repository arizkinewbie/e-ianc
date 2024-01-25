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
        LAPORAN KEJADIAN IKUTAN PASCA IMUNISASI (KIPI)
        <br>
        BULAN {{ strtoupper(DB::table('selec_months')->where('mon_id', $month)->value('mon_name')) }} TAHUN {{ $year }}
    </h3>
    <table width="100%" style="border-collapse: collapse; border: 1px solid black; font-size: 8pt;">
        <thead>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">No</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="6">Identitas</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Jenis Vaksin</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">No Batch Vaksin</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Exp Vaksin</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Dosis</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Pemberi Vaksin</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" rowspan="2">Tempat Pelayanan</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;" colspan="5">Gejala Yang Dialami</th>
            </tr>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Nama</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Jenis<br>Kelamin</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Tgl Lahir</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Umur</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Nama Ibu</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Alamat</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Demam</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Bengkak</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Merah</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Muntah</th>
                <th style="border: 1px solid black; border: 1px solid black; text-align: center;">Lainnya</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vaksin as $d)
            @php
                $patient = DB::table('eianc_patients')->where('pat_norm',$d->svak_norm)->get();

                $dvak = DB::table('eianc_vaksins')->where('vak_id', $d->svak_vak_id)
                            ->join('selec_vaksins','selec_vaksins.va_id','=','eianc_vaksins.vak_type')
                            ->get();

                $user = DB::table('users')->where('id', $d->svak_user_id)
                            ->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')
                            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
                            ->get();
            @endphp

            <tr style="border: 1px solid black;">
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $loop->iteration }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $patient[0]->pat_name }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ DB::table('selec_sexes')->where('sex_id',$patient[0]->pat_sex)->value('sex_name') }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $patient[0]->pat_dob }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">
                    @php
                        echo date('Y') - date('Y', strtotime($patient[0]->pat_dob)) .'-';
                        echo date('m') - date('m', strtotime($patient[0]->pat_dob)) .'-';
                        echo date('d') - date('d', strtotime($patient[0]->pat_dob));
                    @endphp
                </td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $patient[0]->pat_biological_mother }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $patient[0]->pat_address }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $dvak[0]->va_name }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $dvak[0]->vak_brand }} <br> {{ $dvak[0]->vak_batch }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ date('d-m-Y', strtotime($dvak[0]->vak_expired_date)) }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->svak_dosis }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $user[0]->nakes_name }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $user[0]->ins_name }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ($d->svak_demam == NULL) ? '' : (($d->svak_demam == '1') ? 'Ya' : 'Tidak') }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ($d->svak_bengkak == NULL) ? '' : (($d->svak_bengkak == '1') ? 'Ya' : 'Tidak') }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ($d->svak_merah == NULL) ? '' : (($d->svak_merah == '1') ? 'Ya' : 'Tidak') }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ ($d->svak_muntah == NULL) ? '' : (($d->svak_muntah == '1') ? 'Ya' : 'Tidak') }}</td>
                <td style="border: 1px solid black; border: 1px solid black; text-align: center;">{{ $d->svak_lainnya }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
