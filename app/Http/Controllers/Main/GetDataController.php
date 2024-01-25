<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancInstansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getadd($id)
    {
        $n = strlen($id);
        $m = ($n == 2 ? 5 : ($n == 5 ? 8 : 13));

        $district = DB::select(
            'SELECT * FROM sys_alamats WHERE LEFT(kode, :len) = :id AND CHAR_LENGTH(kode) = :shof ORDER BY nama ASC',
            [
                'len' => $n,
                'id' => $id,
                'shof' => $m
            ]
        );

        return response()->json($district);
    }

    public function getinstansi($id)
    {
        $instansi = EiancInstansi::where('ins_subdistrict', $id)->get();

        return response()->json($instansi);
    }
}
