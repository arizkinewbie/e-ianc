<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancPatient;
use App\Models\EiancServiceAnc;
use App\Models\EiancServiceAncDetail;
use App\Models\EiancServiceNifasControl;
use App\Models\EiancServiceNifasObser;
use App\Models\EiancServiceNifasRecipe;
use App\Models\SelecPatVisit;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceANCDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc)
    {
        $svis = SelecPatVisit::all();
        $data = EiancServiceAncDetail::where('sancd_anc_id', Crypt::decrypt($anc))->orderBy('sancd_id', 'DESC')->get();

        $graph = EiancServiceAnc::where('sanc_id', Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->where('sancd_type', '0')
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_physical_examinations', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->orderBy('sancd_id', 'ASC')
            ->get();

        $patient = EiancPatient::where('pat_norm', Crypt::decrypt($id))->get();

        $kie = EiancServiceAnc::where('sanc_id', Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->join('eianc_service_anc_kies', 'eianc_service_anc_kies.sanckie_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->orderBy('sanckie_id', 'DESC')
            ->get();

        $persalinan = EiancServiceAnc::where('sanc_id', Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_marrital_skls', 'eianc_service_marrital_skls.sancmskl_marr_id', '=', 'eianc_service_marritals.sancm_id')
            ->get();

        $hisanc = EiancServiceAnc::where('sanc_id', Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->where('sancd_type', '0')
            ->join('eianc_service_anc_anamnesas', 'eianc_service_anc_anamnesas.sanca_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_physical_examinations', 'eianc_service_anc_physical_examinations.sancpe_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_risks', 'eianc_service_anc_risks.sancr_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->join('eianc_service_anc_treatments', 'eianc_service_anc_treatments.sanct_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $hismar = EiancServiceAnc::where('sanc_id', Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->where('sancd_type', '1')
            ->join('eianc_service_marritals', 'eianc_service_marritals.sancm_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $hisneo28 = EiancServiceAnc::where('sanc_id', Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->where('sancd_type', '2')
            ->join('eianc_service_nifas_obsers', 'eianc_service_nifas_obsers.sancno_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        $hisneo0 = EiancServiceAnc::where('sanc_id', Crypt::decrypt($anc))
            ->join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_anc_id', '=', 'eianc_service_ancs.sanc_id')
            ->where('sancd_type', '3')
            ->join('eianc_service_nifas_controls', 'eianc_service_nifas_controls.sancnc_anc_d_id', '=', 'eianc_service_anc_details.sancd_id')
            ->get();

        // return $hisneo0;

        if (count($graph) > 0) {
            $wfirst = "[0 ,0, 0],";
        } else {
            $wfirst = '';
        }

        return view('pages/service/anc/detail/index', compact('id', 'anc', 'svis', 'data', 'graph', 'wfirst', 'patient', 'kie', 'persalinan', 'hisanc', 'hismar', 'hisneo28', 'hisneo0'));
    }

    public function store(Request $request)
    {
        $visit = $request->sancd_visit;
        $type = $request->sancd_type;

        $find = EiancServiceAncDetail::where('sancd_anc_id', Crypt::decrypt($request->id))->where('sancd_type', $type)->orderBy('sancd_id', 'DESC')->get();

        $input = [
            'sancd_anc_id' => Crypt::decrypt($request->id),
            'sancd_norm' => Crypt::decrypt($request->norm),
            'sancd_date' => date('Y-m-d'),
            'sancd_type' => $type,
            'sancd_visit' => $visit,
            'sancd_no' => (count($find) < 1) ? 1 : ($find[0]->sancd_no + 1),
            'sancd_user_id' => auth()->user()->id,
        ];

        if (count($find) > 0 && $type == '1') {
            Alert::error('Gagal', 'Persalinan Sudah ada');
            return redirect()->back();
        } elseif (count($find) > 0 && $type == '2') {
            Alert::error('Gagal', 'Nifas Observasi Sudah ada');
            return redirect()->back();
        } else {
            $store = EiancServiceAncDetail::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc ' . $store->sancd_id
            ]);

            if ($type == '0') {
                return redirect()->route('service.anc.anc.anamnesa', ['id' => $request->norm, 'anc' => $request->id, 'det' => Crypt::encrypt($store->sancd_id)]);
            } elseif ($type == '1') {
                return redirect()->route('service.anc.marr', ['id' => $request->norm, 'anc' => $request->id, 'det' => Crypt::encrypt($store->sancd_id)]);
            } elseif ($type == '2') {
                return redirect()->route('service.anc.no.create', ['id' => $request->norm, 'anc' => $request->id, 'det' => Crypt::encrypt($store->sancd_id), 'idx' => 0]);
            } else {
                return redirect()->route('service.anc.con', ['id' => $request->norm, 'anc' => $request->id, 'det' => Crypt::encrypt($store->sancd_id)]);
            }
        }
    }

    public function destroy(Request $request)
    {
        if ($request->type == '3') {
            $find = EiancServiceNifasControl::where('sancnc_anc_d_id', $request->id)->get();

            if (count($find) < 1) {
                SysLog::create([
                    'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                    'log_browser' => get_client_browser(),
                    'log_os' => $_SERVER['HTTP_USER_AGENT'],
                    'log_user_id' => auth()->user()->id,
                    'log_action' => 'Hapus anc detail ' . $request->id
                ]);

                $delete = EiancServiceAncDetail::find($request->id);
                $delete->delete();
                Alert::success('Suskses', 'Data berhasil dihapus');
                return redirect()->back();
            } else {
                $obat = EiancServiceNifasRecipe::where('sancnr_n_id', $find[0]->sancnc_id)->where('sancnr_type', '1')->get();

                if (count($obat) > 0) {
                    Alert::error('Gagal', 'Masih ada Obat');
                    return redirect()->back();
                } else {
                    SysLog::create([
                        'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                        'log_browser' => get_client_browser(),
                        'log_os' => $_SERVER['HTTP_USER_AGENT'],
                        'log_user_id' => auth()->user()->id,
                        'log_action' => 'Hapus anc - nifas kontrol ' . $find[0]->sancnc_id
                    ]);

                    EiancServiceNifasControl::where('sancnc_anc_d_id', $request->id)->delete();

                    SysLog::create([
                        'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                        'log_browser' => get_client_browser(),
                        'log_os' => $_SERVER['HTTP_USER_AGENT'],
                        'log_user_id' => auth()->user()->id,
                        'log_action' => 'Hapus anc detail ' . $request->id
                    ]);

                    $delete = EiancServiceAncDetail::find($request->id);
                    $delete->delete();

                    Alert::success('Sukses', 'Berhasil dihapus');
                    return redirect()->back();
                }
            }
        } elseif ($request->type == '2') {
            $find = EiancServiceNifasObser::where('sancno_anc_d_id', $request->id)->get();

            if (count($find) > 0) {
                Alert::error('Gagal', 'Masih ada data, hapus terlebih dahulu');
                return redirect()->back();
            } else {
                SysLog::create([
                    'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                    'log_browser' => get_client_browser(),
                    'log_os' => $_SERVER['HTTP_USER_AGENT'],
                    'log_user_id' => auth()->user()->id,
                    'log_action' => 'Hapus anc detail ' . $request->id
                ]);

                $delete = EiancServiceAncDetail::find($request->id);
                $delete->delete();

                Alert::success('Sukses', 'Data berhasil dihapus');
                return redirect()->back();
            }
        }
    }
}
