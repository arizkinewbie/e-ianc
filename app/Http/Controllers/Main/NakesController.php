<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancNakes;
use App\Models\EiancTemoi;
use App\Models\SysAlamat;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class NakesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancNakes::orderBy('nakes_id', 'DESC')->get();

        return view('pages/nakes/index', compact('data'));
    }

    public function create()
    {
        $province = SysAlamat::whereRaw('CHAR_LENGTH(kode) = 2')
            ->orderBy('kode', 'ASC')
            ->get();

        return view('pages/nakes/create', compact('province'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nakes_name' => 'required',
            'nakes_nip' => 'required',
            'nakes_sip' => 'required',
            'nakes_sip_date' => 'required',
            'nakes_telp' => 'required',
        ]);

        if ($request->nakes_village == '') {
            return redirect()->back()->withInput()->with('nakes_village', 'Options not selected');
        }
        
        if ($request->nakes_rw == '') {
                return redirect()->back()->withInput()->with('nakes_rw', 'Options not selected');
            }

            if ($request->nakes_rt == '') {
                return redirect()->back()->withInput()->with('nakes_rt', 'Options not selected');
            }

        $input = $request->except('_token');
        $input['nakes_status'] = '1';

        $store = EiancNakes::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah tenaga kesehatan ' . $store->nakes_id . '-' . $request->nakes_name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah tersimpan');
        return redirect()->route('nakes');
    }

    public function edit($id)
    {
        $data = EiancNakes::findOrfail(Crypt::decrypt($id));
        $province = SysAlamat::whereRaw('CHAR_LENGTH(kode) = 2')
            ->orderBy('kode', 'ASC')
            ->get();

        return view('pages/nakes/edit', compact('data', 'province'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nakes_name' => 'required',
            'nakes_nip' => 'required',
            'nakes_sip' => 'required',
            'nakes_sip_date' => 'required',
            'nakes_telp' => 'required',
        ]);

        if ($request->nakes_village == '') {
            return redirect()->back()->withInput()->with('nakes_village', 'Options not selected');
        }
        
        if ($request->nakes_rw == '') {
                return redirect()->back()->withInput()->with('nakes_rw', 'Options not selected');
            }

            if ($request->nakes_rt == '') {
                return redirect()->back()->withInput()->with('nakes_rt', 'Options not selected');
            }

        $input = $request->except('_token', 'id');
        EiancNakes::where('nakes_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Update tenaga kesehatan ' . $request->id . '-' . $request->nakes_name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah diubah');
        return redirect()->route('nakes');
    }

    public function destroy(Request $request)
    {
        $find0 = EiancTemoi::where('temoi_nakes_id', Crypt::decrypt($request->id))->get();
        $find1 = EiancTemoi::where('temoi_nakes_id', Crypt::decrypt($request->id))
            ->join('users', 'users.temoi', '=', 'eianc_temois.temoi_id')
            ->get();

        if (count($find0) > 0) {
            Alert::error('Gagal', 'Data masih digunakan pada TEMOI');
            return redirect()->back();
        } else {
            if (count($find1) > 0) {
                Alert::error('Gagal', 'Data masih digunakan pada user akses');
                return redirect()->back();
            } else {
                $data = EiancNakes::find(Crypt::decrypt($request->id));

                SysLog::create([
                    'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                    'log_browser' => get_client_browser(),
                    'log_os' => $_SERVER['HTTP_USER_AGENT'],
                    'log_user_id' => auth()->user()->id,
                    'log_action' => 'delete nakes ' . Crypt::decrypt($request->id) . '-' . $data->nakes_name
                ]);

                $data->delete();

                Alert::success('Sukses', 'Oke, Data sudah dihapus');
                return redirect()->back();
            }
        }
    }
}
