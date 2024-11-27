<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileSupervisorController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil data pegawai yang berelasi dengan user
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        return view('supervisor/profile_supervisor', compact('user','pegawai'));
    }

}
