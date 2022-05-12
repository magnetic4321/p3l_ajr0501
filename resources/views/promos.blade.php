{{-- @dd($customers) --}}

@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($promos as $promo)

    <article class="mb-5">
        <h3><a href="/promos/{{ $promo->kode }}">{{ $promo->jenis }} - [{{ $promo->kode }}]</a></h3>
        <h6>{{ $promo->keterangan }}</h6>
    </article>

    @endforeach

@endsection