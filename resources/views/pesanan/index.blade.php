@extends('layouts.app')

@section('content')
<style>
    table th, table td {
        vertical-align: middle !important;
    }
    .col-id { width: 50px; }
    .col-pelanggan { width: 150px; }
    .col-layanan { width: 150px; }
    .col-harga { width: 120px; }
    .col-status { width: 110px; }
    .col-progress { width: 200px; }
    .col-status-quick { width: 320px; }
    .col-aksi { width: 120px; }
    .btn-group form { margin-right: 3px; }
</style>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h3 class="mb-3">Daftar Pesanan Laundry</h3>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th class="col-id">ID</th>
                <th class="col-pelanggan">Pelanggan</th>
                <th class="col-layanan">Layanan</th>
                <th class="col-harga">Harga</th>
                <th class="col-status">Status</th>
                <th class="col-progress">Progress</th>
                <th class="col-status-quick">Aksi Status Cepat</th>
                <th class="col-aksi">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pesanans as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->pelanggan->nama }}</td>
                <td>{{ $p->layanan }}</td>
                <td>Rp {{ number_format($p->harga) }}</td>

                <td>
                    @php
                        $badge = [
                            'Diterima' => 'secondary',
                            'Dicuci' => 'info',
                            'Dijemur' => 'warning',
                            'Disetrika' => 'primary',
                            'Selesai' => 'success',
                        ];
                    @endphp

                    <span class="badge bg-{{ $badge[$p->status] ?? 'secondary' }}">
                        {{ $p->status }}
                    </span>
                </td>

                <td>
                    @php
                        $progress = [
                            'Diterima' => 20,
                            'Dicuci' => 40,
                            'Dijemur' => 60,
                            'Disetrika' => 80,
                            'Selesai' => 100,
                        ];
                    @endphp

                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-success"
                             role="progressbar"
                             style="width: {{ $progress[$p->status] }}%;">
                            {{ $progress[$p->status] }}%
                        </div>
                    </div>
                </td>

                <td>
                    <div class="btn-group" role="group">

                        @foreach(['Diterima','Dicuci','Dijemur','Disetrika','Selesai'] as $status)
                            <form action="{{ route('pesanan.updateStatus', ['id' => $p->id, 'status' => $status]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm 
                                    @if($status=='Diterima') btn-secondary
                                    @elseif($status=='Dicuci') btn-info text-white
                                    @elseif($status=='Dijemur') btn-warning
                                    @elseif($status=='Disetrika') btn-primary
                                    @else btn-success @endif">
                                    {{ $status }}
                                </button>
                            </form>
                        @endforeach

                    </div>
                </td>

                <td>
                    <a href="{{ route('pesanan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('pesanan.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus pesanan?')" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
