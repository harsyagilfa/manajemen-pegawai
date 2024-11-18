@extends('layouts.app')
@section('title','Detail Pegawai')
@section('content')
<style>
    .profile-card {
    width: 70%;
    border-radius: 10px;
    overflow: hidden;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: left;
}
.profile-header {
    background-color: #4a76a8;
    color: white;
    padding: 10px 0;
    font-size: 1.2em;
    font-weight: 500;
}

.profile-image {
    padding: 20px;
}

.profile-image img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 4px solid #4a76a8;
}

.profile-details {
    padding: 20px;
}

.profile-details h3 {
    font-size: 1.7rem;
    color: #333333;
    font-weight: 600;
    margin-bottom: 20px;

}

.profile-details p {
    font-size: 1.2em;
    color: #555555;
    margin-top: 5px;
}

.profile-details p strong {
    color: #333333;
}
.profile-buttons {
    display: flex;
    justify-content: left;
    margin-left: 20px;
    gap: 5px;
    padding-bottom: 30px;
}
</style>

<div class="profile-card">
    <div class="profile-image">
        <img src="{{ $pegawai->foto ? asset('storage/' . $pegawai->foto) : asset('assets/default-avatar.png') }}" alt="Profile Picture">
    </div>
    <div class="profile-details">
        <h3>{{ $user->name }}</h3>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Tanggal lahir</strong> {{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->translatedFormat('d F Y') }}</p>
                <p><strong>No HP</strong> {{ $pegawai->no_hp }}</p>
                <p><strong>Alamat</strong> {{ $pegawai->alamat }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Jabatan</strong> {{ $pegawai->jabatan }}</p>
                <p><strong>Gaji Pokok</strong> {{ 'Rp. ' . number_format($pegawai->gaji_pokok, 0, ',', '.') }}</p>
                <p><strong>Tanggal Masuk</strong> {{ \Carbon\Carbon::parse($pegawai->tanggal_masuk)->translatedFormat('d F Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
