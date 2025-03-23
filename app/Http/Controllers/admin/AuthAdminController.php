<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class AuthAdminController extends Controller
{
    public function Index(){
        return view("admin.login_admin");
    }
    public function Dashboard(){
        return view("admin.dashboard_Admin");
    }
    public function AuthAdmin(Request $request)
    {
        // dd("salah");
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard("admin")->attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard', absolute: false));

        }

        return redirect()->route('admin.loginSubmit');
    }
}
