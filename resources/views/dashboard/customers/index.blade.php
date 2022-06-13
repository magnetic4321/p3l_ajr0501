@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Customer</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success col-lg-9" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>
                        <a href="/dashboard/customers/{{ $customer->slug }}" class="badge bg-primary mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                    </td>
                    <td>{{ $customer->user->nama }}</td>
                    <td>{{ $customer->user->jenis_kelamin }}</td>
                    <td>{{ $customer->user->alamat }}</td>
                    <td>{{ $customer->user->no_telp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

