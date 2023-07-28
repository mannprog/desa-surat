<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WargaDetail;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login.login');
    }

    public function prosesLogin(Request $request): RedirectResponse
    {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = [
            $fieldType => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            Auth::check();
            if (Auth::user()->is_admin == 0) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('warga.index');
            }
        }

        return back()->with('loginError', 'Username/Email atau Password Salah!');
    }

    public function register()
    {
        return view('auth.login.register');
    }

    public function prosesRegister()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'no_kk' => 'required|max:16',
            'nik' => 'required|max:16',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status' => 'required',
        ]);
    
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
    
            // Return the JSON response with the error message
            return response()->json([
                'error' => true,
                'message' => $errorMessage,
            ], 400);
        }
    
        // If validation passes, create the user and return the JSON response
        $user = User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => password_hash(request('password'), PASSWORD_DEFAULT),
        ]);

        WargaDetail::create([
            'user_id' => $user->id,
            'no_kk' => request('no_kk'),
            'nik' => request('nik'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'agama' => request('agama'),
            'status' => request('status'),
        ]);
    
        return response()->json([
            'error' => false,
            'message' => 'Akun Portal berhasil dibuat. Silahkan Login...',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}
