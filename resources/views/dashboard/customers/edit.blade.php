@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profile</h1>
    </div>

    <div class="col-lg-8 pb-5">
        <form method="post" action="/dashboard/customers/{{ $customer->slug }}" enctype="multipart/form-data">
        @method('put')
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" disabled autofocus value="{{ old('email', $customer->user->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama customer" name="nama" required autofocus value="{{ old('nama', $customer->user->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Domain</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Tidak usah diisi" name="slug" required autofocus value="{{ old('slug', $customer->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small class="text-muted">Ubah apabila domain sudah terpakai</small>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Jl. Nama Jalan No. XX, Kota 56XXX" name="alamat" required autofocus value="{{ old('alamat', $customer->user->alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="08783441XXXX" name="no_telp" required autofocus value="{{ old('no_telp', $customer->user->no_telp) }}">
                @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_sim" class="form-label">Nomor SIM</label>
                <input type="text" class="form-control @error('no_sim') is-invalid @enderror" id="no_sim" placeholder="08783441XXXX" name="no_sim" autofocus value="{{ old('no_sim', $customer->no_sim) }}">
                @error('no_sim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_ktp" class="form-label">Nomor KTP</label>
                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" placeholder="08783441XXXX" name="no_ktp" autofocus value="{{ old('no_ktp', $customer->no_ktp) }}">
                @error('no_ktp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto</label>
                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        nama.addEventListener('change', function() {
            fetch('/dashboard/customers/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    </script>

@endsection