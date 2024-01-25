<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancServiceAnc;
use App\Models\EiancServiceAncAnamnesa;
use App\Models\SelecLPC;
use App\Models\SelecTt;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceANCAnamnesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $danc = EiancServiceAnc::find(Crypt::decrypt($anc));
        $slpc = SelecLPC::all();

        $data = EiancServiceAncAnamnesa::where('sanca_anc_d_id', Crypt::decrypt($det))->get();

        $xdata = EiancServiceAncAnamnesa::join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_anc_anamnesas.sanca_anc_d_id')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->where('sanc_id', Crypt::decrypt($anc))
            ->where('sancd_type', '0')
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

        return view('pages/service/anc/detail/anc/anamnesa/index', compact('id', 'anc', 'det', 'data', 'danc', 'slpc', 'show', 'xdata'));
    }

    public function store(Request $request)
    {
        $find = EiancServiceAncAnamnesa::where('sanca_anc_d_id', Crypt::decrypt($request->det))->get();

        if ($request->sanca_lpc == '') {
            return redirect()->back()->withInput()->with('sanca_lpc', 'Options not selected');
        }
        if ($request->sanca_stomach == '') {
            return redirect()->back()->withInput()->with('sanca_stomach', 'Options not selected');
        }
        if ($request->sanca_dizzy == '') {
            return redirect()->back()->withInput()->with('sanca_dizzy', 'Options not selected');
        }
        if ($request->sanca_gag == '') {
            return redirect()->back()->withInput()->with('sanca_gag', 'Options not selected');
        }
        if ($request->sanca_appetite == '') {
            return redirect()->back()->withInput()->with('sanca_appetite', 'Options not selected');
        }
        if ($request->sanca_bleeding == '') {
            return redirect()->back()->withInput()->with('sanca_bleeding', 'Options not selected');
        }

        if (count($find) < 1) {
            $input = [
                'sanca_anc_d_id' => Crypt::decrypt($request->det),
                'sanca_date' => date('Y-m-d'),
                'sanca_uk' => $request->sanca_uk,
                'sanca_trimester' => $request->sanca_trimester,
                'sanca_lpc' => $request->sanca_lpc,
                'sanca_stomach' => $request->sanca_stomach,
                'sanca_dizzy' => $request->sanca_dizzy,
                'sanca_gag' => $request->sanca_gag,
                'sanca_appetite' => $request->sanca_appetite,
                'sanca_bleeding' => $request->sanca_bleeding,
                'sanca_kdrt' => $request->sanca_kdrt,
                'sanca_allergy' => $request->sanca_allergy,
                'sanca_complaint' => $request->sanca_complaint,
                'sanca_user_id' => auth()->user()->id
            ];

            $store = EiancServiceAncAnamnesa::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - anamnesa ' . $store->sanca_id
            ]);

            return redirect()->route('service.anc.anc.physical', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
        } else {
            $input = [
                'sanca_lpc' => $request->sanca_lpc,
                'sanca_stomach' => $request->sanca_stomach,
                'sanca_dizzy' => $request->sanca_dizzy,
                'sanca_gag' => $request->sanca_gag,
                'sanca_appetite' => $request->sanca_appetite,
                'sanca_bleeding' => $request->sanca_bleeding,
                'sanca_kdrt' => $request->sanca_kdrt,
                'sanca_allergy' => $request->sanca_allergy,
                'sanca_complaint' => $request->sanca_complaint
            ];

            EiancServiceAncAnamnesa::where('sanca_id', $request->idx)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - anamnesa ' . $request->idx
            ]);

            return redirect()->route('service.anc.anc.physical', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
        }
    }
}
