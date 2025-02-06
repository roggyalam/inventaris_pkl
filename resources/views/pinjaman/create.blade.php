@extends('layouts.backend')
@section('content')
 <div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="panel-heading mt-3 mb-2 text-center">
                        Tambah Data Pinjaman
                    </h4>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('pinjaman.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="">Barang</label>
                                        <div class="d-flex justify-content-between">
                                            <select name="id_barang" id="" class="form-control" style="flex-grow: 1;">
                                                @foreach ($barang as $item)
                                                    <option value="{{$item->id}}">{{ $item->nama_barang}}</option>
                                                @endforeach
                                            </select>
                                            <!-- Add button to open modal or redirect to add barang page -->
                                            <a href="{{ route('barang.create') }}" class="btn btn-success btn-sm ml-2">
                                                Tambah
                                            </a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="pinjaman" class="form-label">Tanggal Pinjam</label>
                                            <input type="date" class="form-control" id="" name="tanggal_pinjam" required>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="pinjaman" class="form-label">Tanggal Kembali</label>
                                            <input type="date" class="form-control" id="" name="tanggal_kembali" required>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="pinjaman" class="form-label">Nama Peminjam</label>
                                            <input type="text" class="form-control" id="" name="peminjam" required>
                                        </div>
                                    </div>
                                    <a href="{{route('pinjaman.index')}}" class="btn-secondary btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-default">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
