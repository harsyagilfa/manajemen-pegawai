@extends('layouts.app')
@section('title','Edit Profil')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('profile.update.aksi') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Pegawai:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir) }}" required>
                </div>
                <div class="form-group">
                    <label>No HP:</label>
                    <input type="number" name="no_hp" class="form-control" value="{{ old('no_hp', $pegawai->no_hp) }}" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">Silahkan Pilih</option>
                        <option value="Laki-laki"{{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan"{{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat:</label>
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="3" required>{{ old('alamat', $pegawai->alamat) }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jabatan:</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $pegawai->jabatan) }}" readonly>
                </div>
                <div class="form-group">
                    <label for="no_hp">Gaji Pokok:</label>
                    <input type="number" name="gaji_pokok" class="form-control" value="{{ old('gaji_pokok', $pegawai->gaji_pokok) }}" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk:</label>
                    <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $pegawai->tanggal_masuk) }}" readonly>
                </div>
                <div class="form-group">
                    <label>Foto:</label>
                    <input type="file" name="foto" class="form-control">
                    @if($pegawai->foto)
                        <img src="{{ asset('storage/assets/admin/' . $pegawai->foto) }}" alt="Foto Profil" class="mt-2" width="100">
                    @else
                        <img src="{{ asset('assets/default-avatar.png') }}" alt="Foto Profil" class="mt-2" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" readonly>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>
@endsection
