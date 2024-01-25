<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancDesposisi;
use App\Models\SelecIcd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceDesposisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($norm)
    {
        $data = EiancDesposisi::where('des_norm', Crypt::decrypt($norm))->where('des_de_id', 2)->orderBy('des_id', 'DESC')->get();

        return view('pages/service/desposisi/index', compact('norm', 'data'));
    }

    function edit($norm, $id)
    {
        $data = EiancDesposisi::find(Crypt::decrypt($id));
        $icd = SelecIcd::all();

        return view('pages/service/desposisi/edit', compact('norm', 'id', 'data', 'icd'));
    }

    function update(Request $request)
    {
        $despo = [
            'des_des_unit' => $request->unit,
            'des_des_ins' => $request->rs,
            'des_diagnose' => $request->icd,
            'des_first_aid' => $request->first,
        ];

        EiancDesposisi::where('des_id', Crypt::decrypt($request->id))->update($despo);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect()->route('service.desposisi', $request->norm);
    }
}
