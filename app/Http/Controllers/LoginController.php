<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
       // Ambil user yang sedang login
        $user = Auth::user();
       // Cek role_id untuk menentukan redirect
       if ($user->role_id == 1) {
        return redirect()->route('dashboard');
        } elseif ($user->role_id == 2) {
            return redirect()->route('profile');
        } elseif ($user->role_id == 3) {
            return redirect()->route('profile');
        } else {
            return redirect()->route('error'); // Role tidak valid
        }
     }
        return redirect()->route('login')->with('error', 'Login gagal!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
