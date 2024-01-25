@extends('layouts/main')

@section('content-headers')
<div class="col-sm-6">
    <h1>Laporan LB3</h1>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>
                    <b>LB3 PKM Kelurahan</b>
                </h5>
            </div>
            <form action="{{ route('report.ceklb3') }}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="month">Bulan</label>
                        <select name="month" id="month" class="form-control select2">
                            <option value="x">-- PILIH BULAN --</option>
                            @foreach ($month as $mon)
                                <option value="{{ $mon->mon_id }}" {{ (old('month') == $mon->mon_id) ? 'selected' : '' }}>{{ $mon->mon_name }}</option>
                            @endforeach
                        </select>
                        @if(session()->has('month'))
                            <div class="text-danger">
                                {{ session()->get('month') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="year">Tahun</label>
                        <select name="year" id="year" class="form-control select2">
                            <option value="x">-- PILIH TAHUN --</option>
                            @for ($i = 0; $i < 100; $i++)
                                <option value="{{ date('Y', strtotime("2021")) + $i }}" {{ ((date('Y', strtotime("2021")) + $i) == old('year')) ? 'selected' : '' }}>{{ date('Y', strtotime("2021")) + $i }}</option>
                            @endfor
                        </select>
                        @if(session()->has('year'))
                            <div class="text-danger">
                                {{ session()->get('year') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>
    @if (auth()->user()->role == 0 || auth()->user()->role == 3)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>
                        <b>LB3 PMB</b>
                    </h5>
                </div>
                <form action="{{ route('report.ceklb3rw') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="month">Bulan</label>
                            <select name="month" id="month" class="form-control select2">
                                <option value="x">-- PILIH BULAN --</option>
                                @foreach ($month as $mon)
                                    <option value="{{ $mon->mon_id }}" {{ (old('month') == $mon->mon_id) ? 'selected' : '' }}>{{ $mon->mon_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('month'))
                                <div class="text-danger">
                                    {{ session()->get('month') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="form-control select2">
                                <option value="x">-- PILIH TAHUN --</option>
                                @for ($i = 0; $i < 100; $i++)
                                    <option value="{{ date('Y', strtotime("2021")) + $i }}" {{ ((date('Y', strtotime("2021")) + $i) == old('year')) ? 'selected' : '' }}>{{ date('Y', strtotime("2021")) + $i }}</option>
                                @endfor
                            </select>
                            @if(session()->has('year'))
                                <div class="text-danger">
                                    {{ session()->get('year') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    @if (auth()->user()->role == 0 || auth()->user()->role == 2)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>
                        <b>LB3 PKM KECAMATAN</b>
                    </h5>
                </div>
                <form action="{{ route('report.ceklb3sub') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="month">Bulan</label>
                            <select name="month" id="month" class="form-control select2">
                                <option value="x">-- PILIH BULAN --</option>
                                @foreach ($month as $mon)
                                    <option value="{{ $mon->mon_id }}" {{ (old('month') == $mon->mon_id) ? 'selected' : '' }}>{{ $mon->mon_name }}</option>
                                @endforeach
                            </select>
                            @if(session()->has('month'))
                                <div class="text-danger">
                                    {{ session()->get('month') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="year">Tahun</label>
                            <select name="year" id="year" class="form-control select2">
                                <option value="x">-- PILIH TAHUN --</option>
                                @for ($i = 0; $i < 100; $i++)
                                    <option value="{{ date('Y', strtotime("2021")) + $i }}" {{ ((date('Y', strtotime("2021")) + $i) == old('year')) ? 'selected' : '' }}>{{ date('Y', strtotime("2021")) + $i }}</option>
                                @endfor
                            </select>
                            @if(session()->has('year'))
                                <div class="text-danger">
                                    {{ session()->get('year') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

@if (session()->has('print'))
<script>
    window.open("{{ route('report.viewlb3', ['month' => session()->get('rmonth'), 'year' => session()->get('ryear')]) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif

@if (session()->has('print1'))
<script>
    window.open("{{ route('report.viewlb3rw', ['month' => session()->get('rmonth'), 'year' => session()->get('ryear')]) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif

@if (session()->has('print2'))
<script>
    window.open("{{ route('report.viewlb3sub', ['month' => session()->get('rmonth'), 'year' => session()->get('ryear')]) }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=100,width=1270,height=720");
</script>
@endif

@endsection
