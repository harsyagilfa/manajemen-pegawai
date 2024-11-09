<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        $roles = Roles::all();
        return view('register',compact('roles'));
    }
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'no_hp'     => 'required',
            'username'  => 'required',
            'password'  => 'required',
            'role_id' => 'required',
        ]);
        $users = User::create([
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id, // Simpan role_id di user
        ]);
        Session::flash('sukses', 'success');
        Session::flash('message', 'Regitrasi Berhasil,Silahkan login');
        return redirect()->route('login');
    }
}
