<?php

namespace App\Http\Controllers;

use App\Models\SuratKk;
use App\Models\SuratKtp;
use App\Models\SuratSkck;
use App\Models\SuratSktm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $spktp = SuratKtp::where('status', 'belumditentukan')->count();
        $spkk = SuratKk::where('status', 'belumditentukan')->count();
        $spsktm = SuratSktm::where('status', 'belumditentukan')->count();
        $spskck = SuratSkck::where('status', 'belumditentukan')->count();

        return view('auth.admin.dashboard', compact(['spktp', 'spkk', 'spsktm', 'spskck']));
    }

    public function indexWarga()
    {
        return view('auth.warga.dashboard');
    }
}
