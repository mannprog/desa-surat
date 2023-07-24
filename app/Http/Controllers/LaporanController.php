<?php

namespace App\Http\Controllers;

use App\Models\SuratKk;
use App\Models\SuratKtp;
use App\Models\SuratSkck;
use App\Models\SuratSktm;
use Illuminate\Http\Request;
use App\DataTables\LaporanSuratKkDataTable;
use App\DataTables\LaporanSuratKtpDataTable;
use App\DataTables\LaporanSuratSkckDataTable;
use App\DataTables\LaporanSuratSktmDataTable;

class LaporanController extends Controller
{
    public function dataSuratKtp(LaporanSuratKtpDataTable $dataTable)
    {
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return $dataTable->render('auth.admin.pages.laporan.ktp', compact(['nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    public function dataSuratKk(LaporanSuratKkDataTable $dataTable)
    {
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return $dataTable->render('auth.admin.pages.laporan.kk', compact(['nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    public function dataSuratSktm(LaporanSuratSktmDataTable $dataTable)
    {
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return $dataTable->render('auth.admin.pages.laporan.sktm', compact(['nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    public function dataSuratSkck(LaporanSuratSkckDataTable $dataTable)
    {
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return $dataTable->render('auth.admin.pages.laporan.skck', compact(['nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }
}
