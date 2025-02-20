@extends('layouts.backend')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Daftar Barang</h4>
                    <a href="{{ route('barang.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Barang
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
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Kondisi</th>
                                    <th>Jumlah</th>
                                    <th>Ruangan</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barang as $data)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_barang }}</td>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td>{{ optional($data->kategori)->kategori ?? '-' }}</td>
                                        <td>{{ $data->kondisi }}</td>
                                        <td>{{ $data->jumlah }}</td>
                                        <td>{{ optional($data->ruangan)->nama_ruangan ?? '-' }}</td>

                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Ubah
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('barang.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
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
                                        <td colspan="6" class="text-center">Tidak ada data barang</td>
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
