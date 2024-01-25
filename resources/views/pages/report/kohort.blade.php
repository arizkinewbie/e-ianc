@extends('layouts/main')

@section('content-headers')
<div class="col-sm-6">
    <h1>Kohort</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    @if (auth()->user()->role == 0 || auth()->user()->role == 4)
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <b>Kohort Instansi</b>
            </div>
            <form action="{{ route('report.cekkohort') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="awal">Tanggal Awal</label>
                        <input type="date" name="awal" id="awal" class="form-control text-center" value="{{ old('awal') }}">
                        @if ($errors->has('awal'))
                        <div class="text-danger">
                            {{ $errors->first('awal') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="akhir">Tanggal Akhir</label>
                        <input type="date" name="akhir" id="akhir" class="form-control text-center" value="{{ old('akhir') }}">
                        @if ($errors->has('akhir'))
                        <div class="text-danger">
                            {{ $errors->first('akhir') }}
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
    @endif

    @if (auth()->user()->role == 0 || auth()->user()->role == 3)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <b>Kohort Kelurahan/Desa</b>
                </div>
                <form action="{{ route('report.cekkohortkel') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="awal">Tanggal Awal</label>
                            <input type="date" name="awal" id="awal" class="form-control text-center" value="{{ old('awal') }}">
                            @if ($errors->has('awal'))
                            <div class="text-danger">
                                {{ $errors->first('awal') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="akhir">Tanggal Akhir</label>
                            <input type="date" name="akhir" id="akhir" class="form-control text-center" value="{{ old('akhir') }}">
                            @if ($errors->has('akhir'))
                            <div class="text-danger">
                                {{ $errors->first('akhir') }}
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
    @endif
</div>

@if (session()->has('print'))
<script>
    window.open("{{ route('report.viewkohort', ['awal' => session()->get('awal'), 'akhir' => session()->get('akhir')]) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif
@if (session()->has('print1'))
<script>
    window.open("{{ route('report.viewkohortkel', ['awal' => session()->get('awal'), 'akhir' => session()->get('akhir')]) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif
@endsection
