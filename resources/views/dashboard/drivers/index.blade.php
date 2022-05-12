@extends('dashboard.layouts.main')

@section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Driver</h1>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success col-lg-9" role="alert">
      {{ session('success') }}
    </div>
  @endif

  {{-- <div class="row mt-3">
    <div class="col-md-6">
        <form action="/dashboard/drivers">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
  </div> --}}

  <div class="table-responsive col-lg-9">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Driver</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Alamat</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Berbahasa Inggris</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach($drivers as $driver)
            <tr>
              <td>
                <a href="/dashboard/drivers/{{ $driver->slug }}" class="badge bg-primary mx-1 text-decoration-none">{{ $loop->iteration }}</a>
              </td>
                <td>{{ $driver->user->nama }}</td>
              <td>{{ $driver->user->jenis_kelamin }}</td>
              <td>{{ $driver->user->alamat }}</td>
              <td>{{ $driver->user->no_telp }}</td>
              <td>
                @if($driver->bahasa == '1')
                  Mampu
                @else
                  Tidak Mampu
                @endif
              </td>
              <td>
                <a href="#" class="badge bg-dark text-light text-decoration-none">
                  @if($driver->status_ketersediaan == '1')
                    Tersedia
                  @else
                    Tidak Tersedia
                  @endif
                </a>
              </td>
              <td>
                <a href="" class="badge bg-danger mx-1"><span data-feather="trash-2"></span></a>
            </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>

@endsection

