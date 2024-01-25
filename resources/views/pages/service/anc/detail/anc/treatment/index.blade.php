@extends('layouts/main')

@section('head')
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
    <h1>ANC - TREATMENT</h1>
</div>
@endsection

@section('content')
<div class="card">
    <form action="{{ route('service.anc.anc.treatment.store') }}" method="POST" autocomplete="off">
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
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanct_tt">Ijeksi TT ke berapa?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanct_tt" id="sanct_tt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($stt as $tt)
                                            <option value="{{ $tt->tt_id }}" {{ (old('sanct_tt') == $tt->tt_id) ? 'selected' : '' }}>{{ $tt->tt_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanct_tt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanct_tt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanct_tt_date">Kapan dilakukan Injeksi TT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="sanct_tt_date" id="sanct_tt_date" class="form-control text-center" value="{{ (old('sanct_tt_date')) }}">
                                        @if ($errors->has('sanct_tt_date'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanct_tt_date') }}
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
                                        <label for="sanct_arsip_kia">Apakah di catat ke dalam buku KIA?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanct_arsip_kia" id="sanct_arsip_kia" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanct_arsip_kia') == '0') ? 'selected' : '' }}>TIDAK</option>
                                            <option value="1" {{ (old('sanct_arsip_kia') == '1') ? 'selected' : '' }}>YA, CATAT</option>
                                        </select>
                                        @if(session()->has('sanct_arsip_kia'))
                                        <div class="text-danger">
                                            {{ session()->get('sanct_arsip_kia') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanct_kelambu">Apakah ibu hamil tidur menggunakan Kelambu?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanct_kelambu" id="sanct_kelambu" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanct_kelambu') == '0') ? 'selected' : '' }}>TIDAK</option>
                                            <option value="1" {{ (old('sanct_kelambu') == '1') ? 'selected' : '' }}>YA</option>
                                        </select>
                                        @if(session()->has('sanct_kelambu'))
                                        <div class="text-danger">
                                            {{ session()->get('sanct_kelambu') }}
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
                    <input type="hidden" name="idx" value="{{ $data[0]->sanct_id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanct_tt">Ijeksi TT ke berapa?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanct_tt" id="sanct_tt" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            @foreach ($stt as $tt)
                                            <option value="{{ $tt->tt_id }}" {{ (old('sanct_tt') == $tt->tt_id) ? 'selected' : (($tt->tt_id == $data[0]->sanct_tt) ? 'selected' : '') }}>{{ $tt->tt_name }}</option>
                                            @endforeach
                                        </select>
                                        @if(session()->has('sanct_tt'))
                                        <div class="text-danger">
                                            {{ session()->get('sanct_tt') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanct_tt_date">Kapan dilakukan Injeksi TT?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="sanct_tt_date" id="sanct_tt_date" class="form-control text-center" value="{{ ((old('sanct_tt_date'))) ? (old('sanct_tt_date')) : $data[0]->sanct_tt_date }}">
                                        @if ($errors->has('sanct_tt_date'))
                                        <div class="text-danger">
                                            {{ $errors->first('sanct_tt_date') }}
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
                                        <label for="sanct_arsip_kia">Apakah di catat ke dalam buku KIA?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanct_arsip_kia" id="sanct_arsip_kia" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanct_arsip_kia') == '0') ? 'selected' : (($data[0]->sanct_arsip_kia == '0') ? 'selected' : '') }}>TIDAK</option>
                                            <option value="1" {{ (old('sanct_arsip_kia') == '1') ? 'selected' : (($data[0]->sanct_arsip_kia == '1') ? 'selected' : '') }}>YA, CATAT</option>
                                        </select>
                                        @if(session()->has('sanct_arsip_kia'))
                                        <div class="text-danger">
                                            {{ session()->get('sanct_arsip_kia') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 text-right">
                                        <label for="sanct_kelambu">Apakah ibu hamil tidur menggunakan Kelambu?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="sanct_kelambu" id="sanct_kelambu" class="form-control select2">
                                            <option value="">-- PILIH --</option>
                                            <option value="0" {{ (old('sanct_kelambu') == '0') ? 'selected' : (($data[0]->sanct_kelambu == '0') ? 'selected' : '') }}>TIDAK</option>
                                            <option value="1" {{ (old('sanct_kelambu') == '1') ? 'selected' : (($data[0]->sanct_kelambu == '1') ? 'selected' : '') }}>YA</option>
                                        </select>
                                        @if(session()->has('sanct_kelambu'))
                                        <div class="text-danger">
                                            {{ session()->get('sanct_kelambu') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="anc" value="{{ $anc }}">
                <input type="hidden" name="det" value="{{ $det }}">
                <input type="hidden" name="idx" value="{{ $xdata[0]->sanct_id }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanct_tt">Ijeksi TT ke berapa?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanct_tt" id="sanct_tt" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        @foreach ($stt as $tt)
                                        <option value="{{ $tt->tt_id }}" {{ (old('sanct_tt') == $tt->tt_id) ? 'selected' : (($tt->tt_id == $xdata[0]->sanct_tt) ? 'selected' : '') }}>{{ $tt->tt_name }}</option>
                                        @endforeach
                                    </select>
                                    @if(session()->has('sanct_tt'))
                                    <div class="text-danger">
                                        {{ session()->get('sanct_tt') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanct_tt_date">Kapan dilakukan Injeksi TT?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="sanct_tt_date" id="sanct_tt_date" class="form-control text-center" value="{{ ((old('sanct_tt_date'))) ? (old('sanct_tt_date')) : $xdata[0]->sanct_tt_date }}">
                                    @if ($errors->has('sanct_tt_date'))
                                    <div class="text-danger">
                                        {{ $errors->first('sanct_tt_date') }}
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
                                    <label for="sanct_arsip_kia">Apakah di catat ke dalam buku KIA?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanct_arsip_kia" id="sanct_arsip_kia" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanct_arsip_kia') == '0') ? 'selected' : (($xdata[0]->sanct_arsip_kia == '0') ? 'selected' : '') }}>TIDAK</option>
                                        <option value="1" {{ (old('sanct_arsip_kia') == '1') ? 'selected' : (($xdata[0]->sanct_arsip_kia == '1') ? 'selected' : '') }}>YA, CATAT</option>
                                    </select>
                                    @if(session()->has('sanct_arsip_kia'))
                                    <div class="text-danger">
                                        {{ session()->get('sanct_arsip_kia') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    <label for="sanct_kelambu">Apakah ibu hamil tidur menggunakan Kelambu?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sanct_kelambu" id="sanct_kelambu" class="form-control select2">
                                        <option value="">-- PILIH --</option>
                                        <option value="0" {{ (old('sanct_kelambu') == '0') ? 'selected' : (($xdata[0]->sanct_kelambu == '0') ? 'selected' : '') }}>TIDAK</option>
                                        <option value="1" {{ (old('sanct_kelambu') == '1') ? 'selected' : (($xdata[0]->sanct_kelambu == '1') ? 'selected' : '') }}>YA</option>
                                    </select>
                                    @if(session()->has('sanct_kelambu'))
                                    <div class="text-danger">
                                        {{ session()->get('sanct_kelambu') }}
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
            <a href="{{ route('service.anc.anc.kie', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                <button class="btn btn-success" type="button">
                    <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
                </button>
            </a>
            @if (count($data) > 0)
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="{{ route('service.anc.anc.diag', ['id' => $id, 'anc' => $anc, 'det' => $det]) }}">
                <button class="btn btn-success" type="button">
                    Selanjutnya&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                </button>
            </a>
            @endif
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <button class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
</div>

@if (count($data) > 0)
<div class="card card-body">
    <form action="{{ route('service.anc.anc.treatment.obat') }}" method="post" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $data[0]->sanct_id }}">
        <div class="row">
            <div class="col-md-4">
                <label for="sanctr_drug_id">Nama Obat</label>
                <select name="sanctr_drug_id" id="sanctr_drug_id" class="form-control select2">
                    <option value="">-- PILIH OBAT --</option>
                    @foreach ($sobat as $o)
                        <option value="{{ $o->dg_id }}" {{ ($o->dg_id == old('sanctr_drug_id') ? 'selected' : '') }}>{{ $o->dg_brand . ' (' . $o->dg_batch . '), Stok : ' . $o->dg_remainder }}</option>
                    @endforeach
                </select>
                @if(session()->has('sanctr_drug_id'))
                    <div class="text-danger">
                        {{ session()->get('sanctr_drug_id') }}
                    </div>
                @endif
            </div>
            <div class="col-md-2">
                <label for="sanctr_qty">Jumlah (Qty)</label>
                <input type="text" name="sanctr_qty" id="sanctr_qty" class="form-control text-center" value="{{ old('sanctr_qty') }}" placeholder="10">
                @if ($errors->has('sanctr_qty'))
                    <div class="text-danger">
                        {{ $errors->first('sanctr_qty') }}
                    </div>
                @endif
            </div>
            <div class="col-md-2">
                <label for="sanctr_dosis">Dosis</label>
                <input type="text" name="sanctr_dosis" id="sanctr_dosis" class="form-control text-center" value="{{ old('sanctr_dosis') }}" placeholder="3 x 1">
                @if ($errors->has('sanctr_dosis'))
                    <div class="text-danger">
                        {{ $errors->first('sanctr_dosis') }}
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="sanctr_use">Anjuran Guna Saat?</label>
                    <select name="sanctr_use" id="sanctr_use" class="form-control select2">
                        <option value="">-- PILIH --</option>
                        <option value="0" {{ (old('sanctr_use') == '0') ? 'selected' : '' }}>SEBELUM MAKAN</option>
                        <option value="1" {{ (old('sanctr_use') == '1') ? 'selected' : '' }}>SESUDAH MAKAN</option>
                        <option value="2" {{ (old('sanctr_use') == '2') ? 'selected' : '' }}>SEBELUM TIDUR</option>
                    </select>
                    @if(session()->has('sanctr_use'))
                    <div class="text-danger">
                        {{ session()->get('sanctr_use') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-1">
                <label for="">&nbsp;</label>
                <button class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th class="text-center" width="50%">NAMA OBAT</th>
                <th class="text-center">JUMLAH OBAT</th>
                <th class="text-center">DOSIS OBAT</th>
                <th class="text-center" width="20%">ANJURAN GUNA OBAT</th>
                <th class="text-center" width="10%">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @php
                $obat = DB::table('eianc_service_anc_treatment_recipes')->where('sanctr_t_id', $data[0]->sanct_id)->join('eianc_drugs', 'eianc_drugs.dg_id', '=', 'eianc_service_anc_treatment_recipes.sanctr_drug_id')->get();
            @endphp

            @foreach ($obat as $o)
                <tr>
                    <td><b>{{ $o->dg_brand }}</b></td>
                    <td class="text-center">
                        {{ $o->sanctr_qty . ' ' . $o->dg_unit }}
                    </td>
                    <td class="text-center">
                        {{ $o->sanctr_dosis }}
                    </td>
                    <td class="text-center">
                        {{ ($o->sanctr_dosis == 1) ? 'SEBELUM MAKAN' : (($o->sanctr_dosis == 2) ? 'SESUDAH MAKAN' : 'SEBELUM TIDUR') }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('service.anc.anc.treatment.destroy', Crypt::encrypt($o->sanctr_id)) }}">
                            <button class="btn btn-danger">HAPUS</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
