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

<script>
    function validat() {
        var month = document.forms["formreg"]["month"];
        var year = document.forms["formreg"]["year"];

        if (month.selectedIndex < 1) {
            alert("Bulan belum dipilih.");
            month.focus();
            return false;
        }

        if (year.selectedIndex < 1) {
            alert("Tahun belum dipilih.");
            year.focus();
            return false;
        }

        return true;
    }

</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <h1>Bayi Dan Balita</h1>
</div>
<div class="col-sm-6 text-right">
    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-print"></i>  Laporan</button>  |
    <a href="{{ route('baby.create') }}">
        <button class="btn btn-success">
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
                    <th style="width: 20%; text-align: center;">Bulan</th>
                    <th style="text-align: center;">Detail</th>
                    <th style="width: 20%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="text-right">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            {{ $d->detb_year }} - {{ DB::table('selec_months')->where('mon_id', $d->detb_month)->value('mon_name') }}
                        </td>
                        <td></td>
                        <td class="text-center">
                            <a href="{{ route('baby.edit', Crypt::encrypt($d->detb_id)) }}">
                                <button class="btn btn-sm btn-warning" title="edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            &nbsp;|&nbsp;
                            <form action="{{ route('baby.destroy') }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($d->detb_id) }}">
                                <button type="submite" class="btn btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure you want to delete this data?');">
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('baby.cek') }}" name="formreg" method="post" autocomplete="off" onsubmit="return validat();">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="month">Bulan</label>
                            <select name="month" id="month" class="form-control select2">
                                <option value="x" disabled selected>-- PILIH BULAN --</option>
                                @foreach ($month as $mon)
                                <option value="{{ $mon->mon_id }}"
                                    {{ (old('month') == $mon->mon_id) ? 'selected' : '' }}>{{ $mon->mon_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="form-control select2">
                                <option value="x">-- PILIH TAHUN --</option>
                                @for ($i = 0; $i < 100; $i++) <option value="{{ date('Y', strtotime("2021")) + $i }}"
                                    {{ ((date('Y', strtotime("2021")) + $i) == old('year')) ? 'selected' : '' }}>
                                    {{ date('Y', strtotime("2021")) + $i }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session()->has('print'))
<script>
    window.open("{{ route('baby.report', ['month' => session()->get('rmonth'), 'year' => session()->get('ryear')]) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif
@endsection
