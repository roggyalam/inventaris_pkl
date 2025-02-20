@extends('layouts.backend')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Peminjaman</h4>
                    <a href="{{ route('pinjaman.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Peminjaman
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
                                    <th>Kode Pinjaman</th>
                                    <th>Peminjam</th>
                                    <th>Barang Yang Dipinjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pinjaman as $data)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_pinjaman }}</td>
                                        <td>{{ $data->peminjam }}</td>
                                        <td>
                                            <ul class="list-unstyled text-start">
                                                @foreach ($data->barangs as $barang)
                                                    <li>• {{ $barang->nama_barang }} ({{ $barang->pivot->jumlah }})</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($data->tanggal_pinjam)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->tanggal_kembali)->format('d-m-Y') }}</td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('pinjaman.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Ubah
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('pinjaman.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                                        <td colspan="6" class="text-center">Tidak ada data peminjaman</td>
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
