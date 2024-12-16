@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="panel panel-default">
                    <h4 class="text-center text-secondary panel-heading">
                        Tabel Data Supplier
                    </h4>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <!-- Tombol untuk menampilkan modal -->
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                Tambah
                            </button>

                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table table-bordered" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Supplier</th>
                                        <th>Alamat</th>
                                        <th>Kontak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($supplier as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_supplier}}</td>
                                            <td>{{ $data->alamat}}</td>
                                            <td>{{ $data->kontak}}</td>
                                            <form action="{{ route('supplier.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td class="center">
                                                    <a href="{{ route('supplier.edit', $data->id) }}" class="btn btn-success mx-1">Ubah</a>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus??')">Hapus</button>
                                                </td>
                                            </form>
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

<!-- Modal untuk menambahkan supplier -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Tambah supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('supplier.store') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="supplier" class="form-label">Nama supplier</label>
                <input type="text" class="form-control" id="supplier" name="nama_supplier" required>
            </div>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="supplier" class="form-label">alamat</label>
                <input type="text" class="form-control" id="supplier" name="alamat" required>
            </div>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="supplier" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="supplier" name="kontak" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
