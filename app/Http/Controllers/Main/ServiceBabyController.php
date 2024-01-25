<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\EiancPatient;
use App\Models\EiancServiceBaby;
use App\Models\EiancTemoi;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use App\Models\SelecPregWith;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceBabyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = EiancServiceBaby::where('sbaby_norm', Crypt::decrypt($id))->get();

        return view('pages/service/baby/index', compact('id', 'data'));
    }

    public function create($id, $xid)
    {
        $spw = SelecPregWith::where('pw_id', '!=', '1')->get();
        $data = EiancServiceBaby::find(Crypt::decrypt($xid));
        $icd = SelecIcd::all();
        $desposisi = SelecDespoisi::all();

        if (isset($data)) {
            $ds = EiancDesposisi::where('des_reg_no', $data->sbaby_no_reg)->get();
            return view('pages/service/baby/create', compact('id', 'xid', 'spw', 'data', 'icd', 'desposisi', 'ds'));
        } else {
            return view('pages/service/baby/create', compact('id', 'xid', 'spw', 'data', 'icd', 'desposisi'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sbaby_no' => 'required',
            'sbaby_weight_born' => 'required',
            'sbaby_height_born' => 'required',
            'sbaby_weight_now' => 'required',
            'sbaby_height_now' => 'required',
            'sbaby_mat_assis' => 'required',
        ]);

        if ($request->sbaby_pragwith_id == '') {
            return redirect()->back()->withInput()->with('sbaby_pragwith_id', 'Options not selected');
        }

        if ($request->sbaby_cond == '') {
            return redirect()->back()->withInput()->with('sbaby_cond', 'Options not selected');
        }

        if ($request->sbaby_asi == '') {
            return redirect()->back()->withInput()->with('sbaby_asi', 'Options not selected');
        }

        $find = EiancServiceBaby::where('sbaby_id', $request->id)->get();

        if (count($find) < 1) {
            $patient = EiancPatient::where('pat_norm', Crypt::decrypt($request->norm))->value('pat_dob');

            $input = [
                'sbaby_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
                'sbaby_norm' => Crypt::decrypt($request->norm),
                'sbaby_no' => $request->sbaby_no,
                'sbaby_no_reg' => date('y') . '-' . rand(),
                'sbaby_weight_born' => $request->sbaby_weight_born,
                'sbaby_height_born' => $request->sbaby_height_born,
                'sbaby_cond' => $request->sbaby_cond,
                'sbaby_mat_assis' => $request->sbaby_mat_assis,
                'sbaby_pragwith_id' => $request->sbaby_pragwith_id,
                'sbaby_asi' => $request->sbaby_asi,
                'sbaby_asi_give' => $request->sbaby_asi_give,
                'sbaby_age' => date('Y') - date('Y', strtotime($patient)),
                'sbaby_weight_now' => $request->sbaby_weight_now,
                'sbaby_height_now' => $request->sbaby_height_now,
                'sbaby_sym' => $request->sbaby_sym,
                'sbaby_physical' => $request->sbaby_physical,
                'sbaby_diagnose' => $request->sbaby_diagnose,
                'sbaby_sugg' => $request->sbaby_sugg,
                'sbaby_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceBaby::create($input);

            if ($request->desid == 2) {
                $despo = [
                    'des_reg_no' => $input['sbaby_no_reg'],
                    'des_norm' => Crypt::decrypt($request->norm),
                    'des_ins_id' => $input['sbaby_ins_id'],
                    'des_de_id' => $request->desid,
                    'des_des_unit' => $request->unit,
                    'des_des_ins' => $request->rs,
                    'des_diagnose' => $request->icd,
                    'des_first_aid' => $request->first,
                    'des_user_id' => auth()->user()->id,
                ];

                $store2 = EiancDesposisi::create($despo);
                $id2 = Crypt::encrypt($store2->des_id);
            } else {
                $despo = [
                    'des_reg_no' => $input['sbaby_no_reg'],
                    'des_norm' => Crypt::decrypt($request->norm),
                    'des_ins_id' => $input['sbaby_ins_id'],
                    'des_de_id' => $request->desid,
                    'des_des_unit' => null,
                    'des_des_ins' => null,
                    'des_diagnose' => null,
                    'des_first_aid' => null,
                    'des_user_id' => auth()->user()->id,
                ];

                $store2 = EiancDesposisi::create($despo);
            }

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah Kembang BB ' . Crypt::decrypt($request->norm) . ' - ' . $store->sbaby_id
            ]);

            Alert::success('Sukses', 'Berhasil simpan data');

            if ($request->desid == 2) {
                return redirect()->route('service.baby', $request->norm)->with('print', '')->with(compact('id2'));
            } else {
                return redirect()->route('service.baby', $request->norm);
            }
        } else {
            $input = [
                'sbaby_no' => $request->sbaby_no,
                'sbaby_weight_born' => $request->sbaby_weight_born,
                'sbaby_height_born' => $request->sbaby_height_born,
                'sbaby_cond' => $request->sbaby_cond,
                'sbaby_mat_assis' => $request->sbaby_mat_assis,
                'sbaby_pragwith_id' => $request->sbaby_pragwith_id,
                'sbaby_asi' => $request->sbaby_asi,
                'sbaby_asi_give' => $request->sbaby_asi_give,
                'sbaby_weight_now' => $request->sbaby_weight_now,
                'sbaby_height_now' => $request->sbaby_height_now,
                'sbaby_sym' => $request->sbaby_sym,
                'sbaby_physical' => $request->sbaby_physical,
                'sbaby_diagnose' => $request->sbaby_diagnose,
                'sbaby_sugg' => $request->sbaby_sugg
            ];

            EiancServiceBaby::where('sbaby_id', $request->id)->update($input);

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
            }

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah Kembang BB ' . Crypt::decrypt($request->norm) . ' - ' . $request->id
            ]);

            Alert::success('Sukses', 'Berhasil ubah data');
            if ($request->desid == 2) {
                return redirect()->route('service.baby', $request->norm)->with('print', '')->with(compact('id2'));
            } else {
                return redirect()->route('service.baby', $request->norm);
            }
        }
    }

    public function destroy($id, $xid)
    {
        $find = EiancServiceBaby::find(Crypt::decrypt($xid));
        $ds = EiancDesposisi::where('des_reg_no', $find->sbaby_no_reg)->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah Kembang BB ' . $find->sbaby_norm . ' - ' . $find->sbaby_id
        ]);

        $find->delete();

        Alert::success('Sukses', 'Berhasil hapus data');
        return redirect()->route('service.baby', $id);
    }
}
