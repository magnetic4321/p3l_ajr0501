{{-- @dd($customers) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($roles as $role)

    <article class="mb-5">
        <h3>
            <a href="/roles/{{ $role->id }}">{{ $role->jabatan }}</a>
        </h3>
        {{-- <h6>{{ $role->jabatan }}</h6> --}}
    </article>

    @endforeach

@endsection