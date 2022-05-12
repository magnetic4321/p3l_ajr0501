{{-- @dd($detail_jadwals) --}}
{{-- @dd($jadwals) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($jadwals as $jadwal)

        {{-- <h5> <a href="/jadwals/{{ $jadwal->hari }}/{{ $jadwal->shift }}">{{ $jadwal->id }}. </a> Hari: {{ $jadwal->hari }}-{{ $jadwal->shift }}</h5> --}}
        <h5><a href="/jadwals/{{$jadwal->id}}">{{ $jadwal->id }}. </a> Hari: {{ $jadwal->hari }}-{{ $jadwal->shift }}</h5>


    @endforeach

@endsection