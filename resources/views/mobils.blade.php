{{-- @dd($mobils) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($mobils as $mobil)

    <article class="mb-5">
        <h3><a href="/mobils/{{ $mobil->no_plat }}">{{ $mobil->nama }}</a></h3>
        <h6>Nama Mitra: <a href="/mitras/{{ $mobil->mitra->slug }}">{{ $mobil->mitra->nama }}</a></h6>
        <h6>Nomor Plat: {{ $mobil->no_plat }}</h6>
    </article>

    @endforeach

@endsection