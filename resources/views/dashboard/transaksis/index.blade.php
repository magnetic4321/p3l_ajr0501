@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Transaksi</h1>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="/dashboard/transaksis/rating" class="btn btn-success btn-sm">Rating Rental ~ ★ {{ $transaksis->avg('rating_rental') }} </a>

    @can('customer')
        <a href="/dashboard/transaksis/create" class="btn btn-primary btn-sm">Pesan Transaksi!</a>
    @endcan

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="/dashboard/transaksis">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@if(auth()->user()->role == '3')
    <div class="table-responsive col-lg-12 py-2">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Nota</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Mobil Sewaan</th>
                    <th scope="col">Promo</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>
                            @if ($transaksi->bukti_pembayaran == NULL)
                                <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-danger mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                            @elseif ($transaksi->bukti_pembayaran != NULL && $transaksi->status == '0')
                                <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-warning mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                            @elseif ($transaksi->rating_driver == NULL)
                                <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-info mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                            @else
                                <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-success mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                            @endif
                        </td>
                        <td>TRN{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('y') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('m') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('d') }}@if ($transaksi->driver_id)01 
                            @elseif($transaksi->driver_id == '0')00 
                            @endif
                            - 0{{ $transaksi->id }}
                        </td>
                        <td>{{ $transaksi->customer->user->nama }}</td>
                        <td>{{ $transaksi->mobil->nama }}</td>
                        <td>
                            @if ($transaksi->promo_id == '0')
                                -
                            @else
                                {{ $transaksi->promo->kode }}
                            @endif
                        </td>
                        <td>
                            @if ($transaksi->driver_id == '0')
                                -
                            @else
                                {{ $transaksi->driver->user->nama }}
                            @endif
                        </td>
                        <td>{{ $transaksi->tanggal_mulai }}</td>
                        <td>{{ $transaksi->tanggal_selesai }}</td>
                        <td>{{ $transaksi->metode_pembayaran }}</td>
                        <td>
                            <a href="" class="badge bg-success"><span data-feather="edit-2"></span></a>
                            <a href="" class="badge bg-danger mx-1"><span data-feather="trash-2"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@elseif(auth()->user()->role == '2')
    <div class="table-responsive col-lg-10 py-2">
        <table class="table table-striped table-sm align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Nota</th>
                    <th scope="col">Mobil Sewaan</th>
                    <th scope="col">Promo</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Status</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Rating</th>
                </tr>
            </thead>

            <tbody>
                @foreach(auth()->user()->customer->transaksis->reverse() as $transaksi)
                    <tr>
                        <td>
                            @if ($transaksi->bukti_pembayaran == NULL)
                                <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-danger mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                            @elseif ($transaksi->bukti_pembayaran != NULL && $transaksi->status == '0')
                                <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-warning mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                            @elseif ($transaksi->rating_driver == NULL)
                                <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-info mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                            @else
                                <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-success mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                            @endif
                        </td>
                        <td>TRN{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('y') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('m') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->format('d') }}@if ($transaksi->driver_id)01 
                            @elseif($transaksi->driver_id == '0')00 
                            @endif
                            - 0{{ $transaksi->id }}
                        </td>
                        <td>{{ $transaksi->mobil->nama }}</td>
                        <td>
                            @if ($transaksi->promo_id == '0')
                                -
                            @else
                                {{ $transaksi->promo->kode }}
                            @endif
                        </td>
                        <td>
                            @if ($transaksi->driver_id == '0')
                                -
                            @else
                                {{ $transaksi->driver->user->nama }}
                            @endif
                        </td>
                        <td>{{ $transaksi->tanggal_mulai }}</td>
                        <td>{{ $transaksi->tanggal_selesai }}</td>
                        <td>
                            @if ($transaksi->rating_rental)
                                Selesai
                            @elseif ($transaksi->bukti_pembayaran)
                                Belum Selesai
                            @else 
                                Belum Membayar
                            @endif
                        </td>
                        <td>
                            @if ($transaksi->status == '1')
                                Terverifikasi
                            @elseif ($transaksi->bukti_pembayaran)
                                Belum Terverifikasi
                            @else 
                                Belum Membayar
                            @endif
                        </td>
                        <td>
                            <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-success"><span data-feather="edit-2"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="table-responsive col-lg-7 py-2">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mobil Rental</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach(auth()->user()->driver->transaksis as $transaksi)
                    <tr>
                        <td>
                            <a href="/dashboard/transaksis/{{ $transaksi->id }}" class="badge bg-primary mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                        </td>
                        <td>{{ $transaksi->mobil->nama }}</td>
                        <td>{{ $transaksi->tanggal_mulai }}</td>
                        <td>{{ $transaksi->tanggal_selesai }}</td>
                        <td>{{ $transaksi->rating_driver }}</td>
                        <td>
                            @if ($transaksi->status == '1')
                                Selesai
                            @elseif ($transaksi->status == '2')
                                Belum Terverifikasi
                            @else 
                                Belum Membayar
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection


