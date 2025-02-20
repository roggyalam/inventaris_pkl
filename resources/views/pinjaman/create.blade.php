@extends('layouts.backend')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <h4 class="text-center text-secondary card-header">
                        Tambah Data Pinjaman
                    </h4>
                    <div class="card-body">
                        <form action="{{ route('pinjaman.store') }}" method="POST">
                            @csrf
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th width="30%">Nama Peminjam</th>
                                        <td>
                                            <input type="text" class="form-control" id="peminjam" name="peminjam" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pinjam</th>
                                        <td>
                                            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kembali</th>
                                        <td>
                                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Barang yang Dipinjam</th>
                                        <td>
                                            <table class="table table-sm table-bordered" id="barang-table">
                                                <thead>
                                                    <tr>
                                                        <th>Barang</th>
                                                        <th>Jumlah</th>
                                                        <th width="10%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="barang-row">
                                                        <td>
                                                            <select name="id_barang[]" class="form-control barang-select" required>
                                                                <option value="">Pilih Barang</option>
                                                                @foreach ($barang as $item)
                                                                    <option value="{{ $item->id }}" data-stock="{{ $item->jumlah }}">
                                                                        {{ $item->nama_barang }} (Stok: {{ $item->jumlah }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="jumlah[]" class="form-control jumlah-barang" min="1" required>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-info btn-sm add-barang-btn">+</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('pinjaman.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let barangData = @json($barang); // Mengambil data barang dari PHP ke JavaScript
        let barangTable = document.querySelector("#barang-table tbody");

        document.addEventListener("click", function (event) {
            if (event.target.classList.contains("add-barang-btn")) {
                let newRow = document.createElement("tr");
                newRow.classList.add("barang-row");

                newRow.innerHTML = `
                    <td>
                        <select name="id_barang[]" class="form-control barang-select" required>
                            <option value="">Pilih Barang</option>
                            ${barangData.map(item => `<option value="${item.id}" data-stock="${item.jumlah}">${item.nama_barang} (Stok: ${item.jumlah})</option>`).join('')}
                        </select>
                    </td>
                    <td>
                        <input type="number" name="jumlah[]" class="form-control jumlah-barang" min="1" required>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm remove-barang-btn">−</button>
                    </td>
                `;

                barangTable.appendChild(newRow);
                updateBarangOptions();
            }

            if (event.target.classList.contains("remove-barang-btn")) {
                event.target.closest(".barang-row").remove();
                updateBarangOptions();
            }
        });

        document.addEventListener("change", function (event) {
            if (event.target.classList.contains("barang-select")) {
                updateBarangOptions();
            }

            if (event.target.classList.contains("jumlah-barang")) {
                let selectedOption = event.target.closest("tr").querySelector(".barang-select option:checked");
                let maxStock = selectedOption.dataset.stock || 1;
                event.target.max = maxStock;
                if (parseInt(event.target.value) > parseInt(maxStock)) {
                    event.target.value = maxStock;
                }
            }
        });

        function updateBarangOptions() {
            let selectedValues = [];
            document.querySelectorAll(".barang-select").forEach(select => {
                if (select.value) {
                    selectedValues.push(select.value);
                }
            });

            document.querySelectorAll(".barang-select").forEach(select => {
                let currentValue = select.value;
                select.querySelectorAll("option").forEach(option => {
                    option.hidden = selectedValues.includes(option.value) && option.value !== currentValue;
                });
            });
        }
    });
</script>
@endsection
