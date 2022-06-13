@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data User Terdaftar</h1>
    </div>

<div class="table-responsive col-lg-6 py-2">
    <table class="table table-striped table-sm">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama User</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>
                        @if($user->role == '1')
                            Driver
                        @elseif($user->role == '2')
                            Customer
                        @else
                            {{ $user->pegawai->role->jabatan }}
                        @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->status == '1')
                            Aktif
                        @else
                            Tidak Aktif
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

