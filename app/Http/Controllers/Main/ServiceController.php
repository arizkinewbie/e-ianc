<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\EiancPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = EiancPatient::where('pat_norm', Crypt::decrypt($id))->get();

        return view('pages/service/index', compact('id', 'data'));
    }
}
