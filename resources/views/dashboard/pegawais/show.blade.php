@extends('dashboard.layouts.main')

@section('container')

    <div class="row mb-3">
        <div class="">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $pegawai->user->nama }}</h1>
            </div>
            <a href="/dashboard/mobils" class="btn btn-info"><span data-feather="arrow-left"></span> Back</a>
            <a href="" class="btn btn-success"><span data-feather="edit"></span> Edit</a>
            <a href="" class="btn btn-danger"><span data-feather="trash-2"></span> Delete</a>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-1">
            <h6>Jenis Kelamin</h6>
            <h6>Alamat</h6>
            <h6>Tanggal Lahir</h6>
            <h6>Email</h6>
        </div>
        <div class="col">
            <h6>: {{ $pegawai->user->jenis_kelamin }}</h6>
            <h6>: {{ $pegawai->user->alamat }}</h6>
            <h6>: {{ $pegawai->user->tanggal_lahir }}</h6>
            <h6>: {{ $pegawai->user->email }}</h6>
        </div>
    </div>

@endsection

