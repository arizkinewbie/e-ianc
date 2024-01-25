<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\EiancServiceVaksin;
use App\Models\EiancTemoi;
use App\Models\EiancVaksin;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use App\Models\SelecPay;
use App\Models\SelecVaksin;
use App\Models\SelecVaksinService;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceVaksinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = EiancServiceVaksin::where('svak_norm', Crypt::decrypt($id))
            ->orderBy('svak_id', 'DESC')
            ->get();

        return view('pages/service/vaksin/index', compact('id', 'data'));
    }

    public function create($id)
    {
        $temoi = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        if ($temoi[0]->ins_bpjs == '1') {
            $pay = SelecPay::all();
        } else {
            $pay = SelecPay::where('pay_code', '!=', '002')->get();
        }

        $tvaksin = SelecVaksin::all();
        $svaksin = SelecVaksinService::all();
        $desposisi = SelecDespoisi::all();
        $icd = SelecIcd::all();

        return view('pages/service/vaksin/create', compact('id', 'pay', 'tvaksin', 'desposisi', 'icd', 'svaksin'));
    }

    public function search($type)
    {
        $vaksin = EiancVaksin::where('vak_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
            ->where('vak_type', $type)
            ->where('vak_expired_date', '>', date('Y-m-d'))
            ->where('vak_remainder', '>', '0')
            ->orderBy('vak_id', 'DESC')
            ->get();

        return response($vaksin);
    }

    public function detail($id)
    {
        $vaksin = EiancVaksin::find($id);

        return response($vaksin);
    }

    public function store(Request $request)
    {
        if ($request->svak_pay == '') {
            return redirect()->back()->withInput()->with('svak_pay', 'Options not selected');
        }

        $this->validate($request, [
            'svak_dosis' => 'required',
            'suhu' => 'required',
        ]);

        if ($request->svak_servak_id == '') {
            return redirect()->back()->withInput()->with('svak_servak_id', 'Options not selected');
        }

        if ($request->svak_pay == '002') {
            $this->validate($request, [
                'svak_noka' => 'required',
            ]);
        }

        $vaksin = EiancVaksin::find($request->svak_vak_id);

        $input = [
            'svak_ins_id' => EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'),
            'svak_servak_id' => $request->svak_servak_id,
            'svak_date' => date('Y-m-d'),
            'svak_pay' => $request->svak_pay,
            'svak_noka' => $request->svak_noka,
            'svak_norm' => Crypt::decrypt($request->norm),
            'svak_vak_id' => $request->svak_vak_id,
            'svak_dosis' => (float)$request->svak_dosis . ' ' . $vaksin->vak_unit,
            'svak_temp' => $request->suhu,
            'svak_reg_no' => date('y') . '-' . rand(),
            'svak_user_id' => auth()->user()->id
        ];

        if ((float)$request->svak_dosis > $vaksin->vak_remainder) {
            Alert::error('Gagal', 'Dosis melebihi stock');
            return redirect()->back()->withInput();
        } else {
            EiancVaksin::where('vak_id', $request->svak_vak_id)->update(['vak_remainder' => ((float)$vaksin->vak_remainder - (float)$request->svak_dosis)]);

            $store = EiancServiceVaksin::create($input);

            if ($request->desid == 2) {
                $despo = [
                    'des_reg_no' => $input['svak_reg_no'],
                    'des_norm' => Crypt::decrypt($request->norm),
                    'des_ins_id' => $input['svak_ins_id'],
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
                    'des_reg_no' => $input['svak_reg_no'],
                    'des_norm' => Crypt::decrypt($request->norm),
                    'des_ins_id' => $input['svak_ins_id'],
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
                'log_action' => 'Tambah layanan vaksin ' . $store->svak_id . '-' . Crypt::decrypt($request->norm)
            ]);

            Alert::success('Sukses', 'Oke, Data sudah tersimpan');

            if ($request->desid == 2) {
                return redirect()->route('service.vaksin', $request->norm)->with('print', '')->with(compact('id2'));
            } else {
                return redirect()->route('service.vaksin', $request->norm);
            }
        }
    }

    public function symptom($id)
    {
        $data = EiancServiceVaksin::find(Crypt::decrypt($id));

        return view('pages/service/vaksin/symptom', compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'svak_demam' => 'required',
            'svak_bengkak' => 'required',
            'svak_merah' => 'required',
            'svak_muntah' => 'required',
        ]);

        $input = [
            'svak_demam' => $request->svak_demam,
            'svak_bengkak' => $request->svak_bengkak,
            'svak_merah' => $request->svak_merah,
            'svak_muntah' => $request->svak_muntah,
            'svak_lainnya' => $request->svak_lainnya,
        ];

        EiancServiceVaksin::where('svak_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah layanan vaksin ' . $request->id
        ]);

        Alert::success('Sukses', 'Oke, Data sudah tersimpan');
        return redirect()->route('service.vaksin', Crypt::encrypt($request->norm));
    }

    public function destroy(Request $request)
    {
        $data = EiancServiceVaksin::find(Crypt::decrypt($request->id));

        $explode = $data->svak_dosis;
        $vaksin = EiancVaksin::find($data->svak_vak_id);
        EiancVaksin::where('vak_id', $data->svak_vak_id)->update(['vak_remainder' => ($vaksin->vak_remainder + $explode[0])]);
        $data1 = EiancDesposisi::where('des_reg_no', $data->svak_reg_no)->delete();
        $data->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus layanan vaksin ' . Crypt::decrypt($request->id)
        ]);

        Alert::success('Sukses', 'Oke, Data sudah dihapus');
        return redirect()->route('service.vaksin', $request->norm);
    }
}
