<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\EiancDrug;
use App\Models\EiancServiceNifasControl;
use App\Models\EiancServiceNifasRecipe;
use App\Models\EiancTemoi;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceANCNifasConController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $data = EiancServiceNifasControl::where('sancnc_anc_d_id', Crypt::decrypt($det))->get();
        $sobat = EiancDrug::where('dg_remainder', '>', 0)
            ->where('dg_ins_id', EiancTemoi::find(auth()->user()->temoi)->value('temoi_ins_id'))
            ->Where('dg_expired_date', '>', date('Y-m-d'))
            ->get();

        $icd = SelecIcd::all();
        $desposisi = SelecDespoisi::all();

        return view('pages/service/anc/detail/nifas/control/index', compact('id', 'anc', 'det', 'data', 'sobat', 'icd', 'desposisi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sancnc_keluhan' => 'required',
            'sancnc_diagnosis' => 'required',
            'sancnc_tindakan' => 'required'
        ]);

        if ($request->sancnc_kasus == '') {
            return redirect()->back()->withInput()->with('sancnc_kasus', 'Options not selected');
        }
        if ($request->sancnc_visit == '') {
            return redirect()->back()->withInput()->with('sancnc_visit', 'Options not selected');
        }

        $find = EiancServiceNifasControl::where('sancnc_anc_d_id', Crypt::decrypt($request->det))->get();

        if (count($find) < 1) {
            $input = [
                'sancnc_anc_d_id' => Crypt::decrypt($request->det),
                'sancnc_no_reg' => date('y') . '-' . rand(),
                'sancnc_date' => date('Y-m-d'),
                'sancnc_type' => 1,
                'sancnc_kasus' => $request->sancnc_kasus,
                'sancnc_keluhan' => $request->sancnc_keluhan,
                'sancnc_diagnosis' => $request->sancnc_diagnosis,
                'sancnc_visit' => $request->sancnc_visit,
                'sancnc_tindakan' => $request->sancnc_tindakan,
                'sancnc_user_id' => auth()->user()->id,
            ];

            // return $input;
            $store = EiancServiceNifasControl::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - nifas control ' . $store->sancnc_id
            ]);

            if ($request->desid == 2) {
                $despo = [
                    'des_reg_no' => $input['sancnc_no_reg'],
                    'des_norm' => Crypt::decrypt($request->xid),
                    'des_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
                    'des_de_id' => $request->desid,
                    'des_des_unit' => $request->unit,
                    'des_des_ins' => $request->rs,
                    'des_diagnose' => $request->icd,
                    'des_first_aid' => $request->first,
                    'des_user_id' => auth()->user()->id,
                ];

                $store2 = EiancDesposisi::create($despo);
                $id2 = Crypt::encrypt($store2->des_id);

                return redirect()->back()->with('print', '')->with(compact('id2'));
            } else {
                $despo = [
                    'des_reg_no' => $input['sancnc_no_reg'],
                    'des_norm' => Crypt::decrypt($request->xid),
                    'des_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
                    'des_de_id' => $request->desid,
                    'des_des_unit' => null,
                    'des_des_ins' => null,
                    'des_diagnose' => null,
                    'des_first_aid' => null,
                    'des_user_id' => auth()->user()->id,
                ];

                $store2 = EiancDesposisi::create($despo);
                return redirect()->back();
            }
        } else {
            $input = [
                'sancnc_kasus' => $request->sancnc_kasus,
                'sancnc_keluhan' => $request->sancnc_keluhan,
                'sancnc_diagnosis' => $request->sancnc_diagnosis,
                'sancnc_visit' => $request->sancnc_visit,
                'sancnc_tindakan' => $request->sancnc_tindakan
            ];

            EiancServiceNifasControl::where('sancnc_id', $request->id)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - nifas control ' . $request->id
            ]);

            if ($request->desid == 2) {
                $despo = [
                    'des_de_id' => $request->desid,
                    'des_des_unit' => $request->unit,
                    'des_des_ins' => $request->rs,
                    'des_diagnose' => $request->icd,
                    'des_first_aid' => $request->first,
                    'des_user_id' => auth()->user()->id,
                ];

                $store2 = EiancDesposisi::where('des_id', $request->iddes)->update($despo);
                $id2 = Crypt::encrypt($request->iddes);
                return redirect()->back()->with('print', '')->with(compact('id2'));
            } else {
                $despo = [
                    'des_de_id' => $request->desid,
                    'des_des_unit' => null,
                    'des_des_ins' => null,
                    'des_diagnose' => null,
                    'des_first_aid' => null,
                    'des_user_id' => auth()->user()->id,
                ];

                EiancDesposisi::where('des_id', $request->iddes)->update($despo);
                return redirect()->back();
            }
        }
    }

    public function obat(Request $request)
    {
        if ($request->sancnr_drug_id == '') {
            return redirect()->back()->withInput()->with('sancnr_drug_id', 'Options not selected');
        }

        $this->validate($request, [
            'sancnr_qty' => 'required',
            'sancnr_dosis' => 'required',
        ]);

        if ($request->sancnr_use == '') {
            return redirect()->back()->withInput()->with('sancnr_use', 'Options not selected');
        }

        $input = [
            'sancnr_n_id' => $request->id,
            'sancnr_type' => 1,
            'sancnr_drug_id' => $request->sancnr_drug_id,
            'sancnr_qty' => $request->sancnr_qty,
            'sancnr_dosis' => $request->sancnr_dosis,
            'sancnr_use' => $request->sancnr_use,
            'sancnr_user_id' => auth()->user()->id,
        ];

        $store = EiancServiceNifasRecipe::create($input);

        $find = EiancDrug::find($request->sancnr_drug_id);
        EiancDrug::where('dg_id', $request->sancnr_drug_id)->update(['dg_remainder' => $find->dg_remainder - $request->sancnr_qty]);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah anc - nifas kontrol - OBAT ' . $store->sancnr_id
        ]);

        return redirect()->back();
    }

    public function obathapus($id)
    {
        $data = EiancServiceNifasRecipe::find(Crypt::decrypt($id));

        $find = EiancDrug::find($data->sancnr_drug_id);
        EiancDrug::where('dg_id', $data->sancnr_drug_id)->update(['dg_remainder' => $find->dg_remainder + $data->sancnr_qty]);

        $data->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus anc - Nifa kontrol - OBAT' . Crypt::decrypt($id)
        ]);

        return redirect()->back();
    }
}
