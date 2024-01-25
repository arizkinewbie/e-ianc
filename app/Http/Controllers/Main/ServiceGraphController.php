<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancPatient;
use App\Models\EiancServiceNeo28;
use App\Models\EiancServiceNeoBb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceGraphController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $pas = EiancPatient::where('pat_norm', Crypt::decrypt($id))->get();

        $tb28 = EiancServiceNeo28::where('neo28_norm', Crypt::decrypt($id))->get();
        $tb02 = EiancServiceNeoBb::where('neobb_norm', Crypt::decrypt($id))->where('neobb_y', '<=', 2)->get();
        $tb = EiancServiceNeoBb::where('neobb_norm', Crypt::decrypt($id))->where('neobb_y', '>=', 2)->get();

        // // return date('Y', strtotime($tb02[0]->neobb_date)) - date('Y', strtotime($pas[0]->pat_dob));
        // return count($tb);

        return view('pages/service/graph/index', compact('id', 'pas', 'tb28', 'tb02', 'tb'));
    }
}
