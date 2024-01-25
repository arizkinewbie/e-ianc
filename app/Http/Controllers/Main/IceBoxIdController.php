<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancIceBoxId;
use App\Models\EiancTemoi;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class IceBoxIdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancIceBoxId::where('ibi_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();

        return view('pages/iceboxid/index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ibi_brand' => 'required',
            'ibi_series' => 'required',
            'ibi_source' => 'required',
            'ibi_source_year' => 'required',
        ]);

        $input = $request->except('_token');
        $input['ibi_ins_id'] = EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id');
        $input['ibi_user_id'] = auth()->user()->id;

        $store = EiancIceBoxId::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah device kulkas ' . $store->ibi_id
        ]);

        Alert::success('Sukses', 'Data berhasil disimpan');
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = EiancIceBoxId::find(Crypt::decrypt($id));

        return view('pages/iceboxid/edit', compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'ibi_brand' => 'required',
            'ibi_series' => 'required',
            'ibi_source' => 'required',
            'ibi_source_year' => 'required'
        ]);

        EiancIceBoxId::where('ibi_id', $request->id)->update($request->except('_token', 'id'));

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'ubah device kulkas ' . $request->id
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('iceboxid');
    }

    public function destroy(Request $request)
    {
        $data = EiancIceBoxId::find(Crypt::decrypt($request->id));
        $data->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'hapus device kulkas ' . Crypt::decrypt($request->id)
        ]);

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect()->back();
    }
}
