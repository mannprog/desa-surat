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
use App\DataTables\AdminSuratSktmDataTable;

class AdminSuratSktmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminSuratSktmDataTable $dataTable)
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

        return $dataTable->render('auth.admin.pages.surat.sktm.index', compact(['user', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
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
            'message' => 'Data pemohon Surat Pengantar SKTM berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SuratSktm::with(['user'])->find($id);
        
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return view('auth.admin.pages.surat.sktm.detail', compact(['data', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    public function rejectPermohonan($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $permohonan = SuratSktm::findOrFail($id);
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

                $permohonan = SuratSktm::findOrFail($id);
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
                    'spsktm' => 'required|mimes:png,jpg,jpeg,pdf|max:2096',
                ]);

                $permohonan = SuratSktm::findOrFail($id);
                $permohonan->tanggal_dibuat = request('tanggal_dibuat');
                if (request()->hasFile('spsktm')) {
                    $spsktm = request()->file('spsktm');
                    $filename = $spsktm->getClientOriginalName();
                    $spsktm->move(public_path('file/surat/sktm'), $filename);
                    $permohonan->spsktm = $filename;
                }
                $permohonan->status = 'selesai';
                $permohonan->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('error', $message);
        }

        return redirect()->back()->with('success', 'Surat Pengantar SKTM berhasil diupload');
    }

    public function download($spsktm)
    {
        $data = SuratSktm::where('spsktm', $spsktm)->firstOrFail();
        $filePath = public_path('file/surat/sktm/' . $data->spsktm);

        $mime = Storage::mimeType($filePath);

        $originalFileName = $data->spsktm;

        return Response::download($filePath, $originalFileName, ['Content-Type' => $mime]);
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
            'message' => 'Pemohon Surat Pengantar SKTM berhasil dihapus',
        ]);
    }
}
