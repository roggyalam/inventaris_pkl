@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="panel panel-default">
                    <h4 class="text-center text-secondary panel-heading">
                        Tabel Data Pinjaman
                    </h4>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <!-- Tombol untuk menampilkan modal -->
                            <a href="{{ route('pinjaman.create') }}" class="btn btn-primary mb-2">Tambah</a>


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
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Nama Peminjam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($pinjaman as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td><center>{{ $data->barang->nama_barang}}</center></td>
                                            <td>{{ $data->tanggal_pinjam}}</td>
                                            <td>{{ $data->tanggal_kembali}}</td>
                                            <td>{{ $data->peminjam}}</td>
                                            <form action="{{ route('pinjaman.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td class="center">
                                                    <a href="{{ route('pinjaman.edit', $data->id) }}" class="btn btn-success mx-1">Ubah</a>
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

<!-- Modal untuk menambahkan barang -->
{{-- <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Tambah barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="barang" class="form-label">Nama barang</label>
                <input type="text" class="form-control" id="barang" name="nama_barang" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="">Kategori</label>
            <select name="id_kategori" id="" class="form-control">
                @foreach ($kategoris as $item)
                    <option value="{{$item->id}}">{{ $item->kategori}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="barang" class="form-label">kondisi</label>
                <input type="text" class="form-control" id="barang" name="kondisi" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="">ruangan</label>
            <select name="id_ruangan" id="" class="form-control">
                @foreach ($ruangan as $item)
                    <option value="{{$item->id}}">{{ $item->nama_ruangan}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="barang" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="barang" name="alamat" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div> --}}

@endsection
