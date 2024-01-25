<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\EiancTemoi;
use App\Models\SysLog;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->role == '0') {
            $data = User::where('status', '!=', '2')
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $data = User::where('status', '!=', '2')
                ->where('role', '!=', '0')
                ->orderBy('id', 'DESC')
                ->get();
        }

        return view('pages/user/index', compact('data'));
    }

    public function create()
    {
        if (auth()->user()->role == '0') {
            $role = UserRole::where('user_role_status', '1')
                ->get();
        } else {
            $role = UserRole::where('user_role_status', '1')
                ->where('user_role_code', '!=', '0')
                ->where('user_role_code', '!=', '1')
                ->get();
        }

        $temoi = EiancTemoi::where('temoi_status', '1')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        return view('pages/user/create', compact('role', 'temoi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);

        if ($request->role == 'x') {
            return redirect()->back()->withInput()->with('role', 'Options not selected');
        }

        $nakes = EiancTemoi::where('temoi_id', $request->temoi)
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->value('nakes_name');

        $input = [
            'name' => $nakes,
            'email' => $request->email . '@eianc.id',
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'temoi' => $request->temoi,
            'status' => '1'
        ];

        $store = User::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah user ' . $store->id . '-' . $request->name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah tersimpan');
        return redirect()->route('user');
    }

    public function edit($id)
    {
        $data = User::where('id', Crypt::decrypt($id))
            ->get();

        if (auth()->user()->role == '0') {
            $role = UserRole::where('user_role_status', '1')
                ->get();
        } else {
            $role = UserRole::where('user_role_status', '1')
                ->where('user_role_code', '!=', '0')
                ->where('user_role_code', '!=', '1')
                ->get();
        }

        $temoi = EiancTemoi::where('temoi_status', '1')
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->join('eianc_instansis', 'eianc_instansis.ins_id', '=', 'eianc_temois.temoi_ins_id')
            ->get();

        return view('pages/user/edit', compact('data', 'role', 'temoi'));
    }

    public function update(Request $request)
    {
        $user = User::findOrfail($request->id);

        $this->validate($request, [
            'email' => ($request->email == $user->email) ? '' : 'required|unique:users',
            'password' => ($request->password != '') ? 'min:8' : ''
        ]);

        if ($request->role == 'x') {
            return redirect()->back()->withInput()->with('role', 'Options not selected');
        }

        $nakes = EiancTemoi::where('temoi_id', $request->temoi)
            ->join('eianc_nakes', 'eianc_nakes.nakes_id', '=', 'eianc_temois.temoi_nakes_id')
            ->value('nakes_name');

        $input = [
            'name' => ($nakes) ? $nakes : $user->name,
            'email' => $request->email,
            'password' => ($request->password != '') ? bcrypt($request->password) : $request->oldpassword,
            'role' => $request->role,
            'temoi' => ($request->temoi == 'x') ? 0 : $request->temoi,
            'status' => $request->status
        ];

        User::where('id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah user ' . $request->id . '-' . $request->name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah diubah');
        return redirect()->route('user');
    }

    public function destroy(Request $request)
    {
        $data = User::find(Crypt::decrypt($request->id));

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'hapus user ' . Crypt::decrypt($request->id) . '-' . $data->name
        ]);

        $data->delete();

        Alert::success('Sukses', 'Oke, Data sudah dihapus');
        return redirect()->back();
    }
}
