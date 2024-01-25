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
    function anemiae() {
        var data = $('#sancl_level_hb').val();

        if (data < 11) {
            $('#anemia').val('Ada Resiko Anemia');
        } else {
            $('#anemia').val('Tidak Ada Resiko Anemia');
        }
    }

</script>

<script>
    function validat() {
        var thumb = document.forms["formreg"]["thumb"];

        if (thumb.value == '') {
            alert("Gambar belum ada.");
            thumb.focus();
            return false;
        }

        return true;
    }
</script>

<script>
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("thumb").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };

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
    <h1>ANC - LABORATORIUM</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.anc.lab.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            @if ($show == '0')
                    @if (count($data) < 1)
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="anc" value="{{ $anc }}">
                        <input type="hidden" name="det" value="{{ $det }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @php
                                    $patient = DB::table('eianc_patients')->where('pat_norm',
                                    Crypt::decrypt($id))->value('pat_blood');
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_blood">Apa Golongan Darah?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_blood" id="sancl_blood" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                @foreach ($sblood as $sb)
                                                <option value="{{ $sb->blo_id }}"
                                                    {{ (old('sancl_blood') == $sb->blo_id) ? 'selected' : (($patient == $sb->blo_id) ? 'selected' : '') }}>
                                                    {{ $sb->blo_name }}</option>
                                                @endforeach
                                            </select>
                                            @if(session()->has('sancl_blood'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_blood') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_urine">Apa Kandungan Protein Urin?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_urine" id="sancl_urine" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0" {{ (old('sancl_urine') == '0') ? 'selected' : '' }}>Tidak Diperiksa</option>
                                                <option value="1" {{ (old('sancl_urine') == '1') ? 'selected' : '' }}>-</option>
                                                <option value="2" {{ (old('sancl_urine') == '2') ? 'selected' : '' }}>+</option>
                                                <option value="3" {{ (old('sancl_urine') == '3') ? 'selected' : '' }}>++
                                                </option>
                                                <option value="4" {{ (old('sancl_urine') == '4') ? 'selected' : '' }}>+++
                                                </option>
                                            </select>
                                            @if(session()->has('sancl_urine'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_urine') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_hiv">Bagaimana Serologi HIV/VCT?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_hiv" id="sancl_hiv" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0" {{ (old('sancl_hiv') == '0') ? 'selected' : '' }}>NON REAKTIF
                                                </option>
                                                <option value="1" {{ (old('sancl_hiv') == '1') ? 'selected' : '' }}>REAKTIF
                                                </option>
                                                <option value="2" {{ (old('sancl_hiv') == '2') ? 'selected' : '' }}>TTDAK DIPERIKSA
                                                </option>
                                            </select>
                                            @if(session()->has('sancl_hiv'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_hiv') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_sifilis">Bagaimana IMS/Sifilis?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_sifilis" id="sancl_sifilis" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0" {{ (old('sancl_sifilis') == '0') ? 'selected' : '' }}>Tidak Diperiksa</option>
                                                <option value="1" {{ (old('sancl_sifilis') == '1') ? 'selected' : '' }}>- (Negatif)</option>
                                                <option value="2" {{ (old('sancl_sifilis') == '2') ? 'selected' : '' }}>+ (Positif)</option>
                                            </select>
                                            @if(session()->has('sancl_sifilis'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_sifilis') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_hbsag">Bagaimana HBsAg?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_hbsag" id="sancl_hbsag" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="1" {{ (old('sancl_hbsag') == '1') ? 'selected' : '' }}>- (Negatif)</option>
                                                <option value="2" {{ (old('sancl_hbsag') == '2') ? 'selected' : '' }}>+ (Positif)</option>
                                            </select>
                                            @if(session()->has('sancl_hbsag'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_hbsag') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_hb">Apa Hemoglobin(HB) diperiksa?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_hb" id="sancl_hb" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0" {{ (old('sancl_hb') == '0') ? 'selected' :'' }}>Tidak Diperiksa</option>
                                                <option value="1" {{ (old('sancl_hb') == '1') ? 'selected' : '' }}>Diperiksa</option>
                                            </select>
                                            @if(session()->has('sancl_hb'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_hb') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_level_hb">Berapa HB (gr/dl)?</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="sancl_level_hb" id="sancl_level_hb"
                                                class="form-control text-center" value="{{ old('sancl_level_hb') }}"
                                                onkeyup="return anemiae();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            @if ($errors->has('sancl_level_hb'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancl_level_hb') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="anemia" id="anemia" class="form-control text-center"
                                                value="{{ old('anemia') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_blood_sugar">Berapa Gula Darah?</label>
                                            <i class="text-danger">Jika tidak diperiksa kosongkan saja</i>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="sancl_blood_sugar" id="sancl_blood_sugar"
                                                class="form-control" value="{{ old('sancl_blood_sugar') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            @if ($errors->has('sancl_blood_sugar'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancl_blood_sugar') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_malaria">Apa terdapat Darah Malaria?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_malaria" id="sancl_malaria" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="1" {{ (old('sancl_malaria') == '1') ? 'selected' : '' }}>- (Negatif)
                                                </option>
                                                <option value="2" {{ (old('sancl_malaria') == '2') ? 'selected' : '' }}>+ (Positif)
                                                </option>
                                            </select>
                                            @if(session()->has('sancl_malaria'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_malaria') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_bta">Apa terdapat BTA?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_bta" id="sancl_bta" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0" {{ (old('sancl_bta') == '0') ? 'selected' : '' }}>Tidak Diperiksa</option>
                                                <option value="1" {{ (old('sancl_bta') == '1') ? 'selected' : '' }}>Non Reaktif</option>
                                                <option value="2" {{ (old('sancl_bta') == '2') ? 'selected' : '' }}>Reaktif</option>
                                            </select>
                                            @if(session()->has('sancl_bta'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_bta') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="hidden" name="anc" value="{{ $anc }}">
                        <input type="hidden" name="det" value="{{ $det }}">
                        <input type="hidden" name="idx" value="{{ $data[0]->sancl_id }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @php
                                    $patient = DB::table('eianc_patients')->where('pat_norm',
                                    Crypt::decrypt($id))->value('pat_blood');
                                    @endphp
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_blood">Apa Golongan Darah?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_blood" id="sancl_blood" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                @foreach ($sblood as $sb)
                                                <option value="{{ $sb->blo_id }}"
                                                    {{ (old('sancl_blood') == $sb->blo_id) ? 'selected' : (($patient == $sb->blo_id) ? 'selected' : (($data[0]->sancl_blood == $sb->blo_id) ? 'selected' : '')) }}>
                                                    {{ $sb->blo_name }}</option>
                                                @endforeach
                                            </select>
                                            @if(session()->has('sancl_blood'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_blood') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_urine">Apa Kandungan Protein Urin?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_urine" id="sancl_urine" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0"
                                                    {{ (old('sancl_urine') == '0') ? 'selected' : (($data[0]->sancl_urine == '0') ? 'selected' : '') }}>
                                                    Tidak Diperiksa</option>
                                                <option value="1"
                                                    {{ (old('sancl_urine') == '1') ? 'selected' : (($data[0]->sancl_urine == '1') ? 'selected' : '') }}>
                                                    -</option>
                                                <option value="2"
                                                    {{ (old('sancl_urine') == '2') ? 'selected' : (($data[0]->sancl_urine == '2') ? 'selected' : '') }}>
                                                    +</option>
                                                <option value="3"
                                                    {{ (old('sancl_urine') == '3') ? 'selected' : (($data[0]->sancl_urine == '3') ? 'selected' : '') }}>
                                                    ++</option>
                                                <option value="4"
                                                    {{ (old('sancl_urine') == '4') ? 'selected' : (($data[0]->sancl_urine == '4') ? 'selected' : '') }}>
                                                    +++</option>
                                            </select>
                                            @if(session()->has('sancl_urine'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_urine') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_hiv">Bagaimana Serologi HIV/VCT?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_hiv" id="sancl_hiv" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0"
                                                    {{ (old('sancl_hiv') == '0') ? 'selected' : (($data[0]->sancl_hiv == '0') ? 'selected' : '') }}>
                                                    NON REAKTIF</option>
                                                <option value="1"
                                                    {{ (old('sancl_hiv') == '1') ? 'selected' : (($data[0]->sancl_hiv == '1') ? 'selected' : '') }}>
                                                    REAKTIF</option>
                                                <option value="2"
                                                    {{ (old('sancl_hiv') == '2') ? 'selected' : (($data[0]->sancl_hiv == '2') ? 'selected' : '') }}>
                                                    TIDAK DIPERIKSA</option>
                                            </select>
                                            @if(session()->has('sancl_hiv'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_hiv') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_sifilis">Bagaimana IMS/Sifilis?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_sifilis" id="sancl_sifilis" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0"
                                                    {{ (old('sancl_sifilis') == '0') ? 'selected' : (($data[0]->sancl_sifilis == '0') ? 'selected' : '') }}>
                                                    Tidak Diperiksa</option>
                                                <option value="1"
                                                    {{ (old('sancl_sifilis') == '1') ? 'selected' : (($data[0]->sancl_sifilis == '1') ? 'selected' : '') }}>
                                                    - (Negatif)</option>
                                                <option value="2"
                                                    {{ (old('sancl_sifilis') == '2') ? 'selected' : (($data[0]->sancl_sifilis == '2') ? 'selected' : '') }}>
                                                    + (Positif)</option>
                                            </select>
                                            @if(session()->has('sancl_sifilis'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_sifilis') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_hbsag">Bagaimana HBsAg?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_hbsag" id="sancl_hbsag" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="1"
                                                    {{ (old('sancl_hbsag') == '1') ? 'selected' : (($data[0]->sancl_hbsag == '1') ? 'selected' : '') }}>
                                                    - (Negatif)</option>
                                                <option value="2"
                                                    {{ (old('sancl_hbsag') == '2') ? 'selected' : (($data[0]->sancl_hbsag == '2') ? 'selected' : '') }}>
                                                    + (Positif)</option>
                                            </select>
                                            @if(session()->has('sancl_hbsag'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_hbsag') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_hb">Apa Hemoglobin(HB) diperiksa?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_hb" id="sancl_hb" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0"
                                                    {{ (old('sancl_hb') == '0') ? 'selected' : (($data[0]->sancl_hb == '0') ? 'selected' : '') }}>
                                                    Tidak Diperiksa</option>
                                                <option value="1"
                                                    {{ (old('sancl_hb') == '1') ? 'selected' : (($data[0]->sancl_hb == '1') ? 'selected' : '') }}>
                                                    Diperiksa</option>
                                            </select>
                                            @if(session()->has('sancl_hb'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_hb') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_level_hb">Berapa HB (gr/dl)?</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="sancl_level_hb" id="sancl_level_hb"
                                                class="form-control text-center"
                                                value="{{ (old('sancl_level_hb')) ? old('sancl_level_hb') : $data[0]->sancl_level_hb }}"
                                                onkeyup="return anemiae();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            @if ($errors->has('sancl_level_hb'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancl_level_hb') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            @php
                                            $anemia = ($data[0]->sancl_level_hb < 11) ? 'Ada Resiko Anemia'
                                                : 'Tidak Ada Resiko Anemia' ; @endphp <input type="text" name="anemia"
                                                id="anemia" class="form-control text-center"
                                                value="{{ (old('anemia')) ? old('anemia') : $anemia }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_blood_sugar">Berapa Gula Darah?</label>
                                            <i class="text-danger">Jika tidak diperiksa kosongkan saja</i>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="sancl_blood_sugar" id="sancl_blood_sugar"
                                                class="form-control"
                                                value="{{ (old('sancl_blood_sugar')) ? old('sancl_blood_sugar') : $data[0]->sancl_blood_sugar }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            @if ($errors->has('sancl_blood_sugar'))
                                            <div class="text-danger">
                                                {{ $errors->first('sancl_blood_sugar') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_malaria">Apa terdapat Darah Malaria?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_malaria" id="sancl_malaria" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="1"
                                                    {{ (old('sancl_malaria') == '1') ? 'selected' : (($data[0]->sancl_malaria == '1') ? 'selected' : '') }}>
                                                    - (Negatif)</option>
                                                <option value="2"
                                                    {{ (old('sancl_malaria') == '2') ? 'selected' : (($data[0]->sancl_malaria == '2') ? 'selected' : '') }}>
                                                    + (Positif)</option>
                                            </select>
                                            @if(session()->has('sancl_malaria'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_malaria') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="sancl_bta">Apa terdapat BTA?</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="sancl_bta" id="sancl_bta" class="form-control select2">
                                                <option value="">-- PILIH --</option>
                                                <option value="0"
                                                    {{ (old('sancl_bta') == '0') ? 'selected' : (($data[0]->sancl_bta == '0') ? 'selected' : '') }}>
                                                    Tidak Diperiksa</option>
                                                <option value="1"
                                                    {{ (old('sancl_bta') == '1') ? 'selected' : (($data[0]->sancl_bta == '1') ? 'selected' : '') }}>
                                                    Non Reaktif</option>
                                                <option value="2"
                                                    {{ (old('sancl_bta') == '2') ? 'selected' : (($data[0]->sancl_bta == '2') ? 'selected' : '') }}>
                                                    Reaktif</option>
                                            </select>
                                            @if(session()->has('sancl_bta'))
                                            <div class="text-danger">
                                                {{ session()->get('sancl_bta') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5">
                        <div class="text-right">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Tambah Gambar USG
                            </button>
                        </div>

                        @php
                        $image = DB::table('eianc_service_anc_lab_images')->where('sancli_lab_id', 1)->get();
                        @endphp

                        <div class="row justify-content-center">
                            @foreach ($image as $img)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <img src="{{ asset('data/image/lab/' . $img->sancli_image) }}" height="196">
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{ route('service.anc.anc.lab.destroy', Crypt::encrypt($img->sancli_id)) }}">
                                                        <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this data?');">
                                                            HAPUS
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{ asset('data/image/lab/' . $img->sancli_image) }}" target="_blank">
                                                        <button type="button" class="btn btn-primary btn-block">
                                                            VIEW
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @else
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">
                <input type="hidden" name="idx" value="{{ $xdata[0]->sancl_id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            @php
                            $patient = DB::table('eianc_patients')->where('pat_norm',
                            Crypt::decrypt($id))->value('pat_blood');
                            @endphp
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_blood">Apa Golongan Darah?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancl_blood" id="sancl_blood" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($sblood as $sb)
                                        <option value="{{ $sb->blo_id }}"
                                            {{ (old('sancl_blood') == $sb->blo_id) ? 'selected' : (($patient == $sb->blo_id) ? 'selected' : (($xdata[0]->sancl_blood == $sb->blo_id) ? 'selected' : '')) }}>
                                            {{ $sb->blo_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sancl_blood'))
                                    <div class="text-danger">
                                        {{ session()->get('sancl_blood') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_urine">Apa Kandungan Protein Urin?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancl_urine" id="sancl_urine" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0"
                                            {{ (old('sancl_urine') == '0') ? 'selected' : (($xdata[0]->sancl_urine == '0') ? 'selected' : '') }}>
                                            Tidak Diperiksa</option>
                                        <option value="1"
                                            {{ (old('sancl_urine') == '1') ? 'selected' : (($xdata[0]->sancl_urine == '1') ? 'selected' : '') }}>
                                            -</option>
                                        <option value="2"
                                            {{ (old('sancl_urine') == '2') ? 'selected' : (($xdata[0]->sancl_urine == '2') ? 'selected' : '') }}>
                                            +</option>
                                        <option value="3"
                                            {{ (old('sancl_urine') == '3') ? 'selected' : (($xdata[0]->sancl_urine == '3') ? 'selected' : '') }}>
                                            ++</option>
                                        <option value="4"
                                            {{ (old('sancl_urine') == '4') ? 'selected' : (($xdata[0]->sancl_urine == '4') ? 'selected' : '') }}>
                                            +++</option>
                                    </select>
                                    @if(session()->has('sancl_urine'))
                                    <div class="text-danger">
                                        {{ session()->get('sancl_urine') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_hiv">Bagaimana Serologi HIV/VCT?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancl_hiv" id="sancl_hiv" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0"
                                            {{ (old('sancl_hiv') == '0') ? 'selected' : (($xdata[0]->sancl_hiv == '0') ? 'selected' : '') }}>
                                            NON REAKTIF</option>
                                        <option value="1"
                                            {{ (old('sancl_hiv') == '1') ? 'selected' : (($xdata[0]->sancl_hiv == '1') ? 'selected' : '') }}>
                                            REAKTIF</option>
                                        <option value="2"
                                            {{ (old('sancl_hiv') == '2') ? 'selected' : (($xdata[0]->sancl_hiv == '2') ? 'selected' : '') }}>
                                            TIDAK DIPERIKSA</option>
                                    </select>
                                    @if(session()->has('sancl_hiv'))
                                    <div class="text-danger">
                                        {{ session()->get('sancl_hiv') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_sifilis">Bagaimana IMS/Sifilis?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancl_sifilis" id="sancl_sifilis" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0"
                                            {{ (old('sancl_sifilis') == '0') ? 'selected' : (($xdata[0]->sancl_sifilis == '0') ? 'selected' : '') }}>
                                            Tidak Diperiksa</option>
                                        <option value="1"
                                            {{ (old('sancl_sifilis') == '1') ? 'selected' : (($xdata[0]->sancl_sifilis == '1') ? 'selected' : '') }}>
                                            - (Negatif)</option>
                                        <option value="2"
                                            {{ (old('sancl_sifilis') == '2') ? 'selected' : (($xdata[0]->sancl_sifilis == '2') ? 'selected' : '') }}>
                                            + (Positif)</option>
                                    </select>
                                    @if(session()->has('sancl_sifilis'))
                                    <div class="text-danger">
                                        {{ session()->get('sancl_sifilis') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_hbsag">Bagaimana HBsAg?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancl_hbsag" id="sancl_hbsag" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="1"
                                            {{ (old('sancl_hbsag') == '1') ? 'selected' : (($xdata[0]->sancl_hbsag == '1') ? 'selected' : '') }}>
                                            - (Negatif)</option>
                                        <option value="2"
                                            {{ (old('sancl_hbsag') == '2') ? 'selected' : (($xdata[0]->sancl_hbsag == '2') ? 'selected' : '') }}>
                                            + (Positif)</option>
                                    </select>
                                    @if(session()->has('sancl_hbsag'))
                                    <div class="text-danger">
                                        {{ session()->get('sancl_hbsag') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_hb">Apa Hemoglobin(HB) diperiksa?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancl_hb" id="sancl_hb" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0"
                                            {{ (old('sancl_hb') == '0') ? 'selected' : (($xdata[0]->sancl_hb == '0') ? 'selected' : '') }}>
                                            Tidak Diperiksa</option>
                                        <option value="1"
                                            {{ (old('sancl_hb') == '1') ? 'selected' : (($xdata[0]->sancl_hb == '1') ? 'selected' : '') }}>
                                            Diperiksa</option>
                                    </select>
                                    @if(session()->has('sancl_hb'))
                                    <div class="text-danger">
                                        {{ session()->get('sancl_hb') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_level_hb">Berapa HB (gr/dl)?</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="sancl_level_hb" id="sancl_level_hb"
                                        class="form-control text-center"
                                        value="{{ (old('sancl_level_hb')) ? old('sancl_level_hb') : $xdata[0]->sancl_level_hb }}"
                                        onkeyup="return anemiae();" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('sancl_level_hb'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancl_level_hb') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    @php
                                    $anemia = ($xdata[0]->sancl_level_hb < 11) ? 'Ada Resiko Anemia'
                                        : 'Tidak Ada Resiko Anemia' ; @endphp <input type="text" name="anemia"
                                        id="anemia" class="form-control text-center"
                                        value="{{ (old('anemia')) ? old('anemia') : $anemia }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_blood_sugar">Berapa Gula Darah?</label>
                                    <i class="text-danger">Jika tidak diperiksa kosongkan saja</i>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="sancl_blood_sugar" id="sancl_blood_sugar"
                                        class="form-control"
                                        value="{{ (old('sancl_blood_sugar')) ? old('sancl_blood_sugar') : $xdata[0]->sancl_blood_sugar }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('sancl_blood_sugar'))
                                    <div class="text-danger">
                                        {{ $errors->first('sancl_blood_sugar') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_malaria">Apa terdapat Darah Malaria?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancl_malaria" id="sancl_malaria" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="1"
                                            {{ (old('sancl_malaria') == '1') ? 'selected' : (($xdata[0]->sancl_malaria == '1') ? 'selected' : '') }}>
                                            - (Negatif)</option>
                                        <option value="2"
                                            {{ (old('sancl_malaria') == '2') ? 'selected' : (($xdata[0]->sancl_malaria == '2') ? 'selected' : '') }}>
                                            + (Positif)</option>
                                    </select>
                                    @if(session()->has('sancl_malaria'))
                                    <div class="text-danger">
                                        {{ session()->get('sancl_malaria') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sancl_bta">Apa terdapat BTA?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sancl_bta" id="sancl_bta" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0"
                                            {{ (old('sancl_bta') == '0') ? 'selected' : (($xdata[0]->sancl_bta == '0') ? 'selected' : '') }}>
                                            Tidak Diperiksa</option>
                                        <option value="1"
                                            {{ (old('sancl_bta') == '1') ? 'selected' : (($xdata[0]->sancl_bta == '1') ? 'selected' : '') }}>
                                            Non Reaktif</option>
                                        <option value="2"
                                            {{ (old('sancl_bta') == '2') ? 'selected' : (($xdata[0]->sancl_bta == '2') ? 'selected' : '') }}>
                                            Reaktif</option>
                                    </select>
                                    @if(session()->has('sancl_bta'))
                                    <div class="text-danger">
                                        {{ session()->get('sancl_bta') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('service.anc.anc.physical', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                <button class="btn btn-success" type="button">
                    <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
                </button>
            </a>
            @if (count($data) > 0)
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="{{ route('service.anc.anc.kie', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                    <button class="btn btn-success" type="button">
                        Selanjutnya &nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                    </button>
                </a>
            @endif
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@if ($show == '0' && count($data) > 0)
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('service.anc.anc.lab.upload') }}" method="post" autocomplete="off" name="formreg"
                onsubmit="return validat();" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idx" value="{{ $data[0]->sancl_id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{ asset('data/image/lab/none.jpg') }}" id="image-preview" height="256">
                        </div>
                        <div class="custom-file">
                            <input type="file" name="thumb" class="custom-file-input" id="thumb"
                                onchange="previewImage();">
                            <label class="custom-file-label" for="thumb">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
