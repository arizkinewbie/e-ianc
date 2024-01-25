<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancServiceAnc;
use App\Models\EiancServiceAncDiagnosis;
use App\Models\SelecComplicated;
use App\Models\SelecDisease;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceANCDiagnosisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $sdise = SelecDisease::all();
        $scom = SelecComplicated::all();

        $data = EiancServiceAncDiagnosis::where('sancdi_anc_d_id', Crypt::decrypt($det))->get();

        $xdata = EiancServiceAncDiagnosis::join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_anc_diagnoses.sancdi_anc_d_id')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->where('sanc_id', Crypt::decrypt($anc))
            ->orderBy('sancd_id', 'DESC')
            ->get();

        $anamdet = EiancServiceAnc::find(Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
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

        return view('pages/service/anc/detail/anc/diagnosis/index', compact('id', 'anc', 'det', 'show', 'data', 'xdata', 'anamdet', 'sdise', 'scom'));
    }

    public function store(Request $request)
    {
        if ($request->sancdi_disease_id == '') {
            return redirect()->back()->withInput()->with('sancdi_disease_id', 'Options not selected');
        }

        $find = EiancServiceAncDiagnosis::where('sancdi_anc_d_id', Crypt::decrypt($request->det))->get();

        if (count($find) < 1) {
            $input = [
                'sancdi_anc_d_id' => Crypt::decrypt($request->det),
                'sancdi_gpa' => $request->sancdi_gpa,
                'sancdi_uk' => $request->sancdi_uk,
                'sancdi_disease_id' => $request->sancdi_disease_id,
                'sancdi_tcompli' => $request->sancdi_tcompli,
                'sancdi_compli' => $request->sancdi_compli,
                'sancdi_sugg' => $request->sancdi_sugg,
                'sancdi_diag_marr' => $request->sancdi_diag_marr,
                'sancdi_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceAncDiagnosis::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - diagnosis ' . $store->sancdi_id
            ]);

            return redirect()->route('service.anc.anc.risk', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
        } else {
            $input = [
                'sancdi_gpa' => $request->sancdi_gpa,
                'sancdi_uk' => $request->sancdi_uk,
                'sancdi_disease_id' => $request->sancdi_disease_id,
                'sancdi_tcompli' => $request->sancdi_tcompli,
                'sancdi_compli' => $request->sancdi_compli,
                'sancdi_sugg' => $request->sancdi_sugg,
                'sancdi_diag_marr' => $request->sancdi_diag_marr
            ];

            EiancServiceAncDiagnosis::where('sancdi_id', $request->idx)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - diagnosis ' . $request->idx
            ]);

            return redirect()->route('service.anc.anc.risk', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
        }
    }
}
