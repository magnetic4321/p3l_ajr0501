@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Jadwal Pegawai</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-3" role="alert">
    {{ session('success') }}
</div>
@endif

<a href="/dashboard/jadwals/create" class="btn btn-primary">Tambah Jadwal Baru</a>

<div class="table-responsive col-lg-2 py-2">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Hari</th>
            <th scope="col">Shift</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($jadwals as $jadwal)
            <tr>
                <td>
                    <a href="/dashboard/jadwals/{{ $jadwal->id }}" class="badge bg-primary mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                </td>
                <td>{{ $jadwal->hari }}</td>
                <td>{{ $jadwal->shift }}</td>
                <td>
                    <a href="/dashboard/jadwals/{{ $jadwal->id }}/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

