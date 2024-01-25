<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\EiancDeathBaby;
use App\Models\EiancTemoi;
use App\Models\SelecMonth;
use App\Models\SysAlamat;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class DeathBabyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancDeathBaby::orderBy('detb_id', 'DESC')->get();
        $month = SelecMonth::all();

        return view('pages/death/baby/index', compact('data', 'month'));
    }

    public function create()
    {
        $month = SelecMonth::all();

        return view('pages/death/baby/create', compact('month'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'detb_by_pneunomia' => 'required',
            'detb_by_diare' => 'required',
            'detb_by_tetanus_neonatorum' => 'required',
            'detb_by_kel_sal_cerna' => 'required',
            'detb_by_kelainan_saraf' => 'required',
            'detb_by_kelainan_kongenital' => 'required',
            'detb_by_other' => 'required',
            'detb_bl_ispa' => 'required',
            'detb_bl_diare' => 'required',
            'detb_bl_malaria' => 'required',
            'detb_bl_dbd' => 'required',
            'detb_bl_typus' => 'required',
            'detb_bl_kel_sal_cerna' => 'required',
            'detb_bl_other' => 'required'
        ]);

        if ($request->detb_year == 'x') {
            return redirect()->back()->withInput()->with('detb_year', 'Options not selected');
        }

        if ($request->detb_month == 'x') {
            return redirect()->back()->withInput()->with('detb_month', 'Options not selected');
        }

        if ($request->detb_destination == 'x') {
            return redirect()->back()->withInput()->with('detb_destination', 'Options not selected');
        }

        $address = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $cek = EiancDeathBaby::where('detb_add_kode', $address[0]->ins_village)
            ->where('detb_year', $request->detb_year)
            ->where('detb_month', $request->detb_month)
            ->get();

        if (count($cek) > 0) {
            Alert::error('Gagal', 'Data sudah ada');
            return redirect()->back();
        } else {
            $input = [
                'detb_add_kode' => $address[0]->ins_village,
                'detb_month' => $request->detb_month,
                'detb_year' => $request->detb_year,
                'detb_destination' => $request->detb_destination,
                'detb_by_pneunomia' => $request->detb_by_pneunomia,
                'detb_by_diare' => $request->detb_by_diare,
                'detb_by_tetanus_neonatorum' => $request->detb_by_tetanus_neonatorum,
                'detb_by_kel_sal_cerna' => $request->detb_by_kel_sal_cerna,
                'detb_by_kelainan_saraf' => $request->detb_by_kelainan_saraf,
                'detb_by_kelainan_kongenital' => $request->detb_by_kelainan_kongenital,
                'detb_by_other' => $request->detb_by_other,
                'detb_bl_ispa' => $request->detb_bl_ispa,
                'detb_bl_diare' => $request->detb_by_diare,
                'detb_bl_malaria' => $request->detb_bl_malaria,
                'detb_bl_dbd' => $request->detb_bl_dbd,
                'detb_bl_typus' => $request->detb_bl_typus,
                'detb_bl_kel_sal_cerna' => $request->detb_bl_kel_sal_cerna,
                'detb_bl_other' => $request->detb_bl_other,
                'detb_user_id' => auth()->user()->id,
            ];

            $store = EiancDeathBaby::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah Kematian Bayi dan Balita ' . $store->detb_id
            ]);

            Alert::success('Sukses', 'Data berhasil disimpan');
            return redirect()->route('baby');
        }
    }

    public function edit($id)
    {
        $data = EiancDeathBaby::find(Crypt::decrypt($id));

        return view('pages/death/baby/edit', compact('data'));
    }

    public function update(Request $request)
    {
        $input = [
            'detb_by_pneunomia' => $request->detb_by_pneunomia,
            'detb_by_diare' => $request->detb_by_diare,
            'detb_by_tetanus_neonatorum' => $request->detb_by_tetanus_neonatorum,
            'detb_by_kel_sal_cerna' => $request->detb_by_kel_sal_cerna,
            'detb_by_kelainan_saraf' => $request->detb_by_kelainan_saraf,
            'detb_by_kelainan_kongenital' => $request->detb_by_kelainan_kongenital,
            'detb_by_other' => $request->detb_by_other,
            'detb_bl_ispa' => $request->detb_bl_ispa,
            'detb_bl_diare' => $request->detb_by_diare,
            'detb_bl_malaria' => $request->detb_bl_malaria,
            'detb_bl_dbd' => $request->detb_bl_dbd,
            'detb_bl_typus' => $request->detb_bl_typus,
            'detb_bl_kel_sal_cerna' => $request->detb_bl_kel_sal_cerna,
            'detb_bl_other' => $request->detb_bl_other
        ];

        EiancDeathBaby::where('detb_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah Kematian Bayi dan Balita ' . $request->id
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('baby');
    }

    public function destroy(Request $request)
    {
        $find = EiancDeathBaby::find(Crypt::decrypt($request->id));
        $find->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus Kematian Bayi dan Balita ' . Crypt::decrypt($request->id)
        ]);

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect()->back();
    }

    public function cek(Request $request)
    {
        $rmonth = $request->month;
        $ryear = $request->year;

        $ins = EiancTemoi::find(auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $find = EiancDeathBaby::where('detb_add_kode', (auth()->user()->role == '2' || auth()->user()->role == '0') ? $ins[0]->ins_village : ((auth()->user()->role == '2') ? $ins[0]->ins_subdistrict : ''))
            ->where('detb_month', $rmonth)
            ->where('detb_year', $ryear)
            ->get();

        if (count($find) < 1) {
            Alert::error('Gagal', 'Data tidak ditemukan');
            return redirect()->back();
        } else {
            return redirect()->back()->with('print', '')->with(compact('rmonth', 'ryear'));
        }
    }

    public function report($month, $year)
    {
        $ins = EiancTemoi::find(auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $ins = EiancTemoi::find(auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $find = EiancDeathBaby::where('detb_add_kode', (auth()->user()->role == '2' || auth()->user()->role == '0') ? $ins[0]->ins_village : ((auth()->user()->role == '2') ? $ins[0]->ins_subdistrict : ''))
            ->where('detb_month', $month)
            ->where('detb_year', $year)
            ->orderBy('detb_destination', 'ASC')
            ->get();

        $data = [
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'ins_thumb' => $ins[0]->ins_thumb,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'month' => $month,
            'year' => $year,
            'find' => $find
        ];

        $pdf = PDF::loadView('pages/death/baby/report', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
