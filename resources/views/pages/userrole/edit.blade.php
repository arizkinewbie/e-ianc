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
    <h1>Edit Hak Akses</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <form action="{{ route('userrole.update') }}" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="id" value="{{ $data->user_role_id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="user_role_code">Kode Hak Akses</label>
                        <input type="text" name="user_role_code" id="user_role_code" class="form-control" value="{{ (old('user_role_code')) ? old('user_role_code') : $data->user_role_code }}">
                        @if ($errors->has('user_role_code'))
                        <div class="text-danger">
                            {{ $errors->first('user_role_code') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user_role_name">Nama Hak Akses</label>
                        <input type="text" name="user_role_name" id="user_role_name" class="form-control" value="{{ (old('user_role_name')) ? old('user_role_name') : $data->user_role_name }}">
                        @if ($errors->has('user_role_name'))
                        <div class="text-danger">
                            {{ $errors->first('user_role_name') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user_role_status">Status</label>
                        <select name="user_role_status" id="user_role_status" class="form-control">
                            <option value="0" {{ ($data->user_role_status == '0') ? 'selected' : '' }}>Blocked</option>
                            <option value="1" {{ ($data->user_role_status == '1') ? 'selected' : '' }}>Active</option>
                        </select>
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
