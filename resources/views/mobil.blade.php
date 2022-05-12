
@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>
    <h6>Nama Mitra: <a href="/mitras/{{ $mobil->mitra->slug }}">{{ $mobil->mitra->nama }}</a></h6>
    <h6>Nomor Plat:{{ $mobil->no_plat }}</h6>
    <h6>Tipe {{ $mobil->tipe }}</h6>
    <p>{{ $mobil->fasilitas }}</p>
@endsection