<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancSig;
use App\Models\EiancTemoi;
use App\Models\SelecSig;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class SelectSigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancSig::where('sig_ins', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();

        return view('pages/selection/sig/index', compact('data'));
    }

    public function create($id)
    {
        $sel = SelecSig::all();
        $nakes = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->get();

        $data = EiancSig::find(Crypt::decrypt($id));

        return view('pages/selection/sig/create', compact('id', 'data', 'sel', 'nakes'));
    }

    public function store(Request $request)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id');

        $find = EiancSig::find(Crypt::decrypt($request->id));

        if (empty($find)) {
            if ($request->type == '') {
                return redirect()->back()->withInput()->with('type', 'Options not selected');
            }
            if ($request->nakes == '') {
                return redirect()->back()->withInput()->with('nakes', 'Options not selected');
            }

            $cek = EiancSig::where('sig_ins', $ins)->where('sig_type', $request->type)->get();

            if (count($cek) > 0) {
                Alert::Error('Gagal', 'Target Jabatan sudah ada');
                return redirect()->back()->withInput();
            } else {
                $input = [
                    'sig_ins' => $ins,
                    'sig_type' => $request->type,
                    'sig_nakes' => $request->nakes,
                    'sig_user_id' => auth()->user()->id
                ];

                $store = EiancSig::create($input);

                SysLog::create([
                    'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                    'log_browser' => get_client_browser(),
                    'log_os' => $_SERVER['HTTP_USER_AGENT'],
                    'log_user_id' => auth()->user()->id,
                    'log_action' => 'Tambah Sig ' . $store->sig_id
                ]);

                Alert::success('Sukses', 'Berhasil simpan data');
                return redirect()->route('sel.sig');
            }
        } else {
            if ($request->nakes == '') {
                return redirect()->back()->withInput()->with('nakes', 'Options not selected');
            }

            $input = [
                'sig_nakes' => $request->nakes,
            ];

            EiancSig::where('sig_id', Crypt::decrypt($request->id))->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah Sig ' . Crypt::decrypt($request->id)
            ]);

            Alert::success('Sukses', 'Berhasil ubah data');
            return redirect()->route('sel.sig');
        }
    }

    public function destroy(Request $request)
    {
        $find = EiancSig::find(Crypt::decrypt($request->id));
        $find->delete();

        Alert::success('Sukses', 'Berhasil hapus data');
        return redirect()->route('sel.sig');
    }
}
