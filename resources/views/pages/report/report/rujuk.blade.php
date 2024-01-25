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
    <div style="font-size: 10pt">
        <h3 style="text-align: center;">
            SURAT RUJUKAN
        </h3>
        <table width="100%" style="border: 1px solid black;">
            <tr>
                <td width="20%">No. Rujukan</td>
                <td>: {{ $data->des_reg_no }}</td>
                <td style="text-align: center;">
                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($data->des_reg_no, 'QRCODE')}}" alt="barcode" />
                </td>
            </tr>
        </table>
        <br>
        <table width="100%">
            <tr>
                <td width="20%">Kepada Yth. TS/Dokter</td>
                <td>: {{ $data->des_des_unit }}</td>
            </tr>
            <tr>
                <td width="20%">Di</td>
                <td>: {{ $data->des_des_ins }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">Mohon pemeriksaan dan penanganan lebih lanjut pasien :</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="20%">Nama</td>
                <td>: {{ $pasien[0]->pat_name }}</td>
            </tr>
            <tr>
                <td width="20%">Tgl Lahir</td>
                <td>: {{ date('d-m-Y', strtotime($pasien[0]->pat_dob)) }}</td>
                <td width="20%">Umur</td>
                <td>: {{ date('Y') - date('Y', strtotime($pasien[0]->pat_dob)) }} tahun</td>
            </tr>
            <tr>
                <td width="20%">Diagnosis</td>
                <td>: {{ $data->des_diagnose . ' - ' . DB::table('selec_icds')->where('icd_code', $data->des_diagnose)->value('icd_name') }}</td>
            </tr>
            <tr>
                <td width="20%">Telah diberikan</td>
                <td>: {{ $data->des_first_aid }}</td>
            </tr>
        </table>
        <table style="margin-top: 10pt;" width="100%">
            <tr>
                <td></td>
                <td width="30%" style="text-align: center;">
                    {{ $al_subdis . ', ' . date('d-m-Y') }}
                    <br>
                    <br>
                    <br>
                    <br>
                    <b>{{ $nakes }}</b>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
