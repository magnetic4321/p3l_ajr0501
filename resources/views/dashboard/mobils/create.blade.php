@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Mobil</h1>
    </div>

    <div class="col-lg-8 pb-5">
        <form method="post" action="/dashboard/mobils">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mobil</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama mobil" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Mobil</label>
                <input type="text" class="form-control" id="tipe" placeholder="Tipe mobil" name="tipe" required>
            </div>
            <div class="mb-3">
                <label for="mitra" class="form-label">Pemilik Mobil</label>
                <select class="form-select" name="mitra_id" id="mitra_id" required>
                    @foreach ($mitras as $mitra)
                        <option value="{{ $mitra->id }}">{{ $mitra->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="no_plat" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control" id="no_plat"  placeholder="AB-0000-CC" name="no_plat" required>
            </div>
            <div class="mb-3">
                <label for="no_stnk" class="form-label">Nomor STNK</label>
                <input type="text" class="form-control" id="no_stnk"  placeholder="1234567890" name="no_stnk" required>
            </div>
            <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas Mobil</label>
                <input type="text" class="form-control" id="fasilitas"  placeholder="AC, Radio, Media player, Safety measure, Airbag, dll" name="fasilitas" required>
            </div>
            <div class="mb-3">
                <label for="warna" class="form-label">Warna</label>
                <input type="text" class="form-control" id="warna"  placeholder="Biru, Merah, Kuning, dll" name="warna" required>
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas Penumpang</label>
                <input type="text" class="form-control" id="kapasitas"  placeholder="4-8" name="kapasitas" required>
            </div>
            <div class="mb-3">
                <label for="volume_bagasi" class="form-label">Volume Bagasi</label>
                <input type="text" class="form-control" id="volume_bagasi"  placeholder="1-8" name="volume_bagasi" required>
            </div>
            <div class="mb-3">
                <label for="bahan_bakar" class="form-label">Bahan Bakar</label>
                <input type="text" class="form-control" id="bahan_bakar"  placeholder="Bensin, Pertamax, Pertalite, dll" name="bahan_bakar" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection