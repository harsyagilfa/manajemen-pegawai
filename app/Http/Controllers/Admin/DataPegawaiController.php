<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Roles;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();
        return view('admin.data-pegawai',compact('pegawai'));
    }
    public function tambah_pegawai()
    {
        $roles = Roles::all();
        $pegawai = Pegawai::with('user')->get();
        return view('admin.tambah_pegawai',compact('roles','pegawai'));
    }
    public function edit_pegawai($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $user = User::all();
        return view('admin.edit-pegawai',compact('pegawai','user'));
    }
    public function edit_pegawai_aksi(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:50',
            'gaji_pokok' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $pegawai = Pegawai::findOrFail($id);
        if ($request->filled('name')) {
            $pegawai->user->name = $request->name;
            $pegawai->user->save();
        }
        $pegawai->tanggal_lahir     = $request->tanggal_lahir;
        $pegawai->no_hp             = $request->no_hp;
        $pegawai->jenis_kelamin     = $request->jenis_kelamin;
        $pegawai->alamat            = $request->alamat;
        $pegawai->jabatan           = $request->jabatan;
        $pegawai->divisi           = $request->divisi;
        $pegawai->gaji_pokok        = $request->gaji_pokok;
        $pegawai->tanggal_masuk     = $request->tanggal_masuk;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('assets/admin', 'public');
            $pegawai->foto = $fotoPath;
        }
        $pegawai->save();

        return redirect()->route('data.pegawai')->with('status', 'Data Pegawai berhasil Diubah.');
    }
}
