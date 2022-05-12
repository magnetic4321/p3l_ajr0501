@extends('dashboard.layouts.main')

@section('container')

    <div class="row mb-4">
        <div class="">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $mobil->nama }}</h1>
            </div>
            <h6>Kepemilikan: <a href="/dashboard/mitras/{{ $mobil->mitra->slug }}">{{ $mobil->mitra->nama }}</a> </h6>
            <a href="/dashboard/mobils" class="btn btn-info"><span data-feather="arrow-left"></span> Back</a>
            <a href="" class="btn btn-success"><span data-feather="edit"></span> Edit</a>
            <a href="" class="btn btn-danger"><span data-feather="trash-2"></span> Delete</a>
        </div>
    </div>

    <div class="table-responsive col-lg-5">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Plat</td>
                    <td>{{ $mobil->no_plat }}</td>
                </tr>
                <tr>
                    <td>Tipe</td>
                    <td>{{ $mobil->tipe }}</td>
                </tr>
                <tr>
                    <td>Fasilitas</td>
                    <td>{{ $mobil->fasilitas }}</td>
                </tr>
                <tr>
                    <td>STNK</td>
                    <td>{{ $mobil->no_stnk }}</td>
                </tr>
                <tr>
                    <td>Warna</td>
                    <td>{{ $mobil->warna }}</td>
                </tr>
                <tr>
                    <td>Kapasitas Penumpang</td>
                    <td>{{ $mobil->kapasitas }}</td>
                </tr>
                <tr>
                    <td>Volume Bagasi</td>
                    <td>{{ $mobil->volume_bagasi }}</td>
                </tr>
                <tr>
                    <td>Bahan Bakar</td>
                    <td>{{ $mobil->bahan_bakar }}</td>
                </tr>
                <tr>
                    <td>Tanggal Servis Terakhir</td>
                    <td>{{ $mobil->tanggal_servis }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    @if($mobil->status == '1')
                        <td>Tersedia</td>
                    @else
                        <td>Tidak Tersedia</td>
                    @endif
                </tr>
                <tr>
                    <td>Kontrak Selesai</td>
                    <td>{{ $mobil->kontrak_selesai }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

