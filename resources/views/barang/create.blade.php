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
                                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                            <div class="form-group mt-3">
                            <label for="kode_barang">Kode Barang</label>
                            <input
                                type="text"
                                name="kode_barang"
                                id="kode_barang"
                                class="form-control @error('kode_barang') is-invalid @enderror"
                                value="{{ old('kode_barang') }}"
                                required
                            >

                            @error('kode_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                                    <div class="mb-3">
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                               name="nama_barang" value="{{ old('nama_barang') }}" required>
                                        @error('nama_barang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_kategori" class="form-label">Kategori</label>
                                        <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}" {{ old('id_kategori') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="kondisi" class="form-label">Kondisi</label>
                                        <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror">
                                            <option value="">Pilih Kondisi</option>
                                            <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                            <option value="Rusak" {{ old('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                            <option value="Perbaikan" {{ old('kondisi') == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                                        </select>
                                        @error('kondisi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="id_ruangan" class="form-label">Ruangan</label>
                                        <select name="id_ruangan" class="form-control @error('id_ruangan') is-invalid @enderror">
                                            <option value="">Pilih Ruangan</option>
                                            @foreach ($ruangan as $item)
                                                <option value="{{ $item->id }}" {{ old('id_ruangan') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama_ruangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_ruangan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                               name="jumlah" value="{{ old('jumlah') }}" min="1" required>
                                        @error('jumlah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
