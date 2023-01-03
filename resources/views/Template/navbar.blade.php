<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;" id="navbar">
  <div class="container-fluid" id="navCont">
    <a class="navbar-brand" href="{{ route('beranda') }}" style="font-family: 'Itim'; opacity: 80%;" class="d-inline-block align-text-top">
      <img src="{{ asset('../Photo/TambongLogo.jpg') }}" alt="Avatar Logo" style="width:45px;" class="rounded-pill"> <span style="font-weight:bold;">
        Tambong In Your Hand
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" id="btndashboard">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="nav navbar-nav" style="margin-left: auto;">
      <br>
        <!-- Search -->
        <li class="nav-item">
          <form class="form-control-lg" role="search">
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
              <input class="form-control me-2" type="cari" placeholder="Cari" aria-label="Cari" aria-describedby="basic-addon1">
            </div>
          </form>
        </li>
        <br>
        <li class="nav-item active">
          <a class="nav-link nav-link-ltr" href="{{ route('beranda') }}"><i class="bi bi-house"></i> Beranda</a>
        </li>
        <!-- Pelayanan -->
        <li class="nav-item">
          <a class="nav-link nav-link-ltr" href="#"><i class="bi bi-card-list"></i> Pelayanan Desa</a>
        </li>
        <!-- Produk -->
        <li class="nav-item">
          <a class="nav-link nav-link-ltr" href="#"><i class="bi bi-shop"></i> Produk Desa</a>
        </li>
        <!-- Berita -->
        <li class="nav-item">
          <a class="nav-link nav-link-ltr" href="{{ route('berita-desa') }}"><i class="bi bi-newspaper"></i> Berita Desa</a>
        </li>
        <!-- Tentang Desa -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-info-circle"></i>
            Tentang Desa
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('tentang-desa') }}">Tentang Desa</a></li>
            <li><a class="dropdown-item" href="{{ route('visimisi') }}">Visi Misi</a></li>
            <li><a class="dropdown-item" href="#">Sejarah</a></li>
            <li><a class="dropdown-item" href="{{ route('aparatur-desa')}}">Aparatur Desa</a></li>
            <li><a class="dropdown-item" href="{{ route('galeri-desa') }}">Galeri Desa</a></li>
          </ul>
        </li>
        <br>

        <!-- BTN MASUK -->
        <li class="nav-item login">
          <div class="dropdown">
            <button class="btn btn-success mr-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              MASUK
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
              <li><a class="dropdown-item" href="{{ route('login') }}">Administrator</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Penduduk</a></li>
            </ul>
          </div>
        </li>
        <!-- BTN DAFTAR -->
        <!-- <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-warning" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              DAFTAR
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Administrator</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Penduduk</a></li>
            </ul>
          </div>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
