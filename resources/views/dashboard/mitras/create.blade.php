@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Mitra Baru</h1>
    </div>

    <div class="col-lg-8 pb-5">
        <form method="post" action="/dashboard/mitras">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mitra</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama mitra" name="nama">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Domain</label>
                <input type="text" class="form-control" id="slug" placeholder="Tidak usah diisi" name="slug">
                <small class="text-muted">Ubah apabila domain sudah terpakai</small>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="Jl. Tambakan No. 18, Muntilan 56412" name="alamat">
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="no_telp" placeholder="08783441XXXX" name="no_telp">
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">Nomor KTP</label>
                <input type="text" class="form-control" id="no_ktp" placeholder="XXXXX32310032324" name="no_ktp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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