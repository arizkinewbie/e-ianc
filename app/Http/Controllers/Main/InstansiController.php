<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancInstansi;
use App\Models\EiancTemoi;
use App\Models\SelecTypeInst;
use App\Models\SysAlamat;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class InstansiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancInstansi::orderBy('ins_id', 'DESC')->get();

        return view('pages/instansi/index', compact('data'));
    }

    public function create()
    {
        $type = SelecTypeInst::all();
        $province = SysAlamat::whereRaw('CHAR_LENGTH(kode) = 2')
            ->orderBy('kode', 'ASC')
            ->get();

        return view('pages/instansi/create', compact('province', 'type'));
    }

    public function store(Request $request)
    {
        if ($request->ins_type == '') {
            return redirect()->back()->withInput()->with('ins_type', 'Options not selected');
        }

        $this->validate($request, [
            'ins_name' => 'required',
            'ins_telp' => 'required',
            'ins_address' => 'required',
            'ins_code' => 'required',
            'thumb' => (isset($request->thumb)) ? 'max:1024' : ''
        ]);

        if ($request->ins_village == '') {
            return redirect()->back()->withInput()->with('ins_village', 'Options not selected');
        }
        
        if ($request->ins_rw == '') {
            return redirect()->back()->withInput()->with('ins_rw', 'Options not selected');
        }

        if ($request->ins_rt == '') {
            return redirect()->back()->withInput()->with('ins_rt', 'Options not selected');
        }

        if (isset($request->thumb)) {
            $image = $request->file('thumb');
            $img = time() . "." . $image->getClientOriginalExtension();
            $image->move("data/image/instansi", $img);
        }

        $input = $request->except('_token');
        $input['ins_thumb'] = (isset($request->thumb)) ? $img : 'icon.jpg';
        $input['ins_status'] = '1';
        $input['ins_bpjs'] = ($request->ins_bpjs == null) ? '0' : '1';

        $store = EiancInstansi::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah instansi ' . $store->ins_id . '-' . $request->ins_name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah tersimpan');
        return redirect()->route('instansi');
    }

    public function edit($id)
    {
        $type = SelecTypeInst::all();
        $data = EiancInstansi::findOrfail(Crypt::decrypt($id));
        $province = SysAlamat::whereRaw('CHAR_LENGTH(kode) = 2')
            ->orderBy('kode', 'ASC')
            ->get();

        return view('pages/instansi/edit', compact('data', 'province', 'type'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'ins_name' => 'required',
            'ins_telp' => 'required',
            'ins_address' => 'required',
            'thumb' => (isset($request->thumb)) ? 'max:1024' : ''
        ]);

        if ($request->ins_village == '') {
            return redirect()->back()->withInput()->with('ins_village', 'Options not selected');
        }
        
        if ($request->ins_rw == '') {
            return redirect()->back()->withInput()->with('ins_rw', 'Options not selected');
        }

        if ($request->ins_rt == '') {
            return redirect()->back()->withInput()->with('ins_rt', 'Options not selected');
        }

        $thumb = $request->thumb;

        if ($thumb == null) {
            $img = $request->old_thumb;
        } else {
            if ($request->old_thumb != 'icon.jpg') {
                unlink("data/image/instansi/" . $request->old_thumb);
            }

            $image = $request->file('thumb');
            $img = time() . "." . $image->getClientOriginalExtension();
            $image->move("data/image/instansi", $img);
        }

        $input = $request->except('_token', 'id', 'old_thumb', 'thumb');
        $input['ins_thumb'] = $img;
        $input['ins_bpjs'] = ($request->ins_bpjs == null) ? '0' : '1';

        EiancInstansi::where('ins_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Update instansi ' . $request->id . '-' . $request->ins_name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah diubah');
        return redirect()->route('instansi');
    }

    public function destroy(Request $request)
    {
        $find0 = EiancTemoi::where('temoi_ins_id', Crypt::decrypt($request->id))->get();
        $find1 = EiancTemoi::where('temoi_ins_id', Crypt::decrypt($request->id))
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
                $data = EiancInstansi::find(Crypt::decrypt($request->id));

                SysLog::create([
                    'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                    'log_browser' => get_client_browser(),
                    'log_os' => $_SERVER['HTTP_USER_AGENT'],
                    'log_user_id' => auth()->user()->id,
                    'log_action' => 'delete instansi ' . Crypt::decrypt($request->id) . '-' . $data->ins_name
                ]);

                $data->delete();

                Alert::success('Sukses', 'Oke, Data sudah dihapus');
                return redirect()->route('instansi');
            }
        }
    }
}
