<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.home');
    }

    public function kontak()
    {
        return view('landing.pages.kontak');
    }

    public function ktp()
    {
        return view('landing.pages.ktp');
    }

    public function kk()
    {
        return view('landing.pages.kk');
    }

    public function skck()
    {
        return view('landing.pages.skck');
    }

    public function sktm()
    {
        return view('landing.pages.sktm');
    }
}
