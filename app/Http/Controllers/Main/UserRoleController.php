<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\SysLog;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = UserRole::orderBy('user_role_id', 'DESC')->get();

        return view('pages/userrole/index', compact('data'));
    }

    public function create()
    {
        return view('pages/userrole/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_role_code' => 'required|unique:user_roles',
            'user_role_name' => 'required|unique:user_roles',
        ]);

        $input = $request->except('_token');
        $input['user_role_status'] = '1';

        $store = UserRole::create($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Tambah hak akses ' . $store->user_role_id . '-' . $request->user_role_name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah tersimpan');
        return redirect()->route('userrole');
    }

    public function edit($id)
    {
        $data = UserRole::findOrfail(Crypt::decrypt($id));

        return view('pages/userrole/edit', compact('data'));
    }

    public function update(Request $request)
    {
        $input = $request->except('_token', 'id');

        UserRole::where('user_role_id', $request->id)->update($input);

        SysLog::create([
            'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            'log_browser' => get_client_browser(),
            'log_os' => $_SERVER['HTTP_USER_AGENT'],
            'log_user_id' => auth()->user()->id,
            'log_action' => 'Ubah hak akses ' . $request->id . '-' . $request->user_role_name
        ]);

        Alert::success('Sukses', 'Oke, Data sudah diubah');
        return redirect()->route('userrole');
    }

    public function destroy(Request $request)
    {
        $find = User::where('role', Crypt::decrypt($request->id))->get();

        if (count($find) > 0) {
            Alert::error('Gagal', 'Data masih digunakan pada TEMOI');
            return redirect()->back();
        } else {
            $data = UserRole::where('user_role_code', Crypt::decrypt($request->id))->delete();

            SysLog::create([
                'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
                'log_browser' => get_client_browser(),
                'log_os' => $_SERVER['HTTP_USER_AGENT'],
                'log_user_id' => auth()->user()->id,
                'log_action' => 'delete userrole code ' . Crypt::decrypt($request->id)
            ]);

            $data->delete();

            Alert::success('Sukses', 'Oke, Data sudah dihapus');
            return redirect()->back();
        }
    }
}
