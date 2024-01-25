@extends('layouts.main')

@section('content-headers')
<div class="col-sm-6">
    <a href="{{ route('userrole') }}">
        <button class="btn btn-success">
            <i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Kembali
        </button>
    </a>
</div>
<div class="col-sm-6 text-right">
    <h1>Tambah Hak Akses</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <form action="{{ route('userrole.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_role_code">Kode Hak Akses</label>
                        <input type="text" name="user_role_code" id="user_role_code" class="form-control" value="{{ old('user_role_code') }}">
                        @if ($errors->has('user_role_code'))
                        <div class="text-danger">
                            {{ $errors->first('user_role_code') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user_role_name">Nama Hak Akses</label>
                        <input type="text" name="user_role_name" id="user_role_name" class="form-control" value="{{ old('user_role_name') }}">
                        @if ($errors->has('user_role_name'))
                        <div class="text-danger">
                            {{ $errors->first('user_role_name') }}
                        </div>
                        @endif
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
