@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Ruangan</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('ruangan.store') }}" method="POST">
                        @csrf

                        <!-- Nama Ruangan -->
                        <div class="form-group">
                            <label for="nama_ruangan">Nama Ruangan</label>
                            <input
                                type="text"
                                name="nama_ruangan"
                                id="nama_ruangan"
                                class="form-control @error('nama_ruangan') is-invalid @enderror"
                                value="{{ old('nama_ruangan') }}"
                                required
                            >

                            @error('nama_ruangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Kode Ruangan -->
                        <div class="form-group mt-3">
                            <label for="kode_ruangan">Kode Ruangan</label>
                            <input
                                type="text"
                                name="kode_ruangan"
                                id="kode_ruangan"
                                class="form-control @error('kode_ruangan') is-invalid @enderror"
                                value="{{ old('kode_ruangan') }}"
                                required
                            >

                            @error('kode_ruangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Tambah Ruangan</button>
                            <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
