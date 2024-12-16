@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="panel panel-default">
                    <h4 class="text-center text-secondary panel-heading">
                        Tabel Data Barang
                    </h4>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <!-- Tombol untuk menampilkan modal -->
                            <a href="{{ route('barang.create') }}" class="btn btn-primary mb-2">Tambah</a>

                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table table-bordered" id="dataTables-example">
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
                                            <td class="center">
                                                <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-success mx-1">Ubah</a>
                                                <form action="{{ route('barang.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus??')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
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
