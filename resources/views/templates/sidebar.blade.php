<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if(Auth::user()->level == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <!-- <li>
                    <a href="/kategori">
                        <i class="bi bi-circle"></i><span>Kategori</span>
                    </a>
                </li> -->
                <li>
                    <a href="/jenis">
                        <i class="bi bi-circle"></i><span>Jenis</span>
                    </a>
                </li>
                <li>
                    <a href="/stok">
                        <i class="bi bi-circle"></i><span>Stok</span>
                    </a>
                </li>
                <li>
                    <a href="/menu">
                        <i class="bi bi-circle"></i><span>Menu</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="/transaksi">
                        <i class="bi bi-circle"></i><span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="/detail_transaksi">
                        <i class="bi bi-circle"></i><span>Detail Transaksi</span>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="/meja">
                        <i class="bi bi-circle"></i><span>Meja</span>
                    </a>
                </li>
                <li>
                    <a href="/pelanggan">
                        <i class="bi bi-circle"></i><span>Pelanggan</span>
                    </a>
                </li> -->
            </ul>
        </li><!-- End Tables Nav -->
        @endif

        <li class="nav-heading">Pages</li>
        
        @if(Auth::user()->level == 2)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/pemesanan">
                <i class="bi bi-cart"></i>
                <span>Pemesanan</span>
            </a>
        </li><!-- End Pemesanan Page Nav -->
        @endif

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="/pegawai">
                <i class="bi bi-calendar-check"></i>
                <span>Absensi Kerja</span>
            </a>
        </li>End Absensi Page Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="/produk">
                <i class="bi bi-box"></i>
                <span>Produk Titipan</span>
            </a>
        </li>End Produk Titipan Page Nav -->

        @if(Auth::user()->level == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/registrasi">
                <i class="bi bi-person"></i>
                <span>Buat Akun</span>
            </a>
        </li><!-- End Buat Akun Page Nav -->
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" href="/contact">
                <i class="bi bi-envelope"></i>
                <span>Contact Us</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/tentang">
                <i class="bi bi-info-circle"></i>
                <span>Tentang Aplikasi</span>
            </a>
        </li><!-- End Tentang Aplikasi Page Nav -->

    </ul>
</aside>