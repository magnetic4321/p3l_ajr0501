@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Jadwal</h1>
    </div>

    <div class="col-lg-3 pb-5">
        <form method="post" action="/dashboard/jadwals">
            @csrf
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" class="form-control" id="hari" placeholder="Senin" name="hari">
            </div>
            <div class="mb-3">
                <label for="shift" class="form-label">Shift Jadwal</label>
                <select class="form-select" name="shift" id="shift">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection