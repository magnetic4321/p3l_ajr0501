@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pegawai</h1>
    </div>

<div class="table-responsive col-lg-6 py-2">
    <table class="table table-striped table-sm">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pegawais as $pegawai)
                <tr>
                    <td>
                        <a href="/dashboard/pegawais/{{ $pegawai->slug }}" class="badge bg-primary mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                    </td>
                    <td>{{ $pegawai->user->nama }}</td>
                    <td>{{ $pegawai->role->jabatan }}</td>
                    <td>{{ $pegawai->user->email }}</td>
                    <td>
                        <a href="/dashboard/pegawais/{{ $pegawai->slug }}/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

