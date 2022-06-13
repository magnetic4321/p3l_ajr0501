@extends('dashboard.layouts.main')

@section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Aset</h1>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success col-lg-11" role="alert">
      {{ session('success') }}
    </div>
  @endif
  @can('pegawai')
    <a href="/dashboard/mobils/create" class="btn btn-primary">Tambah Aset Mobil Baru</a>
  @endcan

  <div class="row mt-3">
    <div class="col-md-6">
        <form action="/dashboard/mobils">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
  </div>

  <div class="table-responsive col-lg-11 py-2">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Mobil</th>
          <th scope="col">Plat Nomor</th>
          <th scope="col">Mitra</th>
          <th scope="col">Tipe</th>
          <th scope="col">Fasilitas</th>
          <th scope="col">Status</th>
          @can('pegawai')
            <th scope="col">Sisa Kontrak</th>
            <th scope="col">Action</th>
          @endcan
        </tr>
      </thead>
      <tbody>
          @foreach($mobils as $mobil)
          @if ($mobil->status != '2')
            <tr>
              <td>
                <a href="/dashboard/mobils/{{ $mobil->no_plat }}" class="badge bg-primary mx-1 text-decoration-none">{{ $loop->iteration }}</a>
              </td>
              <td>{{ $mobil->nama }}</td>
              <td>{{ $mobil->no_plat }}</td>
              <td>{{ $mobil->mitra->nama }}</td>
              <td>{{ $mobil->tipe }}</td>
              <td>{{ $mobil->fasilitas }}</td>
              <td>
                <a href="" class="badge bg-dark text-light text-decoration-none">
                  @if ($mobil->status == 1)
                    Tersedia
                  @else
                    Tidak Tersedia
                  @endif</a>
              </td>
              @can('pegawai')
              <td>{{ \Carbon\Carbon::parse( $mobil->kontrak_mulai )->diffInDays( $mobil->kontrak_selesai ) }} hari</td>
              <td>
                <a href="/dashboard/mobils/{{ $mobil->no_plat }}/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>
                <form action="/dashboard/mobils/{{ $mobil->no_plat }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0 mx-1" onclick="return confirm('Are you sure?')"><span data-feather="trash-2"></span></button>
                </form>
              </td>
              @endcan
            </tr>
          @endif
          @endforeach
      </tbody>
    </table>
  </div>

@endsection

