<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\SelecDespoisi;
use App\Models\SelecIcd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class SelectICDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = SelecIcd::orderBy('icd_code', 'ASC')->get();

        return view('pages/selection/icd/index', compact('data'));
    }

    public function create($id)
    {
        $data = SelecIcd::where('icd_id', Crypt::decrypt($id))->get();

        return view('pages/selection/icd/create', compact('data'));
    }

    public function store(Request $request)
    {
        $find = SelecIcd::where('icd_id', $request->id)->get();

        if (count($find) < 1) {
            SelecIcd::create($request->except('_token'));

            Alert::success('Sukses', 'Berhasil simpan data');
            return redirect()->route('sel.icd');
        } else {
            SelecIcd::where('icd_id', $request->id)->update([
                'icd_code' => $request->icd_code,
                'icd_name' => $request->icd_name,
            ]);

            Alert::success('Sukses', 'Berhasil ubah data');
            return redirect()->route('sel.icd');
        }
    }

    public function destroy(Request $request)
    {
        $find = SelecIcd::find(Crypt::decrypt($request->id));
        $find->delete();

        Alert::success('Sukses', 'Berhasil hapus data');
        return redirect()->back();
    }
}
