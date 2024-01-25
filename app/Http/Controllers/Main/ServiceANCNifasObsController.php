<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\EiancDrug;
use App\Models\EiancServiceNifasObser;
use App\Models\EiancServiceNifasRecipe;
use App\Models\EiancTemoi;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceANCNifasObsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $data = EiancServiceNifasObser::where('sancno_anc_d_id', Crypt::decrypt($det))->get();

        return view('pages/service/anc/detail/nifas/observasi/index', compact('id', 'anc', 'det', 'data'));
    }

    public function create($id, $anc, $det, $idx)
    {
        $data = EiancServiceNifasObser::where('sancno_id', $idx)->get();
        $sobat = EiancDrug::where('dg_remainder', '>', 0)
            ->where('dg_ins_id', EiancTemoi::find(auth()->user()->temoi)->value('temoi_ins_id'))
            ->Where('dg_expired_date', '>', date('Y-m-d'))
            ->get();

        $icd = SelecIcd::all();
        $desposisi = SelecDespoisi::all();

        return view('pages/service/anc/detail/nifas/observasi/create', compact('id', 'anc', 'det', 'data', 'sobat', 'icd', 'desposisi'));
    }

    public function store(Request $request)
    {
        if ($request->sancno_day == '') {
            return redirect()->back()->withInput()->with('sancno_day', 'Options not selected');
        }
        if ($request->sancno_time == '') {
            return redirect()->back()->withInput()->with('sancno_time', 'Options not selected');
        }

        $this->validate($request, [
            'sancno_date' => 'required',
            'sancno_day' => 'required',
            'sancno_time' => 'required',
            'sancno_tensi' => 'required',
            'sancno_nadi' => 'required',
            'sancno_suhu' => 'required',
            'sancno_cond' => 'required',
            'sancno_laktasi' => 'required',
            'sancno_perut' => 'required',
            'sancno_fun_uteri' => 'required',
            'sancno_kontraksi' => 'required',
            'sancno_perineum' => 'required',
            'sancno_lochea' => 'required',
            'sancno_flatus' => 'required',
            'sancno_miksi' => 'required',
            'sancno_defiksi' => 'required',
        ]);

        $find0 = EiancServiceNifasObser::where('sancno_day', $request->sancno_day)->where('sancno_time', $request->sancno_time)->get();
        $find = EiancServiceNifasObser::where('sancno_id', $request->id)->get();

        if (count($find) < 1) {
            if (count($find0) > 0) {
                Alert::error('Gagal', 'Data sudah pernah ada');
                return redirect()->back()->withInput();
            } else {
                $input = [
                    'sancno_anc_d_id' => Crypt::decrypt($request->det),
                    'sancno_no_reg' => date('y') . '-' . rand(),
                    'sancno_date' => $request->sancno_date,
                    'sancno_day' => $request->sancno_day,
                    'sancno_time' => $request->sancno_time,
                    'sancno_type' => 0,
                    'sancno_tensi' => $request->sancno_tensi,
                    'sancno_nadi' => $request->sancno_nadi,
                    'sancno_suhu' => $request->sancno_suhu,
                    'sancno_cond' => $request->sancno_cond,
                    'sancno_laktasi' => $request->sancno_laktasi,
                    'sancno_perut' => $request->sancno_perut,
                    'sancno_fun_uteri' => $request->sancno_fun_uteri,
                    'sancno_kontraksi' => $request->sancno_kontraksi,
                    'sancno_perineum' => $request->sancno_perineum,
                    'sancno_lochea' => $request->sancno_lochea,
                    'sancno_flatus' => $request->sancno_flatus,
                    'sancno_miksi' => $request->sancno_miksi,
                    'sancno_defiksi' => $request->sancno_defiksi,
                    'sancno_other' => $request->sancno_other,
                    'sancno_user_id' => auth()->user()->id,
                ];

                $store = EiancServiceNifasObser::create($input);

                SysLog::create([
                    'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                    'log_browser' => get_client_browser(),
                    'log_os' => $_SERVER['HTTP_USER_AGENT'],
                    'log_user_id' => auth()->user()->id,
                    'log_action' => 'Tambah anc - nifas observasi ' . $store->sancno_id
                ]);

                if ($request->desid == 2) {
                    $despo = [
                        'des_reg_no' => $input['sancno_no_reg'],
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

                    return redirect()->route('service.anc.no', ['id' => $request->xid, 'anc' => $request->anc, 'det' => $request->det, 'idx' => $store->sancno_id])->with('print', '')->with(compact('id2'));
                } else {
                    $despo = [
                        'des_reg_no' => $input['sancno_no_reg'],
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
                    return redirect()->route('service.anc.no', ['id' => $request->xid, 'anc' => $request->anc, 'det' => $request->det, 'idx' => $store->sancno_id]);
                }
            }
        } else {
            $input = [
                'sancno_date' => $request->sancno_date,
                'sancno_day' => $request->sancno_day,
                'sancno_time' => $request->sancno_time,
                'sancno_tensi' => $request->sancno_tensi,
                'sancno_nadi' => $request->sancno_nadi,
                'sancno_suhu' => $request->sancno_suhu,
                'sancno_cond' => $request->sancno_cond,
                'sancno_laktasi' => $request->sancno_laktasi,
                'sancno_perut' => $request->sancno_perut,
                'sancno_fun_uteri' => $request->sancno_fun_uteri,
                'sancno_kontraksi' => $request->sancno_kontraksi,
                'sancno_perineum' => $request->sancno_perineum,
                'sancno_lochea' => $request->sancno_lochea,
                'sancno_flatus' => $request->sancno_flatus,
                'sancno_miksi' => $request->sancno_miksi,
                'sancno_defiksi' => $request->sancno_defiksi,
                'sancno_other' => $request->sancno_other
            ];

            EiancServiceNifasObser::where('sancno_id', $request->id)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - nifas observasi ' . $request->id
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
                return redirect()->route('service.anc.no', ['id' => $request->xid, 'anc' => $request->anc, 'det' => $request->det, 'idx' => $request->id])->with('print', '')->with(compact('id2'));
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
                return redirect()->route('service.anc.no', ['id' => $request->xid, 'anc' => $request->anc, 'det' => $request->det, 'idx' => $request->id]);
            }
        }
    }

    public function destroy($idx)
    {
        $find = EiancServiceNifasObser::find($idx);
        $obat = EiancServiceNifasRecipe::where('sancnr_n_id', $idx)->where('sancnr_type', '1')->get();

        if (count($obat) > 0) {
            Alert::error('Gagal', 'Masih ada obat');
            return redirect()->back();
        } else {
            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Hapus anc - nifas observasi ' . $idx
            ]);

            $find->delete();

            return redirect()->back();
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
            'sancnr_type' => 0,
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
            'log_action' => 'Tambah anc - nifas observasi - OBAT ' . $store->sancnr_id
        ]);

        return redirect()->back();
    }

    public function obathapus($id)
    {
        $data = EiancServiceNifasRecipe::find(Crypt::decrypt($id));

        $find = EiancDrug::find($data->sancnr_drug_id);
        EiancDrug::where('dg_id', $data->sancnr_drug_id)->update(['dg_remainder' => $find->dg_remainder + $data->sancnr_qty]);
        EiancDesposisi::where('des_reg_no', $data[0]->sancno_no_reg)->delete();
        $data->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus anc - Nifa Observasi - OBAT' . Crypt::decrypt($id)
        ]);

        return redirect()->back();
    }
}
