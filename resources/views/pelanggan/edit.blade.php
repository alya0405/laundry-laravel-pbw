@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Edit Pelanggan</h3>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama }}" required>
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}">
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3">{{ $pelanggan->alamat }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>
@endsection
