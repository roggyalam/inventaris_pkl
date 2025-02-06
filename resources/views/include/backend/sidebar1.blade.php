<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>
        <!-- Sidebar -->
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="logo-box text-center">
                <a href="index.html" class="logo logo-light">
                    <h2>INVENTARIS</h2>
                </a>
            </div>

            <ul id="side-menu" class="list-unstyled">
                <li class="menu-title">
                    <h4>Menu</h4>
                </li>
                <li class="menu-item">
                    <a href="{{ route('home') }}" class="menu-link">
                        <i data-feather="home" class="menu-icon"></i>
                        <span class="menu-text">Home Inventaris</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('kategori.index') }}" class="menu-link">
                        <i data-feather="activity" class="menu-icon"></i>
                        <span class="menu-text">kategori</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('ruangan.index') }}" class="menu-link">
                        <i data-feather="settings" class="menu-icon"></i>
                        <span class="menu-text">Ruangan</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('supplier.index') }}" class="menu-link">
                        <i data-feather="cpu" class="menu-icon"></i>
                        <span class="menu-text">Supplier</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('barang.index') }}" class="menu-link">
                        <i data-feather="box" class="menu-icon"></i>
                        <span class="menu-text">Barang</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('pengadaanbarang.index') }}" class="menu-link">
                        <i data-feather="shield" class="menu-icon"></i>
                        <span class="menu-text">Pengadaan</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('pinjaman.index') }}" class="menu-link">
                        <i data-feather="monitor" class="menu-icon"></i>
                        <span class="menu-text">Pinjaman</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('pengembalian.index') }}" class="menu-link">
                        <i data-feather="tool" class="menu-icon"></i>
                        <span class="menu-text">Pengembalian</span>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a href="{{ route('tusulanplengadaan.index') }}" class="menu-link">
                        <i data-feather="plus-square" class="menu-icon"></i>
                        <span class="menu-text">Tusulan Pengadaan</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>

<!-- CSS: Menambahkan efek tombol pada menu item -->
<style>
/* Menambahkan tampilan seperti tombol pada setiap menu item */
#side-menu .menu-item {
    margin-bottom: 5px; /* Mengurangi jarak antar item */
}

#side-menu .menu-item a {
    display: flex;
    align-items: center;
    padding: 8px 15px; /* Mengurangi padding untuk tombol lebih kecil */
    background-color: #0080ff;
    color: #333;
    border-radius: 4px; /* Menyesuaikan border-radius agar lebih kecil */
    border: 1px solid #ddd;
    transition: all 0.3s ease;
    font-size: 14px; /* Mengurangi ukuran font */
}

#side-menu .menu-item a:hover {
    background-color: #00c2fd;
    color: white;
    border-color: #007bff;
}

#side-menu .menu-item a .menu-icon {
    margin-right: 8px; /* Mengurangi jarak antara ikon dan teks */
    font-size: 16px; /* Menyesuaikan ukuran ikon agar lebih kecil */
}

/* Mengatur tampilan ketika menu item dalam keadaan aktif */
#side-menu .menu-item a.active {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

</style>
