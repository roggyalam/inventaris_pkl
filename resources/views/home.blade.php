@extends('layouts.admin')

@section('content')

<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
        </div>
    </div>

    <div class="row">
        <!-- Total Barang Card -->
        <div class="col-md-6 col-xl-3">
            <div class="card" style="background-color: rgba(0, 123, 255, 0.708); color: white;">
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
                                <i class="mdi mdi-cube-outline fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Kategori Card -->
        <div class="col-md-6 col-xl-3">
            <div class="card" style="background-color: rgba(24, 171, 59, 0.718); color: white;">
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
                                <i class="mdi mdi-tag-multiple fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('kategori.index') }}" class="btn btn-light btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Ruangan Card -->
        <div class="col-md-6 col-xl-3">
            <div class="card" style="background-color: rgba(255, 193, 7, 0.66); color: white;">
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
                                <i class="mdi mdi-home-modern fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('ruangan.index') }}" class="btn btn-light btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Peminjam Card -->
        <div class="col-md-6 col-xl-3">
            <div class="card" style="background-color: rgba(231, 127, 9, 0.795); color: white;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-muted mb-3 fw-semibold">Total Peminjam</p>
                            <h4 class="m-0 mb-3 fs-18">{{ \App\Models\Pinjaman::count() }}</h4>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-top-right text-success"></i> + 25%</span>last month
                            </p>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-center">
                                <i class="mdi mdi-account-multiple fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('pinjaman.index') }}" class="btn btn-light btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Container -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Dashboard Chart</h5>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the ApexCharts diagram
        var options = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Total',
                data: [
                    {{ \App\Models\Barang::count() }},
                    {{ \App\Models\Kategori::count() }},
                    {{ \App\Models\Ruangan::count() }},
                    {{ \App\Models\Pinjaman::count() }}
                ]
            }],
            xaxis: {
                categories: ['Barang', 'Kategori', 'Ruangan', 'Peminjam']
            },
            colors: ['#007bff', '#28a745', '#ffc107', '#17a2b8'],
            title: {
                text: 'Total Count of Items',
                align: 'center'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>

@endsection
