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
</style>

<body>
    <div style="text-align: center;">
        <h4>
            <b>KOHORT ANTENATAL CARE</b>
        </h4>
    </div>
    <table width="100%" style="font-size: 8pt;">
        <tr>
            <td>Instansi</td>
            <td>:</td>
            <td>{{ $ins_name }}</td>
            <td>Provinsi</td>
            <td>:</td>
            <td>{{ $al_prov }}</td>
            <td>Desa</td>
            <td>:</td>
            <td>{{ $al_desa }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $ins_add }} RT.{{ $ins_rt }} RW.{{ $ins_rw }}</td>
            <td>Kabupaten</td>
            <td>:</td>
            <td>{{ $al_dis }}</td>
            <td>Bidan</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Telp</td>
            <td>:</td>
            <td>{{ $ins_telp }}</td>
            <td>Kecamatan</td>
            <td>:</td>
            <td>{{ $al_subdis }}</td>
            <td>Periode</td>
            <td>:</td>
            <td>{{ date('d-m-Y', strtotime($awal)) . ' s/d ' . date('d-m-Y', strtotime($akhir)) }}</td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; font-size: 8pt;">
        <thead style=" border: 1px solid black;">
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="3">No</th>
                <th style=" border: 1px solid black;" rowspan="3">RW</th>
                <th style=" border: 1px solid black;" rowspan="2" colspan="6">Registrasi</th>
                <th style=" border: 1px solid black;" colspan="13">Pemeriksaan</th>
                <th style=" border: 1px solid black;" rowspan="3">Konseling</th>
                <th style=" border: 1px solid black;" rowspan="3">Status Imunisasi TT</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" colspan="8">Ibu</th>
                <th style=" border: 1px solid black;" colspan="5">Bayi</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;">Tanggal</th>
                <th style=" border: 1px solid black;">NORM</th>
                <th style=" border: 1px solid black;">Nama Bumil</th>
                <th style=" border: 1px solid black;">Penjaminan</th>
                <th style=" border: 1px solid black;">Usia Kehamilan</th>
                <th style=" border: 1px solid black;">Trimester</th>
                <th style=" border: 1px solid black;">Anamnesis</th>
                <th style=" border: 1px solid black;">BB(Kg)</th>
                <th style=" border: 1px solid black;">TB(cm)</th>
                <th style=" border: 1px solid black;">TD(mm/Hg)</th>
                <th style=" border: 1px solid black;">TFU(cm)</th>
                <th style=" border: 1px solid black;">LILA(cm)</th>
                <th style=" border: 1px solid black;">Status Gizi(M/N)</th>
                <th style=" border: 1px solid black;">Fefleksi Patella(+/-)</th>
                <th style=" border: 1px solid black;">DJJ(x/menit)</th>
                <th style=" border: 1px solid black;">Kepada terhadapt PAP</th>
                <th style=" border: 1px solid black;">TBJ(gr)</th>
                <th style=" border: 1px solid black;">Jumlah Janin</th>
                <th style=" border: 1px solid black;">Presentasi</th>
            </tr>
            <tr style=" border: 1px solid black;">
                @for ($i = 1; $i < 24; $i++)
                    <th style=" border: 1px solid black;">{{ $i }}</th>
                @endfor
            </tr>
        </thead>
        <tbody style=" border: 1px solid black;">
            @foreach ($data as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align : center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->ins_rw }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancd_date }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sanc_norm }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ DB::table('eianc_patients')->where('pat_norm', $d->sanc_norm)->value('pat_name') }}</td>
                    <td style=" border: 1px solid black;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sanca_uk }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sanca_trimester }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sanca_complaint }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancpe_weight_now }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancpe_height }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancpe_blood_pressure }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancpe_tfu_cm }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancpe_arm }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancpe_arm < 23.5) ? 'K' : 'N' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancpe_patella == '1') ? '+ (Positif)' : '- (Negatif)' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancpe_djj }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancpe_pap == 11) ? 'Masuk' : (($d->sancpe_pap == 12) ? 'Sebagian Masuk' : 'Belum Masuk') }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancpe_tfu_cm != '') ? (($d->sancpe_tfu_cm - $d->sancpe_pap) * 155) : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancpe_fetus == '0') ? 'Tunggal' : 'Kembar' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ DB::table('selec_tts')->where('tt_id', $d->sancpe_tt)->value('tt_name') }}</td>
                </tr>
            @endforeach
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid rgb(216, 208, 208); text-align : center; background-color : black; color : white;" colspan="23">PERSALINAN</td>
            </tr>
            @foreach ($salin as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align : center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->ins_rw }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancd_date }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sanc_norm }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ DB::table('eianc_patients')->where('pat_norm', $d->sanc_norm)->value('pat_name') }}</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page_break"></div>
    <div style="text-align: center; color : white;">
        <h4>
            <b>KOHORT ANTENATAL CARE</b>
        </h4>
    </div>
    <table width="100%" style="font-size: 8pt; color : white;">
        <tr>
            <td>Instansi</td>
            <td>:</td>
            <td>{{ $ins_name }}</td>
            <td>Provinsi</td>
            <td>:</td>
            <td>{{ $al_prov }}</td>
            <td>Desa</td>
            <td>:</td>
            <td>{{ $al_desa }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $ins_add }} RT.{{ $ins_rt }} RW.{{ $ins_rw }}</td>
            <td>Kabupaten</td>
            <td>:</td>
            <td>{{ $al_dis }}</td>
            <td>Bidan</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Telp</td>
            <td>:</td>
            <td>{{ $ins_telp }}</td>
            <td>Kecamatan</td>
            <td>:</td>
            <td>{{ $al_subdis }}</td>
            <td>Periode</td>
            <td>:</td>
            <td>{{ date('d-m-Y', strtotime($awal)) . ' s/d ' . date('d-m-Y', strtotime($akhir)) }}</td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; font-size: 8pt;">
        <thead style=" border: 1px solid black;">
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="4">No</th>
                <th style=" border: 1px solid black;" rowspan="4">RW</th>
                <th style=" border: 1px solid black;" rowspan="2" colspan="3">Pelayanan</th>
                <th style=" border: 1px solid black;" rowspan="2" colspan="6">Laboratorium</th>
                <th style=" border: 1px solid black;" colspan="13">Integrasi Program</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" colspan="7">Pencegahan Penularan HIV dari Ibu Ke Anak (PPIA)</th>
                <th style=" border: 1px solid black;" colspan="6">Pencegahan Malaria Dalam Kehamilan (PMDK)</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="2">Injeksi TT</th>
                <th style=" border: 1px solid black;" rowspan="2">Catat di Buku KIA</th>
                <th style=" border: 1px solid black;" rowspan="2">Fe(tbl/btl)</th>
                <th style=" border: 1px solid black;" rowspan="2">Hb(gr/dl)</th>
                <th style=" border: 1px solid black;" rowspan="2">Protein Urien(+/-)</th>
                <th style=" border: 1px solid black;" rowspan="2">Gula Darah</th>
                <th style=" border: 1px solid black;" rowspan="2">Thalasemia(+/-)</th>
                <th style=" border: 1px solid black;" rowspan="2">Sifilis(+/-)</th>
                <th style=" border: 1px solid black;" rowspan="2">HBsAg(+/-)</th>
                <th style=" border: 1px solid black;" rowspan="2">Bumil Datang Dengan HIV</th>
                <th style=" border: 1px solid black;" rowspan="2">Bumil ditawarkan tes</th>
                <th style=" border: 1px solid black;" rowspan="2">Bumil dites HIV</th>
                <th style=" border: 1px solid black;" rowspan="2">Hasil Tes HIV(+/-)</th>
                <th style=" border: 1px solid black;" rowspan="2">IMS/Bumil Mendapat ART</th>
                <th style=" border: 1px solid black;" colspan="2">Bumil HIV (+)</th>
                <th style=" border: 1px solid black;" rowspan="2">Bumil diberi kelambu</th>
                <th style=" border: 1px solid black;" colspan="2">Bumil diperiksa darah malaria</th>
                <th style=" border: 1px solid black;" colspan="2">Bumil malaria(+)</th>
                <th style=" border: 1px solid black;" rowspan="2">Bumil Mendapat KINA (ACT)</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;">Persalinan Pervaginam</th>
                <th style=" border: 1px solid black;">Persalinan Perabdominam(SC)</th>
                <th style=" border: 1px solid black;">RDT</th>
                <th style=" border: 1px solid black;">Mikroskopis</th>
                <th style=" border: 1px solid black;">RDT</th>
                <th style=" border: 1px solid black;">Mikroskopis</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;">1</th>
                @for ($i = 23; $i < 46; $i++)
                    <th style=" border: 1px solid black;">{{ $i }}</th>
                @endfor
            </tr>
        </thead>
        <tbody style=" border: 1px solid black;">
            @foreach ($data as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align : center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->ins_rw }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ DB::table('selec_tts')->where('tt_id', $d->sanct_tt)->value('tt_name') }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sanct_arsip_kia == '0') ? 'Tidak' : 'Ya' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancl_hb }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_urine == 0) ? 'Tidak diperiksa' : (($d->sancl_urine == 1) ? '-' : (($d->sancl_urine == 2) ? '+' : (($d->sancl_urine == '3') ? '++' : '+++' ))) }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->sancl_blood_sugar }}</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_sifilis == '0') ? 'Tidak Diperiksa' : (($d->sancl_sifilis == '1') ? '- (Negatif)' : '+ (Positif)') }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_hbsag == '1') ? '- (Negatif)' : '+ (Positif)' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_hiv == '2') ? 'Tidak' : 'Ya' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_hiv == '2') ? 'Tidak' : 'Ya' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_hiv == 0) ? 'Non Reaktif' : (($d->sancl_hiv == 1) ? 'Rekatif' : 'Tidak Diperiksa') }}</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sanct_kelambu == 0) ? 'Tidak' : 'Ya' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                </tr>
            @endforeach
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid rgb(216, 208, 208); text-align : center; background-color : black; color : white;" colspan="24">PERSALINAN</td>
            </tr>
            @foreach ($salin as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align : center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->ins_rw }}</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancm_met_marr == '2') ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancm_met_marr == '3') ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page_break"></div>
    <div style="text-align: center; color : white;">
        <h4>
            <b>KOHORT ANTENATAL CARE</b>
        </h4>
    </div>
    <table width="100%" style="font-size: 8pt; color : white;">
        <tr>
            <td>Instansi</td>
            <td>:</td>
            <td>{{ $ins_name }}</td>
            <td>Provinsi</td>
            <td>:</td>
            <td>{{ $al_prov }}</td>
            <td>Desa</td>
            <td>:</td>
            <td>{{ $al_desa }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $ins_add }} RT.{{ $ins_rt }} RW.{{ $ins_rw }}</td>
            <td>Kabupaten</td>
            <td>:</td>
            <td>{{ $al_dis }}</td>
            <td>Bidan</td>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>Telp</td>
            <td>:</td>
            <td>{{ $ins_telp }}</td>
            <td>Kecamatan</td>
            <td>:</td>
            <td>{{ $al_subdis }}</td>
            <td>Periode</td>
            <td>:</td>
            <td>{{ date('d-m-Y', strtotime($awal)) . ' s/d ' . date('d-m-Y', strtotime($akhir)) }}</td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; font-size: 8pt;">
        <thead style=" border: 1px solid black;">
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" rowspan="3">No</th>
                <th style=" border: 1px solid black;" rowspan="3">RW</th>
                <th style=" border: 1px solid black;" colspan="9">Integrasi Program</th>
                <th style=" border: 1px solid black;" rowspan="2" colspan="2">Resiko terdeteksi oleh</th>
                <th style=" border: 1px solid black;" rowspan="2" colspan="6">Komplikasi</th>
                <th style=" border: 1px solid black;" colspan="7">Kegiatan Rujukan</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;" colspan="3">TB dalam kehamilan</th>
                <th style=" border: 1px solid black;" colspan="2">Kecacingan dalam kehamilan</th>
                <th style=" border: 1px solid black;" colspan="2">Pencegahan IMS dalam kehamilan</th>
                <th style=" border: 1px solid black;" colspan="2">Pencegahan hepatitis dalam kehamilan</th>
                <th style=" border: 1px solid black;" colspan="5">Fasilitas kesehatan</th>
                <th style=" border: 1px solid black;" rowspan="2">Keadaan tiba (H/M)</th>
                <th style=" border: 1px solid black;" rowspan="2">Keadaan Pulang( H/M)</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;">Bumil periksa dahak</th>
                <th style=" border: 1px solid black;">Bumil hasil periksa (+/-)</th>
                <th style=" border: 1px solid black;">Obat</th>
                <th style=" border: 1px solid black;">Bumil periksa ankylostoma</th>
                <th style=" border: 1px solid black;">Bumil hasil tes (+/-)</th>
                <th style=" border: 1px solid black;">Bumil periksa IMS</th>
                <th style=" border: 1px solid black;">Bumil hasil tes (+/-)</th>
                <th style=" border: 1px solid black;">Bumil periksa hepatitis</th>
                <th style=" border: 1px solid black;">Bumil hasil tes (+/-)</th>
                <th style=" border: 1px solid black;">Nakes</th>
                <th style=" border: 1px solid black;">Non Nakes</th>
                <th style=" border: 1px solid black;">HDK</th>
                <th style=" border: 1px solid black;">Abortus</th>
                <th style=" border: 1px solid black;">Pendarahan</th>
                <th style=" border: 1px solid black;">Infeksi</th>
                <th style=" border: 1px solid black;">KPD</th>
                <th style=" border: 1px solid black;">Lain-lain</th>
                <th style=" border: 1px solid black;">Puskesmas</th>
                <th style=" border: 1px solid black;">RB</th>
                <th style=" border: 1px solid black;">RSIA</th>
                <th style=" border: 1px solid black;">RS</th>
                <th style=" border: 1px solid black;">Lain-lain</th>
            </tr>
            <tr style=" border: 1px solid black;">
                <th style=" border: 1px solid black;">1</th>
                @for ($i = 45; $i < 70; $i++)
                    <th style=" border: 1px solid black;">{{ $i }}</th>
                @endfor
            </tr>
        </thead>
        <tbody style=" border: 1px solid black;">
            @foreach ($data as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align : center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->ins_rw }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_bta != 0) ? 'Tidak' : 'Ya' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_bta == '1') ? 'Non Reaktif' : (($d->sancl_bta == '2') ? 'Reaktif' : 'Tidak diperiksa') }}</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_sifilis != 0) ? 'Ya' : 'Tidak' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_sifilis == 1) ? '- (Negatif)' : (($d->sancl_sifilis == 1) ? '+ (Positif)' : 'Tidak Diperiksa') }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_hbsag != 0) ? 'Ya' : 'Tidak' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->sancl_hbsag == 1) ? '- (Negatif)' : (($d->sancl_sifilis == 1) ? '+ (Positif)' : 'Tidak Diperiksa') }}</td>
                    <td style=" border: 1px solid black; text-align : center;">v</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ (DB::table('selec_complicateds')->where('com_id', $d->sancdi_tcompli)->value('com_name') == 'HDK') ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ (DB::table('selec_complicateds')->where('com_id', $d->sancdi_tcompli)->value('com_name') == 'Abortus') ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ (DB::table('selec_complicateds')->where('com_id', $d->sancdi_tcompli)->value('com_name') == 'Pendarahan') ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ (DB::table('selec_complicateds')->where('com_id', $d->sancdi_tcompli)->value('com_name') == 'Infeksi') ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ (DB::table('selec_complicateds')->where('com_id', $d->sancdi_tcompli)->value('com_name') == 'Infeksi') ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ (DB::table('selec_complicateds')->where('com_id', $d->sancdi_tcompli)->value('com_name') == 'Lain-lain') ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->ins_type == 3) ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->ins_type == 4) ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->ins_type == 2) ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->ins_type == 1) ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ ($d->ins_type != 1 || $d->ins_type != 2 || $d->ins_type != 3 || $d->ins_type != 4) ? 'v' : '' }}</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                    <td style=" border: 1px solid black; text-align : center;">-</td>
                </tr>
            @endforeach
            <tr style=" border: 1px solid black;">
                <td style=" border: 1px solid rgb(216, 208, 208); text-align : center; background-color : black; color : white;" colspan="26">PERSALINAN</td>
            </tr>
            @foreach ($salin as $d)
                <tr style=" border: 1px solid black;">
                    <td style=" border: 1px solid black; text-align : center;">{{ $loop->iteration }}</td>
                    <td style=" border: 1px solid black; text-align : center;">{{ $d->ins_rw }}</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                    <td style=" border: 1px solid black; text-align : center;">&nbsp;</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
