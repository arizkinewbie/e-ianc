<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancNakes;
use App\Models\EiancTemoi;
use App\Models\SysAlamat;
use App\Models\SysLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class TemoiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancTemoi::join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        return view('pages/temoi/index', compact('data'));
    }

    public function create()
    {
        $province = SysAlamat::whereRaw('CHAR_LENGTH(kode) = 2')
            ->orderBy('kode', 'ASC')
            ->get();

        $nakes = EiancNakes::where('nakes_status', '1')->get();

        return view('pages/temoi/create', compact('province', 'nakes'));
    }

    public function store(Request $request)
    {
        if ($request->temoi_ins_id == '') {
            return redirect()->back()->withInput()->with('temoi_ins_id', 'Options not selected');
        }

        if ($request->temoi_nakes_id == 'x') {
            return redirect()->back()->withInput()->with('temoi_nakes_id', 'Options not selected');
        }

        $input = [
            'temoi_ins_id' => $request->temoi_ins_id,
            'temoi_nakes_id' => $request->temoi_nakes_id,
            'temoi_user_id' => auth()->user()->id,
            'temoi_status' => '1'
        ];

        $store = EiancTemoi::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah temoi ' . $store->temoi_id . '-' . $request->temoi_ins_id . '-' . $request->temoi_nakes_id
        ]);

        Alert::success('Sukses', 'Oke, Data sudah tersimpan');
        return redirect()->route('temoi');
    }

    public function edit($id)
    {
        $data = EiancTemoi::where('temoi_id', Crypt::decrypt($id))
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $province = SysAlamat::whereRaw('CHAR_LENGTH(kode) = 2')
            ->orderBy('kode', 'ASC')
            ->get();

        $nakes = EiancNakes::where('nakes_status', '1')->get();

        return view('pages/temoi/edit', compact('data', 'province', 'nakes'));
    }

    public function update(Request $request)
    {
        if ($request->temoi_ins_id == '') {
            return redirect()->back()->withInput()->with('temoi_ins_id', 'Options not selected');
        }

        if ($request->temoi_nakes_id == 'x') {
            return redirect()->back()->withInput()->with('temoi_nakes_id', 'Options not selected');
        }

        $input = [
            'temoi_ins_id' => $request->temoi_ins_id,
            'temoi_nakes_id' => $request->temoi_nakes_id,
            'temoi_status' => $request->temoi_status
        ];

        if ($request->temoi_status == '2') {
            $userid = User::where('temoi', $request->id)->value('id');
            User::where('id', $userid)->update(['status' => '2']);
        }

        if ($request->temoi_status == '1') {
            $userid = User::where('temoi', $request->id)->value('id');
            User::where('id', $userid)->update(['status' => '1']);
        }

        EiancTemoi::where('temoi_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah temoi ' . $request->id . '-' . $request->temoi_ins_id . '-' . $request->temoi_nakes_id
        ]);

        Alert::success('Sukses', 'Oke, Data sudah diubah');
        return redirect()->route('temoi');
    }

    public function destroy(Request $request)
    {
        $find = User::where('temoi', Crypt::decrypt($request->id))->get();

        if (count($find) > 0) {
            Alert::error('Gagal', 'Data masih digunakan pada TEMOI');
            return redirect()->back();
        } else {
            $data = EiancTemoi::find(Crypt::decrypt($request->id));

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'delete temoi ' . Crypt::decrypt($request->id)
            ]);

            $data->delete();

            Alert::success('Sukses', 'Oke, Data sudah dihapus');
            return redirect()->back();
        }
    }
}
