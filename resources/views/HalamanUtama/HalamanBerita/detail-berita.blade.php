@extends('layouts.detailberita')

@section('content')
        <div class="row">
            <div class="col-lg-8" style="margin-top: 90px; background-color:rgb(246, 246, 234);">
                <div class="div mt-2">
                    <img src="{{ asset('uploads/' . $berita->gambar_berita ) }}" alt="" srcset="" class="img-fluid">
                </div>
                <div class="detail-content mt-2 p-2">
                    <div class="detail-badge" style="margin-bottom: 5px;">
                        <a href="#" class="badge bg-warning" style="text-decoration: none;"><i class="bi bi-tag"></i>  {{ $berita->kategori_berita->nama_kategori}}</a>
                        <span class="badge bg-success"><i class="bi bi-person-lines-fill"></i>
                            {{ $berita->users->name }}
                        </span>
                        <span class="badge bg-primary"><i class="bi bi-eye-fill"></i></i>
                            {{ $berita->views }}
                        </span>
                        <span class="badge bg-secondary"><i class="bi bi-calendar-check"></i>
                             {{ $berita->created_at}}
                        </span>
                    </div>
                    {{-- Judul Berita --}}
                    <h2>{{ $berita->judul }}</h2>
                    {{-- Deskrpsi Berita --}}
                    <div class="detail-body">
                        <p>
                            {!! $berita->deskripsi !!}
                        </p>
                    </div>
                </div>
            </div>
            {{-- Sidebar --}}
            <div class="col-lg-4" style="margin-top: 90px; background-color:rgb(245, 245, 245);">
                {{-- Tanggal dan Jam --}}
                <div class="detail-sidebar-clock">
                    <div class="content_right">
                        <div style="margin:3px 0 3px 0; background:#d3ea3e; border:5px double #ffffff; width:auto;" align="center;">
                            <h4 class="text-center mt-2" id="tanggalwaktu"></h4>
                            <p id="clock" class="text-center"></p>
                            {{-- <p class="mt-2 p-2" style="text-center">Tanggal : <span id="tanggalwaktu"></span></p> --}}
                            <script>
                            var tw = new Date();
                            if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
                            else (a=tw.getTime());
                            tw.setTime(a);
                            var tahun= tw.getFullYear ();
                            var hari= tw.getDay ();
                            var bulan= tw.getMonth ();
                            var tanggal= tw.getDate ();
                            var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
                            var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
                            document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
                            </script>
                            <script type="text/javascript">
                                <!--
                                function showTime() {
                                    var a_p = "";
                                    var today = new Date();
                                    var curr_hour = today.getHours();
                                    var curr_minute = today.getMinutes();
                                    var curr_second = today.getSeconds();
                                    if (curr_hour < 12) {
                                        a_p = "AM";
                                    } else {
                                        a_p = "PM";
                                    }
                                    if (curr_hour == 0) {
                                        curr_hour = 12;
                                    }
                                    if (curr_hour > 12) {
                                        curr_hour = curr_hour - 12;
                                    }
                                    curr_hour = checkTime(curr_hour);
                                    curr_minute = checkTime(curr_minute);
                                    curr_second = checkTime(curr_second);
                                 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                                    }

                                function checkTime(i) {
                                    if (i < 10) {
                                        i = "0" + i;
                                    }
                                    return i;
                                }
                                setInterval(showTime, 500);
                                //-->
                                </script>
                        </div>
                </div>
                {{-- Kategori Berita --}}
                <div class="detail-sidebar-kategori">
                    <h4 class="mt-5">&nbsp;<i class="bi bi-tags-fill"></i>&nbsp;Kategori Berita</h4>
                    <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
                    @foreach ($kategoriberita as $item)
                    <div class="sidebar-kategori d-flex justify-content-between">
                        <a href="{{ route('berita.kategori', $item->slug) }}" style="text-decoration: none;">
                            <p>&nbsp;<i class="bi bi-caret-right-fill"></i>&nbsp;{{ $item->nama_kategori }}</p>
                        </a>
                        <p class="ml-auto text-right"><span class="badge bg-dark">{{ $item->berita->count() }}</span></p>
                    </div>
                    @endforeach
                </div>
                {{-- Berita Terbaru --}}
                <div class="detail-berita-sidebar">
                    <h4 class="mt-5">&nbsp;<i class="bi bi-newspaper"></i>&nbsp;Berita Terbaru</h4>
                    <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
                    @foreach ($berita_terbaru as $item)
                    <a href="{{ route('detail-berita', $item->slug) }}" style="text-decoration: none; color: black;">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0">
                              <img src="{{ asset('uploads/' . $item->gambar_berita )}}" width="100" alt="...">
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <h6 class="mt-0">{{ $item->judul }}</h6>
                              <a href="#" class="badge bg-warning" style="text-decoration: none; margin-bottom: 5px;"><i class="bi bi-tag"></i>  {{ $item->kategori_berita->nama_kategori}}</a>
                                <span class="badge bg-success"><i class="bi bi-person-lines-fill"></i>
                                    {{ $item->users->name }}
                                </span>
                                <span class="badge bg-primary"><i class="bi bi-eye-fill"></i></i>
                                    {{ $item->views }}
                               </span>
                                <span class="badge bg-secondary"><i class="bi bi-calendar-check"></i>
                                    {{ $item->created_at}}
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                {{-- Aparatur Desa --}}
                <div class="sidebar-informasi">
                    <h4 class="mt-5">&nbsp;<i class="bi bi-person-fill"></i>&nbsp;Aparatur Desa</h4>
                    <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="background:#d3ea3e;border:4px double #ffffff;">
                        <div class="carousel-inner">
                            @php $i = 1; @endphp
                            @foreach ($aparatur as $item)
                                <div class="carousel-item {{ $i == '1' ? 'active':'' }}" data-bs-interval="5000">
                                @php $i++; @endphp
                                @if ($item->foto)
                                <img src="{{ asset('uploads/' . $item->foto)}}" class="d-block w-100 mt-2" alt="..." height="500">
                                @else
                                <img src="{{ asset('Photo/user foto.png')}}" class="d-block w-100 mt-2" alt="...">
                                @endif
                                  <div class="carousel-caption d-md-block border border-light bg-success">
                                    <h5>{{ $item ->nama }}</h5>
                                    <p>{{ $item ->jabatan }}</p>
                                  </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                {{-- Galeri Desa --}}
                <div class="sidebare-galery">
                    <div class="sidebar-informasi">
                        <h4 class="mt-5">&nbsp;<i class="bi bi-archive-fill"></i>&nbsp;Galeri Desa</h4>
                        <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
                        <div id="carouselExampleInterval2" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @php $i = 1; @endphp
                                @foreach ($galeri as $item)
                                    <div class="carousel-item {{ $i == '1' ? 'active':'' }}" data-bs-interval="5000">
                                    @php $i++; @endphp
                                    @if ($item->foto_galeri)
                                    <img src="{{ asset('uploads/' . $item->foto_galeri)}}" class="d-block w-100 mt-2" alt="..." height="300">
                                    @else
                                    <img src="{{ asset('Photo/slider.JPG')}}" class="d-block w-100 mt-2" alt="...">
                                    @endif
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval2" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>
                </div>
                {{-- Batasan --}}
                <div class="mb-5"></div>

            </div>
        </div>
@endsection
