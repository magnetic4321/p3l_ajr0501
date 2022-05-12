@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Penilaian Transaksi</h1>
    </div>

    <a href="/dashboard/transaksis" class="btn btn-info btn-sm"><span data-feather="arrow-left"></span> Back</a>
    <a href="/dashboard/transaksis/rating" class="btn btn-success btn-sm">Rating Rental ~ ★ {{ $transaksis->avg('rating_rental') }} </a>
    
    <div class="col-lg-9">
        <div class="row mt-4">
            @foreach ($transaksis as $transaksi)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $transaksi->customer->user->nama }} ★{{ $transaksi->rating_rental }}</h5>
                            <a href="/dashboard/transaksi/{{ $transaksi->id }}" class="text-decoration-none"><p class="card-text">{{ $transaksi->penilaian_rental }}</p></a>
                            <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse( $transaksi->tanggal_selesai )->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
