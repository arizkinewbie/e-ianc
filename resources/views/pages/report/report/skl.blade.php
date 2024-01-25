@php
    $baseurl = DB::table('sys_baseurls')->where('url_use','root')->where('url_status','1')->value('url_address');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SKL</title>
</head>

<style>
    @page {
            margin: 10px 10px 10px 10px !important;
            padding: 0px 0px 0px 0px !important;
        }

    body {
        font-family: sans-serif;
        background-image: url("{{ $baseurl . 'data/image/report/b2.png' }}");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    .page-break {
        page-break-after: always;
    }
</style>

<body>
    <div style="margin: 70px; font-size: 10pt;">
        <table width="100%">
            <tr>
                <td width="15%" style="text-align: center">
                    <img src="{{ $baseurl . '/data/image/instansi/' . $ins_thumb }}" alt="" width="64" style="border-radius: 50%;">
                </td>
                <td>
                    <b>{{ strtoupper($ins_name) }}</b>
                    <br>
                    <div style="font-size: 9pt">
                        Faskes/Izin Praktik <b>{{ $ins_code }}</b>
                    </div>
                    <div style="font-size: 8pt;">
                        Alamat : {{ ucwords($ins_add) }}, RT.{{ $ins_rt }}, RW.{{ $ins_rw }}, {{ ucwords($al_desa) }}, {{ ucwords($al_subdis) }}, {{ ucwords($al_dis) }}, {{ ucwords($al_prov) }}, No. Telp/HP : {{ $ins_telp }}
                    </div>
                </td>
                <td width="15%" style="text-align: center">
                    <img src="{{ $baseurl . '/data/image/about/logo.png' }}" alt="" width="64">
                </td>
            </tr>
        </table>
        <div style="text-align: center; margin-top: 20pt; margin-bottom: 20pt;">
            <div style="font-size: 18pt;">
                <b>SURAT KETERANGAN KELAHIRAN</b>
            </div>
            NO. {{ $data[0]->sancmskl_no_reg . '/SKK/' . date('my') }}
        </div>
        <div>
            <table width="100%">
                <tr>
                    <td colspan="2">Yang bertanda tangan dibawah ini :</td>
                </tr>
                <tr>
                    <td width="30%">Nama PPK</td>
                    <td>: {{ $ins_name }}</td>
                </tr>
                <tr>
                    <td width="30%">No PPK</td>
                    <td>: {{ $ins_code }}</td>
                </tr>
                <tr>
                    <td width="30%">Bidan Pelaksana</td>
                    <td>: {{ $nakes }}</td>
                </tr>
                <tr>
                    <td width="30%">NIP Bidan Pelaksana</td>
                    <td>: {{ $nakesnip }}</td>
                </tr>
                <tr>
                    <td width="30%">SIP Bidan Pelaksana</td>
                    <td>: {{ $nakessip }}</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 10pt;">
            <table width="100%">
                <tr>
                    <td colspan="2">Telah lahir seorang anak ke-{{ $ke }} dari :</td>
                </tr>
                <tr>
                    <td width="20%">No Peserta</td>
                    <td>: {{ $patient[0]->pat_norm }}</td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td width="20%">Nama Ibu</td>
                    <td>: {{ $patient[0]->pat_name }}</td>
                    <td width="20%">Nama Ayah</td>
                    <td>: {{ $patient[0]->pat_husband }}</td>
                </tr>
                <tr>
                    <td width="20%">Pekerjaan Ibu</td>
                    <td>: {{ DB::table('selec_works')->where('w_id', $patient[0]->pat_work)->value('w_name') }}</td>
                    <td width="20%">Pekerjaan Ayah</td>
                    <td>: {{ DB::table('selec_works')->where('w_id', $patient[0]->pat_husband_work)->value('w_name') }}</td>
                </tr>
                <tr>
                    <td width="20%">NIK Ibu</td>
                    <td>: {{ $patient[0]->pat_nik }}</td>
                    <td width="20%">NIK Ayah</td>
                    <td>: {{ $patient[0]->pat_husband_nik }}</td>
                </tr>
                <tr>
                    <td width="20%">Alamat</td>
                    <td colspan="3">: {{ $patient[0]->pat_address . ', RT : ' . $patient[0]->pat_rt . ', RW : ' . $patient[0]->pat_rw . ', ' . DB::table('sys_alamats')->where('kode', $patient[0]->pat_village)->value('nama') . ', ' . DB::table('sys_alamats')->where('kode', $patient[0]->pat_subdistrict)->value('nama') . ', ' . DB::table('sys_alamats')->where('kode', $patient[0]->pat_district)->value('nama'). ', ' . DB::table('sys_alamats')->where('kode', $patient[0]->pat_province)->value('nama') }}</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 20pt; margin-bottom: 20pt;">
            <div style="text-align: center;">
                Yang diberikan nama
                <br>
                <div style="font-size: 22pt">
                    <b>
                        <u>
                            {{ strtoupper($data[0]->sancmskl_name) }}
                        </u>
                    </b>
                </div>
            </div>
        </div>
        <div>
            <table width="100%">
                <tr>
                    <td width="30%">Jenis Kelamin</td>
                    <td colspan="3">: {{ DB::table('selec_sexes')->where('sex_id', $data[0]->sancmskl_sex)->value('sex_name') }}</td>
                </tr>
                <tr>
                    <td width="30%">Tanggal Lahir</td>
                    <td colspan="3">:
                        @php
                            switch (date('l', strtotime($data[0]->sancmskl_date))) {
                                case 'Sunday':
                                    echo 'Minggu';
                                    break;

                                case 'Monday':
                                    echo 'Senin';
                                    break;

                                case 'Tuesday':
                                    echo 'Selasa';
                                    break;

                                case 'Wednesday':
                                    echo 'Rabu';
                                    break;

                                case 'Thursday':
                                    echo 'Kamis';
                                    break;

                                case 'Friday':
                                    echo 'Jum\'at';
                                    break;

                                case 'Saturday':
                                    echo 'Sabtu';
                                    break;

                                default:
                                    echo 'Tidak ada';
                                    break;
                            }
                        @endphp
                        ,
                        {{ date('d', strtotime($data[0]->sancmskl_date)) }}
                        @php
                            switch (date('m', strtotime($data[0]->sancmskl_date))) {
                                case '01':
                                    echo 'Januari';
                                    break;

                                case '02':
                                    echo 'Februari';
                                    break;

                                case '03':
                                    echo 'Maret';
                                    break;

                                case '04':
                                    echo 'April';
                                    break;

                                case '05':
                                    echo 'Mei';
                                    break;

                                case '06':
                                    echo 'Juni';
                                    break;

                                case '07':
                                    echo 'Juli';
                                    break;

                                case '08':
                                    echo 'Agustus';
                                    break;

                                case '09':
                                    echo 'September';
                                    break;

                                case '10':
                                    echo 'Oktober';
                                    break;

                                case '11':
                                    echo 'November';
                                    break;

                                case '12':
                                    echo 'Desember';
                                    break;

                                default:
                                    echo '1';
                                    break;
                            }
                        @endphp
                        {{ date('Y', strtotime($data[0]->sancmskl_date)) }}
                    </td>
                </tr>
                <tr>
                    <td width="30%">Jam Lahir</td>
                    <td colspan="3">: {{ date('H : i' , strtotime($data[0]->sancmskl_time)) }}</td>
                </tr>
                <tr>
                    <td width="30%">Panjang Lahir</td>
                    <td>: {{ $data[0]->sancmskl_weight }} gram</td>
                    <td width="30%">Berat Badan Lahir</td>
                    <td>: {{ $data[0]->sancmskl_height }} cm</td>
                </tr>
            </table>
        </div>
        <table width="100%" style="font-size: 8pt;">
            <tr>
                <td colspan="2">
                    <b>International Classification of Diseases</b>
                </td>
            </tr>
            <tr>
                <td width="30%">
                    Kelahiran Spontan
                </td>
                <td>
                    <i>{{ $data[0]->sancmskl_icd1 . ' - ' . DB::table('selec_icds')->where('icd_code', $data[0]->sancmskl_icd1)->value('icd_name') }}</i>
                </td>
            </tr>
            <tr>
                <td width="30%">
                    Kelahiran dengan Tindakan
                </td>
                <td>
                    <i>{{ $data[0]->sancmskl_icd2 . ' - ' . DB::table('selec_icds')->where('icd_code', $data[0]->sancmskl_icd2)->value('icd_name') }}</i>
                </td>
            </tr>
            <tr>
                <td width="30%">
                    Kelahiran Kembar
                </td>
                <td>
                    <i>{{ $data[0]->sancmskl_icd3 . ' - ' . DB::table('selec_icds')->where('icd_code', $data[0]->sancmskl_icd3)->value('icd_name') }}</i>
                </td>
            </tr>
            <tr>
                <td width="30%">
                    Kelahiran dengan Kelainan Bawaan
                </td>
                <td>
                    <i>{{ $data[0]->sancmskl_icd4 . ' - ' . DB::table('selec_icds')->where('icd_code', $data[0]->sancmskl_icd4)->value('icd_name') }}</i>
                </td>
            </tr>
        </table>
        <div style="margin-top: 10pt;">
            <table width="100%">
                <tr>
                    <td width="30%" style="font-size: 12px;">
                        <u><b><i>Perhatian</i></b></u>
                        <br>
                        Surat Keterangan ini harus dilaporkan kepada Lurah setempat dalam waktu 14 (Empat Belas) hari setelah tanggal kelahiran bayi disertai dengan syarat-syarat pembuatan akta kelahiran yang berlaku.
                    </td>
                    <td></td>
                    <td width="50%">
                        <b>{{ ucwords($al_desa)}}</b>, {{ date('d', strtotime($data[0]->sancmskl_date)) }}
                        @php
                            switch (date('m', strtotime($data[0]->sancmskl_date))) {
                                case '01':
                                    echo 'Januari';
                                    break;

                                case '02':
                                    echo 'Februari';
                                    break;

                                case '03':
                                    echo 'Maret';
                                    break;

                                case '04':
                                    echo 'April';
                                    break;

                                case '05':
                                    echo 'Mei';
                                    break;

                                case '06':
                                    echo 'Juni';
                                    break;

                                case '07':
                                    echo 'Juli';
                                    break;

                                case '08':
                                    echo 'Agustus';
                                    break;

                                case '09':
                                    echo 'September';
                                    break;

                                case '10':
                                    echo 'Oktober';
                                    break;

                                case '11':
                                    echo 'November';
                                    break;

                                case '12':
                                    echo 'Desember';
                                    break;

                                default:
                                    echo '1';
                                    break;
                            }
                        @endphp
                        {{ date('Y', strtotime($data[0]->sancmskl_date)) }}
                        <br>
                        Bidan Penolong
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b><u>{{ strtoupper($nakes) }}  </u></b>
                        <br>
                        <div style="font-size: 11pt;">
                            NIP. {{ $nakesnip }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="page-break"></div>
    <div style="margin: 55pt; font-size: 10pt;">
        <div style="text-align: center;">
            <h2>
                <b>IDENTIFIKASI ANAK</b>
            </h2>
        </div>
        <table width="100%" style="border-style: solid; border-collapse: collapse;">
            <tr>
                <td colspan="2" style="text-align: center;">SIDIK JARI TENGAH IBU KANDUNG</td>
            </tr>
            <tr>
                <td style="text-align: center; border-style: solid;">KANAN</td>
                <td style="text-align: center; border-style: solid;">KIRI</td>
            </tr>
            <tr>
                <td style="text-align: center; border-style: solid; height: 150px;">
                    &nbsp;
                </td>
                <td style="text-align: center; border-style: solid; height: 150px;">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">TELAPAK KAKI ANAK</td>
            </tr>
            <tr>
                <td style="text-align: center; border-style: solid;">KANAN</td>
                <td style="text-align: center; border-style: solid;">KIRI</td>
            </tr>
            <tr>
                <td style="text-align: center; border-style: solid; height: 400px;">
                    &nbsp;
                </td>
                <td style="text-align: center; border-style: solid; height: 400px;">
                    &nbsp;
                </td>
            </tr>
        </table>
        <div style="text-align: justify; margin-top:10pt; margin-bottom:10pt;">
            Saya menyatakan bahwa pada pulang telah menerima bayi, saya memeriksa dan meyakinkan bahwa bayi tersebut adalah betul-betul anak saya. Saya mengecek Gelang Identfikasi yang berisi Nama, Jenis Kelamin dan Tanggal Lahir Bayi sudah sesuai.
        </div>
        <div style="text-align: right">
            <b>{{ ucwords($al_desa)}}</b>, {{ date('d', strtotime($data[0]->sancmskl_date)) }}
            @php
                switch (date('m', strtotime($data[0]->sancmskl_date))) {
                    case '01':
                        echo 'Januari';
                        break;

                    case '02':
                        echo 'Februari';
                        break;

                    case '03':
                        echo 'Maret';
                        break;

                    case '04':
                        echo 'April';
                        break;

                    case '05':
                        echo 'Mei';
                        break;

                    case '06':
                        echo 'Juni';
                        break;

                    case '07':
                        echo 'Juli';
                        break;

                    case '08':
                        echo 'Agustus';
                        break;

                    case '09':
                        echo 'September';
                        break;

                    case '10':
                        echo 'Oktober';
                        break;

                    case '11':
                        echo 'November';
                        break;

                    case '12':
                        echo 'Desember';
                        break;

                    default:
                        echo '1';
                        break;
                }
            @endphp
            {{ date('Y', strtotime($data[0]->sancmskl_date)) }}
        </div>
        <table width="100%">
            <tr>
                <td>
                    <br>
                    <br>
                    Tanda Tangan Ibu Kandung
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    ______________________________
                </td>
                <td>
                    <br>
                    Tanda tangan Perawat/Bidan/Dokter
                    <br>
                    Yang Menyerahkan Bayi
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    ______________________________
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
