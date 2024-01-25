<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancPatient;
use App\Models\EiancTemoi;
use App\Models\SelecBlood;
use App\Models\SelecCall;
use App\Models\SelecEduca;
use App\Models\SelecMarital;
use App\Models\SelecReligion;
use App\Models\SelecSex;
use App\Models\SelecStatusPatient;
use App\Models\SelecWork;
use App\Models\SysAlamat;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages/patient/index');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";

            $find = EiancPatient::where('pat_norm', 'LIKE', '%' . $request->norm . '%')
                ->Where('pat_name', 'LIKE', '%' . $request->nama . '%')
                ->Where('pat_address', 'LIKE', '%' . $request->alamat . '%')
                ->limit(50)
                ->get();

            if ($find) {
                foreach ($find as $d) {
                    $village = SysAlamat::where('kode', $d->pat_village)->value('nama');
                    $subdistrict = SysAlamat::where('kode', $d->pat_subdistrict)->value('nama');
                    $district = SysAlamat::where('kode', $d->pat_district)->value('nama');
                    $province = SysAlamat::where('kode', $d->pat_province)->value('nama');

                    $disabled = (EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id') == $d->pat_ins) ? '' : 'disabled';

                    $output .= '<tr>' .
                        '<td style="text-align: center">' . $d->pat_norm . '</td>' .
                        '<td><b>' . $d->pat_name . '</b><br>' . $d->pat_nik . '<br>' . $d->pat_address . ', RT.' . $d->pat_rt . ', RW.' . $d->pat_rw . ', ' . $village . ', ' . $subdistrict . ', ' . $district . ', ' . $province . '</td>' .
                        '<td style="text-align: center">
                            <a href="' . route('service', Crypt::encrypt($d->pat_norm)) . '">
                                <button class="btn btn-success" title="Layanan">
                                    <i class="fas fa-book-medical"></i>&nbsp;Layanan
                                </button>
                            </a>
                            <hr>
                            <a href="' . route('patient.edit', Crypt::encrypt($d->pat_id)) . '">
                                <button class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>&nbsp;&nbsp;Edit
                                </button>
                            </a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="' . route('patient.destroy', Crypt::encrypt($d->pat_id)) . '">
                                <button class="btn btn-danger btn-sm" ' . $disabled  . '>
                                    <i class="fa fa-trash"></i>&nbsp;&nbsp;Hapus
                                </button>
                            </a>
                        </td>' .
                        '</tr>';
                }
            }

            return Response($output);
        }
    }

    public function create()
    {
        $sex = SelecSex::all();
        $religion = SelecReligion::all();
        $education = SelecEduca::all();
        $work = SelecWork::all();
        $blood = SelecBlood::all();
        $marital = SelecMarital::all();
        $call = SelecCall::all();
        $province = SysAlamat::whereRaw('CHAR_LENGTH(kode) = 2')
            ->orderBy('kode', 'ASC')
            ->get();
        $status = SelecStatusPatient::all();

        return view('pages/patient/create', compact('call', 'sex', 'religion', 'education', 'work', 'blood', 'marital', 'province', 'status'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pat_name' => 'required',
            'pat_pob' => 'required',
            'pat_dob' => 'required',
            'pat_biological_mother' => 'required',
            'pat_rt' => 'required',
            'pat_rw' => 'required',
            'pat_address' => 'required',
        ]);

        if ($request->pat_called == '') {
            return redirect()->back()->withInput()->with('pat_called', 'Options not selected');
        }
        if ($request->pat_status == '') {
            return redirect()->back()->withInput()->with('pat_status', 'Options not selected');
        }
        if ($request->pat_sex == '') {
            return redirect()->back()->withInput()->with('pat_sex', 'Options not selected');
        }
        if ($request->pat_religion == '') {
            return redirect()->back()->withInput()->with('pat_religion', 'Options not selected');
        }
        if ($request->pat_education == '') {
            return redirect()->back()->withInput()->with('pat_education', 'Options not selected');
        }
        if ($request->pat_work == '') {
            return redirect()->back()->withInput()->with('pat_work', 'Options not selected');
        }
        if ($request->pat_blood == '') {
            return redirect()->back()->withInput()->with('pat_blood', 'Options not selected');
        }
        if ($request->pat_marital == '') {
            return redirect()->back()->withInput()->with('pat_marital', 'Options not selected');
        }
        if ($request->pat_village == '') {
            return redirect()->back()->withInput()->with('pat_village', 'Options not selected');
        }

        $year = date('Y') - date('Y', strtotime($request->pat_dob));
        $month = date('m') - date('m', strtotime($request->pat_dob));
        $day = date('d') - date('d', strtotime($request->pat_dob));

        $ins = EiancTemoi::where('temoi_id', auth()->user()->temoi)->value('temoi_ins_id');

        $getnorm = EiancPatient::where('pat_ins', $ins)->latest()->value('pat_norm');

        if (empty($getnorm)) {
            $norm = sprintf($ins . "%06s", 1);
        } else {
            $last = substr($getnorm, -6);
            $norm = sprintf($ins . "%06s", ($last + 1));
        }

        $input = $request->except('_token');
        $input['pat_norm'] = $norm;
        $input['pat_age'] = $year;
        $input['pat_year'] = $year;
        $input['pat_month'] = $month;
        $input['pat_day'] = $day;
        $input['pat_last_visit'] = strtotime(date('Y-m-d H:i:s')) * 1000;
        $input['pat_ins'] = $ins;
        $input['pat_user_id'] = auth()->user()->id;

        EiancPatient::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah pasien ' . $request->pat_norm . '-' . $request->pat_name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah tersimpan');
        return redirect()->route('patient');
    }

    public function edit($id)
    {
        $data = EiancPatient::findOrfail(Crypt::decrypt($id));
        $sex = SelecSex::all();
        $religion = SelecReligion::all();
        $education = SelecEduca::all();
        $work = SelecWork::all();
        $blood = SelecBlood::all();
        $marital = SelecMarital::all();
        $call = SelecCall::all();
        $province = SysAlamat::whereRaw('CHAR_LENGTH(kode) = 2')
            ->orderBy('kode', 'ASC')
            ->get();
        $status = SelecStatusPatient::all();

        return view('pages/patient/edit', compact('data', 'call', 'sex', 'religion', 'education', 'work', 'blood', 'marital', 'province', 'status'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'pat_name' => 'required',
            'pat_pob' => 'required',
            'pat_dob' => 'required',
            'pat_biological_mother' => 'required',
            'pat_rt' => 'required',
            'pat_rw' => 'required',
            'pat_address' => 'required',
        ]);

        if ($request->pat_called == '') {
            return redirect()->back()->withInput()->with('pat_called', 'Options not selected');
        }
        if ($request->pat_sex == '') {
            return redirect()->back()->withInput()->with('pat_sex', 'Options not selected');
        }
        if ($request->pat_religion == '') {
            return redirect()->back()->withInput()->with('pat_religion', 'Options not selected');
        }
        if ($request->pat_education == '') {
            return redirect()->back()->withInput()->with('pat_education', 'Options not selected');
        }
        if ($request->pat_work == '') {
            return redirect()->back()->withInput()->with('pat_work', 'Options not selected');
        }
        if ($request->pat_blood == '') {
            return redirect()->back()->withInput()->with('pat_blood', 'Options not selected');
        }
        if ($request->pat_marital == '') {
            return redirect()->back()->withInput()->with('pat_marital', 'Options not selected');
        }
        if ($request->pat_village == '') {
            return redirect()->back()->withInput()->with('pat_village', 'Options not selected');
        }

        $year = date('Y') - date('Y', strtotime($request->pat_dob));
        $month = date('m') - date('m', strtotime($request->pat_dob));
        $day = date('d') - date('d', strtotime($request->pat_dob));

        $input = $request->except('_token');
        $input['pat_age'] = $year;
        $input['pat_year'] = $year;
        $input['pat_month'] = $month;
        $input['pat_day'] = $day;

        EiancPatient::where('pat_norm', $request->pat_norm)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah pasien ' . $request->pat_norm . '-' . $request->pat_name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah diubah');
        return redirect()->route('patient');
    }

    public function destroy($id)
    {
        $data = EiancPatient::find(Crypt::decrypt($id));

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'delete pasien ' . $data->pat_norm . '-' . $data->pat_name
        ]);

        $data->delete();

        Alert::success('Sukses', 'Oke, Data sudah dihapus');
        return redirect()->back();
    }
}
