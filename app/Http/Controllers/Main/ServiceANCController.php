<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancPatient;
use App\Models\EiancServiceAnc;
use App\Models\EiancServiceAncDetail;
use App\Models\EiancTemoi;
use App\Models\SelecHabit;
use App\Models\SelecMenCy;
use App\Models\SelecPay;
use App\Models\SelecPregAge;
use App\Models\SelecPregDes;
use App\Models\SelecPregMarr;
use App\Models\SelecPregWith;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceANCController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = EiancServiceAnc::where('sanc_norm', Crypt::decrypt($id))
            ->orderBy('sanc_id', 'DESC')
            ->get();

        return view('pages/service/anc/index', compact('id', 'data'));
    }

    public function create($id)
    {
        $find = EiancServiceAnc::where('sanc_norm', Crypt::decrypt($id))
            ->orderBy('sanc_id', 'DESC')
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->where('sancd_type', '1')
            ->get();

        $findc = EiancServiceAnc::where('sanc_norm', Crypt::decrypt($id))
            ->orderBy('sanc_id', 'DESC')
            ->get();

        if (count($findc) > 0) {
            if (count($find) < 1) {
                Alert::warning('Perhatian', 'ANC tidak dapat dilanjut karena Persalinan belum di inputkan pada Gravida sebelumnya');
                return redirect()->back();
            } else {
                $temoi = EiancTemoi::where('temoi_id', auth()->user()->temoi)
                    ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                    ->get();

                $data = EiancPatient::where('pat_norm', Crypt::decrypt($id))->get();

                if ($temoi[0]->ins_bpjs == '1') {
                    $pay = SelecPay::all();
                } else {
                    $pay = SelecPay::where('pay_code', '!=', '002')->get();
                }

                $spm = SelecPregMarr::all();
                $sage = SelecPregAge::all();
                $sdp = SelecPregDes::all();
                $spw = SelecPregWith::all();
                $shab = SelecHabit::all();
                $shaid = SelecMenCy::all();

                return view('pages/service/anc/create', compact('id', 'pay', 'data', 'spm', 'sage', 'sdp', 'spw', 'shab', 'shaid'));
            }
        } else {
            $temoi = EiancTemoi::where('temoi_id', auth()->user()->temoi)
                ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
                ->get();

            $data = EiancPatient::where('pat_norm', Crypt::decrypt($id))->get();

            if ($temoi[0]->ins_bpjs == '1') {
                $pay = SelecPay::all();
            } else {
                $pay = SelecPay::where('pay_code', '!=', '002')->get();
            }

            $spm = SelecPregMarr::all();
            $sage = SelecPregAge::all();
            $sdp = SelecPregDes::all();
            $spw = SelecPregWith::all();
            $shab = SelecHabit::all();
            $shaid = SelecMenCy::all();

            return view('pages/service/anc/create', compact('id', 'pay', 'data', 'spm', 'sage', 'sdp', 'spw', 'shab', 'shaid'));
        }
    }

    public function store(Request $request)
    {
        if ($request->sanc_kia == '') {
            return redirect()->back()->withInput()->with('sanc_kia', 'Options not selected');
        }

        $input = [
            'sanc_norm' => Crypt::decrypt($request->norm),
            'sanc_gravida' => $request->sanc_gravida,
            'sanc_partus' => $request->sanc_partus,
            'sanc_aborsi' => $request->sanc_aborsi,
            'sanc_partus' => $request->sanc_partus,
            'sanc_life' => $request->sanc_life,
            'sanc_death' => $request->sanc_death,
            'sanc_hpht' => $request->sanc_hpht,
            'sanc_hpl' => date('Y-m-d', strtotime($request->sanc_hpl)),
            'sanc_pregnancy1_marriage' => $request->sanc_pregnancy1_marriage,
            'sanc_pregnancy1_age' => $request->sanc_pregnancy1_age,
            'sanc_distance_pregnancy' => $request->sanc_distance_pregnancy,
            'sanc_pregnancy_failed' => $request->sanc_pregnancy_failed,
            'sanc_born_with' => $request->sanc_born_with,
            'sanc_kia' => $request->sanc_kia,
            'sanc_habit' => $request->sanc_habit,
            'sanc_illness_experienced' => $request->sanc_illness_experienced,
            'sanc_hereditary_disease' => $request->sanc_hereditary_disease,
            'sanc_menstrual_cycle' => $request->sanc_menstrual_cycle,
            'sanc_hiv_aids' => $request->sanc_hiv_aids,
            'sanc_user_id' => auth()->user()->id,
        ];

        $find = EiancServiceAnc::where('sanc_norm', Crypt::decrypt($request->norm))
            ->where('sanc_gravida', $request->sanc_gravida)
            ->get();

        if (count($find) > 0) {
            Alert::Error('Gagal', 'Maaf, Kehamilan Ke - ' . $request->sanc_gravida . ' Sudah Ada');
            return redirect()->back()->withInput();
        } else {
            EiancServiceAnc::create($input);

            $laid = EiancServiceAnc::latest()->value('sanc_id');

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah ANC ' . $laid . '-' . Crypt::decrypt($request->norm)
            ]);

            Alert::success('Sukses', 'Oke, Data sudah tersimpan');
            return redirect()->route('service.anc', $request->norm);
        }
    }

    public function edit($id, $anc)
    {
        $temoi = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $data = EiancPatient::where('pat_norm', Crypt::decrypt($id))->get();

        if ($temoi[0]->ins_bpjs == '1') {
            $pay = SelecPay::all();
        } else {
            $pay = SelecPay::where('pay_code', '!=', '002')->get();
        }

        $ancx = EiancServiceAnc::find(Crypt::decrypt($anc));

        $spm = SelecPregMarr::all();
        $sage = SelecPregAge::all();
        $sdp = SelecPregDes::all();
        $spw = SelecPregWith::all();
        $shab = SelecHabit::all();
        $shaid = SelecMenCy::all();

        return view('pages/service/anc/edit', compact('id', 'pay', 'data', 'spm', 'sage', 'sdp', 'spw', 'shab', 'shaid', 'anc', 'ancx'));
    }

    public function update(Request $request)
    {
        if ($request->sanc_kia == '') {
            return redirect()->back()->withInput()->with('sanc_kia', 'Options not selected');
        }

        $input = [
            'sanc_gravida' => $request->sanc_gravida,
            'sanc_partus' => $request->sanc_partus,
            'sanc_aborsi' => $request->sanc_aborsi,
            'sanc_partus' => $request->sanc_partus,
            'sanc_life' => $request->sanc_life,
            'sanc_death' => $request->sanc_death,
            'sanc_hpht' => $request->sanc_hpht,
            'sanc_hpl' => date('Y-m-d', strtotime($request->sanc_hpl)),
            'sanc_pregnancy1_marriage' => $request->sanc_pregnancy1_marriage,
            'sanc_pregnancy1_age' => $request->sanc_pregnancy1_age,
            'sanc_distance_pregnancy' => $request->sanc_distance_pregnancy,
            'sanc_pregnancy_failed' => $request->sanc_pregnancy_failed,
            'sanc_born_with' => $request->sanc_born_with,
            'sanc_kia' => $request->sanc_kia,
            'sanc_habit' => $request->sanc_habit,
            'sanc_illness_experienced' => $request->sanc_illness_experienced,
            'sanc_hereditary_disease' => $request->sanc_hereditary_disease,
            'sanc_menstrual_cycle' => $request->sanc_menstrual_cycle,
            'sanc_hiv_aids' => $request->sanc_hiv_aids,
        ];

        $find = EiancServiceAnc::where('sanc_norm', Crypt::decrypt($request->norm))
            ->where('sanc_gravida', '!=', $request->sanc_gravida)
            ->where('sanc_gravida', $request->sanc_gravida)
            ->get();

        if (count($find) > 0) {
            Alert::Error('Gagal', 'Maaf, Kehamilan Ke - ' . $request->sanc_gravida . ' Sudah Ada');
            return redirect()->back()->withInput();
        } else {
            EiancServiceAnc::where('sanc_id', Crypt::decrypt($request->id))->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah ANC ' . Crypt::decrypt($request->id) . '-' . Crypt::decrypt($request->norm)
            ]);

            Alert::success('Sukses', 'Oke, Data sudah diubah');
            return redirect()->route('service.anc', $request->norm);
        }
    }

    public function destroy(Request $request)
    {
        $find = EiancServiceAnc::find(Crypt::decrypt($request->id));
        $cari = EiancServiceAncDetail::where('sancd_anc_id', Crypt::decrypt($request->id))->get();

        if (count($cari) > 0) {
            Alert::error('Gagal', 'Sudah ada data');
            return redirect()->back();
        } else {
            $find->delete();

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Hapus ANC ' . Crypt::decrypt($request->id)
            ]);

            Alert::success('Sukses', 'Oke, Data sudah dihapus');
            return redirect()->back();
        }
    }
}
