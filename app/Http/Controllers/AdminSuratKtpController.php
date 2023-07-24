<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKk;
use App\Models\SuratKtp;
use App\Models\SuratSkck;
use App\Models\SuratSktm;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\DataTables\AdminSuratKtpDataTable;

class AdminSuratKtpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminSuratKtpDataTable $dataTable)
    {
        $data = User::all();
        $filteredUsers = $data->where('is_admin', 1);
        $user = $filteredUsers->values()->all();
        
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return $dataTable->render('auth.admin.pages.surat.ktp.index', compact(['user', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
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
                    'file_kk' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                ]);

                $userData = [
                    'user_id' => request('user_id'),
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
            'message' => 'Data pemohon Surat Pengantar KTP berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SuratKtp::with(['user'])->find($id);
        
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return view('auth.admin.pages.surat.ktp.detail', compact(['data', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    public function rejectPermohonan($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $permohonan = SuratKtp::findOrFail($id);
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

                $permohonan = SuratKtp::findOrFail($id);
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
                    'tanggal_dibuat' => 'required',
                    'spktp' => 'required|mimes:png,jpg,jpeg,pdf|max:2096',
                ]);

                $permohonan = SuratKtp::findOrFail($id);
                $permohonan->tanggal_dibuat = request('tanggal_dibuat');
                if (request()->hasFile('spktp')) {
                    $spktp = request()->file('spktp');
                    $filename = $spktp->getClientOriginalName();
                    $spktp->move(public_path('file/surat/ktp'), $filename);
                    $permohonan->spktp = $filename;
                }
                $permohonan->status = 'selesai';
                $permohonan->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('error', $message);
        }

        return redirect()->back()->with('success', 'Surat Pengantar KTP berhasil diupload');
    }

    public function download($spktp)
    {
        $data = SuratKtp::where('spktp', $spktp)->firstOrFail();
        $filePath = public_path('file/surat/ktp/' . $data->spktp);

        $mime = Storage::mimeType($filePath);

        $originalFileName = $data->spktp;

        return Response::download($filePath, $originalFileName, ['Content-Type' => $mime]);
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
            'message' => 'Pemohon Surat Pengantar KTP berhasil dihapus',
        ]);
    }
}
