<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancKb;
use App\Models\EiancTemoi;
use App\Models\SelecKbTool;
use App\Models\SelecUnit;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class KBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancKb::where('kb_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();

        return view('pages/kb/index', compact('data'));
    }

    public function create()
    {
        $type = SelecKbTool::all();
        $unit = SelecUnit::all();

        return view('pages/kb/create', compact('type', 'unit'));
    }

    public function store(Request $request)
    {
        if ($request->kb_kbt_id == '') {
            return redirect()->back()->withInput()->with('kb_kbt_id', 'Options not selected');
        }

        $this->validate($request, [
            'kb_brand' => 'required',
            'kb_batch' => 'required',
            'kb_netto' => 'required',
            'kb_received_date' => 'required',
            'kb_expired_date' => 'required',
        ]);

        if ($request->kb_unit == '') {
            return redirect()->back()->withInput()->with('kb_unit', 'Options not selected');
        }

        $address = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $input = [
            'kb_ins_id' => $address[0]->ins_id,
            'kb_kbt_id' => $request->kb_kbt_id,
            'kb_brand' => $request->kb_brand,
            'kb_batch' => $request->kb_batch,
            'kb_netto' => $request->kb_netto,
            'kb_unit' => $request->kb_unit,
            'kb_received_date' => $request->kb_received_date,
            'kb_expired_date' => $request->kb_expired_date,
            'kb_remainder' => $request->kb_netto,
            'kb_user_id' => auth()->user()->id,
        ];

        $store = EiancKb::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah alat kb ' . $store->kb_id . '-' . $request->kb_brand . '-' . $request->kb_batch
        ]);

        Alert::success('Sukses', 'Data berhasil disimpan');
        return redirect()->route('kb');
    }

    public function edit($id)
    {
        $data = EiancKb::find(Crypt::decrypt($id));
        $type = SelecKbTool::all();
        $unit = SelecUnit::all();

        return view('pages/kb/edit', compact('type', 'data', 'unit'));
    }

    public function update(Request $request)
    {
        if ($request->kb_kbt_id == '') {
            return redirect()->back()->withInput()->with('kb_kbt_id', 'Options not selected');
        }

        $this->validate($request, [
            'kb_brand' => 'required',
            'kb_batch' => 'required',
            'kb_netto' => 'required',
            'kb_received_date' => 'required',
            'kb_expired_date' => 'required',
        ]);

        if ($request->kb_unit == '') {
            return redirect()->back()->withInput()->with('kb_unit', 'Options not selected');
        }

        $address = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $input = [
            'kb_ins_id' => $address[0]->ins_id,
            'kb_kbt_id' => $request->kb_kbt_id,
            'kb_brand' => $request->kb_brand,
            'kb_batch' => $request->kb_batch,
            'kb_netto' => $request->kb_netto,
            'kb_unit' => $request->kb_unit,
            'kb_received_date' => $request->kb_received_date,
            'kb_expired_date' => $request->kb_expired_date,
            'kb_remainder' => $request->kb_netto
        ];

        EiancKb::where('kb_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah alat kb ' . $request->id . ' pada ' . $request->kb_brand . '-' . $request->kb_batch
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('kb');
    }

    public function destroy(Request $request)
    {
        $find = EiancKb::find(Crypt::decrypt($request->id));
        $find->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus alat kb ' . Crypt::decrypt($request->id)
        ]);

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect()->route('kb');
    }
}
