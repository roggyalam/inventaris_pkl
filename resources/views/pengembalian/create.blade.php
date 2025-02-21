@extends('layouts.backend')
@section('content')
 <div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="panel-heading mt-3 mb-2 text-center">
                        Tambah Data pengembalian
                    </h4>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('pengembalian.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="">Kode Peminjam</label>
                                        <select name="id_peminjaman" id="" class="form-control">
                                            @foreach ($pinjaman as $item)
                                                <option value="{{$item->id}}">{{ $item->kode_pinjaman}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Barang</label>
                                        <select name="id_barang" id="" class="form-control">
                                            @foreach ($barang as $item)
                                                <option value="{{$item->id}}">{{ $item->nama_barang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="kondisi">Kondisi</label>
                                        <select name="kondisi_barang" id="kondisi">
                                            @foreach(App\Models\pengembalian::getKondisiOptions() as $key => $value)
                                                <option value="{{ $key }}" {{ old('kondisi_barang') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="pengembalian" class="form-label">Tanggal Pengembalian</label>
                                            <input type="date" class="form-control" id="" name="tanggal_kembali" required>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="pengembalian" class="form-label">Kerusakan</label>
                                            <input type="text" class="form-control" id="" name="kerusakan" required>
                                        </div>
                                    </div>
                                    <a href="{{route('pengembalian.index')}}"class="btn-secondary btn btn-default">Kembali</a>
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
