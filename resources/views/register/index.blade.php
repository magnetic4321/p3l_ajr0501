@extends('layouts.main')

@section('container')

  <div class="row justify-content-center">
      <div class="col-md-5">
          <main class="form-registration">
              <h1 class="h3 mb-5 fw-normal text-center">REGISTRATION</h1>
              <form action="/register" method="post">
                @csrf

                <div class="mb-3">
                  <label for="role" class="form-label">Daftar Sebagai</label>
                  <select class="form-select" name="role" id="role" required>
                    <option value="1">Driver</option>
                    <option value="2">Customer</option>
                  </select>
                  @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-floating">
                  <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control rounded-top @error('nama') is-invalid @enderror" required value="{{ old('nama') }}">
                  <label for="name">Nama Lengkap</label>
                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="input-group">
                  <span class="input-group-text" style="border-radius: 0; margin-bottom: -1px;">url/</span>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Tidak usah diisi" name="slug"  required value="{{ old('slug') }}">
                  @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <small class="text-muted">Ubah apabila domain sudah terpakai</small>

                <div class="form-floating">
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required value="{{ old('jenis_kelamin') }}">
                    <option value="Male">Laki-Laki</option>
                    <option value="Female">Perempuan</option>
                  </select>
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-floating">
                  <input type="text" name="alamat" id="alamat" placeholder="Alamat Rumah Lengkap" class="form-control @error('alamat') is-invalid @enderror" required value="{{ old('alamat') }}">
                  <label for="alamat">Alamat Rumah Lengkap</label>
                  @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="md-form md-outline input-with-post-icon datepicker form-floating">
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Select date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required value="{{ old('tanggal_lahir') }}">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-floating">
                  <input type="no_telp" name="no_telp" id="no_telp" placeholder="Nomor Telepon" class="form-control @error('no_telp') is-invalid @enderror" required value="{{ old('no_telp') }}">
                  <label for="floatingInput">Nomor Telepon</label>
                  @error('no_telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-floating">
                  <input type="email" name="email" id="email" placeholder="name@example.com" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                  <label for="floatingInput">Alamat Email</label>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-floating">
                  <input type="password" name="password" id="password" placeholder="Password" class="form-control rounded-bottom @error('password') is-invalid @enderror" required>
                  <label for="password">Password</label>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
              </form>
              <small class="d-block text-center mt-4">Already registered? <a href="/login">Login</a></small>
          </main>
      </div>
  </div>

  <script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        fetch('/dashboard/mitras/checkSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
  </script>

@endsection