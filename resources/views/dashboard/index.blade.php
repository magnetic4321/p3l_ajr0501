@extends('dashboard.layouts.main')

@section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->nama }}
    @can('customer')
      | CUS{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', auth()->user()->created_at)->format('y') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', auth()->user()->created_at)->format('m') }}{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', auth()->user()->created_at)->format('d') }}
      - 00{{ auth()->user()->customer->id }}
    @endcan</h1>
  </div>

  @if(session()->has('success'))
    <div class="alert alert-success col-md-10" role="alert">
      {{ session('success') }}
    </div>
  @endif

  @if (auth()->user()->role == '1')
    <div class="row mt-3">
      <div class="card text-center col-md-4 mb-3 shadow-sm" style="width: 20rem;">
        @if (auth()->user()->driver->foto)
          <img class="card-img-top mb-4 mt-3" src="{{ asset('storage/' . auth()->user()->driver->foto) }}" alt="{{ auth()->user()->nama }}">
        @else
          <img class="card-img-top mb-4 mt-3" src="img/default_toped-16.jpg" alt="Card image cap">
        @endif
        <a href="#" class="btn btn-outline-primary btn-sm">Pilih Foto</a>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

        <button type="button" class="btn btn-outline-secondary btn-block mb-3">Ubah Kata Sandi</button>
      </div>

      <div class="col-sm-6 mx-3">
        <div class="row border mb-4 py-3 shadow-sm">
          <div class="col-md-3">
            <h6>Nama</h6>
            <h6>Jenis Kelamin</h6>
            <h6>Alamat</h6>
            <h6>Tanggal Lahir</h6>
            <h6>Email</h6>
            <h6>Nomor Telepon</h6>
          </div>

          <div class="col-md-9">
            <h6>: {{ auth()->user()->nama }}</h6>
            <h6>: {{ auth()->user()->jenis_kelamin }}</h6>
            <h6>: {{ auth()->user()->alamat }}</h6>
            <h6>: {{ auth()->user()->tanggal_lahir }}</h6>
            <h6>: {{ auth()->user()->email }}</h6>
            <h6>: {{ auth()->user()->no_telp }}</h6>
          </div>
        </div>

        @if (auth()->user()->role == '1')
          <div class="row border pb-3 pt-1 shadow-sm">
            <h4 class="d-flex pb-2 mb-3 border-bottom">Data Driver</h4>
            <div class="col-md-3">
              <h6>Domain</h6>
              <h6>Nomor KTP</h6>
              <h6>Nomor SIM</h6>
              <h6>Berbahasa Inggris</h6>
              <h6>Status Ketersediaan</h6>
              <h6>Tarif</h6>
              <h6>Napza</h6>
              <h6>Surat Kejiwaan</h6>
              <h6>SKCK</h6>
            </div>

            <div class="col-md">
              <h6>: {{ auth()->user()->driver->slug }}</h6>
              <h6>: {{ auth()->user()->driver->no_ktp }}</h6>
              <h6>: {{ auth()->user()->driver->no_sim }}</h6>
              @if(auth()->user()->driver->bahasa == '0')
                <h6>: Tidak Mampu</h6>
              @else
                <h6>: Mampu</h6>
              @endif
              @if(auth()->user()->driver->status_ketersediaan == '0')
                <h6>: Tidak Tersedia</h6>
              @else
                <h6>: Tersedia</h6>
              @endif
              <h6>: Rp {{ auth()->user()->driver->tarif }}</h6>
              <h6>: <a href="/storage/{{ auth()->user()->driver->napza }}">Click here...</a></h6>
              <h6>: <a href="/storage/{{ auth()->user()->driver->skck }}">Click here...</a></h6>
              <h6>: <a href="/storage/{{ auth()->user()->driver->surat_kejiwaan }}">Click here...</a></h6>
            </div>
          </div>

          <div class="row mt-3">
            <a href="/dashboard/drivers/{{ auth()->user()->driver->slug }}/edit" class="btn btn-success btn-block btn-sm"><span data-feather="edit"></span> Edit Data</a>
          </div>
        @endif
      </div>
    </div>

  @elseif(auth()->user()->role == '2')
    <div class="row mt-3">
      <div class="card text-center col-md-4 mb-3 shadow-sm" style="width: 20rem;">
        @if (auth()->user()->customer->foto)
          <img class="card-img-top mb-4 mt-3" src="{{ asset('storage/' . auth()->user()->customer->foto) }}" alt="{{ auth()->user()->nama }}">
        @else
          <img class="card-img-top mb-4 mt-3" src="img/default_toped-16.jpg" alt="Card image cap">
        @endif
        <a href="#" class="btn btn-outline-primary btn-sm">Pilih Foto</a>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

        <button type="button" class="btn btn-outline-secondary btn-block mb-3">Ubah Kata Sandi</button>
      </div>

      <div class="col-sm-6 mx-3">
        <div class="row border mb-4 py-3 shadow-sm">
          <div class="col-md-3">
            <h6>Nama</h6>
            <h6>Jenis Kelamin</h6>
            <h6>Alamat</h6>
            <h6>Tanggal Lahir</h6>
            <h6>Email</h6>
            <h6>Nomor Telepon</h6>
          </div>

          <div class="col-md-9">
            <h6>: {{ auth()->user()->nama }}</h6>
            <h6>: {{ auth()->user()->jenis_kelamin }}</h6>
            <h6>: {{ auth()->user()->alamat }}</h6>
            <h6>: {{ auth()->user()->tanggal_lahir }}</h6>
            <h6>: {{ auth()->user()->email }}</h6>
            <h6>: {{ auth()->user()->no_telp }}</h6>
          </div>
        </div>

        {{-- Customer --}}
        @if (auth()->user()->role == '2')
          <div class="row border pb-3 pt-1 shadow-sm">
            <h4 class="d-flex pb-2 mb-3 border-bottom">Data Customer</h4>
            <div class="col-md-3">
              <h6>Domain</h6>
              <h6>Nomor KTP</h6>
              <h6>Nomor SIM</h6>
            </div>

            <div class="col-md">
              <h6>: {{ auth()->user()->customer->slug }}</h6>
              <h6>: {{ auth()->user()->customer->no_ktp }}</h6>
              <h6>: {{ auth()->user()->customer->no_sim }}</h6>
            </div>
          </div>

          <div class="row mt-3">
            <a href="/dashboard/customers/{{ auth()->user()->customer->slug }}/edit" class="btn btn-success btn-block btn-sm"><span data-feather="edit"></span> Edit Data</a>
          </div>
        @endif
      </div>
    </div>
  @else
    <div class="row mt-3">
      <div class="card text-center col-md-4 mb-3 shadow-sm" style="width: 20rem;">
        @if (auth()->user()->pegawai->foto)
          <img class="card-img-top mb-4 mt-3" src="{{ asset('storage/' . auth()->user()->pegawai->foto) }}" alt="{{ auth()->user()->nama }}">
        @else
          <img class="card-img-top mb-4 mt-3" src="img/default_toped-16.jpg" alt="Card image cap">
        @endif
        <a href="#" class="btn btn-outline-primary btn-sm">Pilih Foto</a>
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

        <button type="button" class="btn btn-outline-secondary btn-block mb-3">Ubah Kata Sandi</button>
      </div>

      <div class="col-sm-6 mx-3">
        <div class="row border mb-4 py-3 shadow-sm">
          <div class="col-md-3">
            <h6>Nama</h6>
            <h6>Jenis Kelamin</h6>
            <h6>Alamat</h6>
            <h6>Tanggal Lahir</h6>
            <h6>Email</h6>
            <h6>Nomor Telepon</h6>
          </div>

          <div class="col-md-9">
            <h6>: {{ auth()->user()->nama }}</h6>
            <h6>: {{ auth()->user()->jenis_kelamin }}</h6>
            <h6>: {{ auth()->user()->alamat }}</h6>
            <h6>: {{ auth()->user()->tanggal_lahir }}</h6>
            <h6>: {{ auth()->user()->email }}</h6>
            <h6>: {{ auth()->user()->no_telp }}</h6>
          </div>
        </div>

        {{-- Pegawai --}}
          <div class="row border pb-3 pt-1 shadow-sm">
            <h4 class="d-flex pb-2 mb-3 border-bottom">Data Pegawai</h4>
            <div class="col-md-3">
              <h6>Domain</h6>
              <h6>Jabatan</h6>
              <h6>Jadwal Kerja</h6>
            </div>

            <div class="col-md-4">
              <h6>: /{{ auth()->user()->pegawai->slug }}</h6>
              <h6>: {{ auth()->user()->pegawai->role->jabatan }}</h6>
              @foreach (auth()->user()->pegawai->detailjadwals as $detailjadwal)
                <h6>- {{ $detailjadwal->jadwal->hari }} ~ {{ $detailjadwal->jadwal->shift }}</h6>
              @endforeach
            </div>
          </div>

          <div class="row mt-3">
            <a href="/dashboard/pegawais/{{ auth()->user()->pegawai->slug }}/edit" class="btn btn-success btn-block btn-sm"><span data-feather="edit"></span> Edit Data</a>
          </div>
      </div>
    </div>
  @endif

@endsection

