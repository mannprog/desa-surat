<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratKk;
use App\Models\SuratKtp;
use App\Models\SuratSkck;
use App\Models\SuratSktm;
use App\Models\AdminDetail;
use App\Models\WargaDetail;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $spktp = SuratKtp::where('status', 'belumditentukan')->count();
        $spkk = SuratKk::where('status', 'belumditentukan')->count();
        $spsktm = SuratSktm::where('status', 'belumditentukan')->count();
        $spskck = SuratSkck::where('status', 'belumditentukan')->count();

        return view('auth.admin.dashboard', compact(['spktp', 'spkk', 'spsktm', 'spskck']));
    }

    public function profilAdmin($id)
    {
        $admin = User::with('adminDetail')->find($id);

        return view('auth.admin.pages.profil.index', compact('admin'));
    }

    public function editProfilAdmin($id)
    {
        $admin = User::with('adminDetail')->find($id);

        return view('auth.admin.pages.profil.edit', compact('admin'));
    }

    public function updateProfilAdmin($id): RedirectResponse
    {
        try {
            DB::transaction(function () use ($id) {

                $validated = [
                    'name' => 'required|string',
                    'username' => 'required|string|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048',
                    'tempat_lahir' => 'required',
                    'tanggal_lahir' => 'required',
                    'jenis_kelamin' => 'required',
                    'agama' => 'required',
                    'pendidikan_terakhir' => 'required',
                    'jabatan' => 'required',
                    'tmt_sk' => 'required',
                    'no_sk' => 'required',
                    'status' => 'required',
                    'alamat' => 'required',
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

                $adminDetail = AdminDetail::where('user_id', $user->id)->first();
                if (!$adminDetail) {
                    $adminDetail = new AdminDetail();
                    $adminDetail->user_id = $user->id;
                }

                $adminDetail->tempat_lahir = request('tempat_lahir');
                $adminDetail->tanggal_lahir = request('tanggal_lahir');
                $adminDetail->jenis_kelamin = request('jenis_kelamin');
                $adminDetail->agama = request('agama');
                $adminDetail->pendidikan_terakhir = request('pendidikan_terakhir');
                $adminDetail->jabatan = request('jabatan');
                $adminDetail->tmt_sk = request('tmt_sk');
                $adminDetail->no_sk = request('no_sk');
                $adminDetail->alamat = request('alamat');
                $adminDetail->status = request('status');
                $adminDetail->no_hp = request('no_hp');
                $adminDetail->save();
            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->route('admin.profil')->with('message', $message);
            // return response()->json([
            //     'message' => $e->getMessage(),
            // ], 400);
        }

        return redirect()->route('admin.profil', auth()->user()->id)->with('success', 'Profil berhasil diedit');
    }

    public function indexWarga()
    {
        $spktp = SuratKtp::where('status', 'belumditentukan')->count();
        $spkk = SuratKk::where('status', 'belumditentukan')->count();
        $spsktm = SuratSktm::where('status', 'belumditentukan')->count();
        $spskck = SuratSkck::where('status', 'belumditentukan')->count();

        return view('auth.warga.dashboard', compact(['spktp', 'spkk', 'spsktm', 'spskck']));
    }

    public function profilWarga($id)
    {
        $warga = User::with('wargaDetail')->find($id);

        return view('auth.warga.pages.profil.index', compact('warga'));
    }

    public function editProfilWarga($id)
    {
        $warga = User::with('wargaDetail')->find($id);

        return view('auth.warga.pages.profil.edit', compact('warga'));
    }

    public function updateProfilWarga($id): RedirectResponse
    {
        try {
            DB::transaction(function () use ($id) {

                $validated = [
                    'name' => 'required|string',
                    'username' => 'required|string|unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048',
                    'no_kk' => 'required',
                    'nik' => 'required',
                    'tempat_lahir' => 'required',
                    'tanggal_lahir' => 'required',
                    'jenis_kelamin' => 'required',
                    'agama' => 'required',
                    'status' => 'required',
                    'alamat' => 'required',
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
            return redirect()->route('warga.profil')->with('message', $message);
            // return response()->json([
            //     'message' => $e->getMessage(),
            // ], 400);
        }

        return redirect()->route('warga.profil', auth()->user()->id)->with('success', 'Profil berhasil diedit');
    }
}
