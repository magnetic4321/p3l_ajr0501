@extends('dashboard.layouts.main')

@section('container')

    <div class="row mb-3">
        <div class="">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $mitra->nama }}</h1>
            </div>
            <a href="/dashboard/mitras" class="btn btn-info"><span data-feather="arrow-left"></span> Back</a>
            <a href="/dashboard/mitras/{{ $mitra->slug }}/edit" class="btn btn-success"><span data-feather="edit"></span> Edit</a>
            <a href="" class="btn btn-danger"><span data-feather="trash-2"></span> Delete</a>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-1">
            <h6>Alamat: </h6>
            <h6>Telepon: </h6>
            <h6>Nomor NIK: </h6>
        </div>
        <div class="col">
            <h6>{{ $mitra->alamat }}</h6>
            <h6>{{ $mitra->no_telp }}</h6>
            <h6>{{ $mitra->no_ktp }}</h6>
        </div>
    </div>

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mobil</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Plat</th>
                    <th scope="col">Kontrak Selesai</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($mitra->mobils as $mobil)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mobil->nama }}</td>
                        <td>{{ $mobil->tipe }}</td>
                        <td>{{ $mobil->no_plat }}</td>
                        <td>{{ $mobil->kontrak_selesai }}</td>
                        @if ($mobil->status == '1')
                            <td>Tersedia</td>
                        @else
                            <td>Tidak Tersedia</td>
                        @endif
                        <td>
                            <a href="/dashboard/mobils/{{ $mobil->no_plat }}" class="badge bg-info mx-1"><span data-feather="eye"></span></a>
                            <a href="" class="badge bg-success"><span data-feather="edit-2"></span></a>
                            <a href="" class="badge bg-danger mx-1"><span data-feather="trash-2"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection

