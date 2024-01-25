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

<script>
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("thumb").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };

</script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><b>Identitas Nakes dan Akses</b></h5>
            </div>
            <form action="{{ route('profile.store') }}" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="id1" value="{{ $user[0]->nakes_id }}">
                <input type="hidden" name="id2" value="{{ $user[0]->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ (old('nama')) ? old('nama') : $user[0]->nakes_name }}">
                                @if ($errors->has('nama'))
                                    <div class="text-danger">
                                        {{ $errors->first('nama') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nip">NIP</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="nip" id="nip" class="form-control" value="{{ (old('nip')) ? old('nip') : $user[0]->nakes_nip }}">
                                @if ($errors->has('nip'))
                                    <div class="text-danger">
                                        {{ $errors->first('nip') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sip">SIP/SIPB</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="sip" id="sip" class="form-control" value="{{ (old('sip')) ? old('sip') : $user[0]->nakes_sip }}">
                                @if ($errors->has('sip'))
                                    <div class="text-danger">
                                        {{ $errors->first('sip') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="sipdate">Masa Berlaku SIP</label>
                            </div>
                            <div class="col-md-8">
                                <input type="date" name="sipdate" id="sipdate" class="form-control" value="{{ (old('sipdate')) ? old('sipdate') : $user[0]->nakes_sip_date }}">
                                @if ($errors->has('sipdate'))
                                    <div class="text-danger">
                                        {{ $errors->first('sipdate') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="telp">No Telp/Whatsapp</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="telp" id="telp" class="form-control" value="{{ (old('telp')) ? old('telp') : $user[0]->nakes_telp }}">
                                @if ($errors->has('telp'))
                                    <div class="text-danger">
                                        {{ $errors->first('telp') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">email</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" value="{{ $user[0]->email }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="password">New Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password" id="password" class="form-control" value="{{ (old('password')) ? old('password') : '' }}">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="showpass" class="showpass">
                                    <label for="showpass">
                                        Show Password
                                    </label>
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
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><b>Identitas Instansi</b></h5>
            </div>
            <form action="{{ route('profile.store1') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $ins[0]->ins_id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ins_name">Nama Instansi</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ins_name" id="ins_name" class="form-control" value="{{ (old('ins_name')) ? old('ins_name') : $ins[0]->ins_name }}">
                                @if ($errors->has('ins_name'))
                                    <div class="text-danger">
                                        {{ $errors->first('ins_name') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ins_code">Nomor Faskes/Ijin Praktik PMB</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ins_code" id="ins_code" class="form-control" value="{{ (old('ins_code')) ? old('ins_code') : $ins[0]->ins_code }}">
                                @if ($errors->has('ins_code'))
                                    <div class="text-danger">
                                        {{ $errors->first('ins_code') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ins_telp">Telp Instansi</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="ins_telp" id="ins_telp" class="form-control" value="{{ (old('ins_telp')) ? old('ins_telp') : $ins[0]->ins_telp }}">
                                @if ($errors->has('ins_telp'))
                                    <div class="text-danger">
                                        {{ $errors->first('ins_telp') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ins_BPJS">Pelayanan BPJS</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="ins_bpjs" name="ins_bpjs" {{ (old('ins_bpjs') == '1') ? 'checked' : (($ins[0]->ins_bpjs == '1') ? 'checked' : '') }}>
                                    <label class="form-check-label" for="ins_bpjs">
                                        *) Centang Jika Iya
                                    </label>
                                </div>
                                @if ($errors->has('ins_bpjs'))
                                <div class="text-danger">
                                    {{ $errors->first('ins_bpjs') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="text-center">
                                    <img src="{{ asset('data/image/instansi/'. $ins[0]->ins_thumb) }}" id="image-preview" height="256">
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="thumb" class="custom-file-input" id="thumb" onchange="previewImage();">
                                    <input type="hidden" name="old_thumb" value="{{ $ins[0]->ins_thumb }}">
                                    <label class="custom-file-label" for="thumb">Choose file</label>
                                    @if ($errors->has('thumb'))
                                    <div class="text-danger">
                                        {{ $errors->first('thumb') }}
                                    </div>
                                    @endif
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
    </div>
</div>
@endsection
