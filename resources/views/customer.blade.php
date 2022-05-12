
@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>
    <h6>Alamat: {{ $customer->alamat }}</h6>
    <h6>Email: {{ $customer->email }}</h6>
    <p>Tanggal Lahir: {{ $customer->tanggal_lahir }}</p>
    <p>Jenis Kelamin: {{ $customer->jenis_kelamin }}</p>
    <p>Nomor Telepon: {{ $customer->no_telp }}</p>
    <p>Nomor SIM: {{ $customer->no_sim }}</p>
    <p>Nomor NIK: {{ $customer->no_ktp }}</p>
@endsection