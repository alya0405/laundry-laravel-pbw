@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Tambah Pelanggan</h3>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required placeholder="Nama pelanggan">
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxx">
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>
@endsection
