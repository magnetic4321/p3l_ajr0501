@extends('dashboard.layouts.main')

@section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Mitra</h1>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
  @endif

  <a href="/dashboard/mitras/create" class="btn btn-primary">Tambah Mitra Baru</a>

  <div class="table-responsive col-lg-10 py-2">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Mitra</th>
          <th scope="col">Alamat</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Aset</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach($mitras as $mitra)
            @if ($mitra->status != '2')
              <tr>
                <td>
                  <a href="/dashboard/mitras/{{ $mitra->slug }}" class="badge bg-primary mx-1 text-decoration-none">{{ $loop->iteration }}</a>
                </td>
                <td>{{ $mitra->nama }}</td>
                <td>{{ $mitra->alamat }}</td>
                <td>{{ $mitra->no_telp }}</td>
                <td>{{ $mitra->mobils->count() }}</td>
                <td>
                  <a href="" class="badge bg-dark text-light text-decoration-none">
                    @if ($mitra->status == 1)
                      Aktif
                    @else
                      Tidak Aktif
                    @endif</a>
                </td>
                <td>
                    <a href="/dashboard/mitras/{{ $mitra->slug }}/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>
                    <form action="/dashboard/mitras/{{ $mitra->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0 mx-1" onclick="return confirm('Are you sure?')"><span data-feather="trash-2"></span></button>
                    </form>
                </td>
              </tr>
            @endif
          @endforeach
      </tbody>
    </table>
  </div>

@endsection

