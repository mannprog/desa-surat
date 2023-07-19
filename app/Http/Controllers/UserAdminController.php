<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AdminDetail;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\UserAdminDataTable;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserAdminDataTable $dataTable)
    {
        return $dataTable->render('auth.admin.pages.users.admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = User::with('adminDetail')->find($id);
        
        return view('auth.admin.pages.users.admin.detail', compact('admin'));
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
                    'jenis_kelamin' => 'required',
                    'agama' => 'required',
                    'pendidikan_terakhir' => 'required',
                    'jabatan' => 'required',
                    'no_sk' => 'required',
                    'tmt_sk' => 'required',
                    'status' => 'required',
                    'foto' => 'sometimes|mimes:png,jpg,jpeg,svg|max:1048',
                ]);

                $userData = [
                    'name' => request('name'),
                    'username' => request('username'),
                    'email' => request('email'),
                    'password' => password_hash(request('password'), PASSWORD_DEFAULT),
                    'is_admin' => 0,
                ];
    
                if (request()->hasFile('foto')) {
                    $foto = request()->file('foto');
                    $filename = $foto->getClientOriginalName();
                    $foto->move(public_path('admin/images/profiles'), $filename);
                    $userData['foto'] = $filename;
                }
    
                $user = User::create($userData);

                AdminDetail::create([
                    'user_id' => $user->id,
                    'jenis_kelamin' => request('jenis_kelamin'),
                    'agama' => request('agama'),
                    'pendidikan_terakhir' => request('pendidikan_terakhir'),
                    'jabatan' => request('jabatan'),
                    'no_sk' => request('no_sk'),
                    'tmt_sk' => request('tmt_sk'),
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
