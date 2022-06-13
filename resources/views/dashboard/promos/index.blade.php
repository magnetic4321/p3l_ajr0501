@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Promo</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
  </div>
@endif

@can('pegawai')
  <a href="/dashboard/promos/create" class="btn btn-primary">Tambah Promo Baru</a>
@endcan

<div class="row mt-3">
  <div class="col-md-6">
      <form action="/dashboard/promos">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
              <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit">Search</button>
              </div>
          </div>
      </form>
  </div>
</div>

<div class="table-responsive col-lg-6 py-2">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Status</th>
          <th scope="col">Diskon</th>
          @can('pegawai')
            <th scope="col">Action</th>
          @endcan
        </tr>
      </thead>
      <tbody>
          @foreach($promos as $promo)
            @if ($promo->status != '2')
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $promo->kode }}</td>
                <td>{{ $promo->keterangan }}</td>
                {{-- <form method="post" action="/dashboard/promos">
                  @method('put')
                  @csrf --}}
                  <td>
                    <a href="" class="badge bg-dark text-light text-decoration-none">
                    @if ($promo->status == '1')
                      Aktif
                    @else
                      Tidak Aktif
                    @endif
                  </td>
                {{-- </form> --}}
                <td>{{ $promo->diskon }} %</td>
                @can('pegawai')
                  <td>
                    <a href="/dashboard/promos/{{ $promo->kode }}/edit" class="badge bg-success"><span data-feather="edit-2"></span></a>
                    <form action="/dashboard/promos/{{ $promo->kode }}" method="post" class="d-inline">
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

