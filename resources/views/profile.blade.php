@extends('layouts.app')
@section('title','Profile')
@section('content')
<style>
    .profile-card {
    width: 50%;
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
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 4px solid #4a76a8;
}

.profile-details {
    padding: 20px;
}

.profile-details h3 {
    font-size: 1.3em;
    color: #333333;
}

.profile-details p {
    font-size: 0.9em;
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
    padding-bottom: 20px;
}
</style>
<div class="profile-card">
    <div class="profile-image">
        <img src="{{ asset('images/profile.png') }}" alt="Profile Picture">
    </div>
    <div class="profile-details">
        @foreach ($pegawai as $p)
        <h3>{{ $p->user->name }}</h3>
        <p><strong>Tanggal lahir :</strong> {{ \Carbon\Carbon::parse($p->tanggal_lahir)->translatedFormat('d F Y') }}</p>
        <p><strong>No HP:</strong> {{ $p->no_hp }}</p>
        <p><strong>Jabatan:</strong> {{ $p->jabatan }}</p>
        <p><strong>Gaji Pokok</strong> {{ $p->gaji_pokok }}</p>
    </div>
    <div class="profile-buttons">
        <a class="btn btn-sm btn-success mr-1" href="#"><i class="fas fa-edit"></i></a>
    </div>
        @endforeach
@endsection
