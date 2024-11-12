<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();
        return view('admin/data-pegawai',compact('pegawai'));
    }
}
