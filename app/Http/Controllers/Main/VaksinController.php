<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\EiancIceBoxId;
use App\Models\EiancTemoi;
use App\Models\EiancVaksin;
use App\Models\SelecVaksin;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class VaksinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancVaksin::where('vak_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
            ->orderBy('vak_id', 'DESC')
            ->get();

        return view('pages/vaksin/index', compact('data'));
    }

    public function create()
    {
        $ic = EiancIceBoxId::where('ibi_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();
        $tvak = SelecVaksin::all();

        return view('pages/vaksin/create', compact('ic', 'tvak'));
    }

    public function store(Request $request)
    {
        if ($request->vak_ib_id == '') {
            return redirect()->back()->withInput()->with('vak_ib_id', 'Options not selected');
        }

        if ($request->vak_type == '') {
            return redirect()->back()->withInput()->with('vak_type', 'Options not selected');
        }

        $this->validate($request, [
            'vak_type' => 'required',
            'vak_brand' => 'required',
            'vak_batch' => 'required',
            'vak_received_date' => 'required',
            'vak_expired_date' => 'required',
            'vak_netto' => 'required',
            'vak_unit' => 'required',
        ]);

        $temoi = EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id');

        $input = [
            'vak_ins_id' => $temoi,
            'vak_ib_id' => $request->vak_ib_id,
            'vak_type' => $request->vak_type,
            'vak_brand' => $request->vak_brand,
            'vak_batch' => $request->vak_batch,
            'vak_received_date' => $request->vak_received_date,
            'vak_expired_date' => $request->vak_expired_date,
            'vak_netto' => $request->vak_netto,
            'vak_remainder' => $request->vak_netto,
            'vak_unit' => $request->vak_unit,
            'vak_user_id' => auth()->user()->id,
        ];

        $store = EiancVaksin::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah vaksin ' . $store->vak_id
        ]);

        Alert::success('Sukses', 'Data berhasil disimpan');
        return redirect()->route('vaksin');
    }

    public function edit($id)
    {
        $data = EiancVaksin::find(Crypt::decrypt($id));
        $ic = EiancIceBoxId::where('ibi_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();
        $tvak = SelecVaksin::all();

        return view('pages/vaksin/edit', compact('ic', 'tvak', 'data'));
    }

    public function update(Request $request)
    {
        if ($request->vak_ib_id == '') {
            return redirect()->back()->withInput()->with('vak_ib_id', 'Options not selected');
        }

        if ($request->vak_type == '') {
            return redirect()->back()->withInput()->with('vak_type', 'Options not selected');
        }

        $this->validate($request, [
            'vak_type' => 'required',
            'vak_brand' => 'required',
            'vak_batch' => 'required',
            'vak_received_date' => 'required',
            'vak_expired_date' => 'required',
            'vak_netto' => 'required',
        ]);

        $temoi = EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id');

        $input = [
            'vak_ins_id' => $temoi,
            'vak_ib_id' => $request->vak_ib_id,
            'vak_type' => $request->vak_type,
            'vak_brand' => $request->vak_brand,
            'vak_batch' => $request->vak_batch,
            'vak_received_date' => $request->vak_received_date,
            'vak_expired_date' => $request->vak_expired_date,
            'vak_netto' => $request->vak_netto,
            'vak_remainder' => $request->vak_netto,
        ];

        EiancVaksin::where('vak_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Update vaksin ' . $request->id
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('vaksin');
    }

    public function destroy(Request $request)
    {
        $find = EiancVaksin::find(Crypt::decrypt($request->id));
        $find->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus vaksin ' . Crypt::decrypt($request->id)
        ]);

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
