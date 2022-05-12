{{-- @dd($mitra) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>
    <h6>{{ $mitra->alamat }}</h6>
    <h6>{{ $mitra->no_telp }}</h6>
    <p>{{ $mitra->no_ktp }}</p>

    @foreach ($mitra->mobils as $mobil)

        <article class="mb-5">
            <h3><a href="/mobils/{{ $mobil->no_plat }}">{{ $mobil->nama }}</a></h3>
            <h6>Nomor Plat: {{ $mobil->no_plat }}</h6>
        </article>

    @endforeach

@endsection