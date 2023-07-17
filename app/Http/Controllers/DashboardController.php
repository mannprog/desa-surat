<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        return view('auth.admin.dashboard');
    }

    public function indexWarga()
    {
        return view('auth.warga.dashboard');
    }
}
