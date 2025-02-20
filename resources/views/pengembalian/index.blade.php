@extends('layouts.backend')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Pengembalian</h4>
                    <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Pengembalian
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Peminjam</th>
                                    <th>Barang Yang Dipinjam</th>
                                    <th>Kondisi</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Kerusakan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengembalian as $data)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->pinjaman->peminjam }}</td>
                                        <td>
                                            <ul class="list-unstyled text-start">
                                                @foreach ($data->barang as $barang)
                                                    <li>• {{ $barang->nama_barang }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $data->kondisi_barang }}</td>
                                        <td>{{ $data->tanggal_kembali }}</td>
                                        <td>{{ $data->kerusakan ?? '-' }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('pengembalian.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Ubah
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('pengembalian.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data pengembalian</td>
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
