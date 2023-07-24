<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKk;
use App\Models\SuratKtp;
use App\Models\SuratSkck;
use App\Models\SuratSktm;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\DataTables\AdminSuratSkckDataTable;

class AdminSuratSkckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminSuratSkckDataTable $dataTable)
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

        return $dataTable->render('auth.admin.pages.surat.skck.index', compact(['user', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
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
                    'ktp' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                    'kk' => 'required|mimes:png,jpg,jpeg,svg|max:1048',
                ]);

                $userData = [
                    'user_id' => request('user_id'),
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
            'message' => 'Data pemohon Surat Pengantar SKCK berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SuratSkck::with(['user'])->find($id);
        
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return view('auth.admin.pages.surat.skck.detail', compact(['data', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    public function rejectPermohonan($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $permohonan = SuratSkck::findOrFail($id);
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

                $permohonan = SuratSkck::findOrFail($id);
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
                    'spskck' => 'required|mimes:png,jpg,jpeg,pdf|max:2096',
                ]);

                $permohonan = SuratSkck::findOrFail($id);
                $permohonan->tanggal_dibuat = request('tanggal_dibuat');
                if (request()->hasFile('spskck')) {
                    $spskck = request()->file('spskck');
                    $filename = $spskck->getClientOriginalName();
                    $spskck->move(public_path('file/surat/skck'), $filename);
                    $permohonan->spskck = $filename;
                }
                $permohonan->status = 'selesai';
                $permohonan->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('error', $message);
        }

        return redirect()->back()->with('success', 'Surat Pengantar SKCK berhasil diupload');
    }

    public function download($spskck)
    {
        $data = SuratSkck::where('spskck', $spskck)->firstOrFail();
        $filePath = public_path('file/surat/skck/' . $data->spskck);

        $mime = Storage::mimeType($filePath);

        $originalFileName = $data->spskck;

        return Response::download($filePath, $originalFileName, ['Content-Type' => $mime]);
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
            'message' => 'Pemohon Surat Pengantar SKCK berhasil dihapus',
        ]);
    }
}
