@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Mobil</h1>
    </div>

    <div class="col-lg-5 pb-5">
        <form method="post" action="/dashboard/mobils/{{ $mobil->no_plat }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama mobil" name="nama" required autofocus value="{{ old('nama', $mobil->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Mobil</label>
                <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe" placeholder="Tipe mobil" name="tipe" required autofocus value="{{ old('tipe', $mobil->tipe) }}">
                @error('tipe')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mitra" class="form-label">Pemilik Mobil</label>
                <select class="form-select" name="mitra_id" id="mitra_id">
                    @foreach ($mitras as $mitra)
                        @if(old('mitra_id', $mobil->mitra_id) == $mitra->id)
                            <option value="{{ $mitra->id }}" selected>{{ $mitra->nama }}</option>
                        @else
                            <option value="{{ $mitra->id }}">{{ $mitra->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="no_plat" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control @error('no_plat') is-invalid @enderror" id="no_plat"  placeholder="AB-0000-CC" name="no_plat" required autofocus value="{{ old('no_plat', $mobil->no_plat) }}">
                @error('no_plat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_stnk" class="form-label">Nomor STNK</label>
                <input type="text" class="form-control @error('no_stnk') is-invalid @enderror" id="no_stnk"  placeholder="1234567890" name="no_stnk" required autofocus value="{{ old('no_stnk', $mobil->no_stnk) }}">
                @error('no_stnk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas Mobil</label>
                <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas"  placeholder="AC, Radio, Media player, Safety measure, Airbag, dll" name="fasilitas" required autofocus value="{{ old('fasilitas', $mobil->fasilitas) }}">
                @error('fasilitas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="warna" class="form-label">Warna</label>
                <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna"  placeholder="Biru, Merah, Kuning, dll" name="warna" required autofocus value="{{ old('warna', $mobil->warna) }}">
                @error('warna')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas Penumpang</label>
                <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas"  placeholder="4-8" name="kapasitas" required autofocus value="{{ old('kapasitas', $mobil->kapasitas) }}">
                @error('kapasitas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="volume_bagasi" class="form-label">Volume Bagasi</label>
                <input type="text" class="form-control @error('volume_bagasi') is-invalid @enderror" id="volume_bagasi"  placeholder="1-8" name="volume_bagasi" required autofocus value="{{ old('volume_bagasi', $mobil->volume_bagasi) }}">
                @error('volume_bagasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bahan_bakar" class="form-label">Bahan Bakar</label>
                <input type="text" class="form-control @error('bahan_bakar') is-invalid @enderror" id="bahan_bakar"  placeholder="Bensin, Pertamax, Pertalite, dll" name="bahan_bakar" required autofocus value="{{ old('bahan_bakar', $mobil->bahan_bakar) }}">
                @error('bahan_bakar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kontrak_selesai" class="form-label">Tanggal Akhir Kontrak</label>
                <input type="date" class="form-control @error('kontrak_selesai') is-invalid @enderror" id="kontrak_selesai" placeholder="Tanggal Akhir Kontrak" name="kontrak_selesai" required autofocus value="{{ old('kontrak_selesai', $mobil->kontrak_selesai) }}">
                @error('kontrak_selesai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>

@endsection