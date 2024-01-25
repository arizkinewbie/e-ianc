<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancIceBox;
use App\Models\EiancIceBoxId;
use App\Models\EiancTemoi;
use App\Models\SelecMonth;
use App\Models\SysAlamat;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;

class IceBoxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = EiancIceBox::where('ib_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))
            ->join('eianc_ice_box_ids', 'eianc_ice_box_ids.ibi_id', '=', 'eianc_ice_boxes.ib_ibi_id')
            ->get();

        $month = SelecMonth::all();
        $icebox = EiancIceBoxId::where('ibi_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();

        return view('pages/icebox/index', compact('data', 'month', 'icebox'));
    }

    public function create()
    {
        $kulkas =  EiancIceBoxId::where('ibi_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();

        return view('pages/icebox/create', compact('kulkas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ib_date' => 'required',
            'ib_morning' => 'required',
            'ib_afternoon' => 'required'
        ]);

        if ($request->ib_ibi_id == '') {
            return redirect()->back()->withInput()->with('ib_ibi_id', 'Options not selected');
        }

        $input = $request->except('_token');
        $input['ib_ins_id'] = EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id');
        $input['ib_user_id'] = auth()->user()->id;

        $store = EiancIceBox::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah harian kulkas ' . $store->ins_id
        ]);

        Alert::success('Sukses', 'Data berhasil disimpan');
        return redirect()->route('icebox');
    }

    public function edit($id)
    {
        $data = EiancIceBox::find(Crypt::decrypt($id));
        $kulkas =  EiancIceBoxId::where('ibi_ins_id', EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id'))->get();

        return view('pages/icebox/edit', compact('kulkas', 'data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'ib_date' => 'required',
            'ib_morning' => 'required',
            'ib_afternoon' => 'required'
        ]);

        if ($request->ib_ibi_id == '') {
            return redirect()->back()->withInput()->with('ib_ibi_id', 'Options not selected');
        }

        EiancIceBox::where('ib_id', $request->id)->update($request->except('_token', 'id'));

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'ubah harian kulkas ' . $request->id
        ]);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('icebox');
    }

    public function destroy(Request $request)
    {
        $data = EiancIceBox::find(Crypt::decrypt($request->id));
        $data->delete();

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'hapus harian kulkas ' . Crypt::decrypt($request->id)
        ]);

        Alert::success('Sukses', 'Data berhasil di hapus');
        return redirect()->route('icebox');
    }

    public function cek(Request $request)
    {
        $rmonth = $request->month;
        $ryear = $request->year;
        $ricebox = Crypt::encrypt($request->icebox);

        $find = EiancIceBox::where('ib_ibi_id', $request->icebox)
            ->where('ib_date', 'LIKE', '%' . implode('-', [$ryear, sprintf("%02s", $rmonth)]) . '%')
            ->get();

        // return response($find);
        if (count($find) < 1) {
            Alert::error('Gagal', 'Data tidak ditemukan');
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->withInput()->with('print', '')->with(compact('rmonth', 'ryear', 'ricebox'));
        }
    }

    public function report($month, $year, $icebox)
    {
        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        $ib = EiancIceBoxId::find(Crypt::decrypt($icebox));

        $data = [
            'ins_name' => $ins[0]->ins_name,
            'ins_add' => $ins[0]->ins_address,
            'ins_rt' => $ins[0]->ins_rt,
            'ins_rw' => $ins[0]->ins_rw,
            'ins_telp' => $ins[0]->ins_telp,
            'al_desa' => SysAlamat::where('kode', $ins[0]->ins_village)->value('nama'),
            'al_subdis' => SysAlamat::where('kode', $ins[0]->ins_subdistrict)->value('nama'),
            'al_dis' => SysAlamat::where('kode', $ins[0]->ins_district)->value('nama'),
            'al_prov' => SysAlamat::where('kode', $ins[0]->ins_province)->value('nama'),
            'icebox' => $ib,
            'month' => $month,
            'year' => $year,
            'ibi' => Crypt::decrypt($icebox),
            'ins_thumb' => $ins[0]->ins_thumb,
            'ins_code' => $ins[0]->ins_code,
        ];

        $pdf = PDF::loadView('pages/icebox/report', $data)->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
