{{-- @dd($pegawai) --}}

@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>
    <h3>{{ $pegawai->nama }}</h3>
    <p>Jabatan : <a href="/roles/{{ $pegawai->role->id }}">{{ $pegawai->role->jabatan }}</a></p>
    <p>Alamat : {{ $pegawai->alamat }}</p>

@endsection