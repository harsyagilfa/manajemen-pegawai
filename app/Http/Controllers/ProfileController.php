<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil data pegawai yang berelasi dengan user
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        return view('profile', compact('user','pegawai'));
    }
    public function update()
    {
        $user = Auth::user();
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        return view('profile_update',compact('user', 'pegawai'));
    }
    public function update_aksi(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string|max:10',
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required',
            'tanggal_masuk' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto
        ]);
        // dd($request->all());
        // Update data di tabel `users`
        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->save();

        // Update data di tabel `pegawai`
        $pegawai                    = Pegawai::where('user_id', $user->id)->first();
        $pegawai->tanggal_lahir     = $request->tanggal_lahir;
        $pegawai->no_hp             = $request->no_hp;
        $pegawai->jenis_kelamin     = $request->jenis_kelamin;
        $pegawai->alamat            = $request->alamat;
        $pegawai->jabatan           = $request->jabatan;
        $pegawai->gaji_pokok        = $request->gaji_pokok;
        $pegawai->tanggal_masuk     = $request->tanggal_masuk;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pegawai->foto && Storage::exists('public/assets/admin/' . $pegawai->foto)) {
                Storage::delete('public/assets/admin/' . $pegawai->foto);
            }
            // Simpan foto baru ke folder public/assets/admin
            $path = $request->file('foto')->store('assets/admin', 'public');
            // Simpan nama file foto ke database
            $pegawai->foto = basename($path); // hanya menyimpan nama file
        }
        $pegawai->save();
        return redirect()->route('profile');
    }
}
