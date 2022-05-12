@extends('dashboard.layouts.main')

@section('container')

    <div class="row mb-3">
        <div class="">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Nota Transaksi Sewa Mobil | TRN{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('y') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('m') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('d') }}@if ($transaksi->driver_id)01 
                    @elseif($transaksi->driver_id == '0')00 
                    @endif
                    - 0{{ $transaksi->id }}</h1>
            </div>
            <a href="/dashboard/transaksis" class="btn btn-info"><span data-feather="arrow-left"></span> Back</a>
            @if ($transaksi->bukti_pembayaran == NULL)
                <button type="submit" class="btn btn-danger" disabled>Belum Membayar</button>
            @elseif ($transaksi->bukti_pembayaran != NULL && $transaksi->status == '0')
                <button type="submit" class="btn btn-warning" disabled>Pembayaran Belum Diverifikasi</button>
            @elseif ($transaksi->rating_driver == NULL)
                <button type="submit" class="btn btn-info" disabled>Beri Penilaian Driver dan Rental</button>
            @else
                <button type="submit" class="btn btn-success" disabled>Transaksi Selesai</button>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-2">
            <h6>Cust</h6>
            <h6>CS</h6>
            <h6>DRV</h6>
            <h6>PRO</h6>
        </div>
        <div class="col">
            <h6>: {{ $transaksi->customer->user->nama }}</h6>
            @if ($transaksi->pegawai_id == '0' && $transaksi->bukti_pembayaran != NULL)
                <h6 class="text-warning">: Belum diverifikasi oleh CS</h6>
            @elseif ($transaksi->pegawai_id != '0')
                <h6>: {{ $transaksi->pegawai->user->nama }}</h6>
            @else
                <h6 class="text-danger">: Belum Membayar</h6>
            @endif
            @if ($transaksi->driver_id == '0')
                <h6>: -</h6>
            @else
                <h6>: {{ $transaksi->driver->user->nama }}</h6>
            @endif
            @if ($transaksi->promo_id == '0')
                <h6>: -</h6>
            @else
                <h6>: {{ $transaksi->promo->kode }}</h6>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-2">
            <h6>Tgl Mulai</h6>
            <h6>Tgl Selesai</h6>
        </div>
        <div class="col">
            <h6>: {{ $transaksi->tanggal_mulai }}</h6>
            <h6>: {{ $transaksi->tanggal_selesai }}</h6>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-2">
            <h6>Mobil</h6>
        </div>
        <div class="col">
            <h6>: {{ $transaksi->mobil->nama }}</h6>
        </div>
    </div>

    <form method="post" action="/dashboard/transaksis/{{ $transaksi->id }}/updateStatus">
        @csrf
        @can('pegawai')
            @if($transaksi->status == '0' && $transaksi->bukti_pembayaran != NULL)
                <div class="mb-3 col-md-2">
                    <label for="status" class="form-label">Status Pembayaran</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required value="{{ old('status') }}">
                        <option value="0">Belum Terverifikasi</option>
                        <option value="1">Terverifikasi</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Status</button>
            @elseif($transaksi->status == '1')
                <button type="submit" class="btn btn-success" disabled>Sudah Terverifikasi</button>

            @endif
        @endcan
    </form>

    @if($transaksi->bukti_pembayaran == NULL)
        <form method="post" action="/dashboard/transaksis/{{ $transaksi->id }}/updateBukti" enctype="multipart/form-data" class="mb-3">
            @csrf
            @can('customer')
                <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control form-control-sm @error('bukti_pembayaran') is-invalid @enderror" type="file" id="bukti_pembayaran" name="bukti_pembayaran">
                            @error('bukti_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn text-light btn-sm bg-primary border-0">Upload</button>
                        </div>
                </div>
            @endcan
        </form>
    @endif


    <form method="post" action="/dashboard/transaksis/{{ $transaksi->id }}/updateRating">
        @csrf
        @can('customer')
            @if($transaksi->penilaian_rental == NULL && $transaksi->status == '1' && $transaksi->pegawai_id != '0')
                <div class="col-md-1">
                    <label for="rating_driver" class="form-label">Penilaian Driver</label>
                    <select name="rating_driver" id="rating_driver" class="form-select @error('rating_driver') is-invalid @enderror" required value="{{ old('rating_driver') }}">
                        <option value="1">1 ★</option>
                        <option value="2">2 ★</option>
                        <option value="3">3 ★</option>
                        <option value="4">4 ★</option>
                        <option value="5">5 ★</option>
                    </select>
                    @error('rating_driver')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-md-3">
                    <label for="penilaian_driver" class="form-label"></label>
                    <input type="text" class="form-control @error('penilaian_driver') is-invalid @enderror" id="penilaian_driver" placeholder="Driver ramah, pemilihan rute nyaman, dst" name="penilaian_driver" required autofocus value="{{ old('penilaian_driver') }}">
                    @error('penilaian_driver')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-1">
                    <label for="rating_rental" class="form-label">Penilaian Rental</label>
                    <select name="rating_rental" id="rating_rental" class="form-select @error('rating_rental') is-invalid @enderror" required value="{{ old('rating_rental') }}">
                        <option value="1">1 ★</option>
                        <option value="2">2 ★</option>
                        <option value="3">3 ★</option>
                        <option value="4">4 ★</option>
                        <option value="5">5 ★</option>
                    </select>
                    @error('rating_rental')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-md-3">
                    <label for="penilaian_rental" class="form-label"></label>
                    <input type="text" class="form-control @error('penilaian_rental') is-invalid @enderror" id="penilaian_rental" placeholder="Pelayanan AJR cepat, pelayanan hebat, dst" name="penilaian_rental" required autofocus value="{{ old('penilaian_rental') }}">
                    @error('penilaian_rental')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Beri Rating</button>
            @elseif($transaksi->penilaian_rental != NULL && $transaksi->bukti_pembayaran != NULL)
                <div class="row mb-5 border-bottom">
                    <div class="col-md-2 mt-3">
                        <h6>Rating Driver</h6>
                        <h6>Penilaian Driver</h6>
                        <h6>Rating Rental</h6>
                        <h6>Penilaian Rental</h6>
                    </div>
                    <div class="col mt-3">
                        <h6>: {{ $transaksi->rating_driver }}</h6>
                        <h6>: {{ $transaksi->penilaian_driver }}</h6>
                        <h6>: {{ $transaksi->rating_rental }}</h6>
                        <h6>: {{ $transaksi->penilaian_rental }}</h6>
                    </div>
                </div>
            @endif
        @endcan
    </form>

@endsection

