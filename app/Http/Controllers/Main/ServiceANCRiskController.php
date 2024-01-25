<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\EiancServiceAnc;
use App\Models\EiancServiceAncIcd;
use App\Models\EiancServiceAncRisk;
use App\Models\EiancTemoi;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceANCRiskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $sicd = SelecIcd::orderBy('icd_code', 'ASC')->get();

        $desposisi = SelecDespoisi::all();

        $data = EiancServiceAncRisk::where('sancr_anc_d_id', Crypt::decrypt($det))->get();

        $xdata = EiancServiceAncRisk::join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_anc_risks.sancr_anc_d_id')
            ->join('eianc_service_ancs', 'eianc_service_ancs.sanc_id', '=', 'eianc_service_anc_details.sancd_anc_id')
            ->where('sanc_id', Crypt::decrypt($anc))
            ->orderBy('sancd_id', 'DESC')
            ->get();

        $anam = EiancServiceAnc::find(Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_physical_examinations', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->where('sancd_id', Crypt::decrypt($det))
            ->get();

        if (count($data) > 0) {
            $ds = EiancDesposisi::where('des_reg_no', $data[0]->sancr_no_reg)->get();
            $show = '0';
            return view('pages/service/anc/detail/anc/risk/index', compact('id', 'anc', 'det', 'data', 'show', 'xdata', 'anam', 'sicd', 'desposisi', 'ds'));
        } else {
            // if (count($xdata) > 0) {
            //     $show = '1';
            //     return view('pages/service/anc/detail/anc/risk/index', compact('id', 'anc', 'det', 'data', 'show', 'xdata', 'anam', 'sicd', 'desposisi'));
            // } else {

            // }

            $show = '0';
            return view('pages/service/anc/detail/anc/risk/index', compact('id', 'anc', 'det', 'data', 'show', 'xdata', 'anam', 'sicd', 'desposisi'));
        }
    }

    public function store(Request $request)
    {
        $find = EiancServiceAncRisk::where('sancr_anc_d_id', Crypt::decrypt($request->det))->get();

        if (count($find) < 1) {
            $input = [
                'sancr_no_reg' => date('y') . '-' . rand(),
                'sancr_anc_d_id' => Crypt::decrypt($request->det),
                'sancr_awal' => $request->sancr_awal,
                'sancr_ter_muda' => $request->sancr_ter_muda,
                'sancr_ter_tua' => $request->sancr_ter_tua,
                'sancr_ter_lam_h1' => $request->sancr_ter_lam_h1,
                'sancr_ter_tua_h1' => $request->sancr_ter_tua_h1,

                'sancr_ter_cep_ham' => $request->sancr_ter_cep_ham,
                'sancr_ter_lam_ham' => $request->sancr_ter_lam_ham,
                'sancr_ter_pen' => $request->sancr_ter_pen,
                'sancr_ter_ban_anak' => $request->sancr_ter_ban_anak,
                'sancr_per_gag_ham' => $request->sancr_per_gag_ham,
                'sancr_per_lahir' => $request->sancr_per_lahir,

                'sancr_per_caesar' => $request->sancr_per_caesar,
                'sancr_pen_ham' => $request->sancr_pen_ham,
                'sancr_beng_mkmt' => $request->sancr_beng_mkmt,
                'sancr_td_ting' => $request->sancr_td_ting,
                'sancr_ham_kembar' => $request->sancr_ham_kembar,
                'sancr_ham_kembang' => $request->sancr_ham_kembang,

                'sancr_bay_mati' => $request->sancr_bay_mati,
                'sancr_ham_leb_bulan' => $request->sancr_ham_leb_bulan,
                'sancr_let_sungsang' => $request->sancr_let_sungsang,
                'sancr_let_lintang' => $request->sancr_let_lintang,
                'sancr_perdar_ham' => $request->sancr_perdar_ham,
                'sancr_per_eks' => $request->sancr_per_eks,
                'sancr_score' => $request->sancr_score,
                'sancr_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceAncRisk::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - Risk ' . $store->sancr_id
            ]);

            return redirect()->back();
        } else {
            $input = [
                'sancr_awal' => $request->sancr_awal,
                'sancr_ter_muda' => $request->sancr_ter_muda,
                'sancr_ter_tua' => $request->sancr_ter_tua,
                'sancr_ter_lam_h1' => $request->sancr_ter_lam_h1,
                'sancr_ter_tua_h1' => $request->sancr_ter_tua_h1,

                'sancr_ter_cep_ham' => $request->sancr_ter_cep_ham,
                'sancr_ter_lam_ham' => $request->sancr_ter_lam_ham,
                'sancr_ter_pen' => $request->sancr_ter_pen,
                'sancr_ter_ban_anak' => $request->sancr_ter_ban_anak,
                'sancr_per_gag_ham' => $request->sancr_per_gag_ham,
                'sancr_per_lahir' => $request->sancr_per_lahir,

                'sancr_per_caesar' => $request->sancr_per_caesar,
                'sancr_pen_ham' => $request->sancr_pen_ham,
                'sancr_beng_mkmt' => $request->sancr_beng_mkmt,
                'sancr_td_ting' => $request->sancr_td_ting,
                'sancr_ham_kembar' => $request->sancr_ham_kembar,
                'sancr_ham_kembang' => $request->sancr_ham_kembang,

                'sancr_bay_mati' => $request->sancr_bay_mati,
                'sancr_ham_leb_bulan' => $request->sancr_ham_leb_bulan,
                'sancr_let_sungsang' => $request->sancr_let_sungsang,
                'sancr_let_lintang' => $request->sancr_let_lintang,
                'sancr_perdar_ham' => $request->sancr_perdar_ham,
                'sancr_per_eks' => $request->sancr_per_eks,
                'sancr_score' => $request->sancr_score
            ];

            EiancServiceAncRisk::where('sancr_id', $request->idx)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - Risk ' . $request->idx
            ]);

            return redirect()->back();
        }
    }

    public function icd(Request $request)
    {
        if ($request->icd == '') {
            return redirect()->back()->withInput()->with('icd', 'Options not selected');
        }

        $input = [
            'sancicd_anc_d_id' => $request->id,
            'sancicd_icd' => $request->icd,
        ];

        $store = EiancServiceAncIcd::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah anc - risk - icd ' . $store->sancr_id
        ]);

        return redirect()->back();
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

    public function destroy($id)
    {
        $find = EiancServiceAncIcd::find(Crypt::decrypt($id));

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus anc - risk - icd ' . Crypt::decrypt($id)
        ]);

        $find->delete();
        return redirect()->back();
    }
}
