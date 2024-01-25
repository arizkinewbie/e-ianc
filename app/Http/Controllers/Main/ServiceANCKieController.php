<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancServiceAncKie;
use App\Models\SelecPragAssis;
use App\Models\SelecPragAssisWith;
use App\Models\SelecPragBloodAssis;
use App\Models\SelecPragPlace;
use App\Models\SelecPragTrans;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceANCKieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $spaw = SelecPragAssis::all();
        $strans = SelecPragTrans::all();
        $spp = SelecPragPlace::all();
        $sbb = SelecPragBloodAssis::all();
        $spa = SelecPragAssisWith::all();

        $data = EiancServiceAncKie::where('sanckie_anc_d_id', Crypt::decrypt($det))->get();

        $xdata = EiancServiceAncKie::join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_anc_kies.sanckie_anc_d_id')
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

        return view('pages/service/anc/detail/anc/kie/index', compact('id', 'anc', 'det', 'data', 'show', 'xdata', 'spaw', 'strans', 'spp', 'sbb', 'spa'));
    }

    public function store(Request $request)
    {
        if ($request->sanckie_mat_ass == '') {
            return redirect()->back()->withInput()->with('sanckie_mat_ass', 'Options not selected');
        }
        if ($request->sanckie_trans == '') {
            return redirect()->back()->withInput()->with('sanckie_trans', 'Options not selected');
        }
        if ($request->sanckie_mat_place == '') {
            return redirect()->back()->withInput()->with('sanckie_mat_place', 'Options not selected');
        }
        if ($request->sanckie_blood_bank == '') {
            return redirect()->back()->withInput()->with('sanckie_blood_bank', 'Options not selected');
        }
        if ($request->sanckie_assis == '') {
            return redirect()->back()->withInput()->with('sanckie_assis', 'Options not selected');
        }
        if ($request->sanckie_sup_fe == '') {
            return redirect()->back()->withInput()->with('sanckie_sup_fe', 'Options not selected');
        }
        if ($request->sanckie_food_cal_fe == '') {
            return redirect()->back()->withInput()->with('sanckie_food_cal_fe', 'Options not selected');
        }
        if ($request->sanckie_phbs == '') {
            return redirect()->back()->withInput()->with('sanckie_phbs', 'Options not selected');
        }
        if ($request->sanckie_pmt == '') {
            return redirect()->back()->withInput()->with('sanckie_pmt', 'Options not selected');
        }
        if ($request->sanckie_dan_hm == '') {
            return redirect()->back()->withInput()->with('sanckie_dan_hm', 'Options not selected');
        }
        if ($request->sanckie_def_hiv == '') {
            return redirect()->back()->withInput()->with('sanckie_def_hiv', 'Options not selected');
        }
        if ($request->sanckie_kia_book == '') {
            return redirect()->back()->withInput()->with('sanckie_kia_book', 'Options not selected');
        }
        if ($request->sanckie_yodium == '') {
            return redirect()->back()->withInput()->with('sanckie_yodium', 'Options not selected');
        }
        if ($request->sanckie_fis_hm == '') {
            return redirect()->back()->withInput()->with('sanckie_fis_hm', 'Options not selected');
        }
        if ($request->sanckie_motiv_kdrt == '') {
            return redirect()->back()->withInput()->with('sanckie_motiv_kdrt', 'Options not selected');
        }

        if ($request->sanckie_tt == '') {
            return redirect()->back()->withInput()->with('sanckie_tt', 'Options not selected');
        }
        if ($request->sanckie_preg_exer == '') {
            return redirect()->back()->withInput()->with('sanckie_preg_exer', 'Options not selected');
        }
        if ($request->sanckie_ht_2 == '') {
            return redirect()->back()->withInput()->with('sanckie_ht_2', 'Options not selected');
        }
        if ($request->sanckie_com_fetus == '') {
            return redirect()->back()->withInput()->with('sanckie_com_fetus', 'Options not selected');
        }
        if ($request->sanckie_preg_class == '') {
            return redirect()->back()->withInput()->with('sanckie_preg_class', 'Options not selected');
        }
        if ($request->sanckie_music == '') {
            return redirect()->back()->withInput()->with('sanckie_music', 'Options not selected');
        }

        if ($request->sanckie_imd == '') {
            return redirect()->back()->withInput()->with('sanckie_imd', 'Options not selected');
        }
        if ($request->sanckie_kolostrum == '') {
            return redirect()->back()->withInput()->with('sanckie_kolostrum', 'Options not selected');
        }
        if ($request->sanckie_asi_6 == '') {
            return redirect()->back()->withInput()->with('sanckie_asi_6', 'Options not selected');
        }
        if ($request->sanckie_asi_give == '') {
            return redirect()->back()->withInput()->with('sanckie_asi_give', 'Options not selected');
        }
        if ($request->sanckie_asi_went == '') {
            return redirect()->back()->withInput()->with('sanckie_asi_went', 'Options not selected');
        }
        if ($request->sanckie_boob_treatment == '') {
            return redirect()->back()->withInput()->with('sanckie_boob_treatment', 'Options not selected');
        }
        if ($request->sanckie_ht3 == '') {
            return redirect()->back()->withInput()->with('sanckie_ht3', 'Options not selected');
        }
        if ($request->sanckie_preg_iden == '') {
            return redirect()->back()->withInput()->with('sanckie_preg_iden', 'Options not selected');
        }
        if ($request->sanckie_dan_nifas == '') {
            return redirect()->back()->withInput()->with('sanckie_dan_nifas', 'Options not selected');
        }
        if ($request->sanckie_fm == '') {
            return redirect()->back()->withInput()->with('sanckie_fm', 'Options not selected');
        }
        if ($request->sanckie_kb_nifas == '') {
            return redirect()->back()->withInput()->with('sanckie_kb_nifas', 'Options not selected');
        }

        $find = EiancServiceAncKie::where('sanckie_anc_d_id', Crypt::decrypt($request->det))->get();

        if (count($find) < 1) {
            $input = [
                'sanckie_anc_d_id' => Crypt::decrypt($request->det),
                'sanckie_mat_ass' => $request->sanckie_mat_ass,
                'sanckie_trans' => $request->sanckie_trans,
                'sanckie_sup_fe' => $request->sanckie_sup_fe,
                'sanckie_food_cal_fe' => $request->sanckie_food_cal_fe,
                'sanckie_phbs' => $request->sanckie_phbs,
                'sanckie_mat_place' => $request->sanckie_mat_place,
                'sanckie_blood_bank' => $request->sanckie_blood_bank,
                'sanckie_pmt' => $request->sanckie_pmt,
                'sanckie_dan_hm' => $request->sanckie_dan_hm,
                'sanckie_def_hiv' => $request->sanckie_def_hiv,
                'sanckie_assis' => $request->sanckie_assis,
                'sanckie_kia_book' => $request->sanckie_kia_book,
                'sanckie_yodium' => $request->sanckie_yodium,
                'sanckie_fis_hm' => $request->sanckie_fis_hm,
                'sanckie_motiv_kdrt' => $request->sanckie_motiv_kdrt,
                'sanckie_tt' => $request->sanckie_tt,
                'sanckie_tt_no' => $request->sanckie_tt_no,
                'sanckie_preg_exer' => $request->sanckie_preg_exer,
                'sanckie_ht_2' => $request->sanckie_ht_2,
                'sanckie_com_fetus' => $request->sanckie_com_fetus,
                'sanckie_preg_class' => $request->sanckie_preg_class,
                'sanckie_music' => $request->sanckie_music,
                'sanckie_imd' => $request->sanckie_imd,
                'sanckie_kolostrum' => $request->sanckie_kolostrum,
                'sanckie_asi_6' => $request->sanckie_asi_6,
                'sanckie_asi_comp' => $request->sanckie_asi_comp,
                'sanckie_asi_give' => $request->sanckie_asi_give,
                'sanckie_asi_went' => $request->sanckie_asi_went,
                'sanckie_boob_treatment' => $request->sanckie_boob_treatment,
                'sanckie_ht3' => $request->sanckie_ht3,
                'sanckie_preg_iden' => $request->sanckie_preg_iden,
                'sanckie_dan_nifas' => $request->sanckie_dan_nifas,
                'sanckie_fm' => $request->sanckie_fm,
                'sanckie_kb_nifas' => $request->sanckie_kb_nifas,
                'sanckie_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceAncKie::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - kie ' . $store->sanckie_id
            ]);

            return redirect()->route('service.anc.anc.treatment', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
        } else {
            $input = [
                'sanckie_mat_ass' => $request->sanckie_mat_ass,
                'sanckie_trans' => $request->sanckie_trans,
                'sanckie_sup_fe' => $request->sanckie_sup_fe,
                'sanckie_food_cal_fe' => $request->sanckie_food_cal_fe,
                'sanckie_phbs' => $request->sanckie_phbs,
                'sanckie_mat_place' => $request->sanckie_mat_place,
                'sanckie_blood_bank' => $request->sanckie_blood_bank,
                'sanckie_pmt' => $request->sanckie_pmt,
                'sanckie_dan_hm' => $request->sanckie_dan_hm,
                'sanckie_def_hiv' => $request->sanckie_def_hiv,
                'sanckie_assis' => $request->sanckie_assis,
                'sanckie_kia_book' => $request->sanckie_kia_book,
                'sanckie_yodium' => $request->sanckie_yodium,
                'sanckie_fis_hm' => $request->sanckie_fis_hm,
                'sanckie_motiv_kdrt' => $request->sanckie_motiv_kdrt,
                'sanckie_tt' => $request->sanckie_tt,
                'sanckie_tt_no' => $request->sanckie_tt_no,
                'sanckie_preg_exer' => $request->sanckie_preg_exer,
                'sanckie_ht_2' => $request->sanckie_ht_2,
                'sanckie_com_fetus' => $request->sanckie_com_fetus,
                'sanckie_preg_class' => $request->sanckie_preg_class,
                'sanckie_music' => $request->sanckie_music,
                'sanckie_imd' => $request->sanckie_imd,
                'sanckie_kolostrum' => $request->sanckie_kolostrum,
                'sanckie_asi_6' => $request->sanckie_asi_6,
                'sanckie_asi_comp' => $request->sanckie_asi_comp,
                'sanckie_asi_give' => $request->sanckie_asi_give,
                'sanckie_asi_went' => $request->sanckie_asi_went,
                'sanckie_boob_treatment' => $request->sanckie_boob_treatment,
                'sanckie_ht3' => $request->sanckie_ht3,
                'sanckie_preg_iden' => $request->sanckie_preg_iden,
                'sanckie_dan_nifas' => $request->sanckie_dan_nifas,
                'sanckie_fm' => $request->sanckie_fm,
                'sanckie_kb_nifas' => $request->sanckie_kb_nifas
            ];

            EiancServiceAncKie::where('sanckie_id', $request->idx)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - kie ' . $request->idx
            ]);

            return redirect()->route('service.anc.anc.treatment', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
        }
    }
}
