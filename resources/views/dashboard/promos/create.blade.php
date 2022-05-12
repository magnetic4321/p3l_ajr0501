@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kode Promo</h1>
    </div>

    <div class="col-lg-8 pb-5">
        <form method="post" action="/dashboard/promos">
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Promo</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="XYZC" name="kode" required autofocus value="{{ old('kode') }}">
                @error('kode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan Promo</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Promo ini berlaku untuk pembayaran menggunakan ..." name="keterangan" required autofocus value="{{ old('keterangan') }}">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="diskon" class="form-label">Jumlah Diskon</label>
                <input type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="20" name="diskon" required autofocus value="{{ old('diskon') }}">
                @error('diskon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection