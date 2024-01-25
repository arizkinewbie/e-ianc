<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\EiancKb;
use App\Models\EiancServiceKb;
use App\Models\EiancTemoi;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use App\Models\SelecKbEffect;
use App\Models\SelecKbFailed;
use App\Models\SelecKbKompli;
use App\Models\SelecKbTool;
use App\Models\SelecPay;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceKBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = EiancServiceKb::where('sanckb_norm', Crypt::decrypt($id))->get();

        return view('pages/service/kb/index', compact('id', 'data'));
    }

    public function craete($id, $xid)
    {
        $temoi = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        if ($temoi[0]->ins_bpjs == '1') {
            $pay = SelecPay::all();
        } else {
            $pay = SelecPay::where('pay_code', '!=', '002')->get();
        }

        $skbtool0 = SelecKbTool::all();
        $skbtool = SelecKbTool::where('kbt_id', '!=', '1')->get();
        $icd = SelecIcd::all();
        $desposisi = SelecDespoisi::all();

        $data = EiancServiceKb::where('sanckb_norm', Crypt::decrypt($id))->where('sanckb_id', Crypt::decrypt($xid))->get();
        $xdata = EiancServiceKb::where('sanckb_norm', Crypt::decrypt($id))->orderBy('sanckb_id', 'DESC')->get();

        if (count($data) > 0) {
            $show = '0';
            $ds = EiancDesposisi::where('des_reg_no', $data[0]->sanckb_no_reg)->get();
            $com = compact('id', 'pay', 'skbtool', 'data', 'xdata', 'show', 'icd', 'desposisi', 'ds', 'skbtool0');
        } else {
            if (count($xdata) > 0) {
                $show = '1';
            } else {
                $show = '0';
            }

            $com = compact('id', 'pay', 'skbtool', 'data', 'xdata', 'show', 'icd', 'desposisi', 'skbtool0');
        }

        return view('pages/service/kb/create', $com);
    }

    public function store(Request $request)
    {
        if ($request->sanckb_pay == '') {
            return redirect()->back()->withInput()->with('sanckb_pay', 'Options not selected');
        }

        if ($request->sanckb_nifas == '') {
            return redirect()->back()->withInput()->with('sanckb_nifas', 'Options not selected');
        }

        $this->validate($request, [
            'sanckb_life_male' => 'required',
            'sanckb_life_female' => 'required',
            'sanckb_last_mens' => 'required',
            'sanckb_g' => 'required',
            'sanckb_p' => 'required',
            'sanckb_a' => 'required',
            'rdosis' => 'required',
            'sanckb_last_soon' => 'required',
        ]);

        if ($request->sanckb_just_marr == '') {
            return redirect()->back()->withInput()->with('sanckb_just_marr', 'Options not selected');
        }

        if ($request->sanckb_asi_went == '') {
            return redirect()->back()->withInput()->with('sanckb_asi_went', 'Options not selected');
        }

        $find = EiancServiceKb::where('sanckb_id', $request->id)->get();

        $kbt = EiancKb::where('kb_id', $request->ralat)->join('selec_kb_tools', 'selec_kb_tools.kbt_id', '=', 'eianc_kbs.kb_kbt_id')->value('kbt_id');

        if ($request->ralat == 'x') {
            Alert::error('Gagal', 'Alat Kontrasepsi belum dipilih, tentukan terlebih dahulu');
            return redirect()->back()->withInput();
        } else {
            if (count($find) < 1) {
                if ($request->rdosis > $request->rstok) {
                    Alert::error('Gagal', 'Dosis melebihi STOK BARANG');
                    return redirect()->back()->withInput();
                } else {
                    $input = [
                        'sanckb_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
                        'sanckb_no_reg' => date('y') . '-' . rand(),
                        'sanckb_date' => date('Y-m-d'),
                        'sanckb_norm' => Crypt::decrypt($request->norm),
                        'sanckb_pay' => $request->sanckb_pay,
                        'sanckb_nifas' => $request->sanckb_nifas,
                        'sanckb_life_male' => $request->sanckb_life_male,
                        'sanckb_life_female' => $request->sanckb_life_female,
                        'sanckb_last_soon' => $request->sanckb_last_soon,
                        'sanckb_last_mens' => $request->sanckb_last_mens,
                        'sanckb_just_marr' => $request->sanckb_just_marr,
                        'sanckb_g' => $request->sanckb_g,
                        'sanckb_p' => $request->sanckb_p,
                        'sanckb_a' => $request->sanckb_a,
                        'sanckb_asi_went' => $request->sanckb_asi_went,
                        'sanckb_diseases_yellow' => (isset($request->sanckb_diseases_yellow)) ? 1 : 0,
                        'sanckb_diseases_bleeding' => (isset($request->sanckb_diseases_bleeding)) ? 1 : 0,
                        'sanckb_diseases_white' => (isset($request->sanckb_diseases_white)) ? 1 : 0,
                        'sanckb_diseases_tumor' => (isset($request->sanckb_diseases_tumor)) ? 1 : 0,
                        'sanckb_gen_dis' => $request->sanckb_gen_dis,
                        'sanckb_weight' => $request->sanckb_weight,
                        'sanckb_blood_press' => $request->sanckb_blood_press,
                        'sanckb_rahim' => $request->sanckb_rahim,
                        'sanckb_uidmow_radang' => (isset($request->sanckb_uidmow_radang)) ? 1 : 0,
                        'sanckb_uidmow_tumor' => (isset($request->sanckb_uidmow_tumor)) ? 1 : 0,
                        'sanckb_mowmop_diabetes' => (isset($request->sanckb_mowmop_diabetes)) ? 1 : 0,
                        'sanckb_mowmop_blood_froz' => (isset($request->sanckb_mowmop_blood_froz)) ? 1 : 0,
                        'sanckb_mowmop_orcepidi' => (isset($request->sanckb_mowmop_orcepidi)) ? 1 : 0,
                        'sanckb_mowmop_tumor' => (isset($request->sanckb_mowmop_tumor)) ? 1 : 0,
                        'sanckb_new_ordered' => $request->sanckb_new_ordered,
                        'sanckb_kbt_id' => $kbt,
                        'sanckb_use' => $request->ralat,
                        'sanckb_dosis' => $request->rdosis,
                        'sanckb_last_use' => $request->sanckb_last_use,
                        'sanckb_status' => $request->sanckb_status,
                        'sanckb_user_id' => auth()->user()->id,
                    ];

                    $toolkb = EiancKb::find($request->ralat);
                    $usedtool = $toolkb->kb_remainder - $request->rdosis;

                    EiancKb::where('kb_id', $toolkb->kb_id)->update(['kb_remainder' => $usedtool]);

                    $store = EiancServiceKb::create($input);

                    SysLog::create([
                        'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                        'log_browser' => get_client_browser(),
                        'log_os' => $_SERVER['HTTP_USER_AGENT'],
                        'log_user_id' => auth()->user()->id,
                        'log_action' => 'Tambah KB ' . Crypt::decrypt($request->norm) . ' - ' . $store->sanckb_id
                    ]);

                    if ($request->desid == 2) {
                        $despo = [
                            'des_reg_no' => $input['sanckb_no_reg'],
                            'des_norm' => Crypt::decrypt($request->norm),
                            'des_ins_id' => $input['sanckb_ins_id'],
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
                            'des_reg_no' => $input['sanckb_no_reg'],
                            'des_norm' => Crypt::decrypt($request->norm),
                            'des_ins_id' => $input['sanckb_ins_id'],
                            'des_de_id' => $request->desid,
                            'des_des_unit' => null,
                            'des_des_ins' => null,
                            'des_diagnose' => null,
                            'des_first_aid' => null,
                            'des_user_id' => auth()->user()->id,
                        ];

                        $store2 = EiancDesposisi::create($despo);
                    }

                    Alert::success('Sukses', 'Berhasil simpan data');

                    if ($request->desid == 2) {
                        return redirect()->route('service.kb', $request->norm)->with('print', '')->with(compact('id2'));
                    } else {
                        return redirect()->route('service.kb', $request->norm);
                    }
                }
            } else {
                if ($request->rdosis > $request->rstok && $request->rstok != '') {
                    Alert::error('Gagal', 'Dosis melebihi STOK BARANG');
                    return redirect()->back()->withInput();
                } else {
                    if ($request->ralat != $find[0]->sanckb_use) {
                        $toolkbplus = EiancKb::find($find[0]->sanckb_use);
                        $toolplus = $toolkbplus->kb_remainder + $find[0]->sanckb_dosis;
                        EiancKb::where('kb_id', $toolkbplus->kb_id)->update(['kb_remainder' => $toolplus]);

                        $toolkbmin = EiancKb::find($request->ralat);
                        $toolmin = $toolkbmin->kb_remainder - $request->rdosis;
                        EiancKb::where('kb_id', $toolkbmin->kb_id)->update(['kb_remainder' => $toolmin]);
                    } else {
                        if ($request->ralat == $find[0]->sanckb_use && $request->rdosis != $find[0]->sanckb_dosis) {
                            $toolkbplus = EiancKb::find($request->ralat);
                            $toolplus = $toolkbplus->kb_remainder + $find[0]->sanckb_dosis;
                            EiancKb::where('kb_id', $toolkbplus->kb_id)->update(['kb_remainder' => $toolplus]);

                            $toolkbmin = EiancKb::find($request->ralat);
                            $toolmin = $toolkbmin->kb_remainder - $request->rdosis;
                            EiancKb::where('kb_id', $toolkbmin->kb_id)->update(['kb_remainder' => $toolmin]);

                            $alat = $request->ralat;
                            $dosis = $request->rdosis;
                        } else {
                            $alat = $request->ralat;
                            $dosis = $request->rdosis;
                        }
                    }

                    $input = [
                        'sanckb_pay' => $request->sanckb_pay,
                        'sanckb_nifas' => $request->sanckb_nifas,
                        'sanckb_life_male' => $request->sanckb_life_male,
                        'sanckb_life_female' => $request->sanckb_life_female,
                        'sanckb_last_soon' => $request->sanckb_last_soon,
                        'sanckb_last_mens' => $request->sanckb_last_mens,
                        'sanckb_just_marr' => $request->sanckb_just_marr,
                        'sanckb_g' => $request->sanckb_g,
                        'sanckb_p' => $request->sanckb_p,
                        'sanckb_a' => $request->sanckb_a,
                        'sanckb_asi_went' => $request->sanckb_asi_went,
                        'sanckb_diseases_yellow' => (isset($request->sanckb_diseases_yellow)) ? 1 : 0,
                        'sanckb_diseases_bleeding' => (isset($request->sanckb_diseases_bleeding)) ? 1 : 0,
                        'sanckb_diseases_white' => (isset($request->sanckb_diseases_white)) ? 1 : 0,
                        'sanckb_diseases_tumor' => (isset($request->sanckb_diseases_tumor)) ? 1 : 0,
                        'sanckb_gen_dis' => $request->sanckb_gen_dis,
                        'sanckb_weight' => $request->sanckb_weight,
                        'sanckb_blood_press' => $request->sanckb_blood_press,
                        'sanckb_rahim' => $request->sanckb_rahim,
                        'sanckb_uidmow_radang' => (isset($request->sanckb_uidmow_radang)) ? 1 : 0,
                        'sanckb_uidmow_tumor' => (isset($request->sanckb_uidmow_tumor)) ? 1 : 0,
                        'sanckb_mowmop_diabetes' => (isset($request->sanckb_mowmop_diabetes)) ? 1 : 0,
                        'sanckb_mowmop_blood_froz' => (isset($request->sanckb_mowmop_blood_froz)) ? 1 : 0,
                        'sanckb_mowmop_orcepidi' => (isset($request->sanckb_mowmop_orcepidi)) ? 1 : 0,
                        'sanckb_mowmop_tumor' => (isset($request->sanckb_mowmop_tumor)) ? 1 : 0,
                        'sanckb_new_ordered' => $request->sanckb_new_ordered,
                        'sanckb_kbt_id' => $kbt,
                        'sanckb_use' => $alat,
                        'sanckb_dosis' => $dosis,
                        'sanckb_last_use' => $request->sanckb_last_use,
                    ];

                    $store = EiancServiceKb::where('sanckb_id', $request->id)->update($input);

                    SysLog::create([
                        'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                        'log_browser' => get_client_browser(),
                        'log_os' => $_SERVER['HTTP_USER_AGENT'],
                        'log_user_id' => auth()->user()->id,
                        'log_action' => 'Ubah KB ' . Crypt::decrypt($request->norm) . ' - ' . $request->id
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

                    Alert::success('Sukses', 'Berhasil ubah data');
                    if ($request->desid == 2) {
                        return redirect()->route('service.kb', $request->norm)->with('print', '')->with(compact('id2'));
                    } else {
                        return redirect()->route('service.kb', $request->norm);
                    }
                }
            }
        }
    }

    public function edit($id, $xid)
    {
        $data = EiancServiceKb::find(Crypt::decrypt($xid));

        $efek = SelecKbEffect::all();
        $kompli = SelecKbKompli::all();
        $fail = SelecKbFailed::all();

        return view('pages/service/kb/edit', compact('id', 'xid', 'data', 'efek', 'kompli', 'fail'));
    }

    public function update(Request $request)
    {
        $input = [
            'sanckb_remove' => $request->sanckb_remove,
            'sanckb_allergy' => $request->sanckb_allergy,
            'sanckb_compli' => $request->sanckb_compli,
            'sanckb_failed' => $request->sanckb_failed,
            'sanckb_allergy_id' => $request->sanckb_allergy_id,
            'sanckb_compli_id' => $request->sanckb_compli_id,
            'sanckb_failed_id' => $request->sanckb_failed_id,
            'sanckb_respon' => $request->sanckb_respon,
        ];

        EiancServiceKb::where('sanckb_id', $request->xid)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah Gejala $ Copot KB ' . Crypt::decrypt($request->id) . ' - ' . $request->xid
        ]);

        Alert::success('Sukses', 'Berhasil ubah data');
        return redirect()->route('service.kb', $request->id);
    }

    public function destroy($id, $xid)
    {
        $find = EiancServiceKb::find(Crypt::decrypt($xid));

        $toolkbplus = EiancKb::find($find->sanckb_use);
        $toolplus = $toolkbplus->kb_remainder + $find->sanckb_dosis;
        EiancKb::where('kb_id', $toolkbplus->kb_id)->update(['kb_remainder' => $toolplus]);
        EiancDesposisi::where('des_reg_no', $find->sanckb_no_reg)->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus KB ' . $find->sanckb_norm . ' - ' . $find->sanckb_id
        ]);

        $find->delete();

        Alert::success('Sukses', 'Berhasil hapus data');
        return redirect()->route('service.kb', $id);
    }
}
