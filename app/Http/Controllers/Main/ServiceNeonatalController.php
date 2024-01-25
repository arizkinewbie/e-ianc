<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\EiancPatient;
use App\Models\EiancServiceNeo28;
use App\Models\EiancServiceNeoBb;
use App\Models\EiancTemoi;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use App\Models\SelecVaksin;
use App\Models\SysLog;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceNeonatalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $patient = EiancPatient::where('pat_norm', Crypt::decrypt($id))->get();

        if (date('Y-m-d') < date('Y-m-d', strtotime($patient[0]->pat_dob . ' + 29 days'))) {
            $data = EiancServiceNeo28::where('neo28_norm', Crypt::decrypt($id))->get();
            return view('pages/service/neonatal/28/index', compact('id', 'data'));
        } else {
            $data = EiancServiceNeoBb::where('neobb_norm', Crypt::decrypt($id))->get();
            return view('pages/service/neonatal/5/index', compact('id', 'data'));
        }
    }

    public function create28($id, $idx)
    {
        $desposisi = SelecDespoisi::all();
        $icd = SelecIcd::all();

        $data = EiancServiceNeo28::where('neo28_id', Crypt::decrypt($idx))->get();

        return view('pages/service/neonatal/28/create', compact('id', 'desposisi', 'icd', 'data'));
    }

    public function store28(Request $request)
    {
        $this->validate($request, [
            'neo28_weigth' => 'required',
            'neo28_height' => 'required',
            'neo28_temp' => 'required',
            'neo28_freq_breath' => 'required',
            'neo28_freq_heart' => 'required',
            'neo28_infec' => 'required',
            'neo28_iketrus' => 'required',
            'neo28_diare' => 'required',
            'neo28_asi' => 'required',
            'neo28_vit' => 'required',
            'neo28_vacc' => 'required',
        ]);

        $find = EiancServiceNeo28::where('neo28_id', $request->id)->get();

        if (count($find) < 1) {
            $patient = EiancPatient::where('pat_norm', Crypt::decrypt($request->norm))->get();

            if (date('Y-m-d') < date('Y-m-d', strtotime($patient[0]->pat_dob . ' + 3 days'))) {
                $type = '0';
            } elseif (date('Y-m-d') < date('Y-m-d', strtotime($patient[0]->pat_dob . ' + 8 days'))) {
                $type = '1';
            } else {
                $type = '2';
            }

            $data = EiancServiceNeo28::where('neo28_norm', Crypt::decrypt($request->norm))->get();

            $input = [
                'neo28_norm' => Crypt::decrypt($request->norm),
                'neo28_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
                'neo28_no_reg' => date('y') . '-' . rand(),
                'neo28_date' => date('Y-m-d'),
                'neo28_type' => $type,
                'neo28_visit' => (count($data) < 1) ? 1 : (count($data) + 1),
                'neo28_weigth' => $request->neo28_weigth,
                'neo28_height' => $request->neo28_height,
                'neo28_temp' => $request->neo28_temp,
                'neo28_freq_breath' => $request->neo28_freq_breath,
                'neo28_freq_heart' => $request->neo28_freq_heart,
                'neo28_infec' => $request->neo28_infec,
                'neo28_iketrus' => $request->neo28_iketrus,
                'neo28_diare' => $request->neo28_diare,
                'neo28_asi' => $request->neo28_asi,
                'neo28_vit' => $request->neo28_vit,
                'neo28_vacc' => $request->neo28_vacc,
                'neo28_shk' => $request->neo28_shk,
                'neo28_shk_tes' => $request->neo28_shk_tes,
                'neo28_shk_confrim' => $request->neo28_shk_confrim,
                'neo28_shk_treatment' => $request->neo28_shk_treatment,
                'neo28_user_id' => auth()->user()->id
            ];

            $store = EiancServiceNeo28::create($input);

            if ($request->desid == 2) {
                $despo = [
                    'des_reg_no' => $input['neo28_no_reg'],
                    'des_norm' => Crypt::decrypt($request->norm),
                    'des_ins_id' => $input['neo28_ins_id'],
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
                    'des_reg_no' => $input['neo28_no_reg'],
                    'des_norm' => Crypt::decrypt($request->norm),
                    'des_ins_id' => $input['neo28_ins_id'],
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
                'log_action' => 'Tambah Neo28 ' . Crypt::decrypt($request->norm) . ' - ' . $store->neo28_id
            ]);

            Alert::success('Sukses', 'Berhasil simpan data');

            if ($request->desid == 2) {
                return redirect()->route('service.neo', $request->norm)->with('print', '')->with(compact('id2'));
            } else {
                return redirect()->route('service.neo', $request->norm);
            }
        } else {
            $input = [
                'neo28_weigth' => $request->neo28_weigth,
                'neo28_height' => $request->neo28_height,
                'neo28_temp' => $request->neo28_temp,
                'neo28_freq_breath' => $request->neo28_freq_breath,
                'neo28_freq_heart' => $request->neo28_freq_heart,
                'neo28_infec' => $request->neo28_infec,
                'neo28_iketrus' => $request->neo28_iketrus,
                'neo28_diare' => $request->neo28_diare,
                'neo28_asi' => $request->neo28_asi,
                'neo28_vit' => $request->neo28_vit,
                'neo28_vacc' => $request->neo28_vacc,
                'neo28_shk' => $request->neo28_shk,
                'neo28_shk_tes' => $request->neo28_shk_tes,
                'neo28_shk_confrim' => $request->neo28_shk_confrim,
                'neo28_shk_treatment' => $request->neo28_shk_treatment,
            ];

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

            EiancServiceNeo28::where('neo28_id', $request->id)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah Neo28 ' . Crypt::decrypt($request->norm) . ' - ' . $request->id
            ]);

            Alert::success('Sukses', 'Berhasil simpan data');

            if ($request->desid == 2) {
                return redirect()->route('service.neo', $request->norm)->with('print', '')->with(compact('id2'));
            } else {
                return redirect()->route('service.neo', $request->norm);
            }
        }
    }

    public function destroy28(Request $request)
    {
        $find = EiancServiceNeo28::find($request->id);
        EiancDesposisi::where('des_reg_no', $find->neo28_no_reg)->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Delete neo28 ' . $find->neo28_norm . ' - ' . $find->neo28_id
        ]);

        $find->delete();

        Alert::success('Sukses', 'Berhasil hapus data');
        return redirect()->back();
    }

    public function create($id, $idx)
    {
        $desposisi = SelecDespoisi::all();
        $icd = SelecIcd::all();

        $vacc = SelecVaksin::all();

        $data = EiancServiceNeoBb::where('neobb_id', Crypt::decrypt($idx))->get();

        return view('pages/service/neonatal/5/create', compact('id', 'desposisi', 'icd', 'data', 'vacc'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'neobb_insp_asi' => 'required',
            'neobb_insp_mp_asi' => 'required',
            'neobb_insp_sdi_dtk' => 'required',
            'neobb_nut_weight' => 'required',
            'neobb_nut_height' => 'required',
            'neobb_nut_status' => 'required',
            'neobb_nut_vit' => 'required',
            // 'neobb_prog_semiologi_hiv' => 'required',
            // 'neobb_prog_cd4' => 'required',
            // 'neobb_prog_kelambu' => 'required',
            // 'neobb_vacc_dpthbhbbooster' => 'required',
            // 'neobb_vacc_campak_booster' => 'required',
            // 'neobb_det' => 'required',
        ]);

        $find = EiancServiceNeoBb::where('neobb_id', $request->id)->get();

        if (count($find) < 1) {
            $patient = EiancPatient::where('pat_norm', Crypt::decrypt($request->norm))->get();

            if (date('Y-m-d') < date('Y-m-d', strtotime($patient[0]->pat_dob . ' + 366 days'))) {
                $type = '0';
            } else {
                $type = '1';
            }

            $birthDt = new DateTime($patient[0]->pat_dob);
            $today = new DateTime('today');
            $y = $today->diff($birthDt)->y;
            $m = $today->diff($birthDt)->m;
            $d = $today->diff($birthDt)->d;

            $data = EiancServiceNeoBb::where('neobb_norm', Crypt::decrypt($request->norm))->get();

            $input = [
                'neobb_norm' => Crypt::decrypt($request->norm),
                'neobb_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
                'neobb_no_reg' => date('y') . '-' . rand(),
                'neobb_date' => date('Y-m-d'),
                'neobb_type' => $type,
                'neobb_y' => $y,
                'neobb_m' => $m,
                'neobb_d' => $d,
                'neobb_insp_asi' => $request->neobb_insp_asi,
                'neobb_insp_mp_asi' => $request->neobb_insp_mp_asi,
                'neobb_insp_sdi_dtk' => $request->neobb_insp_sdi_dtk,
                'neobb_nut_weight' => $request->neobb_nut_weight,
                'neobb_nut_height' => $request->neobb_nut_height,
                'neobb_nut_status' => $request->neobb_nut_status,
                'neobb_nut_vit' => $request->neobb_nut_vit,
                'neobb_prog_semiologi_hiv' => $request->neobb_prog_semiologi_hiv,
                'neobb_prog_cd4' => $request->neobb_prog_cd4,
                'neobb_prog_kelambu' => $request->neobb_prog_kelambu,
                'neobb_vacc' => $request->neobb_vacc,
                'neobb_det' => $request->neobb_det,
                'neobb_user_id' => auth()->user()->id
            ];

            $store = EiancServiceNeoBb::create($input);

            if ($request->desid == 2) {
                $despo = [
                    'des_reg_no' => $input['neobb_no_reg'],
                    'des_norm' => Crypt::decrypt($request->norm),
                    'des_ins_id' => $input['neobb_ins_id'],
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
                    'des_reg_no' => $input['neobb_no_reg'],
                    'des_norm' => Crypt::decrypt($request->norm),
                    'des_ins_id' => $input['neobb_ins_id'],
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
                'log_action' => 'Tambah Neo ' . Crypt::decrypt($request->norm) . ' - ' . $store->neobb_id
            ]);

            Alert::success('Sukses', 'Berhasil simpan data');

            if ($request->desid == 2) {
                return redirect()->route('service.neo', $request->norm)->with('print', '')->with(compact('id2'));
            } else {
                return redirect()->route('service.neo', $request->norm);
            }
        } else {
            $input = [
                'neobb_insp_asi' => $request->neobb_insp_asi,
                'neobb_insp_mp_asi' => $request->neobb_insp_mp_asi,
                'neobb_insp_sdi_dtk' => $request->neobb_insp_sdi_dtk,
                'neobb_nut_weight' => $request->neobb_nut_weight,
                'neobb_nut_height' => $request->neobb_nut_height,
                'neobb_nut_status' => $request->neobb_nut_status,
                'neobb_nut_vit' => $request->neobb_nut_vit,
                'neobb_prog_semiologi_hiv' => $request->neobb_prog_semiologi_hiv,
                'neobb_prog_cd4' => $request->neobb_prog_cd4,
                'neobb_prog_kelambu' => $request->neobb_prog_kelambu,
                'neobb_vacc' => $request->neobb_vacc,
                'neobb_det' => $request->neobb_det,
            ];

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

            EiancServiceNeoBb::where('neobb_id', $request->id)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah Neo ' . Crypt::decrypt($request->norm) . ' - ' . $request->id
            ]);

            Alert::success('Sukses', 'Berhasil simpan data');

            if ($request->desid == 2) {
                return redirect()->route('service.neo', $request->norm)->with('print', '')->with(compact('id2'));
            } else {
                return redirect()->route('service.neo', $request->norm);
            }
        }
    }

    public function destroy(Request $request)
    {
        $find = EiancServiceNeoBb::find($request->id);
        EiancDesposisi::where('des_reg_no', $find->neobb_no_reg)->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Delete neo ' . $find->neobb_norm . ' - ' . $find->neobb_id
        ]);

        $find->delete();

        Alert::success('Sukses', 'Berhasil hapus data');
        return redirect()->back();
    }
}
