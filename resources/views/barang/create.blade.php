@extends('layouts.backend')
@section('content')
 <div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <h4 class="panel-heading mt-3 mb-2 text-center">
                        Tambah Data Barang
                    </h4>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('barang.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="barang" class="form-label">Nama barang</label>
                                            <input type="text" class="form-control" id="" name="nama_barang" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Kategori</label>
                                        <select name="id_kategori" id="" class="form-control">
                                            @foreach ($kategori as $item)
                                                <option value="{{$item->id}}">{{ $item->kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="kondisi">Kondisi</label>
                                        <select name="kondisi" id="kondisi">
                                            @foreach(App\Models\barang::getKondisiOptions() as $key => $value)
                                                <option value="{{ $key }}" {{ old('kondisi') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
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
                                            <input type="text" class="form-control" id="" name="alamat" required>
                                        </div>
                                    </div>
                                    <a href="{{route('barang.index')}}"class="btn-secondary btn btn-default">Kembali</a>
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
