@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Supplier</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_supplier">Nama Supplier</label>
                            <input
                                type="text"
                                name="nama_supplier"
                                id="nama_supplier"
                                class="form-control @error('nama_supplier') is-invalid @enderror"
                                value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                                required
                            >

                            @error('nama_supplier')
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
                                value="{{ old('alamat', $supplier->alamat) }}"
                                required
                            >

                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input
                                type="text"
                                name="kontak"
                                id="kontak"
                                class="form-control @error('kontak') is-invalid @enderror"
                                value="{{ old('kontak', $supplier->kontak) }}"
                                required
                            >

                            @error('kontak')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Update Supplier</button>
                            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
