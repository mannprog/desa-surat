<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKk;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\DataTables\AdminSuratKkDataTable;

class AdminSuratKkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminSuratKkDataTable $dataTable)
    {
        $data = User::all();
        $filteredUsers = $data->where('is_admin', 1);
        $user = $filteredUsers->values()->all();

        return $dataTable->render('auth.admin.pages.surat.kk.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        try {
            DB::transaction(function () {

                request()->validate([
                    'user_id' => 'required',
                    'kk_lama' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                    'file_pendukung' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                ]);

                $userData = [
                    'user_id' => request('user_id'),
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
            'message' => 'Data pemohon Surat Pengantar Kartu Keluarga berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SuratKk::with(['user'])->find($id);

        return view('auth.admin.pages.surat.kk.detail', compact('data'));
    }

    public function rejectPermohonan($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $permohonan = SuratKk::findOrFail($id);
                $permohonan->status = 'tolak';
                $permohonan->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Permohonan berhasil ditolak');
    }

    public function acceptPermohonan($id)
    {
        try {
            DB::transaction(function () use ($id) {

                $permohonan = SuratKk::findOrFail($id);
                $permohonan->status = 'proses';
                $permohonan->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('success', 'Permohonan berhasil disetujui');
    }

    public function upload($id)
    {
        try {
            DB::transaction(function () use ($id) {
                request()->validate([
                    'spkk' => 'required|mimes:png,jpg,jpeg,pdf|max:2096',
                ]);

                $permohonan = SuratKk::findOrFail($id);
                if (request()->hasFile('spkk')) {
                    $spkk = request()->file('spkk');
                    $filename = $spkk->getClientOriginalName();
                    $spkk->move(public_path('file/surat/kk'), $filename);
                    $permohonan->spkk = $filename;
                }
                $permohonan->status = 'selesai';
                $permohonan->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('error', $message);
        }

        return redirect()->back()->with('success', 'Surat Pengantar Kartu Keluarga berhasil diupload');
    }

    public function download($spkk)
    {
        $data = SuratKk::where('spkk', $spkk)->firstOrFail();
        $filePath = public_path('file/surat/kk/' . $data->spkk);

        $mime = Storage::mimeType($filePath);

        $originalFileName = $data->spkk;

        return Response::download($filePath, $originalFileName, ['Content-Type' => $mime]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $spktp = SuratKk::findOrFail($id);
            $spktp->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Pemohon Surat Pengantar Kartu Keluarga berhasil dihapus',
        ]);
    }
}
