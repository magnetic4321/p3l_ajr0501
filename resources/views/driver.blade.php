{{-- @dd($customers) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>
    <h6>{{ $driver->alamat }}</h6>
    <h6>{{ $driver->no_telp }}</h6>
    <p>{{ $driver->no_ktp }}</p>
@endsection