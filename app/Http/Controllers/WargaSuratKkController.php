<?php

namespace App\Http\Controllers;

use App\Models\SuratKk;
use App\Models\SuratKtp;
use App\Models\SuratSkck;
use App\Models\SuratSktm;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\DataTables\WargaSuratKkDataTable;

class WargaSuratKkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WargaSuratKkDataTable $dataTable)
    {
        $nspktp = SuratKtp::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspkk = SuratKk::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspsktm = SuratSktm::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspskck = SuratSkck::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return $dataTable->render('auth.warga.pages.surat.kk.index', compact(['nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        try {
            DB::transaction(function () {

                request()->validate([
                    'kk_lama' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                    'file_pendukung' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                ]);

                $userData = [
                    'user_id' => auth()->user()->id,
                    'tanggal_request' => now(),
                ];
    
                if (request()->hasFile('kk_lama')) {
                    $kk_lama = request()->file('kk_lama');
                    $filename = $kk_lama->getClientOriginalName();
                    $kk_lama->move(public_path('file/permohonan/kk'), $filename);
                    $userData['kk_lama'] = $filename;
                }
    
                if (request()->hasFile('file_pendukung')) {
                    $file_pendukung = request()->file('file_pendukung');
                    $filename = $file_pendukung->getClientOriginalName();
                    $file_pendukung->move(public_path('file/permohonan/kk'), $filename);
                    $userData['file_pendukung'] = $filename;
                }
    
                $user = SuratKk::create($userData);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar Kartu Keluarga berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SuratKk::with(['user'])->find($id);

        $nspktp = SuratKtp::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspkk = SuratKk::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspsktm = SuratSktm::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspskck = SuratSkck::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return view('auth.warga.pages.surat.kk.detail', compact(['data', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $spkk = SuratKk::findOrFail($id);
            $spkk->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar Kartu Keluarga berhasil dihapus',
        ]);
    }

    public function download($spkk)
    {
        $data = SuratKk::where('spkk', $spkk)->firstOrFail();
        $filePath = public_path('file/surat/kk/' . $data->spkk);

        $mime = Storage::mimeType($filePath);

        $originalFileName = $data->spkk;

        return Response::download($filePath, $originalFileName, ['Content-Type' => $mime]);
    }
}
