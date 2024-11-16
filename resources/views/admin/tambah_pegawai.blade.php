@extends('layouts.app')
@section('title','Tambah Data Pegawai')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="name" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="number" name="no_hp" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">Silahkan Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="3" required></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label>divisi</label>
                    <select name="divisi_id" class="form-control">
                        <option value="" disabled selected>Pilih divisi</option>
                        @foreach($divisi as $d)
                          <option value="{{ $d->id }}">{{ $d->nama_divisi }}</option>
                      @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label for="no_hp">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" value="" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="role_id" class="form-control">
                        <option value="" disabled selected>Pilih Peran</option>
                        @foreach($roles as $r)
                          <option value="{{ $r->id }}">{{ $r->nama_role }}</option>
                      @endforeach
                      </select>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Status</label>
                    <select name="status" class="form-control">
                        <option value="">Silahkan Pilih</option>
                        <option value="aktif">Aktif</option>
                        <option value="non-aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label for="username">Password</label>
                    <input type="password" name="password" class="form-control" value="" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>
@endsection
