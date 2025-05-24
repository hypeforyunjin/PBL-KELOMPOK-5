<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        return view('customer.auth.DashboardPengguna', [
            'user' => Auth::user(),
        ]);
    }
    public function dashboardadmin()
    {
        return view('admin/dashboardLTE');
    }
}
