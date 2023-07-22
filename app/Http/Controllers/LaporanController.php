<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanSuratKkDataTable;
use App\DataTables\LaporanSuratKtpDataTable;
use App\DataTables\LaporanSuratSkckDataTable;
use App\DataTables\LaporanSuratSktmDataTable;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function dataSuratKtp(LaporanSuratKtpDataTable $dataTable)
    {
        return $dataTable->render('auth.admin.pages.laporan.ktp');
    }

    public function dataSuratKk(LaporanSuratKkDataTable $dataTable)
    {
        return $dataTable->render('auth.admin.pages.laporan.kk');
    }

    public function dataSuratSktm(LaporanSuratSktmDataTable $dataTable)
    {
        return $dataTable->render('auth.admin.pages.laporan.sktm');
    }

    public function dataSuratSkck(LaporanSuratSkckDataTable $dataTable)
    {
        return $dataTable->render('auth.admin.pages.laporan.skck');
    }
}
