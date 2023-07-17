<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
                return redirect()->to('/dashboard-admin');
            } else {
                return redirect()->to('/dashboard-warga');
            }
        }

        return back()->with('loginError', 'Email atau Password Salah!');
    }

    public function register()
    {
        return view('auth.login.register');
    }

    public function prosesRegister()
    {
        $validatedData = request()->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        try {
            User::create([
                'name' => $validatedData['name'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => password_hash($validatedData['password'], PASSWORD_DEFAULT),
            ]);

        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        
        return redirect()->to('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}
