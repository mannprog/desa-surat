<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKk;
use App\Models\SuratKtp;
use App\Models\SuratSkck;
use App\Models\SuratSktm;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function exportSuratKtp(LaporanSuratKtpDataTable $dataTable)
    {
        $data = $dataTable->query(new SuratKtp())->get();

        $pdf = Pdf::loadView('auth.admin.pages.laporan.pdf.ktp', ['data' => $data]);
        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Laporan-SPKTP.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
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

    public function exportSuratKk(LaporanSuratKkDataTable $dataTable)
    {
        $data = $dataTable->query(new SuratKk())->get();

        $pdf = Pdf::loadView('auth.admin.pages.laporan.pdf.kk', ['data' => $data]);
        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Laporan-SPKK.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
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

    public function exportSuratSktm(LaporanSuratSktmDataTable $dataTable)
    {
        $data = $dataTable->query(new SuratSktm())->get();

        $pdf = Pdf::loadView('auth.admin.pages.laporan.pdf.sktm', ['data' => $data]);
        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Laporan-SPSKTM.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
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

    public function exportSuratSkck(LaporanSuratSkckDataTable $dataTable)
    {
        $data = $dataTable->query(new SuratSkck())->get();

        $pdf = Pdf::loadView('auth.admin.pages.laporan.pdf.skck', ['data' => $data]);
        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Laporan-SPSKCK.pdf"',
            'Cache-Control' => 'public, max-age=60'
        ];

        return new Response($pdfContent, 200, $headers);
    }
}
