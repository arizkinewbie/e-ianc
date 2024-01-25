<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDrug;
use App\Models\EiancServiceAncTreatment;
use App\Models\EiancServiceAncTreatmentRecipe;
use App\Models\EiancTemoi;
use App\Models\SelecTt;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceANCTreatmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $stt = SelecTt::all();
        $sobat = EiancDrug::where('dg_remainder', '>', 0)
            ->where('dg_ins_id', EiancTemoi::find(auth()->user()->temoi)->value('temoi_ins_id'))
            ->Where('dg_expired_date', '>', date('Y-m-d'))
            ->get();

        $data = EiancServiceAncTreatment::where('sanct_anc_d_id', Crypt::decrypt($det))->get();

        $xdata = EiancServiceAncTreatment::join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_anc_treatments.sanct_anc_d_id')
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

        return view('pages/service/anc/detail/anc/treatment/index', compact('id', 'anc', 'det', 'show', 'data', 'xdata', 'stt', 'sobat'));
    }

    public function store(Request $request)
    {
        if ($request->sanct_tt == '') {
            return redirect()->back()->withInput()->with('sanct_tt', 'Options not selected');
        }
        if ($request->sanct_arsip_kia == '') {
            return redirect()->back()->withInput()->with('sanct_arsip_kia', 'Options not selected');
        }
        if ($request->sanct_kelambu == '') {
            return redirect()->back()->withInput()->with('sanct_kelambu', 'Options not selected');
        }

        $find = EiancServiceAncTreatment::where('sanct_anc_d_id', Crypt::decrypt($request->det))->get();

        if (count($find) < 1) {
            $input = [
                'sanct_anc_d_id' => Crypt::decrypt($request->det),
                'sanct_tt' => $request->sanct_tt,
                'sanct_tt_date' => $request->sanct_tt_date,
                'sanct_arsip_kia' => $request->sanct_arsip_kia,
                'sanct_kelambu' => $request->sanct_kelambu,
                'sanct_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceAncTreatment::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - Treatment ' . $store->sanct_id
            ]);

            return redirect()->back();
        } else {
            $input = [
                'sanct_tt' => $request->sanct_tt,
                'sanct_tt_date' => $request->sanct_tt_date,
                'sanct_arsip_kia' => $request->sanct_arsip_kia,
                'sanct_kelambu' => $request->sanct_kelambu
            ];

            EiancServiceAncTreatment::where('sanct_id', $request->idx)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - Treatment ' . $request->idx
            ]);

            return redirect()->back();
        }
    }

    public function obat(Request $request)
    {
        if ($request->sanctr_drug_id == '') {
            return redirect()->back()->withInput()->with('sanctr_drug_id', 'Options not selected');
        }

        $this->validate($request, [
            'sanctr_qty' => 'required',
            'sanctr_dosis' => 'required',
        ]);

        if ($request->sanctr_use == '') {
            return redirect()->back()->withInput()->with('sanctr_use', 'Options not selected');
        }

        $input = [
            'sanctr_t_id' => $request->id,
            'sanctr_drug_id' => $request->sanctr_drug_id,
            'sanctr_qty' => $request->sanctr_qty,
            'sanctr_dosis' => $request->sanctr_dosis,
            'sanctr_use' => $request->sanctr_use,
            'sanctr_user_id' => auth()->user()->id,
        ];

        $find = EiancDrug::find($request->sanctr_drug_id);

        if ($request->sanctr_qty > $find->dg_remainder) {
            Alert::error('Gagal', 'Dosis melebihi stock');
            return redirect()->back()->withInput();
        } else {
            $store = EiancServiceAncTreatmentRecipe::create($input);

            EiancDrug::where('dg_id', $request->sanctr_drug_id)->update(['dg_remainder' => $find->dg_remainder - $request->sanctr_qty]);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - Treatment - OBAT ' . $store->sanctr_id
            ]);

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = EiancServiceAncTreatmentRecipe::find(Crypt::decrypt($id));

        $find = EiancDrug::find($data->sanctr_drug_id);
        EiancDrug::where('dg_id', $data->sanctr_drug_id)->update(['dg_remainder' => $find->dg_remainder + $data->sanctr_qty]);

        $data->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus anc - Treatment - OBAT' . Crypt::decrypt($id)
        ]);

        return redirect()->back();
    }
}
