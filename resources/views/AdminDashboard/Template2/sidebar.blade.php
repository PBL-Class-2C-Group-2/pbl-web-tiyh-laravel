<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                <img src="{{ asset('../Photo/TambongLogo.jpg') }}" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
                </div>
                <div class="sidebar-brand-text mx-3">Tambong Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pelayanan Desa
            </div>

            <!-- Pelayanan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">

                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Pelayanan Surat</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis Surat :</h6>
                        <a class="collapse-item" href="#">Ahli Waris</a>
                        <a class="collapse-item" href="#">Beda Identitas</a>
                        <a class="collapse-item" href="#">Domisili</a>
                        <a class="collapse-item" href="#">Kehilangan</a>
                        <a class="collapse-item" href="#">Ket. Penghasilan</a>
                        <a class="collapse-item" href="#">Ket. Satu Nama</a>
                        <a class="collapse-item" href="#">Ket. Tidak Pernah Sekolah</a>
                        <a class="collapse-item" href="#">Ket. Usaha</a>
                        <a class="collapse-item" href="#">Ket. Pensiun</a>
                        <a class="collapse-item" href="#">Pengantar KK</a>
                        <a class="collapse-item" href="#">Pengantar Akta Kelahiran</a>
                        <a class="collapse-item" href="#">Pengantar Kematian</a>
                        <a class="collapse-item" href="#">Pengantar KIA</a>
                        <a class="collapse-item" href="#">Pengantar KTP</a>
                        <a class="collapse-item" href="#">Surat Jalan</a>
                        <a class="collapse-item" href="#">Surat Keterangan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Lapak Desa
            </div>

            <!-- Lapak Desa -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Lapak Desa Tambong</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Lapak : </h6>
                        <a class="collapse-item" href="#"><i class="fas fa-fw fa-tag"></i> Kategori</a>
                        <a class="collapse-item" href="#"><i class="fas fa-fw fa-shop"></i> Toko</a>
                        <a class="collapse-item" href="#"><i class="fas fa-fw fa-bag-shopping"></i> Produk</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Berita Desa Tambong
            </div>

            <!-- Berita Desa -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita Desa Tambong</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Berita Desa : </h6>
                        <a class="collapse-item" href="{{ route('kategori-berita.index') }}"><i class="fas fa-fw fa-tag"></i> Kategori Berita</a>
                        <a class="collapse-item" href="{{ route('berita.index') }}"><i class="fas fa-fw fa-newspaper"></i> Berita Desa Tambong</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tentang Desa
            </div>

            <!-- Tentang Desa -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Desa Tambong</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Informasi Desa : </h6>
                        <a class="collapse-item" href="{{ route('slide.index') }}"><i class="fas fa-fw fa-sliders"></i> Slide Banner</a>
                        <a class="collapse-item" href="{{ route('aparatur.index') }}"><i class="fas fa-fw fa-people-group"></i> Aparatur Desa</a>
                        <a class="collapse-item" href="{{ route('galeri.index') }}"><i class="fas fa-fw fa-folder-open"></i> Galeri Desa</a>
                        {{-- <a class="collapse-item" href="#"><i class="fas fa-fw fa-info"></i> Informasi Desa</a> --}}
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
