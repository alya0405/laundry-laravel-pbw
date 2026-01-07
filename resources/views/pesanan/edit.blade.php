@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Edit Pesanan</h3>

    <div class="card mt-3">
        <div class="card-body">

            <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Pelanggan</label>
                    <select name="pelanggan_id" class="form-control" required>
                        @foreach($pelanggans as $p)
                            <option value="{{ $p->id }}" {{ $p->id == $pesanan->pelanggan_id ? 'selected': '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Layanan</label>
                    <input type="text" name="layanan" class="form-control" value="{{ $pesanan->layanan }}" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" step="0.1" name="jumlah" class="form-control" value="{{ $pesanan->jumlah }}">
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $pesanan->harga }}" required>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option {{ $pesanan->status=='Diterima' ? 'selected':'' }}>Diterima</option>
                        <option {{ $pesanan->status=='Diproses' ? 'selected':'' }}>Diproses</option>
                        <option {{ $pesanan->status=='Selesai' ? 'selected':'' }}>Selesai</option>
                        <option {{ $pesanan->status=='Diambil' ? 'selected':'' }}>Diambil</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" value="{{ $pesanan->tanggal_masuk }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" value="{{ $pesanan->tanggal_selesai }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>
@endsection
