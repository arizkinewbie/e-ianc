<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SysLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1'])) {
            // SysLog::create([
            //     'log_ip' => (get_client_ip() == 'IP tidak dikenali') ? get_client_ip_2() : get_client_ip(),
            //     'log_browser' => get_client_browser(),
            //     'log_os' => $_SERVER['HTTP_USER_AGENT'],
            //     'log_user_id' => auth()->user()->id,
            //     'log_action' => 'New session login'
            // ]);

            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Maaf Akses ditolak!');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
