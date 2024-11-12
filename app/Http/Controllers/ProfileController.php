<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();
        return view('profile', compact('pegawai'));
    }
}
