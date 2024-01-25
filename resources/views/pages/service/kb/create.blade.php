@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    });
</script>

<script>
    function btnrekom0() {
        if ($('#sakitkuning').is(':checked')) {
            var kuning = 1;
        } else {
            var kuning = 0;
        }

        if ($('#pendarahan').is(':checked')) {
            var darah = 1;
        } else {
            var darah = 0;
        }

        if ($('#keputihan').is(':checked')) {
            var putih = 1;
        } else {
            var putih = 0;
        }

        if ($('#tumor0').is(':checked')) {
            var tumor0 = 1;
        } else {
            var tumor0 = 0;
        }

        // ================================

        if ($('#radang').is(':checked')) {
            var radang = 1;
        } else {
            var radang = 0;
        }

        if ($('#tumor1').is(':checked')) {
            var tumor1 = 1;
        } else {
            var tumor1 = 0;
        }

        // ================================
        if ($('#diabetes0').is(':checked')) {
            var diabetes0 = 1;
        } else {
            var diabetes0 = 0;
        }

        if ($('#darahfro').is(':checked')) {
            var darahfro = 1;
        } else {
            var darahfro = 0;
        }

        if ($('#radang1').is(':checked')) {
            var radang1 = 1;
        } else {
            var radang1 = 0;
        }

        if ($('#tumor2').is(':checked')) {
            var tumor2 = 1;
        } else {
            var tumor2 = 0;
        }

        if (kuning == 1 && darah == 1 && putih == 1 && tumor0 == 1) {
            $('#btn1').prop('disabled', false);
            $('#btn2').prop('disabled', false);
            $('#btn3').prop('disabled', false);
            $('#btn4').prop('disabled', false);
            $('#btn5').prop('disabled', false);
            $('#btn7').prop('disabled', false);
            $('#btn8').prop('disabled', false);
            $('#btn9').prop('disabled', false);
            $('#btn10').prop('disabled', false);
            $('#btn11').prop('disabled', false);
            $('#btn12').prop('disabled', false);
            $('#btn15').prop('disabled', false);
        } else {
            $('#btn1').prop('disabled', true);
            $('#btn2').prop('disabled', true);
            $('#btn3').prop('disabled', true);
            $('#btn4').prop('disabled', true);
            $('#btn5').prop('disabled', true);
            $('#btn7').prop('disabled', true);
            $('#btn8').prop('disabled', true);
            $('#btn9').prop('disabled', true);
            $('#btn10').prop('disabled', true);
            $('#btn11').prop('disabled', true);
            $('#btn12').prop('disabled', true);
            $('#btn15').prop('disabled', true);
        }

        if ((radang == 1 && tumor1 == 1) || (diabetes0 == 1 && darahfro == 1 && radang1 == 1 && tumor2 == 1)) {
            $('#btn6').prop('disabled', false);
            $('#btn13').prop('disabled', false);
            $('#btn14').prop('disabled', false);
        } else {
            $('#btn6').prop('disabled', true);
            $('#btn13').prop('disabled', true);
            $('#btn14').prop('disabled', true);
        }
    }
</script>

<script>
    function setdosis1() {
        var data = $("#alat1").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis1").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal1').modal('toggle');
    }
    function setdosis2() {
        var data = $("#alat2").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis2").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal2').modal('toggle');
    }
    function setdosis3() {
        var data = $("#alat3").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis3").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal3').modal('toggle');
    }
    function setdosis4() {
        var data = $("#alat4").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis4").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal4').modal('toggle');
    }
    function setdosis5() {
        var data = $("#alat5").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis5").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal5').modal('toggle');
    }
    function setdosis6() {
        var data = $("#alat6").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis6").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal6').modal('toggle');
    }
    function setdosis7() {
        var data = $("#alat7").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis7").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal7').modal('toggle');
    }
    function setdosis8() {
        var data = $("#alat8").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis8").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal8').modal('toggle');
    }
    function setdosis9() {
        var data = $("#alat9").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis9").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal9').modal('toggle');
    }
    function setdosis10() {
        var data = $("#alat10").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis10").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal10').modal('toggle');
    }
    function setdosis11() {
        var data = $("#alat11").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis11").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal11').modal('toggle');
    }
    function setdosis12() {
        var data = $("#alat12").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis12").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal12').modal('toggle');
    }
    function setdosis13() {
        var data = $("#alat13").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis13").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal13').modal('toggle');
    }
    function setdosis14() {
        var data = $("#alat14").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis14").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal14').modal('toggle');
    }
    function setdosis15() {
        var data = $("#alat15").val();
        var exp = data.split('-');

        var alat = exp[0];
        var stock = exp[1];
        var input = $("#dosis15").val();

        $("#ralat").val(alat);
        $("#rstok").val(stock);
        $("#rdosis").val(input);
        $('#modal15').modal('toggle');
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
    <a href="{{ route('service.kb', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah & Edit Layanan KB</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.kb.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            @if ($show == '0')
                @if (count($data) < 1)
                    <input type="hidden" name="norm" value="{{ $id }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_pay">Metode pembayaran</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_pay" id="sanckb_pay" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($pay as $p)
                                                <option value="{{ $p->pay_code }}" {{ ( old('sanckb_pay') == $p->pay_code) ? 'selected' : '' }}>{{ $p->pay_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckb_pay'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_pay') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_nifas">Apakah KB setelah persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_nifas" id="sanckb_nifas" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_nifas') == '0') ? 'selected' : '' }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckb_nifas') == '1') ? 'selected' : '' }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckb_nifas'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_nifas') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_status">Apakah Sudah Pernah KB?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_status" id="sanckb_status" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_status') == '0') ? 'selected' : '' }}>Baru pertama kali</option>
                                            <option value="1" {{ (old('sanckb_status') == '1') ? 'selected' : '' }}>Sudah pernah</option>
                                        </select>
                                        @if(session()->has('sanckb_status'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="">Jumlah anak hidup</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <label for="sanckb_life_male">Laki-laki</label>
                                                <input type="text" name="sanckb_life_male" id="sanckb_life_male" class="form-control text-center" value="{{ old('sanckb_life_male') }}">
                                                @if ($errors->has('sanckb_life_male'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_life_male') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <label for="sanckb_life_female">Perempuan</label>
                                                <input type="text" name="sanckb_life_female" id="sanckb_life_female" class="form-control text-center" value="{{ old('sanckb_life_female') }}">
                                                @if ($errors->has('sanckb_life_female'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_life_female') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_last_soon">Anak Terakhir lahir pada?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="sanckb_last_soon" id="sanckb_last_soon" class="form-control text-center" value="{{ old('sanckb_last_soon') }}">
                                        @if ($errors->has('sanckb_last_soon'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanckb_last_soon') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_last_use">KB tarakhir menggunakan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_last_use" id="sanckb_last_use" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($skbtool0 as $kt)
                                                <option value="{{ $kt->kbt_id }}">{{ $kt->kbt_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5><b>Anamnesa</b></h5>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_last_mens">Terakhir HAID kapan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="sanckb_last_mens" id="sanckb_last_mens" class="form-control text-center" value="{{ old('sanckb_last_mens') }}">
                                        @if ($errors->has('sanckb_last_mens'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanckb_last_mens') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_just_marr">Diduga hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_just_marr" id="sanckb_just_marr" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_just_marr') == '0') ? 'selected' : '' }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckb_just_marr') == '1') ? 'selected' : '' }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckb_just_marr'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_just_marr') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="">Jumlah GPA</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <label for="sanckb_g">Gravida</label>
                                                <input type="text" name="sanckb_g" id="sanckb_g" class="form-control text-center" value="{{ old('sanckb_g') }}">
                                                @if ($errors->has('sanckb_g'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_g') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <label for="sanckb_p">Partus</label>
                                                <input type="text" name="sanckb_p" id="sanckb_p" class="form-control text-center" value="{{ old('sanckb_p') }}">
                                                @if ($errors->has('sanckb_p'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_p') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <label for="sanckb_a">Abortus</label>
                                                <input type="text" name="sanckb_a" id="sanckb_a" class="form-control text-center" value="{{ old('sanckb_a') }}">
                                                @if ($errors->has('sanckb_a'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_a') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_asi_went">Apakah ibu menyusui?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_asi_went" id="sanckb_asi_went" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_asi_went') == '0') ? 'selected' : '' }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckb_asi_went') == '1') ? 'selected' : '' }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckb_asi_went'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_asi_went') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_asi_went">Riwayat Penyakit Sebelumnya :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-danger">
                                            <i>Klik centang jika pasien TIDAK mengalami</i>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="sakitkuning" name="sanckb_diseases_yellow" {{ (old('sanckb_diseases_yellow') == 'on') ? 'checked' : '' }}>
                                                <label for="sakitkuning">
                                                    Mengalami Sakit Kuning
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="pendarahan" name="sanckb_diseases_bleeding" {{ (old('sanckb_diseases_bleeding') == 'on') ? 'checked' : '' }}>
                                                <label for="pendarahan">
                                                    Mengalami pendarahan vagina yang tidak diketahui sebabnya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="keputihan" name="sanckb_diseases_white" {{ (old('sanckb_diseases_white') == 'on') ? 'checked' : '' }}>
                                                <label for="keputihan">
                                                    Mengalami keputihan yang lama
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="tumor0" name="sanckb_diseases_tumor" {{ (old('sanckb_diseases_tumor') == 'on') ? 'checked' : '' }}>
                                                <label for="tumor0">
                                                    Tumor (Payudara/Rahim/Indung Telur)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5><b>Anamnesa Tambahan M. IUD MOP</b></h5>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_gen_dis">Bagaimana kondisi?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_gen_dis" id="sanckb_gen_dis" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_gen_dis') == '0') ? 'selected' : '' }}>Kurang</option>
                                            <option value="1" {{ (old('sanckb_gen_dis') == '1') ? 'selected' : '' }}>Sedang</option>
                                            <option value="2" {{ (old('sanckb_gen_dis') == '2') ? 'selected' : '' }}>Baik</option>
                                        </select>
                                        @if(session()->has('sanckb_gen_dis'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_gen_dis') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">&nbsp;</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <label for="sanckb_weight">Berat Badan (Kg)</label>
                                                <input type="text" name="sanckb_weight" id="sanckb_weight" class="form-control text-center" value="{{ old('sanckb_weight') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                @if ($errors->has('sanckb_weight'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_weight') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <label for="sanckb_blood_press">Tekanan Darah</label>
                                                <input type="text" name="sanckb_blood_press" id="sanckb_blood_press" class="form-control text-center" value="{{ old('sanckb_blood_press') }}" placeholder="100/90">
                                                @if ($errors->has('sanckb_blood_press'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_blood_press') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_rahim">Posisi Rahim?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_rahim" id="sanckb_rahim" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_rahim') == '0') ? 'selected' : '' }}>Retrofleksi</option>
                                            <option value="1" {{ (old('sanckb_rahim') == '1') ? 'selected' : '' }}>Antreflaksi</option>
                                        </select>
                                        @if(session()->has('sanckb_rahim'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_rahim') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_asi_went">Sebelum dilakukan pemasangan UID atau MOW lakukan pemeriksan terhadap :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-danger">
                                            <i>Klik centang jika pasien TIDAK mengalami</i>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="radang" name="sanckb_uidmow_radang" {{ (old('sanckb_uidmow_radang') == 'on') ? 'checked' : '' }}>
                                                <label for="radang">
                                                    Ada tanda-tanda radang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="tumor1" name="sanckb_uidmow_tumor" {{ (old('sanckb_uidmow_tumor') == 'on') ? 'checked' : '' }}>
                                                <label for="tumor1">
                                                    Ada tumor/keganasan ginekologi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_asi_went">Pemeriksaan tambahan (khusus MOP dan MOW) :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-danger">
                                            <i>Klik centang jika pasien TIDAK mengalami</i>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="diabetes0" name="sanckb_mowmop_diabetes" {{ (old('sanckb_mowmop_diabetes') == 'on') ? 'checked' : '' }}>
                                                <label for="diabetes0">
                                                    Ada tanda-tanda diabetes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="darahfro" name="sanckb_mowmop_blood_froz" {{ (old('sanckb_mowmop_blood_froz') == 'on') ? 'checked' : '' }}>
                                                <label for="darahfro">
                                                    Pembekuan darah
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="radang1" name="sanckb_mowmop_orcepidi" {{ (old('sanckb_mowmop_orcepidi') == 'on') ? 'checked' : '' }}>
                                                <label for="radang1">
                                                    Radang orchitis/epididymitis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="tumor2" name="sanckb_mowmop_tumor" {{ (old('sanckb_mowmop_tumor') == 'on') ? 'checked' : '' }}>
                                                <label for="tumor2">
                                                    Ada tumor/keganasan ginekologi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-danger btn-lg" onclick="return btnrekom0();">REKOMENDASI</button>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h4>
                            <b>REKOMENDASI ALAT KONTRASEPSI</b>
                        </h4>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-7 text-center">
                            @foreach ($skbtool as $b)
                                <button type="button" class="btn btn-warning btn-lg mt-4" id="btn{{ $b->kbt_id }}" data-toggle="modal" data-target="#modal{{ $b->kbt_id }}" disabled>
                                    <b>{{ $b->kbt_name }}</b>
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="rdosis">Dosis Alat Kontraspsi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="hidden" id="ralat" name="ralat" class="form-control" readonly value="{{ old('ralat') }}">
                                        <input type="hidden" id="rstok" name="rstok" class="form-control" readonly value="{{ old('rstok') }}">
                                        <input type="text" id="rdosis" name="rdosis" class="form-control text-center" readonly value="{{ old('rdosis') }}">
                                        @if ($errors->has('rdosis'))
                                            <div class="text-danger">
                                                {{ $errors->first('rdosis') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_new_ordered">Perkiraan dipesan/diperbarui/dipasang kembali</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" id="sanckb_new_ordered" name="sanckb_new_ordered" class="form-control text-center" value="{{ old('sanckb_new_ordered') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="norm" value="{{ $id }}">
                    <input type="hidden" name="id" value="{{ $data[0]->sanckb_id }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_pay">Metode pembayaran</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_pay" id="sanckb_pay" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($pay as $p)
                                                <option value="{{ $p->pay_code }}" {{ ( old('sanckb_pay') == $p->pay_code) ? 'selected' : (($data[0]->sanckb_pay == $p->pay_code) ? 'selected' : '') }}>{{ $p->pay_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanckb_pay'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_pay') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_nifas">Apakah KB setelah persalinan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_nifas" id="sanckb_nifas" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_nifas') == '0') ? 'selected' : (($data[0]->sanckb_nifas == '0') ? 'selected' : '') }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckb_nifas') == '1') ? 'selected' : (($data[0]->sanckb_nifas == '1') ? 'selected' : '') }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckb_nifas'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_nifas') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_status">Apakah Sudah Pernah KB?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_status" id="sanckb_status" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_status') == '0') ? 'selected' : (($data[0]->sanckb_status == '0') ? 'selected' : '') }}>Baru pertama kali</option>
                                            <option value="1" {{ (old('sanckb_status') == '1') ? 'selected' : (($data[0]->sanckb_status == '0') ? 'selected' : '') }}>Sudah pernah</option>
                                        </select>
                                        @if(session()->has('sanckb_status'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="">Jumlah anak hidup</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <label for="sanckb_life_male">Laki-laki</label>
                                                <input type="text" name="sanckb_life_male" id="sanckb_life_male" class="form-control text-center" value="{{ (old('sanckb_life_male')) ? old('sanckb_life_male') : $data[0]->sanckb_life_male }}">
                                                @if ($errors->has('sanckb_life_male'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_life_male') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <label for="sanckb_life_female">Perempuan</label>
                                                <input type="text" name="sanckb_life_female" id="sanckb_life_female" class="form-control text-center" value="{{ (old('sanckb_life_female')) ? old('sanckb_life_female') : $data[0]->sanckb_life_female }}">
                                                @if ($errors->has('sanckb_life_female'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_life_female') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_last_soon">Anak Terakhir lahir pada?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="sanckb_last_soon" id="sanckb_last_soon" class="form-control text-center" value="{{ (old('sanckb_last_soon')) ? old('sanckb_last_soon') : $data[0]->sanckb_last_soon }}">
                                        @if ($errors->has('sanckb_last_soon'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanckb_last_soon') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_last_use">KB tarakhir menggunakan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_last_use" id="sanckb_last_use" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($skbtool0 as $kt)
                                                <option value="{{ $kt->kbt_id }}" {{ ($kt->kbt_id == $data[0]->sanckb_use) ? 'selected' : '' }}>{{ $kt->kbt_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5><b>Anamnesa</b></h5>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_last_mens">Terakhir HAID kapan?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="sanckb_last_mens" id="sanckb_last_mens" class="form-control text-center" value="{{ (old('sanckb_last_mens')) ? old('sanckb_last_mens') : $data[0]->sanckb_last_mens }}">
                                        @if ($errors->has('sanckb_last_mens'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanckb_last_mens') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_just_marr">Diduga hamil?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_just_marr" id="sanckb_just_marr" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_just_marr') == '0') ? 'selected' : (($data[0]->sanckb_just_marr == '0') ? 'selected' : '') }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckb_just_marr') == '1') ? 'selected' : (($data[0]->sanckb_just_marr == '1') ? 'selected' : '') }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckb_just_marr'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_just_marr') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="">Jumlah GPA</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <label for="sanckb_g">Gravida</label>
                                                <input type="text" name="sanckb_g" id="sanckb_g" class="form-control text-center" value="{{ (old('sanckb_g')) ? old('sanckb_g') : $data[0]->sanckb_g }}">
                                                @if ($errors->has('sanckb_g'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_g') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <label for="sanckb_p">Partus</label>
                                                <input type="text" name="sanckb_p" id="sanckb_p" class="form-control text-center" value="{{ (old('sanckb_p')) ? old('sanckb_p') : $data[0]->sanckb_p }}">
                                                @if ($errors->has('sanckb_p'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_p') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <label for="sanckb_a">Abortus</label>
                                                <input type="text" name="sanckb_a" id="sanckb_a" class="form-control text-center" value="{{ (old('sanckb_a')) ? old('sanckb_a') : $data[0]->sanckb_a }}">
                                                @if ($errors->has('sanckb_a'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_a') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_asi_went">Apakah ibu menyusui?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_asi_went" id="sanckb_asi_went" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_asi_went') == '0') ? 'selected' : (($data[0]->sanckb_asi_went == '0') ? 'selected' : '') }}>TIDAK</option>
                                            <option value="1" {{ (old('sanckb_asi_went') == '1') ? 'selected' : (($data[0]->sanckb_asi_went == '1') ? 'selected' : '') }}>YA</option>
                                        </select>
                                        @if(session()->has('sanckb_asi_went'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_asi_went') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_asi_went">Riwayat Penyakit Sebelumnya :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-danger">
                                            <i>Klik centang jika pasien TIDAK mengalami</i>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="sakitkuning" name="sanckb_diseases_yellow" {{ (old('sanckb_diseases_yellow') == 'on') ? 'checked' : (($data[0]->sanckb_diseases_yellow == '1') ? 'checked' : '') }}>
                                                <label for="sakitkuning">
                                                    Mengalami Sakit Kuning
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="pendarahan" name="sanckb_diseases_bleeding" {{ (old('sanckb_diseases_bleeding') == 'on') ? 'checked' : (($data[0]->sanckb_diseases_bleeding == '1') ? 'checked' : '') }}>
                                                <label for="pendarahan">
                                                    Mengalami pendarahan vagina yang tidak diketahui sebabnya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="keputihan" name="sanckb_diseases_white" {{ (old('sanckb_diseases_white') == 'on') ? 'checked' : (($data[0]->sanckb_diseases_white == '1') ? 'checked' : '') }}>
                                                <label for="keputihan">
                                                    Mengalami keputihan yang lama
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="tumor0" name="sanckb_diseases_tumor" {{ (old('sanckb_diseases_tumor') == 'on') ? 'checked' : (($data[0]->sanckb_diseases_tumor == '1') ? 'checked' : '') }}>
                                                <label for="tumor0">
                                                    Tumor (Payudara/Rahim/Indung Telur)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5><b>Anamnesa Tambahan M. IUD MOP</b></h5>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_gen_dis">Bagaimana kondisi?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_gen_dis" id="sanckb_gen_dis" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_gen_dis') == '0') ? 'selected' : (($data[0]->sanckb_gen_dis == '0') ? 'selected' : '') }}>Kurang</option>
                                            <option value="1" {{ (old('sanckb_gen_dis') == '1') ? 'selected' : (($data[0]->sanckb_gen_dis == '1') ? 'selected' : '') }}>Sedang</option>
                                            <option value="2" {{ (old('sanckb_gen_dis') == '2') ? 'selected' : (($data[0]->sanckb_gen_dis == '2') ? 'selected' : '') }}>Baik</option>
                                        </select>
                                        @if(session()->has('sanckb_gen_dis'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_gen_dis') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">&nbsp;</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <label for="sanckb_weight">Berat Badan (Kg)</label>
                                                <input type="text" name="sanckb_weight" id="sanckb_weight" class="form-control text-center" value="{{ (old('sanckb_weight')) ? old('sanckb_weight') : $data[0]->sanckb_weight }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                @if ($errors->has('sanckb_weight'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_weight') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <label for="sanckb_blood_press">Tekanan Darah</label>
                                                <input type="text" name="sanckb_blood_press" id="sanckb_blood_press" class="form-control text-center" value="{{ (old('sanckb_blood_press')) ? old('sanckb_blood_press') : $data[0]->sanckb_blood_press }}" placeholder="100/90">
                                                @if ($errors->has('sanckb_blood_press'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('sanckb_blood_press') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_rahim">Posisi Rahim?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanckb_rahim" id="sanckb_rahim" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanckb_rahim') == '0') ? 'selected' : (($data[0]->sanckb_rahim == '0') ? 'selected' : '') }}>Retrofleksi</option>
                                            <option value="1" {{ (old('sanckb_rahim') == '1') ? 'selected' : (($data[0]->sanckb_rahim == '1') ? 'selected' : '') }}>Antreflaksi</option>
                                        </select>
                                        @if(session()->has('sanckb_rahim'))
                                            <div class="text-danger">
                                                {{ session()->get('sanckb_rahim') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_asi_went">Sebelum dilakukan pemasangan UID atau MOW lakukan pemeriksan terhadap :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-danger">
                                            <i>Klik centang jika pasien TIDAK mengalami</i>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="radang" name="sanckb_uidmow_radang" {{ (old('sanckb_uidmow_radang') == 'on') ? 'checked' : (($data[0]->sanckb_uidmow_radang == '1') ? 'selected' : '') }}>
                                                <label for="radang">
                                                    Ada tanda-tanda radang
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="tumor1" name="sanckb_uidmow_tumor" {{ (old('sanckb_uidmow_tumor') == 'on') ? 'checked' : (($data[0]->sanckb_uidmow_tumor == '1') ? 'selected' : '') }}>
                                                <label for="tumor1">
                                                    Ada tumor/keganasan ginekologi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_asi_went">Pemeriksaan tambahan (khusus MOP dan MOW) :</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-danger">
                                            <i>Klik centang jika pasien TIDAK mengalami</i>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="diabetes0" name="sanckb_mowmop_diabetes" {{ (old('sanckb_mowmop_diabetes') == 'on') ? 'checked' : (($data[0]->sanckb_mowmop_diabetes == '1') ? 'selected' : '') }}>
                                                <label for="diabetes0">
                                                    Ada tanda-tanda diabetes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="darahfro" name="sanckb_mowmop_blood_froz" {{ (old('sanckb_mowmop_blood_froz') == 'on') ? 'checked' : (($data[0]->sanckb_mowmop_blood_froz == '1') ? 'selected' : '') }}>
                                                <label for="darahfro">
                                                    Pembekuan darah
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="radang1" name="sanckb_mowmop_orcepidi" {{ (old('sanckb_mowmop_orcepidi') == 'on') ? 'checked' : (($data[0]->sanckb_mowmop_orcepidi == '1') ? 'selected' : '') }}>
                                                <label for="radang1">
                                                    Radang orchitis/epididymitis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="tumor2" name="sanckb_mowmop_tumor" {{ (old('sanckb_mowmop_tumor') == 'on') ? 'checked' : (($data[0]->sanckb_mowmop_tumor == '1') ? 'selected' : '') }}>
                                                <label for="tumor2">
                                                    Ada tumor/keganasan ginekologi
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-danger btn-lg" onclick="return btnrekom0();">REKOMENDASI</button>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h4>
                            <b>REKOMENDASI ALAT KONTRASEPSI</b>
                        </h4>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-7 text-center">
                            @foreach ($skbtool as $b)
                                <button type="button" class="btn btn-warning btn-lg mt-4" id="btn{{ $b->kbt_id }}" data-toggle="modal" data-target="#modal{{ $b->kbt_id }}" disabled>
                                    <b>{{ $b->kbt_name }}</b>
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="rdosis">Dosis Alat Kontraspsi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="hidden" id="ralat" name="ralat" class="form-control" readonly value="{{ (old('ralat')) ? old('ralat') : $data[0]->sanckb_use }}">
                                        <input type="hidden" id="rstok" name="rstok" class="form-control" readonly value="{{ old('rstok') }}">
                                        <input type="text" id="rdosis" name="rdosis" class="form-control text-center" readonly value="{{ (old('rdosis')) ? old('rdosis') : $data[0]->sanckb_dosis }}">
                                        @if ($errors->has('rdosis'))
                                            <div class="text-danger">
                                                {{ $errors->first('rdosis') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanckb_new_ordered">Perkiraan dipesan/diperbarui/dipasang kembali</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" id="sanckb_new_ordered" name="sanckb_new_ordered" class="form-control text-center" value="{{ (old('sanckb_new_ordered')) ? old('sanckb_new_ordered') : $data[0]->sanckb_new_ordered }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <input type="hidden" name="norm" value="{{ $id }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_pay">Metode pembayaran</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanckb_pay" id="sanckb_pay" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($pay as $p)
                                            <option value="{{ $p->pay_code }}" {{ ( old('sanckb_pay') == $p->pay_code) ? 'selected' : (($xdata[0]->sanckb_pay == $p->pay_code) ? 'selected' : '') }}>{{ $p->pay_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sanckb_pay'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckb_pay') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_nifas">Apakah KB setelah persalinan?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanckb_nifas" id="sanckb_nifas" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanckb_nifas') == '0') ? 'selected' : (($xdata[0]->sanckb_nifas == '0') ? 'selected' : '') }}>TIDAK</option>
                                        <option value="1" {{ (old('sanckb_nifas') == '1') ? 'selected' : (($xdata[0]->sanckb_nifas == '1') ? 'selected' : '') }}>YA</option>
                                    </select>
                                    @if(session()->has('sanckb_nifas'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckb_nifas') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_status">Apakah Sudah Pernah KB?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanckb_status" id="sanckb_status" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanckb_status') == '0') ? 'selected' : (($xdata[0]->sanckb_status == '0') ? 'selected' : '') }}>Baru pertama kali</option>
                                        <option value="1" {{ (old('sanckb_status') == '1') ? 'selected' : (($xdata[0]->sanckb_status == '0') ? 'selected' : '') }}>Sudah pernah</option>
                                    </select>
                                    @if(session()->has('sanckb_status'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckb_status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Jumlah anak hidup</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <label for="sanckb_life_male">Laki-laki</label>
                                            <input type="text" name="sanckb_life_male" id="sanckb_life_male" class="form-control text-center" value="{{ (old('sanckb_life_male')) ? old('sanckb_life_male') : $xdata[0]->sanckb_life_male }}">
                                            @if ($errors->has('sanckb_life_male'))
                                                <div class="text-danger">
                                                    {{ $errors->first('sanckb_life_male') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <label for="sanckb_life_female">Perempuan</label>
                                            <input type="text" name="sanckb_life_female" id="sanckb_life_female" class="form-control text-center" value="{{ (old('sanckb_life_female')) ? old('sanckb_life_female') : $xdata[0]->sanckb_life_female }}">
                                            @if ($errors->has('sanckb_life_female'))
                                                <div class="text-danger">
                                                    {{ $errors->first('sanckb_life_female') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_last_soon">Anak Terakhir lahir pada?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="sanckb_last_soon" id="sanckb_last_soon" class="form-control text-center" value="{{ (old('sanckb_last_soon')) ? old('sanckb_last_soon') : $xdata[0]->sanckb_last_soon }}">
                                    @if ($errors->has('sanckb_last_soon'))
                                    <div class="text-danger">
                                        {{ $errors->first('sanckb_last_soon') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_last_use">KB tarakhir menggunakan?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanckb_last_use" id="sanckb_last_use" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($skbtool0 as $kt)
                                            <option value="{{ $kt->kbt_id }}" {{ ($kt->kbt_id == $xdata[0]->sanckb_use) ? 'selected' : '' }}>{{ $kt->kbt_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5><b>Anamnesa</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_last_mens">Terakhir HAID kapan?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="sanckb_last_mens" id="sanckb_last_mens" class="form-control text-center" value="{{ old('sanckb_last_mens') }}">
                                    @if ($errors->has('sanckb_last_mens'))
                                    <div class="text-danger">
                                        {{ $errors->first('sanckb_last_mens') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_just_marr">Diduga hamil?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanckb_just_marr" id="sanckb_just_marr" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanckb_just_marr') == '0') ? 'selected' : '' }}>TIDAK</option>
                                        <option value="1" {{ (old('sanckb_just_marr') == '1') ? 'selected' : '' }}>YA</option>
                                    </select>
                                    @if(session()->has('sanckb_just_marr'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckb_just_marr') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Jumlah GPA</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <label for="sanckb_g">Gravida</label>
                                            <input type="text" name="sanckb_g" id="sanckb_g" class="form-control text-center" value="{{ (old('sanckb_g')) ? old('sanckb_g') : $xdata[0]->sanckb_g }}">
                                            @if ($errors->has('sanckb_g'))
                                                <div class="text-danger">
                                                    {{ $errors->first('sanckb_g') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <label for="sanckb_p">Partus</label>
                                            <input type="text" name="sanckb_p" id="sanckb_p" class="form-control text-center" value="{{ old('sanckb_p') ? old('sanckb_p') : $xdata[0]->sanckb_p }}">
                                            @if ($errors->has('sanckb_p'))
                                                <div class="text-danger">
                                                    {{ $errors->first('sanckb_p') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <label for="sanckb_a">Abortus</label>
                                            <input type="text" name="sanckb_a" id="sanckb_a" class="form-control text-center" value="{{ old('sanckb_a') ? old('sanckb_a') : $xdata[0]->sanckb_a }}">
                                            @if ($errors->has('sanckb_a'))
                                                <div class="text-danger">
                                                    {{ $errors->first('sanckb_a') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_asi_went">Apakah ibu menyusui?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanckb_asi_went" id="sanckb_asi_went" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanckb_asi_went') == '0') ? 'selected' : '' }}>TIDAK</option>
                                        <option value="1" {{ (old('sanckb_asi_went') == '1') ? 'selected' : '' }}>YA</option>
                                    </select>
                                    @if(session()->has('sanckb_asi_went'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckb_asi_went') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_asi_went">Riwayat Penyakit Sebelumnya :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-danger">
                                        <i>Klik centang jika pasien TIDAK mengalami</i>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="sakitkuning" name="sanckb_diseases_yellow" {{ (old('sanckb_diseases_yellow') == 'on') ? 'checked' : (($xdata[0]->sanckb_diseases_yellow == '1') ? 'checked' : '') }}>
                                            <label for="sakitkuning">
                                                Mengalami Sakit Kuning
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="pendarahan" name="sanckb_diseases_bleeding" {{ (old('sanckb_diseases_bleeding') == 'on') ? 'checked' : (($xdata[0]->sanckb_diseases_bleeding == '1') ? 'checked' : '') }}>
                                            <label for="pendarahan">
                                                Mengalami pendarahan vagina yang tidak diketahui sebabnya
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="keputihan" name="sanckb_diseases_white" {{ (old('sanckb_diseases_white') == 'on') ? 'checked' : (($xdata[0]->sanckb_diseases_white == '1') ? 'checked' : '') }}>
                                            <label for="keputihan">
                                                Mengalami keputihan yang lama
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="tumor0" name="sanckb_diseases_tumor" {{ (old('sanckb_diseases_tumor') == 'on') ? 'checked' : (($xdata[0]->sanckb_diseases_tumor == '1') ? 'checked' : '') }}>
                                            <label for="tumor0">
                                                Tumor (Payudara/Rahim/Indung Telur)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5><b>Anamnesa Tambahan M. IUD MOP</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_gen_dis">Bagaimana kondisi?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanckb_gen_dis" id="sanckb_gen_dis" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanckb_gen_dis') == '0') ? 'selected' : '' }}>Kurang</option>
                                        <option value="1" {{ (old('sanckb_gen_dis') == '1') ? 'selected' : '' }}>Sedang</option>
                                        <option value="2" {{ (old('sanckb_gen_dis') == '2') ? 'selected' : '' }}>Baik</option>
                                    </select>
                                    @if(session()->has('sanckb_gen_dis'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckb_gen_dis') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">&nbsp;</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <label for="sanckb_weight">Berat Badan</label>
                                            <input type="text" name="sanckb_weight" id="sanckb_weight" class="form-control text-center" value="{{ old('sanckb_weight') }}">
                                            @if ($errors->has('sanckb_weight'))
                                                <div class="text-danger">
                                                    {{ $errors->first('sanckb_weight') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <label for="sanckb_blood_press">Tekanan Darah</label>
                                            <input type="text" name="sanckb_blood_press" id="sanckb_blood_press" class="form-control text-center" value="{{ old('sanckb_blood_press') }}" placeholder="100/90">
                                            @if ($errors->has('sanckb_blood_press'))
                                                <div class="text-danger">
                                                    {{ $errors->first('sanckb_blood_press') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_rahim">Posisi Rahim?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanckb_rahim" id="sanckb_rahim" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanckb_rahim') == '0') ? 'selected' : (($xdata[0]->sanckb_rahim == '0') ? 'selected' : '') }}>Retrofleksi</option>
                                        <option value="1" {{ (old('sanckb_rahim') == '1') ? 'selected' : (($xdata[0]->sanckb_rahim == '1') ? 'selected' : '') }}>Antreflaksi</option>
                                    </select>
                                    @if(session()->has('sanckb_rahim'))
                                        <div class="text-danger">
                                            {{ session()->get('sanckb_rahim') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_asi_went">Sebelum dilakukan pemasangan UID atau MOW lakukan pemeriksan terhadap :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-danger">
                                        <i>Klik centang jika pasien TIDAK mengalami</i>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="radang" name="sanckb_uidmow_radang" {{ (old('sanckb_uidmow_radang') == 'on') ? 'checked' : (($xdata[0]->sanckb_uidmow_radang == '1') ? 'selected' : '') }}>
                                            <label for="radang">
                                                Ada tanda-tanda radang
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="tumor1" name="sanckb_uidmow_tumor" {{ (old('sanckb_uidmow_tumor') == 'on') ? 'checked' : (($xdata[0]->sanckb_uidmow_tumor == '1') ? 'selected' : '') }}>
                                            <label for="tumor1">
                                                Ada tumor/keganasan ginekologi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_asi_went">Pemeriksaan tambahan (khusus MOP dan MOW) :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-danger">
                                        <i>Klik centang jika pasien TIDAK mengalami</i>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="diabetes0" name="sanckb_mowmop_diabetes" {{ (old('sanckb_mowmop_diabetes') == 'on') ? 'checked' : (($xdata[0]->sanckb_mowmop_diabetes == '1') ? 'selected' : '') }}>
                                            <label for="diabetes0">
                                                Ada tanda-tanda diabetes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="darahfro" name="sanckb_mowmop_blood_froz" {{ (old('sanckb_mowmop_blood_froz') == 'on') ? 'checked' : (($xdata[0]->sanckb_mowmop_blood_froz == '1') ? 'selected' : '') }}>
                                            <label for="darahfro">
                                                Pembekuan darah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="radang1" name="sanckb_mowmop_orcepidi" {{ (old('sanckb_mowmop_orcepidi') == 'on') ? 'checked' : (($xdata[0]->sanckb_mowmop_orcepidi == '1') ? 'selected' : '') }}>
                                            <label for="radang1">
                                                Radang orchitis/epididymitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" id="tumor2" name="sanckb_mowmop_tumor" {{ (old('sanckb_mowmop_tumor') == 'on') ? 'checked' : (($xdata[0]->sanckb_mowmop_tumor == '1') ? 'selected' : '') }}>
                                            <label for="tumor2">
                                                Ada tumor/keganasan ginekologi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-danger btn-lg" onclick="return btnrekom0();">REKOMENDASI</button>
                </div>
                <hr>
                <div class="text-center">
                    <h4>
                        <b>REKOMENDASI ALAT KONTRASEPSI</b>
                    </h4>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-7 text-center">
                        @foreach ($skbtool as $b)
                            <button type="button" class="btn btn-warning btn-lg mt-4" id="btn{{ $b->kbt_id }}" data-toggle="modal" data-target="#modal{{ $b->kbt_id }}">
                                <b>{{ $b->kbt_name }}</b>
                            </button>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="rdosis">Dosis Alat Kontraspsi</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="hidden" id="ralat" name="ralat" class="form-control" readonly value="{{ old('ralat') }}">
                                    <input type="hidden" id="rstok" name="rstok" class="form-control" readonly value="{{ old('rstok') }}">
                                    <input type="text" id="rdosis" name="rdosis" class="form-control text-center" readonly value="{{ old('rdosis') }}">
                                    @if ($errors->has('rdosis'))
                                        <div class="text-danger">
                                            {{ $errors->first('rdosis') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanckb_new_ordered">Perkiraan dipesan/diperbarui/dipasang kembali</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" id="sanckb_new_ordered" name="sanckb_new_ordered" class="form-control text-center" value="{{ old('sanckb_new_ordered') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <hr>
            <h4>Disposisi</h4>
            @if (count($data) > 0)
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
                                            @foreach ($icd as $icd)
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
            @else
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
                                            @foreach ($icd as $icd)
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
            @endif
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
</div>

@foreach ($skbtool as $b)
<div class="modal fade" id="modal{{$b->kbt_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="alat">Pilih Alat Kontraspsi</label>
                    <select name="alat" id="alat{{$b->kbt_id}}" class="form-control select2">
                        <option value="">-- PILIH --</option>
                        @php
                            $tool = DB::table('eianc_kbs')->where('kb_ins_id', DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->where('kb_kbt_id', $b->kbt_id)->get();
                        @endphp
                        @foreach ($tool as $kb)
                            <option value="{{ $kb->kb_id }}-{{ $kb->kb_remainder }}">{{ $kb->kb_brand . ' (' . $kb->kb_batch . ') Stok : ' . $kb->kb_remainder}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputdosis">Dosis</label>
                    <input type="text" name="dosis" id="dosis{{$b->kbt_id}}" class="form-control text-center" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>
            </div>
            @php
                $btn = "return setdosis" . $b->kbt_id . "();"
            @endphp
            <div class="modal-footer text-right">
                <button class="btn btn-primary" onclick="{{ $btn }}">Tetapkan</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
