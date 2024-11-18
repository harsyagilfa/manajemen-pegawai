<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Roles;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();
        return view('admin.data-pegawai',compact('pegawai'));
    }
    public function detail($id)
    {
        $pegawai = Pegawai::find($id);
        return view('admin.detail-pegawai',compact('pegawai'));
    }
    public function tambah_pegawai()
    {
        $roles = Roles::all();
        $pegawai = Pegawai::with('user')->get();
        return view('admin.tambah_pegawai',compact('roles','pegawai'));
    }
    public function tambah_pegawai_aksi(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'gaji_pokok' => 'required',
            'tanggal_masuk' => 'required',
            'status' => 'required',
            'role_id' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Simpan data user
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        // Simpan data pegawai
        $pegawai = new Pegawai();
        $pegawai->user_id = $user->id;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->divisi = $request->divisi;
        $pegawai->gaji_pokok = $request->gaji_pokok;
        $pegawai->tanggal_masuk = $request->tanggal_masuk;
        $pegawai->status = $request->status;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('assets/admin', 'public');
            $pegawai->foto = $foto;
        }
        $pegawai->save();
        return redirect()->route('data.pegawai')->with('status', 'Data Pegawai berhasil ditambah.');

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

    public function delete_pegawai($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        if ($pegawai->foto) {
            Storage::disk('public')->delete('assets/admin/' . $pegawai->foto);
        }
        $pegawai->user->delete();
        $pegawai->delete();
        return redirect()->route('data.pegawai')->with('delete', 'Data Pegawai berhasil Diubah.');
    }
}
