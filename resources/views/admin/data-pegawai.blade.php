@extends('layouts.app')
@section('title','Data Pegawai')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Gaji</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @forelse ( $pegawai as $p )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->user->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                <td>{{ $p->jenis_kelamin }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td>{{ $p->gaji }}</td>
                                <td style="width: 150px">
                                    <a class="btn btn-sm btn-primary mr-1" href="#"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-sm btn-success mr-1" href="#"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger mr-1" href="#"><i class="fas fa-trash" ></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" style="text-align: center">Data masih kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
