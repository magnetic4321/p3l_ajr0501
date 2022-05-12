{{-- @dd($drivers) --}}

@extends('layouts.main')

@section('container')
    
    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($drivers as $driver)

    <article class="mb-5">
        <h3><a href="/drivers/{{ $driver->slug }}">{{ $driver->nama }}</a></h3>
    </article>

    @endforeach

@endsection