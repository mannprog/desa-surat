<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKk;
use App\Models\SuratKtp;
use App\Models\SuratSkck;
use App\Models\SuratSktm;
use App\Models\WargaDetail;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\UserWargaDataTable;

class UserWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserWargaDataTable $dataTable)
    {
        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return $dataTable->render('auth.admin.pages.users.warga.index', compact(['nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $warga = User::with('wargaDetail')->find($id);

        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);
        
        return view('auth.admin.pages.users.warga.detail', compact(['warga', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        try {
            DB::transaction(function () {

                request()->validate([
                    'name' => 'required|string',
                    'username' => 'required|string|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:4',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048',
                    'no_kk' => 'required|max:16',
                    'nik' => 'required|max:16',
                    'jenis_kelamin' => 'required',
                    'agama' => 'required',
                    'status' => 'required',
                ]);

                $userData = [
                    'name' => request('name'),
                    'username' => request('username'),
                    'email' => request('email'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    'is_admin' => 1,
                ];
    
                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('admin/images/profiles'), $filename);
                    $userData['foto'] = $filename;
                }
    
                $user = User::create($userData);

                WargaDetail::create([
                    'user_id' => $user->id,
                    'no_kk' => request('no_kk'),
                    'nik' => request('nik'),
                    'jenis_kelamin' => request('jenis_kelamin'),
                    'agama' => request('agama'),
                    'status' => request('status'),
                ]);
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data user berhasil ditambahkan',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $warga = User::with(['wargaDetail'])->findOrFail($id);

        $nspktp = SuratKtp::where('status', 'belumditentukan')->with('user')->get();
        $nspkk = SuratKk::where('status', 'belumditentukan')->with('user')->get();
        $nspsktm = SuratSktm::where('status', 'belumditentukan')->with('user')->get();
        $nspskck = SuratSkck::where('status', 'belumditentukan')->with('user')->get();

        $xdata = array_merge($nspktp->toArray(), $nspkk->toArray(), $nspsktm->toArray(), $nspskck->toArray());
        $ndata = count($xdata);

        return view('auth.admin.pages.users.warga.component.edit', compact(['warga', 'nspktp', 'nspkk', 'nspsktm', 'nspskck', 'ndata']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        try {
            DB::transaction(function () use ($id) {

                $validated = [
                    'name' => 'required|string',
                    'username' => 'required|string|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048',
                    'no_kk' => 'required|max:16',
                    'nik' => 'required|max:16',
                    'tempat_lahir' => 'required',
                    'tanggal_lahir' => 'required',
                    'jenis_kelamin' => 'required',
                    'gol_darah' => 'required',
                    'alamat' => 'required',
                    'agama' => 'required',
                    'status' => 'required',
                    'pekerjaan' => 'required',
                    'ayah' => 'required',
                    'ibu' => 'required',
                    'pasangan' => 'required',
                    'anak' => 'required',
                    'no_hp' => 'required',
                ];

                $user = User::findOrFail($id);
                $user->name = request('name');
                $user->email = request('email');
                $user->username = request('username');
                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('admin/images/profiles'), $filename);
                    $user->foto = $filename;
                }
                $user->save();

                $wargaDetail = WargaDetail::where('user_id', $user->id)->first();
                if (!$wargaDetail) {
                    $wargaDetail = new WargaDetail();
                    $wargaDetail->user_id = $user->id;
                }

                $wargaDetail->no_kk = request('no_kk');
                $wargaDetail->nik = request('nik');
                $wargaDetail->tempat_lahir = request('tempat_lahir');
                $wargaDetail->tanggal_lahir = request('tanggal_lahir');
                $wargaDetail->jenis_kelamin = request('jenis_kelamin');
                $wargaDetail->gol_darah = request('gol_darah');
                $wargaDetail->alamat = request('alamat');
                $wargaDetail->agama = request('agama');
                $wargaDetail->status = request('status');
                $wargaDetail->pekerjaan = request('pekerjaan');
                $wargaDetail->ayah = request('ayah');
                $wargaDetail->ibu = request('ibu');
                $wargaDetail->pasangan = request('pasangan');
                $wargaDetail->anak = request('anak');
                $wargaDetail->no_hp = request('no_hp');
                $wargaDetail->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->route('kelola.warga.index')->with('message', $message);
            // return response()->json([
            //     'message' => $e->getMessage(),
            // ], 400);
        }

        return redirect()->route('kelola.warga.index')->with('success', 'Data User berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $warga = User::findOrFail($id);
            $warga->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'User warga berhasil dihapus',
        ]);
    }
}
