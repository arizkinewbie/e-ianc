<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancServiceAncLab;
use App\Models\EiancServiceAncLabImage;
use App\Models\SelecBlood;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceANCLabController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, $anc, $det)
    {
        $sblood = SelecBlood::all();

        $data = EiancServiceAncLab::where('sancl_anc_d_id', Crypt::decrypt($det))->get();

        $xdata = EiancServiceAncLab::join('eianc_service_anc_details', 'eianc_service_anc_details.sancd_id', '=', 'eianc_service_anc_labs.sancl_anc_d_id')
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

        return view('pages/service/anc/detail/anc/lab/index', compact('id', 'anc', 'det', 'show', 'data', 'xdata', 'sblood'));
    }

    public function store(Request $request)
    {
        if ($request->sancl_blood == '') {
            return redirect()->back()->withInput()->with('sancl_blood', 'Options not selected');
        }
        if ($request->sancl_urine == '') {
            return redirect()->back()->withInput()->with('sancl_urine', 'Options not selected');
        }
        if ($request->sancl_hb == '') {
            return redirect()->back()->withInput()->with('sancl_hb', 'Options not selected');
        }

        if ($request->sancl_hiv == '') {
            return redirect()->back()->withInput()->with('sancl_hiv', 'Options not selected');
        }
        if ($request->sancl_sifilis == '') {
            return redirect()->back()->withInput()->with('sancl_sifilis', 'Options not selected');
        }
        if ($request->sancl_hbsag == '') {
            return redirect()->back()->withInput()->with('sancl_hbsag', 'Options not selected');
        }
        if ($request->sancl_malaria == '') {
            return redirect()->back()->withInput()->with('sancl_malaria', 'Options not selected');
        }
        if ($request->sancl_bta == '') {
            return redirect()->back()->withInput()->with('sancl_bta', 'Options not selected');
        }

        // $this->validate($request, [
        //     'sancl_blood_sugar' => 'required'
        // ]);

        $find = EiancServiceAncLab::where('sancl_anc_d_id', Crypt::decrypt($request->det))->get();

        if (count($find) < 1) {
            $input = [
                'sancl_anc_d_id' => Crypt::decrypt($request->det),
                'sancl_blood' => $request->sancl_blood,
                'sancl_urine' => $request->sancl_urine,
                'sancl_hiv' => $request->sancl_hiv,
                'sancl_blood_sugar' => $request->sancl_blood_sugar,
                'sancl_bta' => $request->sancl_bta,
                'sancl_malaria' => $request->sancl_malaria,
                'sancl_hbsag' => $request->sancl_hbsag,
                'sancl_sifilis' => $request->sancl_sifilis,
                'sancl_hb' => $request->sancl_hb,
                'sancl_level_hb' => $request->sancl_level_hb,
                'sancl_user_id' => auth()->user()->id,
            ];

            $store = EiancServiceAncLab::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah anc - lab ' . $store->sancl_id
            ]);

            return redirect()->back();
        } else {
            $input = [
                'sancl_blood' => $request->sancl_blood,
                'sancl_urine' => $request->sancl_urine,
                'sancl_hiv' => $request->sancl_hiv,
                'sancl_blood_sugar' => $request->sancl_blood_sugar,
                'sancl_bta' => $request->sancl_bta,
                'sancl_malaria' => $request->sancl_malaria,
                'sancl_hbsag' => $request->sancl_hbsag,
                'sancl_sifilis' => $request->sancl_sifilis,
                'sancl_hb' => $request->sancl_hb,
                'sancl_level_hb' => $request->sancl_level_hb
            ];

            EiancServiceAncLab::where('sancl_id', $request->idx)->update($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Ubah anc - lab ' . $request->idx
            ]);

            // return redirect()->route('service.anc.anc.kie', ['id' => $request->id, 'anc' => $request->anc, 'det' => $request->det]);
            return redirect()->back();
        }
    }

    public function upload(Request $request)
    {
        $image = $request->file('thumb');
        $img = time() . "." . $image->getClientOriginalExtension();
        $image->move("data/image/lab", $img);

        $input = [
            'sancli_lab_id' => $request->idx,
            'sancli_image' => $img,
        ];

        $store = EiancServiceAncLabImage::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah anc - lab - image ' . $store->sancli_id . ' untuk ' . $request->idx
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $find = EiancServiceAncLabImage::find(Crypt::decrypt($id));

        unlink('data/image/lab/' . $find->sancli_image);
        $find->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus anc - lab - image ' . Crypt::decrypt($id)
        ]);

        return redirect()->back();
    }
}
