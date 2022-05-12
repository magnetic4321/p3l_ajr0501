
@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($role->pegawais as $pegawai)

    <article class="mb-5">
        <h3><a href="/pegawais/{{ $pegawai->slug }}">{{ $pegawai->nama }}</a></h3>
        {{-- <h6>Nomor Plat: {{ $mobil->no_plat }}</h6> --}}
    </article>

    @endforeach

@endsection