<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\EiancDrug;
use App\Models\EiancTemoi;
use App\Models\SelecUnit;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class DrugController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancDrug::where('dg_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();

        return view('pages/drug/index', compact('data'));
    }

    public function create()
    {
        $unit = SelecUnit::where('u_status', '1')->get();

        return view('pages/drug/create', compact('unit'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'dg_brand' => 'required',
            'dg_batch' => 'required',
            'dg_netto' => 'required',
            'dg_received_date' => 'required',
            'dg_expired_date' => 'required',
        ]);

        if ($request->dg_unit == '') {
            return redirect()->back()->withInput()->with('dg_unit', 'Options not selected');
        }

        $input = [
            'dg_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
            'dg_code' => $request->dg_code,
            'dg_brand' => $request->dg_brand,
            'dg_batch' => $request->dg_batch,
            'dg_netto' => $request->dg_netto,
            'dg_unit' => $request->dg_unit,
            'dg_received_date' => $request->dg_received_date,
            'dg_expired_date' => $request->dg_expired_date,
            'dg_remainder' => $request->dg_netto,
            'dg_price' => ($request->dg_price != '') ? $request->dg_price : 0,
            'dg_sell' => ($request->dg_sell != '') ? $request->dg_sell : 0,
            'dg_user_id' => auth()->user()->id
        ];

        $store = EiancDrug::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah Obat ' . $store->dg_id . '-' . $request->dg_brand
        ]);

        Alert::success('Sukses', 'Data berhasil disimpan');
        return redirect()->route('drug');
    }

    public function edit($id)
    {
        $data = EiancDrug::find(Crypt::decrypt($id));
        $unit = SelecUnit::where('u_status', '1')->get();

        return view('pages/drug/edit', compact('data', 'unit'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'dg_brand' => 'required',
            'dg_batch' => 'required',
            'dg_netto' => 'required',
            'dg_received_date' => 'required',
            'dg_expired_date' => 'required',
        ]);

        if ($request->dg_unit == '') {
            return redirect()->back()->withInput()->with('dg_unit', 'Options not selected');
        }

        $input = [
            'dg_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
            'dg_code' => $request->dg_code,
            'dg_brand' => $request->dg_brand,
            'dg_batch' => $request->dg_batch,
            'dg_netto' => $request->dg_netto,
            'dg_unit' => $request->dg_unit,
            'dg_received_date' => $request->dg_received_date,
            'dg_expired_date' => $request->dg_expired_date,
            'dg_remainder' => $request->dg_netto,
            'dg_price' => ($request->dg_price != '') ? $request->dg_price : 0,
            'dg_sell' => ($request->dg_sell != '') ? $request->dg_sell : 0,
        ];

        EiancDrug::where('dg_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah Obat ' . $request->id . '-' . $request->dg_brand
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('drug');
    }

    public function destroy(Request $request)
    {
        $find = EiancDrug::find(Crypt::decrypt($request->id));
        $find->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus Obat ' . Crypt::decrypt($request->id)
        ]);

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect()->route('drug');
    }
}
