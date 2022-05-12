@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profile</h1>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-md-5 pb-5">
                    <form method="post" action="/dashboard/drivers/{{ $driver->slug }}" enctype="multipart/form-data">
                    @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Address" name="email" disabled autofocus value="{{ old('email', $driver->user->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama driver" name="nama" required autofocus value="{{ old('nama', $driver->user->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="slug" class="form-label-group">Domain</label>
                            <div class="input-group">
                                <span class="input-group-text">url/</span>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Tidak usah diisi" name="slug" required autofocus value="{{ old('slug', $driver->slug) }}">
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <small class="text-muted">Ubah apabila domain sudah terpakai</small>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" required autofocus value="{{ old('tanggal_lahir', $driver->user->tanggal_lahir) }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Jl. Nama Jalan No. XX, Kota 56XXX" name="alamat" required autofocus value="{{ old('alamat', $driver->user->alamat) }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="08783441XXXX" name="no_telp" required autofocus value="{{ old('no_telp', $driver->user->no_telp) }}">
                            @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
            
                        <label for="tarif" class="form-label">Tarif</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control @error('tarif') is-invalid @enderror" id="tarif" placeholder="150000" name="tarif" required autofocus value="{{ old('tarif', $driver->tarif) }}">
                            @error('tarif')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_ktp" class="form-label">Nomor KTP</label>
                            <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" placeholder="08783441XXXX" name="no_ktp" required autofocus value="{{ old('no_ktp', $driver->no_ktp) }}">
                            @error('no_ktp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
            
                        <div class="mb-3">
                            <label for="no_sim" class="form-label">Nomor SIM</label>
                            <input type="text" class="form-control @error('no_sim') is-invalid @enderror" id="no_sim" placeholder="08783441XXXX" name="no_sim" required autofocus value="{{ old('no_sim', $driver->no_sim) }}">
                            @error('no_sim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-3 pt-0">Berbahasa Inggris</legend>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahasa" id="bahasa" value="0">
                                    <label class="form-check-label" for="bahasa">
                                    Tidak Mampu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bahasa" id="bahasa" value="1">
                                    <label class="form-check-label" for="bahasa">
                                    Mampu
                                    </label>
                                </div>
                            </div>
                        </fieldset> --}}

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Upload Foto</label>
                                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                
                            <div class="mb-3">
                                <label for="napza" class="form-label">Upload Napza</label>
                                <input class="form-control @error('napza') is-invalid @enderror" type="file" id="napza" name="napza">
                                @error('napza')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                
                            <div class="mb-3">
                                <label for="skck" class="form-label">Upload SKCK</label>
                                <input class="form-control @error('skck') is-invalid @enderror" type="file" id="skck" name="skck">
                                @error('skck')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                
                            <div class="mb-3">
                                <label for="surat_kejiwaan" class="form-label">Upload Surat Kejiwaan</label>
                                <input class="form-control @error('surat_kejiwaan') is-invalid @enderror" type="file" id="surat_kejiwaan" name="surat_kejiwaan">
                                @error('surat_kejiwaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        nama.addEventListener('change', function() {
            fetch('/dashboard/drivers/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    </script>

@endsection