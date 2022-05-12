@extends('dashboard.layouts.main')

@section('container')

    <div class="row mb-3">
        <div class="">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $driver->user->nama }}</h1>
            </div>
            <a href="/dashboard/mobils" class="btn btn-info"><span data-feather="arrow-left"></span> Back</a>
            <a href="" class="btn btn-success"><span data-feather="edit"></span> Edit</a>
            <a href="" class="btn btn-danger"><span data-feather="trash-2"></span> Delete</a>
            <a href="#" class="btn btn-success">Rating Driver ~ ★ {{ $driver->transaksis->avg('rating_driver') }} </a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-1">
            <h6>Jenis Kelamin</h6>
            <h6>Alamat</h6>
            <h6>Tanggal Lahir</h6>
            <h6>Email</h6>
        </div>
        <div class="col">
            <h6>: {{ $driver->user->jenis_kelamin }}</h6>
            <h6>: {{ $driver->user->alamat }}</h6>
            <h6>: {{ $driver->user->tanggal_lahir }}</h6>
            <h6>: {{ $driver->user->email }}</h6>
        </div>
    </div>

    <div class="table-responsive col-lg-4">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>{{ $driver->user->no_telp }}</td>
                </tr>
                <tr>
                    <td>Nomor KTP</td>
                    <td>{{ $driver->no_ktp }}</td>
                </tr>
                <tr>
                    <td>Nomor SIM</td>
                    <td>{{ $driver->no_sim }}</td>
                </tr>
                <tr>
                    <td>Status Ketersediaan</td>
                    <td>
                        @if($driver->status_ketersediaan == '1')
                            Tersedia
                        @else
                            Tidak Tersedia
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Mampu Berbahasa Inggris</td>
                    <td>
                        @if($driver->bahasa == '1')
                            Mampu
                        @else
                            Tidak Mampu
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



@endsection

