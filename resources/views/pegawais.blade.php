{{-- @dd($customers) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($pegawais as $pegawai)

    <article class="mb-5">
        <h3><a href="/pegawais/{{ $pegawai->slug }}">{{ $pegawai->nama }}</a></h3>
        <h6>Jabatan: <a href="/roles/{{ $pegawai->role->id }}">{{ $pegawai->role->jabatan }}</a></h6>
        {{-- <h6>Nomor Plat: {{ $mobil->no_plat }}</h6> --}}
    </article>

    @endforeach

@endsection