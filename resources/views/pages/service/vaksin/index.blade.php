@extends('layouts/main')

@section('head')
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
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('service', $id) }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1 class="d-inline">Layanan Imunisasi</h1>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="{{ route('service.create', $id) }}">
        <button class="btn btn-primary">
            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Tambah
        </button>
    </a>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 5%; text-align: right;">No</th>
                    <th style="width: 15%; text-align: center;">Tanggal</th>
                    <th style="text-align: center;">Detail</th>
                    <th style="width: 20%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="text-right">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $d->svak_date }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    Suhu Badan
                                </div>
                                <div class="col-md-8">
                                    <b>
                                        {{ $d->svak_temp }} C
                                    </b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Layanan Vaksin
                                </div>
                                <div class="col-md-8">
                                    <b>
                                        {{
                                            DB::table('selec_vaksin_services')->where('vas_id', $d->svak_servak_id)
                                                ->value('vas_name')
                                        }}
                                    </b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Type Vaksin
                                </div>
                                <div class="col-md-8">
                                    <b>
                                        {{
                                            DB::table('eianc_vaksins')->where('vak_id', $d->svak_vak_id)
                                                ->join('selec_vaksins', 'selec_vaksins.va_id', '=', 'eianc_vaksins.vak_type')
                                                ->value('va_name')
                                        }}
                                    </b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Nama Vaksin
                                </div>
                                <div class="col-md-8">
                                    <b>
                                        @php
                                            $vaksin = DB::table('eianc_vaksins')->where('vak_id', $d->svak_vak_id)
                                                ->join('selec_vaksins', 'selec_vaksins.va_id', '=', 'eianc_vaksins.vak_type')
                                                ->get();

                                            echo $vaksin[0]->vak_brand . ' (' . $vaksin[0]->vak_batch .')';
                                        @endphp
                                    </b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Dosis
                                </div>
                                <div class="col-md-8">
                                    <b>
                                        {{ $d->svak_dosis }}
                                    </b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Pemjaminan
                                </div>
                                <div class="col-md-8">
                                    <b>
                                        {{ DB::table('selec_pays')->where('pay_code', $d->svak_pay)->value('pay_name') }}
                                    </b>

                                    @if ($d->svak_pay == '002')
                                        ({{ $d->svak_noka }})
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('service.symptom', Crypt::encrypt($d->svak_id)) }}">
                                <button class="btn btn-warning" title="Gejala">
                                    <i class="fab fa-searchengin"></i>
                                </button>
                            </a>
                            &nbsp;|&nbsp;
                            <form action="{{ route('service.vaksin.destroy') }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($d->svak_id) }}">
                                <input type="hidden" name="norm" value="{{ $id }}">
                                <button type="submite" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure you want to delete this data?');" {{ (DB::table('eianc_temois')->where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id') == DB::table('users')->where('id', $d->svak_user_id)->join('eianc_temois', 'eianc_temois.temoi_id', '=', 'users.temoi')->value('temoi_ins_id')) ? '' : 'disabled' }}>
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if (session()->has('print'))
<script>
    window.open("{{ route('report.rujuk', session()->get('id2')) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif
@endsection
