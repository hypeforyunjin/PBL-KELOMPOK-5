<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gorden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthAdminController extends Controller
{
    public function Index(){
        return view("admin.login_admin");
    }

    public function Dashboard(){
        $gordens = Gorden::all();
        return view("admin.dashboardLTE", compact('gordens'));
        
    }
    
    public function AuthAdmin(Request $request)
    {
        // dd("salah");
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard("admin")->attempt($credentials)) {
            return redirect()->intended(route('admin.dashboardLTE', absolute: false));

        }

        return redirect()->route('admin.loginSubmit');
    }
}
