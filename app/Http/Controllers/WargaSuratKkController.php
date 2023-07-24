<?php

namespace App\Http\Controllers;

use App\Models\SuratKk;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\WargaSuratKkDataTable;

class WargaSuratKkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WargaSuratKkDataTable $dataTable)
    {
        return $dataTable->render('auth.warga.pages.surat.kk.index');
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

        return view('auth.warga.pages.surat.kk.detail', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $spsktm = SuratKk::findOrFail($id);
            $spsktm->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar Kartu Keluarga berhasil dihapus',
        ]);
    }
}
