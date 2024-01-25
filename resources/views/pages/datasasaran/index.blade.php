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
    <h1>Data Sasaran</h1>
</div>
<div class="col-sm-6 text-right">
    <a href="{{ route('datasasaran.create') }}">
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
                    <th style="text-align: center;">Detail</th>
                    <th style="width: 20%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="text-right">{{ $loop->iteration }}</td>
                        <td>
                            {{ $d->ds_year }} -
                            <b>
                                @if ($d->ds_month == '1')
                                    Januari
                                @elseif ($d->ds_month == '2')
                                    Februari
                                @elseif ($d->ds_month == '3')
                                    Maret
                                @elseif ($d->ds_month == '4')
                                    April
                                @elseif ($d->ds_month == '5')
                                    Mei
                                @elseif ($d->ds_month == '6')
                                    Juni
                                @elseif ($d->ds_month == '7')
                                    Juli
                                @elseif ($d->ds_month == '8')
                                    Agustus
                                @elseif ($d->ds_month == '9')
                                    September
                                @elseif ($d->ds_month == '10')
                                    Oktober
                                @elseif ($d->ds_month == '2')
                                    Novembe
                                @else
                                    Desember
                                @endif
                            </b>
                             -
                            @php
                                if (auth()->user()->role == 2) {
                                    echo DB::table('sys_alamats')->where('kode', $d->ds_destination)->value('nama');
                                }else{
                                    echo "RW ".$d->ds_destination;
                                }
                            @endphp
                        </td>
                        <td class="text-center">
                            <a href="{{ route('datasasaran.edit', Crypt::encrypt($d->ds_id)) }}">
                                <button class="btn btn-sm btn-warning" title="edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            @if (auth()->user()->role == 0 || auth()->user()->role == 2 || auth()->user()->role == 3)
                            &nbsp;|&nbsp;
                            <form action="{{ route('datasasaran.destroy') }}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($d->ds_id) }}">
                                <button type="submite" class="btn btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure you want to delete this data?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
