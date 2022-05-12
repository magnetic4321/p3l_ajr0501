{{-- @dd($mitras) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($mitras as $mitra)

    <article class="mb-5">
        <h3>
            <a href="/mitras/{{ $mitra->slug }}">{{ $mitra->nama }}</a>
        </h3>
    </article>

    @endforeach

@endsection