<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDataSasaran;
use App\Models\EiancTemoi;
use App\Models\SelecMonth;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class DataSasaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $address = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        if (auth()->user()->role == 2) {
            $data = EiancDataSasaran::where('ds_add_kode', $address[0]->ins_subdistrict)
                ->orderBy('ds_id', 'DESC')
                ->get();
        }

        if (auth()->user()->role == 3) {
            $data = EiancDataSasaran::where('ds_add_kode', $address[0]->ins_village)
                ->orderBy('ds_id', 'DESC')
                ->get();
        }

        if (auth()->user()->role == 0 || auth()->user()->role == 1) {
            $data = EiancDataSasaran::orderBy('ds_id', 'DESC')
                ->get();
        }

        return view('pages/datasasaran/index', compact('data'));
    }

    public function create()
    {
        $month = SelecMonth::all();

        return view('pages/datasasaran/create', compact('month'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ds_resident' => 'required'
        ]);

        if ($request->ds_year == 'x') {
            return redirect()->back()->withInput()->with('ds_year', 'Options not selected');
        }

        if ($request->ds_month == 'x') {
            return redirect()->back()->withInput()->with('ds_month', 'Options not selected');
        }

        if (auth()->user()->role == 2) {
            if ($request->village == 'x') {
                return redirect()->back()->withInput()->with('village', 'Options not selected');
            }
        }

        if (auth()->user()->role == 3) {
            if ($request->rw == 'x') {
                return redirect()->back()->withInput()->with('rw', 'Options not selected');
            }
        }

        $address = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        if (auth()->user()->role == 2) {
            $add = $address[0]->ins_subdistrict;

            $find = EiancDataSasaran::where('ds_add_kode', $add)
                ->where('ds_year', $request->ds_year)
                ->where('ds_month', $request->ds_month)
                ->where('ds_destination', $request->village)
                ->get();
        }

        if (auth()->user()->role == 3) {
            $add = $address[0]->ins_village;

            $find = EiancDataSasaran::where('ds_add_kode', $add)
                ->where('ds_year', $request->ds_year)
                ->where('ds_month', $request->ds_month)
                ->where('ds_destination', $request->rw)
                ->get();
        }

        if (count($find) > 0) {
            Alert::error('Gagal', 'Data sudah ada');
            return redirect()->back()->withInput();
        } else {
            $input = [
                'ds_add_kode' => $add,
                'ds_year' => $request->ds_year,
                'ds_month' => $request->ds_month,
                'ds_destination' => ($request->village != '') ? $request->village : $request->rw,
                'ds_resident' => $request->ds_resident,
                'ds_bumil' => ($request->ds_bumil == '') ? 0 : $request->ds_bumil,
                'ds_bumil_resti' => ($request->ds_bumil_resti == '') ? 0 : $request->ds_bumil_resti,
                'ds_bulin' => ($request->ds_bulin == '') ? 0 : $request->ds_bulin,
                'ds_bufas' => ($request->ds_bufas == '') ? 0 : $request->ds_bufas,
                'ds_pus' => ($request->ds_pus == '') ? 0 : $request->ds_pus,
                'ds_bayi_new' => ($request->ds_bayi_new == '') ? 0 : $request->ds_bayi_new,
                'ds_bayi' => ($request->ds_bayi == '') ? 0 : $request->ds_bayi,
                'ds_bayi_resti' => ($request->ds_bayi_resti == '') ? 0 : $request->ds_bayi_resti,
                'ds_balita' => ($request->ds_balita == '') ? 0 : $request->ds_balita,
                'ds_user_id' => auth()->user()->id,
            ];

            $store = EiancDataSasaran::create($input);

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'Tambah data sasaran ' . $store->ds_id
            ]);

            Alert::success('Sukses', 'Data berhasil disimpan');
            return redirect()->route('datasasaran');
        }
    }

    public function edit($id)
    {
        $data = EiancDataSasaran::find(Crypt::decrypt($id));

        $month = SelecMonth::all();

        return view('pages/datasasaran/edit', compact('data', 'month'));
    }

    public function update(Request $request)
    {
        $input = [
            'ds_resident' => $request->ds_resident,
            'ds_bumil' => ($request->ds_bumil == '') ? 0 : $request->ds_bumil,
            'ds_bumil_resti' => ($request->ds_bumil_resti == '') ? 0 : $request->ds_bumil_resti,
            'ds_bulin' => ($request->ds_bulin == '') ? 0 : $request->ds_bulin,
            'ds_bufas' => ($request->ds_bufas == '') ? 0 : $request->ds_bufas,
            'ds_pus' => ($request->ds_pus == '') ? 0 : $request->ds_pus,
            'ds_bayi_new' => ($request->ds_bayi_new == '') ? 0 : $request->ds_bayi_new,
            'ds_bayi' => ($request->ds_bayi == '') ? 0 : $request->ds_bayi,
            'ds_bayi_resti' => ($request->ds_bayi_resti == '') ? 0 : $request->ds_bayi_resti,
            'ds_balita' => ($request->ds_balita == '') ? 0 : $request->ds_balita
        ];

        EiancDataSasaran::where('ds_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Update data sasaran ' . $request->id
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('datasasaran');
    }

    public function destroy(Request $request)
    {
        $data = EiancDataSasaran::find(Crypt::decrypt($request->id));
        $data->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Hapus data sasaran ' . Crypt::decrypt($request->id)
        ]);
        Alert::success('Sukses', 'Data berhasil di hapus');
        return redirect()->back();
    }
}
