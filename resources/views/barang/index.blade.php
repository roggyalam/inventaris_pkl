@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card shadow-sm">
                    <h4 class="text-center text-secondary card-header">
                        Tabel Data Barang
                    </h4>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Button to add new Barang -->
                            <a href="{{ route('barang.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Tambah Barang
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
                                        <th>Kategori</th>
                                        <th>Kondisi</th>
                                        <th>Ruangan</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($barang as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td><center>{{ $data->kategori->kategori }}</center></td>
                                            <td>{{ $data->kondisi }}</td>
                                            <td><center>{{ $data->ruangan->nama_ruangan }}</center></td>
                                            <td>{{ $data->alamat }}</td>
                                            <td class="text-center">
                                                <!-- Edit Button -->
                                                <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-success mx-1">
                                                    <i class="bi bi-pencil-square"></i> Ubah
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('barang.destroy', $data->id) }}" method="DELETE" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus??')">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
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

@push('scripts')
    <!-- Include DataTables JS and CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#dataTables-example').DataTable({
                "paging": true,        // Enables pagination
                "searching": true,     // Enables search functionality
                "ordering": true,      // Enables sorting by columns
                "info": true           // Shows info about the table state
            });
        });
    </script>
@endpush
