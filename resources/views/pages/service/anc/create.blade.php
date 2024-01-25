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
    function counthpl(e) {
        var str = e.target.value;
        var date = new Date(str);
        date.setDate(date.getDate() + 7);
        date.setMonth((date.getMonth() - 3) + 1);
        date.setFullYear(date.getFullYear() + 1);

        $('#sanc_hpl').val(date.getFullYear() + '-' + date.getMonth() + '-' + date.getDate());
    }
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('service.anc', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Tambah ANC</h1>
</div>
@endsection

@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    No Pasien
                </div>
                <div class="col-md-8">
                    <b>{{ $data[0]->pat_norm }}</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Nama Pasien
                </div>
                <div class="col-md-8">
                    <b>{{ $data[0]->pat_name }}</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Tanggal Lahir
                </div>
                <div class="col-md-8">
                    <b>{{ $data[0]->pat_pob . ' | ' . $data[0]->pat_dob }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    Alamat
                </div>
                <div class="col-md-8">
                    <b>
                        @php
                            echo $data[0]->pat_address . ', ' .
                            $data[0]->pat_rt . ', ' .
                            $data[0]->pat_rw . ', ' .
                            DB::table('sys_alamats')->where('kode', $data[0]->pat_village)->value('nama') . ',' .
                            DB::table('sys_alamats')->where('kode', $data[0]->pat_subdistrict)->value('nama') . ',' .
                            DB::table('sys_alamats')->where('kode', $data[0]->pat_district)->value('nama') . ','
                            ;
                        @endphp
                    </b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Ibu Kandung
                </div>
                <div class="col-md-8">
                    <b>{{ $data[0]->pat_biological_mother }}</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Umur Sekarang
                </div>
                <div class="col-md-8">
                    <b>{{ date('Y') - date('Y', strtotime($data[0]->pat_dob)) }} Tahun</b>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <form action="{{ route('service.anc.store') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="norm" value="{{ $id }}">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="sanc_kia">Apakah Ibu Hamil mempunyai buku KIA?</label>
                                <select name="sanc_kia" id="sanc_kia" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH --</option>
                                    <option value="0" {{ (old('sanc_kia') == '0') ? 'selected' : '' }}>TIDAK PUNYA</option>
                                    <option value="1" {{ (old('sanc_kia') == '1') ? 'selected' : '' }}>PUNYA</option>
                                </select>
                                @if(session()->has('sanc_kia'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_kia') }}
                                    </div>
                                @endif
                    </div>
                </div>
            </div>
            <h5><b>KEHAMILAN</b></h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_gravida">Gravida / Kehamilan Ke - </label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_gravida" id="sanc_gravida" class="form-control select2" style=" font-size: 14pt;">
                                    @for ($i = 1; $i < 16; $i++)
                                        <option value="{{ $i }}"  {{ (old('sanc_gravida') == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @if(session()->has('sanc_gravida'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_gravida') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_partus">Partus / Persalinan Ke - </label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_partus" id="sanc_partus" class="form-control select2" style=" font-size: 14pt;">
                                    @for ($i = 0; $i < 16; $i++)
                                        <option value="{{ $i }}"  {{ (old('sanc_partus') == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @if(session()->has('sanc_partus'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_partus') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_aborsi">Aborsi </label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_aborsi" id="sanc_aborsi" class="form-control select2" style=" font-size: 14pt;">
                                    @for ($i = 0; $i < 16; $i++)
                                        <option value="{{ $i }}"  {{ (old('sanc_aborsi') == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_life">Anak Hidup </label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_life" id="sanc_life" class="form-control select2" style=" font-size: 14pt;">
                                    @for ($i = 0; $i < 16; $i++)
                                        <option value="{{ $i }}"  {{ (old('sanc_life') == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_death">Anak Mati </label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_death" id="sanc_death" class="form-control select2" style=" font-size: 14pt;">
                                    @for ($i = 0; $i < 16; $i++)
                                        <option value="{{ $i }}"  {{ (old('sanc_death') == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="mt-4"><b>PREDIKSI KELAHIRAN</b></h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_hpht">Hari pertama haid terakhir (HPHT)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="sanc_hpht" id="sanc_hpht" class="form-control text-center" onchange="counthpl(event);" value="{{ old('sanc_hpht') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_hpl">Hari Pekiraan Lahir (HPL)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="sanc_hpl" id="sanc_hpl" class="form-control text-center" readonly style="font-size: 18pt;" value="{{ old('sanc_hpl') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="mt-4"><b>INFORMASI PENUNJANG</b></h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_pregnancy1_age">Kehamilan Ke-1 di umur?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_pregnancy1_age" id="sanc_pregnancy1_age" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH UMUR --</option>
                                    @foreach ($sage as $sa)
                                        <option value="{{ $sa->pa_id }}" {{ ($sa->pa_id == old('sanc_pregnancy1_age')) ? 'selected' : '' }}>{{ $sa->pa_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('sanc_pregnancy1_age'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_pregnancy1_age') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_pregnancy1_marriage">Jarak Kehamilan dari Pernikahan?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_pregnancy1_marriage" id="sanc_pregnancy1_marriage" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH JARAK --</option>
                                    @foreach ($spm as $pm)
                                        <option value="{{ $pm->pm_id }}" {{ ($pm->pm_id == old('sanc_pregnancy1_marriage')) ? 'selected' : '' }}>{{ $pm->pm_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('sanc_pregnancy1_marriage'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_pregnancy1_marriage') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_distance_pregnancy">Selisih kehamilan dari sebelumnya?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_distance_pregnancy" id="sanc_distance_pregnancy" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH JARAK --</option>
                                    @foreach ($sdp as $dp)
                                        <option value="{{ $dp->pd_id }}" {{ ($dp->pd_id == old('sanc_distance_pregnancy')) ? 'selected' : '' }}>{{ $dp->pd_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('sanc_distance_pregnancy'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_distance_pregnancy') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_pregnancy_failed">Pernah gagal hamil?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_pregnancy_failed" id="sanc_pregnancy_failed" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH JARAK --</option>
                                    <option value="0" {{ (old('sanc_pregnancy_failed') == '0') ? 'selected' : '' }}>BELUM PERNAH</option>
                                    <option value="1" {{ (old('sanc_pregnancy_failed') == '1') ? 'selected' : '' }}>PERNAH GAGAL HAMIL</option>
                                </select>
                                @if(session()->has('sanc_pregnancy_failed'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_pregnancy_failed') }}
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
                                <label for="sanc_born_with">Ibu Hamil dahulu melahir dengan cara?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_born_with" id="sanc_born_with" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH CARA LAHIR --</option>
                                    @foreach ($spw as $pw)
                                        <option value="{{ $pw->pw_id }}" {{ ($pw->pw_id == old('sanc_born_with')) ? 'selected' : '' }}>{{ $pw->pw_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('sanc_born_with'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_born_with') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_habit">Apakah Ibu Hamil memiliki kebiasaan?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_habit" id="sanc_habit" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH KEBIASAAN --</option>
                                    @foreach ($shab as $hb)
                                        <option value="{{ $hb->hb_id }}" {{ ($hb->hb_id == old('sanc_habit')) ? 'selected' : '' }}>{{ $hb->hb_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('sanc_habit'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_habit') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_menstrual">Bagaimana Siklus Haid/Menstruasi?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_menstrual" id="sanc_menstrual" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH SIKLUS --</option>
                                    <option value="0" {{ (old('sanc_menstrual') == '0') ? 'selected' : '' }}>TIDAK TERATUR</option>
                                    <option value="1" {{ (old('sanc_menstrual') == '1') ? 'selected' : '' }}>TERATUR</option>
                                </select>
                                @if(session()->has('sanc_menstrual'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_menstrual') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_menstrual_cycle">Siklus Haid/Mestruasi?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_menstrual_cycle" id="sanc_menstrual_cycle" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH SIKLUS --</option>
                                    @foreach ($shaid as $a)
                                        <option value="{{ $a->mc_id }}" {{ ($a->mc_id == old('sanc_menstrual_cycle')) ? 'selected' : '' }}>{{ $a->mc_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('sanc_menstrual_cycle'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_menstrual_cycle') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_illness_experienced">Apakah saat ini sedang sakit?</label>
                                <br>
                                <i class="text-danger">Jika tidak ada maka kosongkan saja</i>
                            </div>
                            <div class="col-md-8">
                                <textarea name="sanc_illness_experienced" id="sanc_illness_experienced" cols="30" rows="3" class="form-control">{{ old('sanc_illness_experienced') }}</textarea>
                                @if ($errors->has('sanc_illness_experienced'))
                                    <div class="text-danger">
                                        {{ $errors->first('sanc_illness_experienced') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_hereditary_disease">Apakah memiliki penyakit keturunan?</label>
                                <br>
                                <i class="text-danger">Jika tidak ada maka kosongkan saja</i>
                            </div>
                            <div class="col-md-8">
                                <textarea name="sanc_hereditary_disease" id="sanc_hereditary_disease" cols="30" rows="3" class="form-control">{{ old('sanc_hereditary_disease') }}</textarea>
                                @if ($errors->has('sanc_hereditary_disease'))
                                    <div class="text-danger">
                                        {{ $errors->first('sanc_hereditary_disease') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 text-right">
                                <label for="sanc_hiv_aids">Apakah ada indikasi HIV/AIDS?</label>
                            </div>
                            <div class="col-md-8">
                                <select name="sanc_hiv_aids" id="sanc_hiv_aids" class="form-control select2" style=" font-size: 14pt;">
                                    <option value="">-- PILIH INDIKASI --</option>
                                    <option value="0" {{ (old('sanc_hiv_aids') == '0') ? 'selected' : '' }}>TIDAK ADA</option>
                                    <option value="1" {{ (old('sanc_hiv_aids') == '1') ? 'selected' : '' }}>ADA</option>
                                </select>
                                @if(session()->has('sanc_hiv_aids'))
                                    <div class="text-danger">
                                        {{ session()->get('sanc_hiv_aids') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
