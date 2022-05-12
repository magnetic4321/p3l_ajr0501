{{-- @dd($detail_jadwal) --}}
{{-- @dd($jadwal->detailJadwals) --}}

@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Data Jadwal Hari {{ $title }}-{{ $jadwal->shift }}</h1>

    @foreach ($jadwal->detailJadwals as $detailJadwal)

        <h3>Nama Pegawai: {{ $detailJadwal->pegawai->nama }}</h3>
        <h3>Pegawai ID: {{ $detailJadwal->pegawai_id }}</h3>
        <h3>Shift ke-{{ $detailJadwal->jadwal->shift }}</h3>
        
    @endforeach

@endsection