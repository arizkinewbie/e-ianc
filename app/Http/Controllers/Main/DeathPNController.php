<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\EiancDeathPerinatalNeonatal;
use App\Models\EiancTemoi;
use App\Models\SelecMonth;
use App\Models\SysAlamat;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class DeathPNController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancDeathPerinatalNeonatal::orderBy('det_pn_id', 'DESC')->get();
        $month = SelecMonth::all();

        return view('pages/death/pn/index', compact('data', 'month'));
    }

    public function create()
    {
        $month = SelecMonth::all();

        return view('pages/death/pn/create', compact('month'));
    }

    public function store(Request $request)
    {
        if ($request->det_pn_year == 'x') {
            return redirect()->back()->withInput()->with('det_pn_year', 'Options not selected');
        }

        if ($request->det_pn_month == 'x') {
            return redirect()->back()->withInput()->with('det_pn_month', 'Options not selected');
        }

        if ($request->det_pn_destination == 'x') {
            return redirect()->back()->withInput()->with('det_pn_destination', 'Options not selected');
        }

        $this->validate($request, [
            'det_p_bblr' => 'required',
            'det_p_asfiksia' => 'required',
            'det_p_tetanus_neonatorum' => 'required',
            'det_p_sepsis' => 'required',
            'det_p_iketrus' => 'required',
            'det_p_kel_kongenital' => 'required',
            'det_p_other' => 'required',
            'det_n_bblr' => 'required',
            'det_n_asfiksia' => 'required',
            'det_n_tetanus_neonatorum' => 'required',
            'det_n_sepsis' => 'required',
            'det_n_iketrus' => 'required',
            'det_n_kel_kongenital' => 'required',
            'det_n_other' => 'required'
        ]);

        $address = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $cek = EiancDeathPerinatalNeonatal::where('det_pn_add_kode', $address[0]->ins_village)
            ->where('det_pn_year', $request->det_pn_year)
            ->where('det_pn_month', $request->det_pn_month)
            ->get();

        if (count($cek) > 0) {
            Alert::error('Gagal', 'Data sudah ada');
            return redirect()->back();
        } else {
            $input = [
                'det_pn_add_kode' => $address[0]->ins_village,
                'det_pn_month' => $request->det_pn_month,
                'det_pn_year' => $request->det_pn_year,
                'det_pn_destination' => $request->det_pn_destination,
                'det_p_bblr' => $request->det_p_bblr,
                'det_p_asfiksia' => $request->det_p_asfiksia,
                'det_p_tetanus_neonatorum' => $request->det_p_tetanus_neonatorum,
                'det_p_sepsis' => $request->det_p_sepsis,
                'det_p_iketrus' => $request->det_p_iketrus,
                'det_p_kel_kongenital' => $request->det_p_kel_kongenital,
                'det_p_other' => $request->det_p_other,
                'det_n_bblr' => $request->det_n_bblr,
                'det_n_asfiksia' => $request->det_n_asfiksia,
                'det_n_tetanus_neonatorum' => $request->det_n_tetanus_neonatorum,
                'det_n_sepsis' => $request->det_n_sepsis,
                'det_n_iketrus' => $request->det_n_iketrus,
                'det_n_kel_kongenital' => $request->det_n_kel_kongenital,
                'det_n_other' => $request->det_n_other
            ];

            $store = EiancDeathPerinatalNeonatal::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah kematian pn ' . $store->ins_id
            ]);

            Alert::success('Sukses', 'Data berhasil disimpan');
            return redirect()->route('pn');
        }
    }

    public function edit($id)
    {
        $data = EiancDeathPerinatalNeonatal::find(Crypt::decrypt($id));

        return view('pages/death/pn/edit', compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'det_p_bblr' => 'required',
            'det_p_asfiksia' => 'required',
            'det_p_tetanus_neonatorum' => 'required',
            'det_p_sepsis' => 'required',
            'det_p_iketrus' => 'required',
            'det_p_kel_kongenital' => 'required',
            'det_p_other' => 'required',
            'det_n_bblr' => 'required',
            'det_n_asfiksia' => 'required',
            'det_n_tetanus_neonatorum' => 'required',
            'det_n_sepsis' => 'required',
            'det_n_iketrus' => 'required',
            'det_n_kel_kongenital' => 'required',
            'det_n_other' => 'required'
        ]);

        $input = [
            'det_p_bblr' => $request->det_p_bblr,
            'det_p_asfiksia' => $request->det_p_asfiksia,
            'det_p_tetanus_neonatorum' => $request->det_p_tetanus_neonatorum,
            'det_p_sepsis' => $request->det_p_sepsis,
            'det_p_iketrus' => $request->det_p_iketrus,
            'det_p_kel_kongenital' => $request->det_p_kel_kongenital,
            'det_p_other' => $request->det_p_other,
            'det_n_bblr' => $request->det_n_bblr,
            'det_n_asfiksia' => $request->det_n_asfiksia,
            'det_n_tetanus_neonatorum' => $request->det_n_tetanus_neonatorum,
            'det_n_sepsis' => $request->det_n_sepsis,
            'det_n_iketrus' => $request->det_n_iketrus,
            'det_n_kel_kongenital' => $request->det_n_kel_kongenital,
            'det_n_other' => $request->det_n_other
        ];

        EiancDeathPerinatalNeonatal::where('det_pn_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah kematian pn ' . $request->id
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('pn');
    }

    public function destroy(Request $request)
    {
        $data = EiancDeathPerinatalNeonatal::find(Crypt::decrypt($request->id));
        $data->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus kematian pn ' . Crypt::decrypt($request->id)
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

        $find = EiancDeathPerinatalNeonatal::where('det_pn_add_kode', (auth()->user()->role == '2' || auth()->user()->role == '0') ? $ins[0]->ins_village : ((auth()->user()->role == '2') ? $ins[0]->ins_subdistrict : ''))
            ->where('det_pn_month', $rmonth)
            ->where('det_pn_year', $ryear)
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

        $find = EiancDeathPerinatalNeonatal::where('det_pn_add_kode', (auth()->user()->role == '2' || auth()->user()->role == '0') ? $ins[0]->ins_village : ((auth()->user()->role == '2') ? $ins[0]->ins_subdistrict : ''))
            ->where('det_pn_month', $month)
            ->where('det_pn_year', $year)
            ->orderBy('det_pn_destination', 'ASC')
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

        $pdf = PDF::loadView('pages/death/pn/report', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
