{{-- @dd($customers) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($customers as $customer)

    <article class="mb-5">
        <h3>
            <a href="/customers/{{ $customer->slug }}">{{ $customer->nama }}</a>
        </h3>
        <h6>{{ $customer->email }}</h6>
    </article>

    @endforeach

@endsection