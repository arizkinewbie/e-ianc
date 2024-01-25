@extends('layouts.main')

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
    $(document).ready(function () {
        $('.showpass').click(function () {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
</script>
@endsection

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('user') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah User</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <form action="{{ route('user.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="temoi">TeMOI</label>
                                <select name="temoi" id="temoi" class="form-control select2">
                                    <option value="x">-- PILIH TEMOI --</option>
                                    @foreach ($temoi as $te)
                                        <option value="{{ $te->temoi_id }}" {{ (old('temoi') == $te->temoi_id) ? 'selected' : '' }}>{{ $te->nakes_name . ' - ' . $te->ins_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('temoi'))
                                <div class="text-danger">
                                    {{ session()->get('temoi') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="role">Hak Akses</label>
                                <select name="role" id="role" class="form-control select2">
                                    <option value="x">-- PILIH HAK AKSES --</option>
                                    @foreach ($role as $r)
                                    <option value="{{ $r->user_role_code }}" {{ (old('role') == $r->user_role_code) ? 'selected' : '' }}>{{ $r->user_role_name }}</option>
                                    @endforeach
                                </select>
                                @if(session()->has('role'))
                                <div class="text-danger">
                                    {{ session()->get('role') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control text-right" placeholder="Email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            @eianc.id
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Type password">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="showpass" class="showpass">
                                    <label for="showpass">
                                        Show Password
                                    </label>
                                </div>
                                @if ($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
