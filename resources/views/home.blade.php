@extends('layouts.backend')

@section('content')

<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-muted mb-3 fw-semibold">Total Barang</p>
                            <h4 class="m-0 mb-3 fs-18">{{ \App\Models\Barang::count() }}</h4>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-top-right text-success"></i>+ 12%</span>Last month
                            </p>
                        </div>

                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div id="total_space" class="me-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-muted mb-3 fw-semibold">Total Kategori</p>
                            <h4 class="m-0 mb-3 fs-18">{{ \App\Models\Kategori::count() }}</h4>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-bottom-left text-danger"></i>- 25%</span>Last month
                            </p>
                        </div>

                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div id="video_space" class="me-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-muted mb-3 fw-semibold">Total Ruangan</p>
                            <h4 class="m-0 mb-3 fs-18">{{ \App\Models\Ruangan::count() }}</h4>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-top-right text-success"></i> + 45%</span>last month
                            </p>
                        </div>

                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div id="music_space" class="me-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-muted mb-3 fw-semibold">Total Supplier</p>
                            <h4 class="m-0 mb-3 fs-18">{{ \App\Models\Supplier::count() }}</h4>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-top-right text-success"></i> + 25%</span>last month
                            </p>
                        </div>

                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <div id="document_space" class="me-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">Data Barang</h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
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

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="justify-content-center">
                        <div id="customer_rate" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0">Data Peminjaman</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-5">
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <!-- Tombol untuk menampilkan modal -->

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

                    <div class="card-body">
                        <div class="justify-content-center">
                            <div id="customer_rate" class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-md-12 col-xl-6">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">Author Sales</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="justify-content-center">
                        <div id="author_chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

