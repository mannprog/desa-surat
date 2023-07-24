<?php

namespace App\Http\Controllers;

use App\Models\SuratSktm;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\WargaSuratSktmDataTable;

class WargaSuratSktmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WargaSuratSktmDataTable $dataTable)
    {
        return $dataTable->render('auth.warga.pages.surat.sktm.index');
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
                    $ktp->move(public_path('file/permohonan/sktm'), $filename);
                    $userData['ktp'] = $filename;
                }
    
                if (request()->hasFile('kk')) {
                    $kk = request()->file('kk');
                    $filename = $kk->getClientOriginalName();
                    $kk->move(public_path('file/permohonan/sktm'), $filename);
                    $userData['kk'] = $filename;
                }
    
                $user = SuratSktm::create($userData);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar SKTM berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SuratSktm::with(['user'])->find($id);

        return view('auth.warga.pages.surat.sktm.detail', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $spsktm = SuratSktm::findOrFail($id);
            $spsktm->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar SKTM berhasil dihapus',
        ]);
    }
}
