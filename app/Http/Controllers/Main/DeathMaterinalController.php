<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\EiancDeathMaternal;
use App\Models\EiancTemoi;
use App\Models\SelecMonth;
use App\Models\SysAlamat;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;

class DeathMaterinalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancDeathMaternal::orderBy('detm_id', 'DESC')->get();
        $month = SelecMonth::all();

        return view('pages/death/maternal/index', compact('data', 'month'));
    }

    public function create()
    {
        $month = SelecMonth::all();

        return view('pages/death/maternal/create', compact('month'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'detm_pendarahan' => 'required',
            'detm_eklamsi' => 'required',
            'detm_infeksi' => 'required',
            'detm_abortus' => 'required',
            'detm_partus_lama' => 'required',
            'detm_trauma_obsetrik' => 'required',
            'detm_komplikasi_puerperium' => 'required',
            'detm_other' => 'required'
        ]);

        if ($request->detm_year == 'x') {
            return redirect()->back()->withInput()->with('detm_year', 'Options not selected');
        }

        if ($request->detm_month == 'x') {
            return redirect()->back()->withInput()->with('detm_month', 'Options not selected');
        }

        if ($request->detm_destination == 'x') {
            return redirect()->back()->withInput()->with('detm_destination', 'Options not selected');
        }

        $address = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $cek = EiancDeathMaternal::where('detm_add_kode', $address[0]->ins_village)
            ->where('detm_year', $request->detm_year)
            ->where('detm_month', $request->detm_month)
            ->get();

        if (count($cek) > 0) {
            Alert::error('Gagal', 'Data sudah ada');
            return redirect()->back();
        } else {
            $input = [
                'detm_add_kode' => $address[0]->ins_village,
                'detm_month' => $request->detm_month,
                'detm_year' => $request->detm_year,
                'detm_destination' => $request->detm_destination,
                'detm_pendarahan' => $request->detm_pendarahan,
                'detm_eklamsi' => $request->detm_eklamsi,
                'detm_infeksi' => $request->detm_infeksi,
                'detm_abortus' => $request->detm_abortus,
                'detm_partus_lama' => $request->detm_partus_lama,
                'detm_trauma_obsetrik' => $request->detm_trauma_obsetrik,
                'detm_komplikasi_puerperium' => $request->detm_komplikasi_puerperium,
                'detm_other' => $request->detm_other
            ];

            $store = EiancDeathMaternal::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah Kematian Maternal ' . $store->detm_id
            ]);

            Alert::success('Sukses', 'Data berhasil disimpan');
            return redirect()->route('maternal');
        }
    }

    public function edit($id)
    {
        $data = EiancDeathMaternal::find(Crypt::decrypt($id));

        return view('pages/death/maternal/edit', compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'detm_pendarahan' => 'required',
            'detm_eklamsi' => 'required',
            'detm_infeksi' => 'required',
            'detm_abortus' => 'required',
            'detm_partus_lama' => 'required',
            'detm_trauma_obsetrik' => 'required',
            'detm_komplikasi_puerperium' => 'required',
            'detm_other' => 'required'
        ]);

        $input = [
            'detm_pendarahan' => $request->detm_pendarahan,
            'detm_eklamsi' => $request->detm_eklamsi,
            'detm_infeksi' => $request->detm_infeksi,
            'detm_abortus' => $request->detm_abortus,
            'detm_partus_lama' => $request->detm_partus_lama,
            'detm_trauma_obsetrik' => $request->detm_trauma_obsetrik,
            'detm_komplikasi_puerperium' => $request->detm_komplikasi_puerperium,
            'detm_other' => $request->detm_other
        ];

        EiancDeathMaternal::where('detm_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah Kematian Maternal ' . $request->id
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('maternal');
    }

    public function destroy(Request $request)
    {
        $find = EiancDeathMaternal::find(Crypt::decrypt($request->id));
        $find->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus Kematian Maternal ' . Crypt::decrypt($request->id)
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

        $find = EiancDeathMaternal::where('detm_add_kode', (auth()->user()->role == '2' || auth()->user()->role == '0') ? $ins[0]->ins_village : ((auth()->user()->role == '2') ? $ins[0]->ins_subdistrict : ''))
            ->where('detm_month', $rmonth)
            ->where('detm_year', $ryear)
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

        $find = EiancDeathMaternal::where('detm_add_kode', (auth()->user()->role == '2' || auth()->user()->role == '0') ? $ins[0]->ins_village : ((auth()->user()->role == '2') ? $ins[0]->ins_subdistrict : ''))
            ->where('detm_month', $month)
            ->where('detm_year', $year)
            ->orderBy('detm_destination', 'ASC')
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

        $pdf = PDF::loadView('pages/death/maternal/report', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
