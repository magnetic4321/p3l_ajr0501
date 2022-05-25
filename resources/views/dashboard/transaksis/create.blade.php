@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Transaksi</h1>
    </div>

    <div class="col-lg-8 pb-5">
        <form method="post" action="/dashboard/transaksis" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="mobil_id" class="form-label">Mobil Sewaan</label>
                <select class="form-select" name="mobil_id" id="mobil_id">
                    @foreach ($mobils as $mobil)
                        @if ($mobil->status == '1')
                            <option value="{{ $mobil->id }}">{{ $mobil->nama }} - Rp @convert($mobil->tarif)</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="promo_id" class="form-label">Promo</label>
                <select class="form-select" name="promo_id" id="promo_id">
                    <option value="0">-</option>
                    @foreach ($promos as $promo)
                        <option value="{{ $promo->id }}">{{ $promo->kode }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="driver_id" class="form-label">Driver</label>
                <select class="form-select" name="driver_id" id="driver_id" onchange="showTarifDriver()">
                    @if (auth()->user()->customer->no_sim != NULL)
                        <option value="0">-</option>
                    @endif
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->user->nama }} - Rp @convert($driver->tarif)</option>
                        @endforeach
                </select>
            </div>

            <div class="md-form md-outline input-with-post-icon datepicker form-label mb-3">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="datetime-local" name="tanggal_mulai" id="tanggal_mulai" placeholder="Select date" class="form-control @error('tanggal_mulai') is-invalid @enderror" required value="{{ old('tanggal_mulai') }}">
                @error('tanggal_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="md-form md-outline input-with-post-icon datepicker form-label mb-3">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" placeholder="Select date" class="form-control @error('tanggal_selesai') is-invalid @enderror" required value="{{ old('tanggal_selesai') }}">
                @error('tanggal_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <input type="text" class="form-control @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran" placeholder="Metode Pembayaran" name="metode_pembayaran" required autofocus value="{{ old('metode_pembayaran') }}">
                @error('metode_pembayaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

@endsection