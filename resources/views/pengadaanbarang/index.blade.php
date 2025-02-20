@extends('layouts.backend')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Pengadaan Barang</h4>
                    <a href="{{ route('pengadaanbarang.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Pengadaan
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengadaan_barang as $data)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->barang->nama_barang }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->jumlah }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('pengadaanbarang.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('pengadaanbarang.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengadaan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data pengadaan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
