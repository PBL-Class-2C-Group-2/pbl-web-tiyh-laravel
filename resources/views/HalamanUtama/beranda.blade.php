<!DOCTYPE html>
<html lang="en">
<head>
@include('Template.head')
</head>
<body>

@include('Template.navbar')

<!-- Halaman Mulai dari sini -->
<!-- corousel -->
@include('Template.slider')


  <!-- Pelayanan -->
  {{-- <div class="container-fluid">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi quia velit reiciendis dignissimos quas eaque assumenda harum quam temporibus quisquam.</p>
  </div> --}}

  <!-- Berita -->
  <div class="container-fluid">
    <div class="row">
        <div class="d-flex mt-5 mb-0">
            <div class="p-2 flex-grow-1">
                <h4>Berita Desa Tambong</h4>
            </div>
            <a href="{{ route('berita-desa') }}" style="text-decoration: none;">
                <div class="p-2"><p style="color:cadetblue">Selengkapnya..</p></div>
            </a>
        </div>
        <div>
        <hr style="height:5px;background:#d3ea3e;border:2px double #ffffff; margin-top:-5px;">
        </div>
        @forelse ($berita as $row)
        <div class="col-md-4 mt-2">
            <div class="card">
                <a href="{{ route('detail-berita', $row->slug) }}">
                    <img src=" {{ asset('uploads/' . $row->gambar_berita ) }} " class="card-img-top" height="250" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('detail-berita', $row->slug) }}" style="text-decoration: none; color: black;">{{ $row ->judul }}</a>
                    </h5>
                    <p class="card-text">{!! Str::limit($row->deskripsi, 100) !!}</p>
                </div>
                <div class="card-footer" style="background-color: rgb(255, 255, 255);">
                    <a href="#" class="badge bg-warning" style="text-decoration: none; margin-bottom: 5px;"><i class="bi bi-tag"></i>  {{ $row->kategori_berita->nama_kategori}}</a>
                    <span class="badge bg-success"><i class="bi bi-person-lines-fill"></i>
                        {{ $row->users->name }}
                    </span>
                    <span class="badge bg-primary"><i class="bi bi-eye-fill"></i></i>
                        {{ $row->views }}
                   </span>
                    <span class="badge bg-secondary"><i class="bi bi-calendar-check"></i>
                         {{ $row->created_at}}
                    </span>
                </div>
            </div>
        </div>
        @empty
            <p>Data Masih Kosong</p>
        @endforelse
    </div>
  </div>

  <!-- Produk -->
  {{-- <div class="container-fluid">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi quia velit reiciendis dignissimos quas eaque assumenda harum quam temporibus quisquam.</p>
  </div> --}}

  <!-- Tentang Desa -->
  {{-- <div class="container-fluid">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi quia velit reiciendis dignissimos quas eaque assumenda harum quam temporibus quisquam.</p>
  </div> --}}

  <!-- footer -->
  <br><br><br><br><br>
  @include('Template.footer')

</body>

</html>
