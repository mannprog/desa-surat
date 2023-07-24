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
use App\DataTables\WargaSuratSkckDataTable;

class WargaSuratSkckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WargaSuratSkckDataTable $dataTable)
    {
        $nspktp = SuratKtp::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspkk = SuratKk::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspsktm = SuratSktm::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspskck = SuratSkck::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return $dataTable->render('auth.warga.pages.surat.skck.index', compact(['nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        try {
            DB::transaction(function () {

                request()->validate([
                    'ktp' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                    'kk' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                ]);

                $userData = [
                    'user_id' => auth()->user()->id,
                    'tanggal_request' => now(),
                ];
    
                if (request()->hasFile('ktp')) {
                    $ktp = request()->file('ktp');
                    $filename = $ktp->getClientOriginalName();
                    $ktp->move(public_path('file/permohonan/skck'), $filename);
                    $userData['ktp'] = $filename;
                }
    
                if (request()->hasFile('kk')) {
                    $kk = request()->file('kk');
                    $filename = $kk->getClientOriginalName();
                    $kk->move(public_path('file/permohonan/skck'), $filename);
                    $userData['kk'] = $filename;
                }
    
                $user = SuratSkck::create($userData);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar SKCK berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SuratSkck::with(['user'])->find($id);

        $nspktp = SuratKtp::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspkk = SuratKk::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspsktm = SuratSktm::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();
        $nspskck = SuratSkck::whereIn('status', ['tolak', 'proses', 'selesai'])->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return view('auth.warga.pages.surat.skck.detail', compact(['data', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $spskck = SuratSkck::findOrFail($id);
            $spskck->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar SKCK berhasil dihapus',
        ]);
    }

    public function download($spskck)
    {
        $data = SuratSkck::where('spskck', $spskck)->firstOrFail();
        $filePath = public_path('file/surat/skck/' . $data->spskck);

        $mime = Storage::mimeType($filePath);

        $originalFileName = $data->spskck;

        return Response::download($filePath, $originalFileName, ['Content-Type' => $mime]);
    }
}
