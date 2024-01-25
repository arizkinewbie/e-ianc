<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\EiancServiceMarrital;
use App\Models\EiancServiceMarritalSkl;
use App\Models\EiancTemoi;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use App\Models\SelecPregWith;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceANCMarrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $desposisi = SelecDespoisi::all();
        $icd = SelecIcd::all();
        $smet = SelecPregWith::where('pw_id', '!=', '1')->get();
        $data = EiancServiceMarrital::where('sancm_anc_d_id', Crypt::decrypt($det))->get();

        return view('pages/service/anc/detail/marrital/index', compact('id', 'anc', 'det', 'data', 'smet', 'desposisi', 'icd'));
    }

    public function store(Request $request)
    {
        if ($request->sancm_met_marr == '') {
            return redirect()->back()->withInput()->with('sancm_met_marr', 'Options not selected');
        }

        if ($request->sancm_kembar == '') {
            return redirect()->back()->withInput()->with('sancm_cond', 'Options not selected');
        }

        $find = EiancServiceMarrital::where('sancm_anc_d_id', Crypt::decrypt($request->det))->get();

        if (count($find) < 1) {
            $input = [
                'sancm_anc_d_id' => Crypt::decrypt($request->det),
                'sancm_no_reg' => date('y') . '-' . rand(),
                'sancm_norm' => Crypt::decrypt($request->id),
                'sancm_date' => $request->sancm_date,
                'sancm_time' => $request->sancm_time,
                'sancm_met_marr' => $request->sancm_met_marr,
                'sancm_kembar' => $request->sancm_kembar,
                'sancm_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceMarrital::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - persalinan ' . $store->sancm_id
            ]);

            return redirect()->back();
        } else {
            $input = [
                'sancm_date' => $request->sancm_date,
                'sancm_time' => $request->sancm_time,
                'sancm_met_marr' => $request->sancm_met_marr,
                'sancm_kembar' => $request->sancm_kembar,
            ];

            EiancServiceMarrital::where('sancm_id', $request->idx)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - persalinan ' . $request->idx
            ]);

            return redirect()->back();
        }
    }

    public function skl(Request $request)
    {
        $this->validate($request, [
            'sancmskl_name' => 'required',
            'sancmskl_weight' => 'required',
            'sancmskl_height' => 'required',
        ]);

        if ($request->sancmskl_sex == '') {
            return redirect()->back()->withInput()->with('sancmskl_sex', 'Options not selected');
        }
        if ($request->sancmskl_cond == '') {
            return redirect()->back()->withInput()->with('sancmskl_cond', 'Options not selected');
        }
        if ($request->sancmskl_cond_baby == '') {
            return redirect()->back()->withInput()->with('sancmskl_cond_baby', 'Options not selected');
        }


        $find = EiancServiceMarritalSkl::where('sancmskl_marr_id', $request->id2)->get();

        if (count($find) < 1) {
            $input = [
                'sancmskl_marr_id' => $request->id1,
                'sancmskl_no_reg' => date('y') . '-' . rand(),
                'sancmskl_name' => $request->sancmskl_name,
                'sancmskl_sex' => $request->sancmskl_sex,
                'sancmskl_date' => $request->sancmskl_date,
                'sancmskl_time' => $request->sancmskl_time,
                'sancmskl_cond' => $request->sancmskl_cond,
                'sancmskl_cond_baby' => $request->sancmskl_cond_baby,
                'sancmskl_weight' => $request->sancmskl_weight,
                'sancmskl_height' => $request->sancmskl_height,
                'sancmskl_icd1' => $request->sancmskl_icd1,
                'sancmskl_icd2' => $request->sancmskl_icd2,
                'sancmskl_icd3' => $request->sancmskl_icd3,
                'sancmskl_icd4' => $request->sancmskl_icd4,
                'sancmskl_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceMarritalSkl::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - persalinan - skl ' . $store->sancmskl_id
            ]);

            return redirect()->route('service.anc.marr', ['id' => $request->xid, 'anc' => $request->anc, 'det' => $request->det]);
        } else {
            $input = [
                'sancmskl_marr_id' => $request->id1,
                'sancmskl_name' => $request->sancmskl_name,
                'sancmskl_sex' => $request->sancmskl_sex,
                'sancmskl_date' => $request->sancmskl_date,
                'sancmskl_time' => $request->sancmskl_time,
                'sancmskl_cond' => $request->sancmskl_cond,
                'sancmskl_cond_baby' => $request->sancmskl_cond_baby,
                'sancmskl_weight' => $request->sancmskl_weight,
                'sancmskl_height' => $request->sancmskl_height,
                'sancmskl_icd1' => $request->sancmskl_icd1,
                'sancmskl_icd2' => $request->sancmskl_icd2,
                'sancmskl_icd3' => $request->sancmskl_icd3,
                'sancmskl_icd4' => $request->sancmskl_icd4,
            ];

            $store = EiancServiceMarritalSkl::where('sancmskl_id', $request->id)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - persalinan - skl ' . $request->id
            ]);

            return redirect()->route('service.anc.marr', ['id' => $request->xid, 'anc' => $request->anc, 'det' => $request->det]);
        }
    }

    public function create($id, $anc, $det, $id1, $id2)
    {
        $icd = SelecIcd::all();
        $icd2 = SelecIcd::all();
        $icd3 = SelecIcd::all();
        $icd4 = SelecIcd::all();

        $mar = EiancServiceMarrital::find($id1);

        return view('pages/service/anc/detail/marrital/create', compact('id', 'anc', 'det', 'id1', 'id2', 'icd', 'icd2', 'icd3', 'icd4', 'mar'));
    }

    public function destroy($id, $anc, $det, $id1)
    {
        $find = EiancServiceMarritalSkl::find($id1);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus anc - persalinan - skl ' . $id1
        ]);

        $find->delete();

        return redirect()->route('service.anc.marr', ['id' => $id, 'anc' => $anc, 'det' => $det]);
    }

    public function desposisi(Request $request)
    {
        $find = EiancDesposisi::where('des_reg_no', $request->regrisk)->get();

        if (count($find) < 1) {
            if ($request->desid == 2) {
                $despo = [
                    'des_reg_no' => $request->regrisk,
                    'des_norm' => Crypt::decrypt($request->norm),
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
                    'des_reg_no' => $request->regrisk,
                    'des_norm' => Crypt::decrypt($request->norm),
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
}
