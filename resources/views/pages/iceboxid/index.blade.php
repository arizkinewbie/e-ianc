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
    <a href="{{ route('icebox') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Kulkas</h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <form action="{{ route('iceboxid.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="ibi_brand">Kulkas Merk</label>
                        <input type="text" name="ibi_brand" id="ibi_brand" class="form-control"
                            value="{{ old('ibi_brand') }}">
                        @if ($errors->has('ibi_brand'))
                        <div class="text-danger">
                            {{ $errors->first('ibi_brand') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ibi_series">Kulkas Seri</label>
                        <input type="text" name="ibi_series" id="ibi_series" class="form-control"
                            value="{{ old('ibi_series') }}">
                        @if ($errors->has('ibi_series'))
                        <div class="text-danger">
                            {{ $errors->first('ibi_series') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ibi_source">Kulkas Sumber Pengadaan</label>
                        <input type="text" name="ibi_source" id="ibi_source" class="form-control"
                            value="{{ old('ibi_source') }}">
                        @if ($errors->has('ibi_source'))
                        <div class="text-danger">
                            {{ $errors->first('ibi_source') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ibi_source_year">Kulkas Tahun Pengadaan</label>
                        <input type="text" name="ibi_source_year" id="ibi_source_year" class="form-control"
                            value="{{ old('ibi_source_year') }}">
                        @if ($errors->has('ibi_source_year'))
                        <div class="text-danger">
                            {{ $errors->first('ibi_source_year') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
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
                                <td style="text-align: right;">{{ $loop->iteration }}</td>
                                <td>
                                    <b>{{ $d->ibi_brand }}</b> ({{ $d->ibi_series }})
                                    <br>
                                    {{ $d->ibi_source }} - {{ $d->ibi_source_year }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('iceboxid.edit', Crypt::encrypt($d->ibi_id)) }}">
                                        <button class="btn btn-sm btn-warning" title="edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    &nbsp;|&nbsp;
                                    <form action="{{ route('iceboxid.destroy') }}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Crypt::encrypt($d->ibi_id) }}">
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
    </div>
</div>
@endsection
