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
    $('#search').on('keyup', function() {
        let str = $(this).val();
        const exp = str.split(",");

        console.log(exp);

        $.ajax({
            type : 'get',
            url : '{{ route("patient.search") }}',
            data : {
                'norm' : exp[0],
                'nama' : exp[1],
                'alamat' : exp[2]
            },
            beforeSend: function () {
                $('#loader').show();
            },
            success : function(data) {
                $('tbody').html(data);
            },
            complete : function () {
                $('#loader').hide();
            },
        })
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    function reload() {
        window.location.reload();
    }
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <h1>KIA</h1>
</div>
<div class="col-sm-6 text-right">
    <a href="{{ route('patient.create') }}">
        <button class="btn btn-success">
            <i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Tambah
        </button>
    </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control text-center" autocomplete="false" autofocus value=",">
                <div class="bagde badge-success text-center">
                    <code style="color: white">Masukkan NORM,Nama,Alamat</code>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div class="text-center" id="loader" style="display: none;">
            <img src="{{ asset('data/image/about/loading.gif') }}" alt="" width="32"> Pencarian...
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10%; text-align: center;">NORM</th>
                    <th>NAMA</th>
                    <th style="width: 20%; text-align: center;">ACTION</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection
