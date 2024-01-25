@extends('layouts/main')

@section('js')
<script>
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
    <a href="{{ route('service.neo', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Layanan Neonatal</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.neo.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            <input type="hidden" name="norm" value="{{ $id }}">
            @if (count($data) < 1)
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h5><b>Pemeriksaan</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_insp_asi">ASI</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_insp_asi" id="neobb_insp_asi" class="form-control" value="{{ old('neobb_insp_asi') }}">
                                    @if ($errors->has('neobb_insp_asi'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_insp_asi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_insp_mp_asi">MP ASI</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_insp_mp_asi" id="neobb_insp_mp_asi" class="form-control" value="{{ old('neobb_insp_mp_asi') }}">
                                    @if ($errors->has('neobb_insp_mp_asi'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_insp_mp_asi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_insp_sdi_dtk">SDI DTK</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_insp_sdi_dtk" id="neobb_insp_sdi_dtk" class="form-control" value="{{ old('neobb_insp_sdi_dtk') }}">
                                    @if ($errors->has('neobb_insp_sdi_dtk'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_insp_sdi_dtk') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5><b>Gizi</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_nut_weight">Berat Badan (gram)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_nut_weight" id="neobb_nut_weight" class="form-control" value="{{ old('neobb_nut_weight') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('neobb_nut_weight'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_nut_weight') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_nut_height">Tinggi Badan (cm)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_nut_height" id="neobb_nut_height" class="form-control" value="{{ old('neobb_nut_height') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('neobb_nut_height'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_nut_height') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_nut_status">Status GiZi (L, B, S, K)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_nut_status" id="neobb_nut_status" class="form-control" value="{{ old('neobb_nut_status') }}">
                                    @if ($errors->has('neobb_nut_status'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_nut_status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_nut_vit">Vitamin Anak</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_nut_vit" id="neobb_nut_vit" class="form-control" value="{{ old('neobb_nut_vit') }}">
                                    @if ($errors->has('neobb_nut_vit'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_nut_vit') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5><b>Integrasi Program</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_prog_semiologi_hiv">Serologi HIV</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_prog_semiologi_hiv" id="neobb_prog_semiologi_hiv" class="form-control" value="{{ old('neobb_prog_semiologi_hiv') }}">
                                    @if ($errors->has('neobb_prog_semiologi_hiv'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_prog_semiologi_hiv') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_prog_cd4">Program CD 4</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_prog_cd4" id="neobb_prog_cd4" class="form-control" value="{{ old('neobb_prog_cd4') }}">
                                    @if ($errors->has('neobb_prog_cd4'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_prog_cd4') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_prog_kelambu">Mendapat Kelambu</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_prog_kelambu" id="neobb_prog_kelambu" class="form-control" value="{{ old('neobb_prog_kelambu') }}">
                                    @if ($errors->has('neobb_prog_kelambu'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_prog_kelambu') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5><b>Pencegahan</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_vacc">Imunisasi</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="neobb_vacc" id="neobb_vacc" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($vacc as $v)
                                            <option value="{{ $v->va_id }}" {{ ($v->va_id == old('neobb_vacc')) ? 'selected' : '' }}>{{ $v->va_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_det">Keterangan Tambahan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neobb_det" id="neobb_det" class="form-control" cols="30" rows="5" maxlength="255">{{ old('neobb_det') }}</textarea>
                                    @if ($errors->has('neobb_det'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_det') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Disposisi</h4>
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
            @else
                <input type="hidden" name="id" value="{{ $data[0]->neobb_id }}">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h5><b>Pemeriksaan</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_insp_asi">Pemeriksaan ASI</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_insp_asi" id="neobb_insp_asi" class="form-control" value="{{ (old('neobb_insp_asi')) ? old('neobb_insp_asi') : $data[0]->neobb_insp_asi }}">
                                    @if ($errors->has('neobb_insp_asi'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_insp_asi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_insp_mp_asi">Pemeriksaan MP ASI</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_insp_mp_asi" id="neobb_insp_mp_asi" class="form-control" value="{{ (old('neobb_insp_mp_asi')) ? old('neobb_insp_mp_asi') : $data[0]->neobb_insp_mp_asi }}">
                                    @if ($errors->has('neobb_insp_mp_asi'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_insp_mp_asi') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_insp_sdi_dtk">Pemeriksaan SDI DTK</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_insp_sdi_dtk" id="neobb_insp_sdi_dtk" class="form-control" value="{{ (old('neobb_insp_sdi_dtk')) ? old('neobb_insp_sdi_dtk') : $data[0]->neobb_insp_sdi_dtk }}">
                                    @if ($errors->has('neobb_insp_sdi_dtk'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_insp_sdi_dtk') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5><b>Gizi</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_nut_weight">Berat Badan (gram)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_nut_weight" id="neobb_nut_weight" class="form-control" value="{{ (old('neobb_nut_weight')) ? old('neobb_nut_weight') : $data[0]->neobb_nut_weight }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('neobb_nut_weight'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_nut_weight') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_nut_height">Tinggi Badan (cm)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_nut_height" id="neobb_nut_height" class="form-control" value="{{ (old('neobb_nut_height')) ? old('neobb_nut_height') : $data[0]->neobb_nut_height }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    @if ($errors->has('neobb_nut_height'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_nut_height') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_nut_status">Status GiZi (L, B, S, K)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_nut_status" id="neobb_nut_status" class="form-control" value="{{ (old('neobb_nut_status')) ? old('neobb_nut_status') : $data[0]->neobb_nut_status }}">
                                    @if ($errors->has('neobb_nut_status'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_nut_status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_nut_vit">Vitamin Anak</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_nut_vit" id="neobb_nut_vit" class="form-control" value="{{ (old('neobb_nut_vit')) ? old('neobb_nut_vit') : $data[0]->neobb_nut_vit }}">
                                    @if ($errors->has('neobb_nut_vit'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_nut_vit') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5><b>Integrasi Program</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_prog_semiologi_hiv">Semiologi HIV</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_prog_semiologi_hiv" id="neobb_prog_semiologi_hiv" class="form-control" value="{{ (old('neobb_prog_semiologi_hiv')) ? old('neobb_prog_semiologi_hiv') : $data[0]->neobb_prog_semiologi_hiv }}">
                                    @if ($errors->has('neobb_prog_semiologi_hiv'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_prog_semiologi_hiv') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_prog_cd4">Program CD 4</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_prog_cd4" id="neobb_prog_cd4" class="form-control" value="{{ (old('neobb_prog_cd4')) ? old('neobb_prog_cd4') : $data[0]->neobb_prog_cd4 }}">
                                    @if ($errors->has('neobb_prog_cd4'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_prog_cd4') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_prog_kelambu">Mendapat Kelambu</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="neobb_prog_kelambu" id="neobb_prog_kelambu" class="form-control" value="{{ (old('neobb_prog_kelambu')) ? old('neobb_prog_kelambu') : $data[0]->neobb_prog_kelambu }}">
                                    @if ($errors->has('neobb_prog_kelambu'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_prog_kelambu') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5><b>Pencegahan</b></h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_vacc">Imunisasi</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="neobb_vacc" id="neobb_vacc" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($vacc as $v)
                                            <option value="{{ $v->va_id }}" {{ ($v->va_id == old('neobb_vacc')) ? 'selected' : (($data[0]->neobb_vacc == $v->va_id) ? 'selected' : '') }}>{{ $v->va_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="neobb_det">Keterangan Tambahan</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="neobb_det" id="neobb_det" class="form-control" cols="30" rows="5" maxlength="255">{{ (old('neobb_det')) ? old('neobb_det') : $data[0]->neobb_det }}</textarea>
                                    @if ($errors->has('neobb_det'))
                                        <div class="text-danger">
                                            {{ $errors->first('neobb_det') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Disposisi</h4>
                <?php
                    $ds = DB::table('eianc_desposisis')->where('des_reg_no', $data[0]->neobb_no_reg)->get();
                ?>
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
            @endif
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
