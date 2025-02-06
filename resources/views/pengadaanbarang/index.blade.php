@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card shadow">
                    <h4 class="text-center text-secondary card-header">
                        Tabel Data Pengadaan Barang
                    </h4>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Tombol untuk menampilkan modal -->
                            <a href="{{ route('pengadaanbarang.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Tambah Pengadaan
                            </a>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pengadaan_barang as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td class="text-center">{{ $data->barang->nama_barang }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                            <form action="{{ route('pengadaanbarang.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td class="text-center">
                                                    <a href="{{ route('pengadaanbarang.edit', $data->id) }}" class="btn btn-success mx-1">
                                                        <i class="bi bi-pencil-square"></i> Ubah
                                                    </a>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus?')">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
