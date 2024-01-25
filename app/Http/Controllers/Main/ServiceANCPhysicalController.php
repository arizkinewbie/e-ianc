<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancServiceAnc;
use App\Models\EiancServiceAncPhysicalExamination;
use App\Models\SelecDjj;
use App\Models\SelecTt;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceANCPhysicalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $danc = EiancServiceAnc::find(Crypt::decrypt($anc));

        $djj = SelecDjj::all();
        $stt = SelecTt::all();
        $data = EiancServiceAncPhysicalExamination::where('sancpe_anc_d_id', Crypt::decrypt($det))->get();

        $xdata = EiancServiceAncPhysicalExamination::join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->where('sanc_id', Crypt::decrypt($anc))
            ->orderBy('sancd_id', 'DESC')
            ->get();

        if (count($data) > 0) {
            $show = '0';
        } else {
            if (count($xdata) > 0) {
                $show = '1';
            } else {
                $show = '0';
            }
        }

        return view('pages/service/anc/detail/anc/physical/index', compact('id', 'anc', 'det', 'show', 'data', 'xdata', 'stt', 'danc', 'djj'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sancpe_weight' => 'required',
            'sancpe_height' => 'required',
            'sancpe_weight_now' => 'required',

            'sancpe_nadi' => 'required',
            'sancpe_r_rate' => 'required',
            'sancpe_tempe' => 'required',
            'sancpe_blood_pressure' => 'required',

            'sancpe_arm' => 'required',
            'sancpe_pelvis' => 'required',

            // 'sancpe_djj' => 'required',
            'sancpe_pl1' => 'required',
            'sancpe_pl2' => 'required',
            'sancpe_pl3' => 'required',
            'sancpe_pl4' => 'required',
        ]);

        if ($request->sancpe_tt == '') {
            return redirect()->back()->withInput()->with('sancpe_tt', 'Options not selected');
        }
        if ($request->sancpe_awareness == '') {
            return redirect()->back()->withInput()->with('sancpe_awareness', 'Options not selected');
        }

        if ($request->sancpe_body_shape == '') {
            return redirect()->back()->withInput()->with('sancpe_body_shape', 'Options not selected');
        }
        if ($request->sancpe_face == '') {
            return redirect()->back()->withInput()->with('sancpe_face', 'Options not selected');
        }
        if ($request->sancpe_eye == '') {
            return redirect()->back()->withInput()->with('sancpe_eye', 'Options not selected');
        }
        if ($request->sancpe_tooth == '') {
            return redirect()->back()->withInput()->with('sancpe_tooth', 'Options not selected');
        }
        if ($request->sancpe_mouth == '') {
            return redirect()->back()->withInput()->with('sancpe_mouth', 'Options not selected');
        }
        if ($request->sancpe_arm == '') {
            return redirect()->back()->withInput()->with('sancpe_arm', 'Options not selected');
        }
        if ($request->sancpe_pelvis == '') {
            return redirect()->back()->withInput()->with('sancpe_pelvis', 'Options not selected');
        }
        if ($request->sancpe_chest == '') {
            return redirect()->back()->withInput()->with('sancpe_chest', 'Options not selected');
        }
        if ($request->sancpe_heart == '') {
            return redirect()->back()->withInput()->with('sancpe_heart', 'Options not selected');
        }
        if ($request->sancpe_lungs == '') {
            return redirect()->back()->withInput()->with('sancpe_lungs', 'Options not selected');
        }
        if ($request->sancpe_patella == '') {
            return redirect()->back()->withInput()->with('sancpe_patella', 'Options not selected');
        }
        if ($request->sancpe_boobs == '') {
            return redirect()->back()->withInput()->with('sancpe_boobs', 'Options not selected');
        }
        if ($request->sancpe_ex_top == '') {
            return redirect()->back()->withInput()->with('sancpe_ex_top', 'Options not selected');
        }
        if ($request->sancpe_ex_bottom == '') {
            return redirect()->back()->withInput()->with('sancpe_ex_bottom', 'Options not selected');
        }
        if ($request->sancpe_ex_gland == '') {
            return redirect()->back()->withInput()->with('sancpe_ex_gland', 'Options not selected');
        }
        if ($request->sancpe_oodena == '') {
            return redirect()->back()->withInput()->with('sancpe_oodena', 'Options not selected');
        }

        if ($request->sancpe_caesar == '') {
            return redirect()->back()->withInput()->with('sancpe_caesar', 'Options not selected');
        }
        if ($request->sancpe_fetus == '') {
            return redirect()->back()->withInput()->with('sancpe_fetus', 'Options not selected');
        }
        // if ($request->sancpe_pros_fetus == '') {
        //     return redirect()->back()->withInput()->with('sancpe_pros_fetus', 'Options not selected');
        // }
        // if ($request->sancpe_pap == '') {
        //     return redirect()->back()->withInput()->with('sancpe_pap', 'Options not selected');
        // }
        // if ($request->sancpe_djj_id == '') {
        //     return redirect()->back()->withInput()->with('sancpe_djj_id', 'Options not selected');
        // }

        $find = EiancServiceAncPhysicalExamination::where('sancpe_anc_d_id', Crypt::decrypt($request->det))->get();

        if (count($find) < 1) {
            $input = [
                'sancpe_anc_d_id' => Crypt::decrypt($request->det),
                'sancpe_date' => date('Y-m-d'),
                'sancpe_weight' => $request->sancpe_weight,
                'sancpe_height' => $request->sancpe_height,
                'sancpe_imt' => $request->sancpe_imt,
                'sancpe_weight_now' => $request->sancpe_weight_now,
                'sancpe_tt' => $request->sancpe_tt,
                'sancpe_nadi' => $request->sancpe_nadi,
                'sancpe_r_rate' => $request->sancpe_r_rate,
                'sancpe_tempe' => $request->sancpe_tempe,
                'sancpe_blood_pressure' => $request->sancpe_blood_pressure,
                'sancpe_awareness' => $request->sancpe_awareness,
                'sancpe_body_shape' => $request->sancpe_body_shape,
                'sancpe_face' => $request->sancpe_face,
                'sancpe_eye' => $request->sancpe_eye,
                'sancpe_tooth' => $request->sancpe_tooth,
                'sancpe_mouth' => $request->sancpe_mouth,
                'sancpe_arm' => $request->sancpe_arm,
                'sancpe_pelvis' => $request->sancpe_pelvis,
                'sancpe_chest' => $request->sancpe_chest,
                'sancpe_heart' => $request->sancpe_heart,
                'sancpe_lungs' => $request->sancpe_lungs,
                'sancpe_patella' => $request->sancpe_patella,
                'sancpe_boobs' => $request->sancpe_boobs,
                'sancpe_ex_top' => $request->sancpe_ex_top,
                'sancpe_ex_bottom' => $request->sancpe_ex_bottom,
                'sancpe_ex_gland' => $request->sancpe_ex_gland,
                'sancpe_oodena' => $request->sancpe_oodena,
                'sancpe_caesar' => $request->sancpe_caesar,
                'sancpe_fetus' => $request->sancpe_fetus,
                'sancpe_pros_fetus' => $request->sancpe_pros_fetus,
                'sancpe_pap' => $request->sancpe_pap,
                'sancpe_tfu_cm' => $request->sancpe_tfu_cm,
                'sancpe_tfu_finger' => $request->sancpe_tfu_finger,
                'sancpe_tfu_finger_pos' => $request->sancpe_tfu_finger_pos,
                'sancpe_djj' => $request->sancpe_djj,
                'sancpe_djj_id' => $request->sancpe_djj_id,
                'sancpe_djj_desc' => null,
                'sancpe_pl1' => $request->sancpe_pl1,
                'sancpe_pl2' => $request->sancpe_pl2,
                'sancpe_pl3' => $request->sancpe_pl3,
                'sancpe_pl4' => $request->sancpe_pl4,
                'sancpe_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceAncPhysicalExamination::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - pemeriksaan fisik ' . $store->sancpe_id
            ]);

            return redirect()->route('service.anc.anc.lab', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
        } else {
            $input = [
                'sancpe_weight' => $request->sancpe_weight,
                'sancpe_height' => $request->sancpe_height,
                'sancpe_imt' => $request->sancpe_imt,
                'sancpe_weight_now' => $request->sancpe_weight_now,
                'sancpe_tt' => $request->sancpe_tt,
                'sancpe_nadi' => $request->sancpe_nadi,
                'sancpe_r_rate' => $request->sancpe_r_rate,
                'sancpe_tempe' => $request->sancpe_tempe,
                'sancpe_blood_pressure' => $request->sancpe_blood_pressure,
                'sancpe_awareness' => $request->sancpe_awareness,
                'sancpe_body_shape' => $request->sancpe_body_shape,
                'sancpe_face' => $request->sancpe_face,
                'sancpe_eye' => $request->sancpe_eye,
                'sancpe_tooth' => $request->sancpe_tooth,
                'sancpe_mouth' => $request->sancpe_mouth,
                'sancpe_arm' => $request->sancpe_arm,
                'sancpe_pelvis' => $request->sancpe_pelvis,
                'sancpe_chest' => $request->sancpe_chest,
                'sancpe_heart' => $request->sancpe_heart,
                'sancpe_lungs' => $request->sancpe_lungs,
                'sancpe_patella' => $request->sancpe_patella,
                'sancpe_boobs' => $request->sancpe_boobs,
                'sancpe_ex_top' => $request->sancpe_ex_top,
                'sancpe_ex_bottom' => $request->sancpe_ex_bottom,
                'sancpe_ex_gland' => $request->sancpe_ex_gland,
                'sancpe_oodena' => $request->sancpe_oodena,
                'sancpe_caesar' => $request->sancpe_caesar,
                'sancpe_fetus' => $request->sancpe_fetus,
                'sancpe_pros_fetus' => $request->sancpe_pros_fetus,
                'sancpe_pap' => $request->sancpe_pap,
                'sancpe_tfu_cm' => $request->sancpe_tfu_cm,
                'sancpe_tfu_finger' => $request->sancpe_tfu_finger,
                'sancpe_tfu_finger_pos' => $request->sancpe_tfu_finger_pos,
                'sancpe_djj' => $request->sancpe_djj,
                'sancpe_djj_id' => $request->sancpe_djj_id,
                'sancpe_djj_desc' => null,
                'sancpe_pl1' => $request->sancpe_pl1,
                'sancpe_pl2' => $request->sancpe_pl2,
                'sancpe_pl3' => $request->sancpe_pl3,
                'sancpe_pl4' => $request->sancpe_pl4
            ];

            EiancServiceAncPhysicalExamination::where('sancpe_id', $request->idx)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - pemeriksaan fisik ' . $request->idx
            ]);

            return redirect()->route('service.anc.anc.lab', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
        }
    }
}
