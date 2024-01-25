@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });
</script>

<script>
    function btnhitung() {
            var kembangair = $('#sancr_ham_kembang').val();
            var bayimati = $('#sancr_bay_mati').val();
            var lebih = $('#sancr_ham_leb_bulan').val();
            var pre = $('#sancr_per_eks').val();


            if (kembangair == '' || bayimati == '' || lebih == '' || pre == '') {
                $('#btnsubmit').prop('disabled', true);
                alert('Isian mohon untuk dilengkapi!');
                // window.location.reload();
            }else{
                var xhit = parseInt($('#sancr_awal').val()) +
                            parseInt($('#sancr_ter_muda').val()) +
                            parseInt($('#sancr_ter_tua').val()) +
                            parseInt($('#sancr_ter_lam_h1').val()) +
                            parseInt($('#sancr_ter_tua_h1').val()) +
                            parseInt($('#sancr_ter_cep_ham').val()) +
                            parseInt($('#sancr_ter_lam_ham').val()) +
                            parseInt($('#sancr_ter_pen').val()) +
                            parseInt($('#sancr_ter_ban_anak').val()) +
                            parseInt($('#sancr_per_gag_ham').val()) +
                            parseInt($('#sancr_per_lahir').val()) +
                            parseInt($('#sancr_per_caesar').val()) +
                            parseInt($('#sancr_pen_ham').val()) +
                            parseInt($('#sancr_beng_mkmt').val()) +
                            parseInt($('#sancr_td_ting').val()) +
                            parseInt($('#sancr_ham_kembar').val()) +
                            parseInt($('#sancr_ham_kembang').val()) +
                            parseInt($('#sancr_bay_mati').val()) +
                            parseInt($('#sancr_ham_leb_bulan').val()) +
                            parseInt($('#sancr_let_sungsang').val()) +
                            parseInt($('#sancr_let_lintang').val()) +
                            parseInt($('#sancr_perdar_ham').val()) +
                            parseInt($('#sancr_per_eks').val())
                            ;

                $('#sancr_score').val(xhit);

                if (xhit < 3) {
                    $('#cat').val('Resiko Rendah (KRR)');
                    $('#catx').html('Resiko Rendah (KRR)');
                } else if (xhit < 11) {
                    $('#cat').val('Resiko Tinggi (KRT)');
                    $('#catx').html('Resiko Tinggi (KRT)');
                } else {
                    $('#cat').val('Resiko Sangat Tinggi (KRST)');
                    $('#catx').html('Resiko Sangat Tinggi (KRST)');
                }

                $('#btnsubmit').prop('disabled', false);
            }
    }

    jQuery('select[name="desid"]').on('change', function () {
            var des = jQuery(this).val();

            if (des == 2) {
                $("#rujuk").show();
            } else {
                $("#rujuk").hide();
            }
        });
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('service.anc.anc', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>ANC - SKRINING RISIKO</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.anc.risk.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            @if (count($data) < 1)
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sancr_awal">Nilai Awal</label>
                            <input type="text" name="sancr_awal" id="sancr_awal" class="form-control text-center" value="2" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_muda">Terlalu Muda</label>
                            @php
                                $termu = DB::table('selec_preg_ages')->where('pa_id', $anam[0]->sanc_pregnancy1_age)->value('pa_name');

                                if ($termu == "< 17 Tahun") {
                                    $rtermu = 4;
                                } if ($termu == "17 - 34 tahun") {
                                    $rtermu = 0;
                                } else {
                                    $rtermu = 4;
                                }
                            @endphp
                            <input type="text" name="sancr_ter_muda" id="sancr_ter_muda" class="form-control text-center" value="{{ $rtermu }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_tua">Terlalu Tua</label>
                            @php
                                $tertua = DB::table('eianc_patients')->where('pat_norm', Crypt::decrypt($id))->value('pat_dob');

                                $umur = date('Y') - date('Y', strtotime($tertua));
                            @endphp
                            <input type="text" name="sancr_ter_tua" id="sancr_ter_tua" class="form-control text-center" value="{{ ($umur < 35) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_lam_h1">Terlalu Lambat H-1</label>
                            @php
                                $tertua = DB::table('selec_preg_marrs')->where('pm_id', $anam[0]->sanc_pregnancy1_age)->value('pm_name');
                            @endphp
                            <input type="text" name="sancr_ter_lam_h1" id="sancr_ter_lam_h1" class="form-control text-center" value="{{ ($tertua != '>= 4 tahun') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_tua_h1">Terlalu Tua H-1</label>
                            @php
                                $tertua = DB::table('eianc_patients')->where('pat_norm', Crypt::decrypt($id))->value('pat_dob');

                                $umur = date('Y') - date('Y', strtotime($tertua));
                            @endphp
                            <input type="text" name="sancr_ter_tua_h1" id="sancr_ter_tua_h1" class="form-control text-center" value="{{ ($umur < 35) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_cep_ham">Terlalu Cepat Hamil</label>
                            @php
                                $termu = DB::table('selec_preg_des')->where('pd_id', $anam[0]->sanc_pregnancy1_marriage)->value('pd_name');

                                if ($termu == "> 9 tahun") {
                                    $rtermu = 4;
                                } elseif ($termu == "2 - 9 tahun" || $termu == "0 tahun") {
                                    $rtermu = 0;
                                } else {
                                    $rtermu = 4;
                                }
                            @endphp
                            <input type="text" name="sancr_ter_cep_ham" id="sancr_ter_cep_ham" class="form-control text-center" value="{{ $rtermu }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sancr_ter_lam_ham">Terlalu Lama Hamil</label>
                            @php
                                $termu = DB::table('selec_preg_des')->where('pd_id', $anam[0]->sanc_pregnancy1_marriage)->value('pd_name');

                                if ($termu == "> 9 tahun") {
                                    $rtermu = 4;
                                } else {
                                    $rtermu = 0;
                                }
                            @endphp
                            <input type="text" name="sancr_ter_lam_ham" id="sancr_ter_lam_ham" class="form-control text-center" value="{{ $rtermu }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_pen">Terlalu Pendek</label>
                            <input type="text" name="sancr_ter_pen" id="sancr_ter_pen" class="form-control text-center" value="{{ ($anam[0]->sancpe_height <= 145) ? 4 : 0 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_ban_anak">Terlalu Banyak Anak</label>
                            <input type="text" name="sancr_ter_ban_anak" id="sancr_ter_ban_anak" class="form-control text-center" value="{{ ($anam[0]->sanc_life <= 4) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_per_gag_ham">Gagal Hamil</label>
                            <input type="text" name="sancr_per_gag_ham" id="sancr_per_gag_ham" class="form-control text-center" value="{{ ($anam[0]->sanc_pregnancy_failed == 0) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_per_lahir">Metode lahir yang dialami</label>
                            @php
                                $lahir = DB::table('selec_preg_withs')->where('pw_id', $anam[0]->sanc_born_with)->value('pw_id');
                            @endphp
                            <input type="text" name="sancr_per_lahir" id="sancr_per_lahir" class="form-control text-center" value="{{ ($lahir == 1 || $lahir == 2) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_per_caesar">Lahir Caesar</label>
                            <input type="text" name="sancr_per_caesar" id="sancr_per_caesar" class="form-control text-center" value="{{ ($anam[0]->sancpe_caesar == '0') ? 0 : 4 }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sancr_pen_ham">Penyakit yang dialami</label>
                            <input type="text" name="sancr_pen_ham" id="sancr_pen_ham" class="form-control text-center" value="{{ ($anam[0]->sanc_illness_experienced == '') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_beng_mkmt">Bengkak Muka/Tungkai</label>
                            <input type="text" name="sancr_beng_mkmt" id="sancr_beng_mkmt" class="form-control text-center" value="{{ ($anam[0]->sancpe_oodena == '0') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <?php
                                $td0 = explode('/', $anam[0]->sancpe_blood_pressure);
                            ?>
                            <label for="sancr_td_ting">Tekanan Darah</label>
                            <input type="text" name="sancr_td_ting" id="sancr_td_ting" class="form-control text-center" value="{{ ($td0[0] <= '140') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ham_kembar">Hamil Kembar</label>
                            <input type="text" name="sancr_ham_kembar" id="sancr_ham_kembar" class="form-control text-center" value="{{ ($anam[0]->sancpe_fetus == '0') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_let_sungsang">Letak Sungsang</label>
                            <input type="text" name="sancr_let_sungsang" id="sancr_let_sungsang" class="form-control text-center" value="{{ ($anam[0]->sancpe_pros_fetus == '1' || $anam[0]->sancpe_pros_fetus == '2') ? 8 : 0 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_let_lintang">Letak Lintang</label>
                            <input type="text" name="sancr_let_lintang" id="sancr_let_lintang" class="form-control text-center" value="{{ ($anam[0]->sancpe_pros_fetus == '1' || $anam[0]->sancpe_pros_fetus == '2') ? 8 : 0 }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sancr_perdar_ham">Menggalami Pendarahan</label>
                            <input type="text" name="sancr_perdar_ham" id="sancr_perdar_ham" class="form-control text-center" value="{{ ($anam[0]->sanca_bleeding == '0') ? 0 : 8 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="sancr_ham_kembang">Hamil Kembar Air <i>(Polyhidromion/Hypohidromion)</i></label>
                            <select name="sancr_ham_kembang" id="sancr_ham_kembang" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                <option value="0" {{ (old('sancr_ham_kembang') == '0') ? 'selected' :'' }}>TIDAK</option>
                                <option value="4" {{ (old('sancr_ham_kembang') == '4') ? 'selected' : '' }}>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sancr_bay_mati">Bayi Mati Dalam Kandungan</label>
                            <select name="sancr_bay_mati" id="sancr_bay_mati" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                <option value="0" {{ (old('sancr_bay_mati') == '0') ? 'selected' :'' }}>TIDAK</option>
                                <option value="4" {{ (old('sancr_bay_mati') == '4') ? 'selected' : '' }}>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sancr_ham_leb_bulan">Bayi lebih bulan</label>
                            <select name="sancr_ham_leb_bulan" id="sancr_ham_leb_bulan" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                <option value="0" {{ (old('sancr_ham_leb_bulan') == '0') ? 'selected' :'' }}>TIDAK</option>
                                <option value="4" {{ (old('sancr_ham_leb_bulan') == '4') ? 'selected' : '' }}>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sancr_per_eks">Pre-Eklampisa Berat</label>
                            <select name="sancr_per_eks" id="sancr_per_eks" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                <option value="0" {{ (old('sancr_per_eks') == '0') ? 'selected' :'' }}>TIDAK</option>
                                <option value="8" {{ (old('sancr_per_eks') == '8') ? 'selected' : '' }}>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button type="button" class="btn btn-danger btn-block btn-lg" onclick="return btnhitung();">
                                HITUNG
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <label for="sancr_score">TOTAL SCOORE</label>
                            <input type="text" name="sancr_score" id="sancr_score" class="form-control text-center" readonly style="font-size: 32pt;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat">KATEGORI RESIKO</label>
                            <h2 id="catx">-</h2>
                            <input type="hidden" name="cat" id="cat" class="form-control text-center" readonly style="font-size: 32pt;">
                        </div>
                    </div>
                </div>
            @else
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="idx" value="{{ $data[0]->sancr_id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sancr_awal">Nilai Awal</label>
                            <input type="text" name="sancr_awal" id="sancr_awal" class="form-control text-center" value="2" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_muda">Terlalu Muda</label>
                            @php
                                $termu = DB::table('selec_preg_ages')->where('pa_id', $anam[0]->sanc_pregnancy1_age)->value('pa_name');

                                if ($termu == "< 17 Tahun") {
                                    $rtermu = 4;
                                } if ($termu == "17 - 34 tahun") {
                                    $rtermu = 0;
                                } else {
                                    $rtermu = 4;
                                }
                            @endphp
                            <input type="text" name="sancr_ter_muda" id="sancr_ter_muda" class="form-control text-center" value="{{ $rtermu }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_tua">Terlalu Tua</label>
                            @php
                                $tertua = DB::table('eianc_patients')->where('pat_norm', Crypt::decrypt($id))->value('pat_dob');

                                $umur = date('Y') - date('Y', strtotime($tertua));
                            @endphp
                            <input type="text" name="sancr_ter_tua" id="sancr_ter_tua" class="form-control text-center" value="{{ ($umur < 35) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_lam_h1">Terlalu Lambat H-1</label>
                            @php
                                $tertua = DB::table('selec_preg_marrs')->where('pm_id', $anam[0]->sanc_pregnancy1_age)->value('pm_name');
                            @endphp
                            <input type="text" name="sancr_ter_lam_h1" id="sancr_ter_lam_h1" class="form-control text-center" value="{{ ($tertua != '>= 4 tahun') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_tua_h1">Terlalu Tua H-1</label>
                            @php
                                $tertua = DB::table('eianc_patients')->where('pat_norm', Crypt::decrypt($id))->value('pat_dob');

                                $umur = date('Y') - date('Y', strtotime($tertua));
                            @endphp
                            <input type="text" name="sancr_ter_tua_h1" id="sancr_ter_tua_h1" class="form-control text-center" value="{{ ($umur < 35) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_cep_ham">Terlalu Cepat Hamil</label>
                            @php
                                $termu = DB::table('selec_preg_des')->where('pd_id', $anam[0]->sanc_pregnancy1_marriage)->value('pd_name');

                                if ($termu == "> 9 tahun") {
                                    $rtermu = 4;
                                } elseif ($termu == "2 - 9 tahun" || $termu == "0 tahun") {
                                    $rtermu = 0;
                                } else {
                                    $rtermu = 4;
                                }
                            @endphp
                            <input type="text" name="sancr_ter_cep_ham" id="sancr_ter_cep_ham" class="form-control text-center" value="{{ $rtermu }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sancr_ter_lam_ham">Terlalu Lama Hamil</label>
                            @php
                                $termu = DB::table('selec_preg_des')->where('pd_id', $anam[0]->sanc_pregnancy1_marriage)->value('pd_name');

                                if ($termu == "> 9 tahun") {
                                    $rtermu = 4;
                                } else {
                                    $rtermu = 0;
                                }
                            @endphp
                            <input type="text" name="sancr_ter_lam_ham" id="sancr_ter_lam_ham" class="form-control text-center" value="{{ $rtermu }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_pen">Terlalu Pendek</label>
                            <input type="text" name="sancr_ter_pen" id="sancr_ter_pen" class="form-control text-center" value="{{ ($anam[0]->sancpe_height <= 145) ? 4 : 0 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ter_ban_anak">Terlalu Banyak Anak</label>
                            <input type="text" name="sancr_ter_ban_anak" id="sancr_ter_ban_anak" class="form-control text-center" value="{{ ($anam[0]->sanc_life <= 4) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_per_gag_ham">Gagal Hamil</label>
                            <input type="text" name="sancr_per_gag_ham" id="sancr_per_gag_ham" class="form-control text-center" value="{{ ($anam[0]->sanc_pregnancy_failed == 0) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_per_lahir">Metode lahir yang dialami</label>
                            @php
                                $lahir = DB::table('selec_preg_withs')->where('pw_id', $anam[0]->sanc_born_with)->value('pw_id');
                            @endphp
                            <input type="text" name="sancr_per_lahir" id="sancr_per_lahir" class="form-control text-center" value="{{ ($lahir == 1 || $lahir == 2) ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_per_caesar">Lahir Caesar</label>
                            <input type="text" name="sancr_per_caesar" id="sancr_per_caesar" class="form-control text-center" value="{{ ($anam[0]->sancpe_caesar == '0') ? 0 : 4 }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sancr_pen_ham">Penyakit yang dialami</label>
                            <input type="text" name="sancr_pen_ham" id="sancr_pen_ham" class="form-control text-center" value="{{ ($anam[0]->sanc_illness_experienced == '') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_beng_mkmt">Bengkak Muka/Tungkai</label>
                            <input type="text" name="sancr_beng_mkmt" id="sancr_beng_mkmt" class="form-control text-center" value="{{ ($anam[0]->sancpe_oodena == '0') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <?php
                                $td0 = explode('/', $anam[0]->sancpe_blood_pressure);
                            ?>
                            <label for="sancr_td_ting">Tekanan Darah</label>
                            <input type="text" name="sancr_td_ting" id="sancr_td_ting" class="form-control text-center" value="{{ ($td0[0] <= '140') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_ham_kembar">Hamil Kembar</label>
                            <input type="text" name="sancr_ham_kembar" id="sancr_ham_kembar" class="form-control text-center" value="{{ ($anam[0]->sancpe_fetus == '0') ? 0 : 4 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_let_sungsang">Letak Sungsang</label>
                            <input type="text" name="sancr_let_sungsang" id="sancr_let_sungsang" class="form-control text-center" value="{{ ($anam[0]->sancpe_pros_fetus == '1' || $anam[0]->sancpe_pros_fetus == '2') ? 8 : 0 }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="sancr_let_lintang">Letak Lintang</label>
                            <input type="text" name="sancr_let_lintang" id="sancr_let_lintang" class="form-control text-center" value="{{ ($anam[0]->sancpe_pros_fetus == '1' || $anam[0]->sancpe_pros_fetus == '2') ? 8 : 0 }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sancr_perdar_ham">Menggalami Pendarahan</label>
                            <input type="text" name="sancr_perdar_ham" id="sancr_perdar_ham" class="form-control text-center" value="{{ ($anam[0]->sanca_bleeding == '0') ? 0 : 8 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="sancr_ham_kembang">Hamil Kembar Air <i>(Polyhidromion/Hypohidromion)</i></label>
                            <select name="sancr_ham_kembang" id="sancr_ham_kembang" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                <option value="0" {{ (old('sancr_ham_kembang') == '0') ? 'selected' : (($data[0]->sancr_ham_kembang == '0') ? 'selected' : '') }}>TIDAK</option>
                                <option value="4" {{ (old('sancr_ham_kembang') == '4') ? 'selected' : (($data[0]->sancr_ham_kembang == '4') ? 'selected' : '') }}>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sancr_bay_mati">Bayi Mati Dalam Kandungan</label>
                            <select name="sancr_bay_mati" id="sancr_bay_mati" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                <option value="0" {{ (old('sancr_bay_mati') == '0') ? 'selected' : (($data[0]->sancr_bay_mati == '0') ? 'selected' : '') }}>TIDAK</option>
                                <option value="4" {{ (old('sancr_bay_mati') == '4') ? 'selected' : (($data[0]->sancr_bay_mati == '4') ? 'selected' : '') }}>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sancr_ham_leb_bulan">Bayi lebih bulan</label>
                            <select name="sancr_ham_leb_bulan" id="sancr_ham_leb_bulan" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                <option value="0" {{ (old('sancr_ham_leb_bulan') == '0') ? 'selected' : (($data[0]->sancr_ham_leb_bulan == '0') ? 'selected' : '') }}>TIDAK</option>
                                <option value="4" {{ (old('sancr_ham_leb_bulan') == '4') ? 'selected' : (($data[0]->sancr_ham_leb_bulan == '4') ? 'selected' : '') }}>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sancr_per_eks">Pre-Eklampisa Berat</label>
                            <select name="sancr_per_eks" id="sancr_per_eks" class="form-control select2">
                                <option value="">-- PILIH --</option>
                                <option value="0" {{ (old('sancr_per_eks') == '0') ? 'selected' : (($data[0]->sancr_per_eks == '0') ? 'selected' : '') }}>TIDAK</option>
                                <option value="8" {{ (old('sancr_per_eks') == '8') ? 'selected' : (($data[0]->sancr_per_eks == '8') ? 'selected' : '') }}>YA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button type="button" class="btn btn-danger btn-block btn-lg" onclick="return btnhitung();">
                                HITUNG
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <label for="sancr_score">TOTAL SCOORE</label>
                            <input type="text" name="sancr_score" id="sancr_score" class="form-control text-center" readonly style="font-size: 32pt;" value="{{ $data[0]->sancr_score }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat">KATEGORI RESIKO</label>
                            <h2 id="catx">{{ ($data[0]->sancr_score < 2) ? 'Resiko Randah (KRR)' : (($data[0]->sancr_score < 11) ? 'Resiko Tinggi (KRT)' : 'Resiko Sangat Tinggi (KRST)') }}</h2>
                            <input type="hidden" name="cat" id="cat" class="form-control text-center" readonly style="font-size: 32pt;" value="{{ ($data[0]->sancr_score < 2) ? 'Resiko Randah (KRR)' : (($data[0]->sancr_score < 11) ? 'Resiko Tinggi (KRT)' : 'Resiko Sangat Tinggi (KRST)') }}">
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('service.anc.anc.diag', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                <button class="btn btn-success" type="button">
                    <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
                </button>
            </a>
            @if (count($data) > 0)
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="{{ route('service.anc.anc', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                <button class="btn btn-warning" type="button">
                    Selesai
                </button>
            </a>
            @endif
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <button class="btn btn-primary" id="btnsubmit" {{ (count($data) < 1) ? 'disabled' : '' }}>
                Submit
            </button>
        </div>
    </form>
</div>

@if (count($data) > 0)
<div class="card">
    <div class="card-header">
        <h4>
            <b>ICD</b>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ route('service.anc.anc.risk.icd') }}" method="post" autocomplete="off">
            @csrf
            <input type="hidden" name="id" value="{{ $data[0]->sancr_id }}">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <select name="icd" id="icd" class="form-control select2">
                        <option value="">-- PILIH --</option>
                        @foreach ($sicd as $icd)
                            <option value="{{ $icd->icd_id }}" {{ (old('icd') == $icd->icd_id) ? 'selected' : '' }}>{{ $icd->icd_code }} - {{ $icd->icd_name }}</option>
                        @endforeach
                    </select>
                    @if(session()->has('icd'))
                    <div class="text-danger">
                        {{ session()->get('icd') }}
                    </div>
                @endif
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary btn-block">
                        Tambah
                    </button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th class="text-center" width="20%">KODE ICD</th>
                    <th class="text-center">ICD</th>
                    <th class="text-center" width="10%">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $icd = DB::table('eianc_service_anc_icds')->where('sancicd_anc_d_id', Crypt::decrypt($det))->join('selec_icds','selec_icds.icd_id','=','eianc_service_anc_icds.sancicd_icd')->get();
                @endphp
                @foreach ($icd as $i)
                    <tr>
                        <td class="text-center">{{ $i->icd_code }}</td>
                        <td>{{ $i->icd_name }}</td>
                        <td class="text-center">
                            <a href="{{ route('service.anc.anc.risk.destroy', Crypt::encrypt($i->sancicd_id)) }}">
                                <button class="btn btn-danger">HAPUS</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <form action="{{ route('service.anc.anc.risk.desposisi') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-header">
            <h4>
                <b>Disposisi Pasien</b>
            </h4>
        </div>
        <div class="card-body">
            @if (count($ds) < 1)
                <input type="hidden" name="norm" value="{{ $id }}">
                <input type="hidden" name="regrisk" value="{{ $data[0]->sancr_no_reg }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="desid">Status Disposisi</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="desid" id="desid" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($desposisi as $des)
                                            <option value="{{ $des->de_id }}" {{ ($des->de_id == old('desid')) ? 'selected' : '' }}>{{ $des->de_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="display: {{ (old('desid') == 2) ? 'block' : 'none' }};" id="rujuk">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="unit">Tujuan Poliklinik/Unit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="rs">Tujuan RS/Puskesmas/PMB</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="rs" id="rs" class="form-control" value="{{ old('rs') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="icd">Diagnosis</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="icd" id="icd" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($sicd as $icd)
                                                <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('icd')) ? 'selected' : '' }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first">Tindakan yang sudah diberikan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="first" id="first" class="form-control" cols="30" rows="3">{{ old('first') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <input type="hidden" name="regrisk" value="{{ $data[0]->sancr_no_reg }}">
                <input type="hidden" name="iddes" value="{{ $ds[0]->des_id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="desid">Status Disposisi</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="desid" id="desid" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($desposisi as $des)
                                            <option value="{{ $des->de_id }}" {{ ($des->de_id == old('desid')) ? 'selected' : (($ds[0]->des_de_id == $des->de_id) ? 'selected' : '') }}>{{ $des->de_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="display: {{ (old('desid') == 2) ? 'block' : (($ds[0]->des_de_id == 2) ? 'block' : 'none') }};" id="rujuk">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="unit">Tujuan Poliklinik/Unit</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="unit" id="unit" class="form-control" value="{{ (old('unit')) ? old('unit') : $ds[0]->des_des_unit }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="rs">Tujuan RS/Puskesmas/PMB</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="rs" id="rs" class="form-control" value="{{ (old('rs')) ? old('rs') : $ds[0]->des_des_ins }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="icd">Diagnosis</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="icd" id="icd" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($sicd as $icd)
                                                <option value="{{ $icd->icd_code }}" {{ ($icd->icd_code == old('icd')) ? 'selected' : (($icd->icd_code == $ds[0]->des_diagnose) ? 'selected' : '') }}>{{ $icd->icd_code . ' - ' . $icd->icd_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first">Tindakan yang sudah diberikan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="first" id="first" class="form-control" cols="30" rows="3">{{ (old('first')) ? old('first') : $ds[0]->des_first_aid }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endif

@if (session()->has('print'))
<script>
    window.open("{{ route('report.rujuk', session()->get('id2')) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif

@endsection
