@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Barang</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input
                                type="text"
                                name="nama_barang"
                                id="nama_barang"
                                class="form-control @error('nama_barang') is-invalid @enderror"
                                value="{{ old('nama_barang', $barang->nama_barang) }}"
                                required
                            >

                            @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Kategori</label>
                            <select name="id_kategori" id="" class="form-control">
                                @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{ $item->kategori}}</option>
                                @endforeach
                            </select>
                        </div>

                            @error('id_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <select
                                name="kondisi"
                                id="kondisi"
                                class="form-control @error('kondisi') is-invalid @enderror"
                                required
                            >
                                <option value="baik" {{ old('kondisi', $barang->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak" {{ old('kondisi', $barang->kondisi) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="perbaikan" {{ old('kondisi', $barang->kondisi) == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                            </select>

                            @error('kondisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_ruangan">Ruangan</label>
                            <select
                                name="id_ruangan"
                                id="id_ruangan"
                                class="form-control @error('id_ruangan') is-invalid @enderror"
                                required
                            >
                                <option value="">Pilih Ruangan</option>
                                @foreach ($ruangan as $r)
                                    <option value="{{ $r->id }}" {{ old('id_ruangan', $barang->id_ruangan) == $r->id ? 'selected' : '' }}>
                                        {{ $r->nama_ruangan }}
                                    </option>
                                @endforeach
                            </select>

                            @error('id_ruangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input
                                type="text"
                                name="alamat"
                                id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                value="{{ old('alamat', $barang->alamat) }}"
                                required
                            >

                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Barang</button>
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
