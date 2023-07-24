<?php

namespace App\Http\Controllers;

use App\Models\SuratKtp;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\WargaSuratKtpDataTable;

class WargaSuratKtpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WargaSuratKtpDataTable $dataTable)
    {
        return $dataTable->render('auth.warga.pages.surat.ktp.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        
        try {
            DB::transaction(function () {

                request()->validate([
                    'file_kk' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                ]);

                $userData = [
                    'user_id' => auth()->user()->id,
                    'tanggal_request' => now(),
                ];
    
                if (request()->hasFile('file_kk')) {
                    $file_kk = request()->file('file_kk');
                    $filename = $file_kk->getClientOriginalName();
                    $file_kk->move(public_path('file/permohonan/ktp'), $filename);
                    $userData['file_kk'] = $filename;
                }
    
                $user = SuratKtp::create($userData);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar KTP berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SuratKtp::with(['user'])->find($id);

        return view('auth.warga.pages.surat.ktp.detail', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $spktp = SuratKtp::findOrFail($id);
            $spktp->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Permohonan pembuatan Surat Pengantar KTP berhasil dihapus',
        ]);
    }
}
