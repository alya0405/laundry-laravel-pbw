@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Tambah Pesanan</h3>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('pesanan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Pelanggan</label>
                    <select name="pelanggan_id" class="form-control" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach($pelanggans as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Layanan</label>
                    <input type="text" name="layanan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" step="0.1" name="jumlah" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control">
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>
@endsection
