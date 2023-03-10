@extends('layouts.detailberita')

@section('content')
        <div class="row">
            <div class="col-lg-8" style="margin-top: 90px; background-color:rgb(246, 246, 234);">
                <div class="row">
                    <div class="col-md-6">
                        <div class="div mt-2">
                            <img src="{{ asset('uploads/' . $produk->foto ) }}" alt="" class="w-100 rounded">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-content mt-2 p-2">
                            {{-- Judul Berita --}}
                            <h2>{{ $produk->nama_produk }}</h2>
                            <div class="detail-badge" style="margin-bottom: 5px;">
                                <a href="{{ route('produk-kategori', $produk->kategori_produk->slug) }}" class="badge bg-warning" style="text-decoration: none;"><i class="bi bi-tag"></i>  {{ $produk->kategori_produk->nama_kategori}}</a>
                                <span class="badge bg-primary"><i class="bi bi-eye-fill"></i></i>
                                    {{ $produk->views }}
                                </span>
                            </div>
                            <h1 class="mt-3 mb-4">{{ $produk->harga }}</h1>
                            <div class="mt-3 mb-4 mx-auto">
                                <a href="https://wa.me/{{ $produk->toko->no_telp }}?file={{ asset('uploads/' . $produk->foto) }}&text=Hai%20Saya%20...%0ASaya%20Lihat%20Produk%20Anda%20Di%20Aplikasi%20Tambong%20In%20Your%20Hand%0ASaya%20Mau%20Pesan%20Sesuatu" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Whatsapp' type="button" class="btn btn-success btn-lg"><i class="bi bi-whatsapp"></i>
                                    &ensp;Pesan Sekarang
                                </a>
                            </div>
                            {{-- Deskrpsi Berita --}}
                            <div class="detail-body">
                                <hr><h6>Deskripsi Produk</h6><hr>
                                <p>
                                    {!! $produk->deskripsi !!}
                                </p>
                            </div>
                            <hr class="mt-5">
                            <div class="detail-toko">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{ asset('uploads/' . $produk->toko->foto ) }}" alt="" width="50" height="50" class="img-fluid">
                                    </div>
                                    <div class="col-md-10">
                                        <a href="" style="text-decoration: none; color:black">
                                            <h5>{{ $produk->toko->nama_toko }}</h5>
                                        </a>
                                        <p>Alamat &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  {{ $produk->toko->alamat }}</p>
                                        <p style="margin-top: -12px;">No Telephone : {{ $produk->toko->no_telp }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
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
                {{-- Kategori Produk --}}
                <div class="detail-sidebar-kategori">
                    <h4 class="mt-5">&nbsp;<i class="bi bi-tags-fill"></i>&nbsp;Kategori Produk</h4>
                    <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
                    @foreach ($kategori as $item)
                    <div class="sidebar-kategori d-flex justify-content-between">
                        <a href="{{ route('produk-kategori', $item->slug) }}" style="text-decoration: none;">
                            <p>&nbsp;<i class="bi bi-caret-right-fill"></i>&nbsp;{{ $item->nama_kategori }}</p>
                        </a>
                        <p class="ml-auto text-right"><span class="badge bg-dark">{{ $item->produk->count() }}</span></p>
                    </div>
                    @endforeach
                </div>
                {{-- Produk Terbaru --}}
                <div class="detail-berita-sidebar">
                    <h4 class="mt-5">&nbsp;<i class="bi bi-newspaper"></i>&nbsp;Produk Terbaru</h4>
                    <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
                    @foreach ($produk_terbaru as $item)
                    <a href="{{ route('detail-produk', $item->slug) }}" style="text-decoration: none; color: black;">
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0">
                              <img src="{{ asset('uploads/' . $item->foto )}}" width="100" alt="...">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <a href="{{ route('produk-kategori', $item->kategori_produk->slug) }}" class="badge bg-warning" style="text-decoration: none; margin-bottom: 5px;"><i class="bi bi-tag"></i>  {{ $item->kategori_produk->nama_kategori}}</a>
                                <a href="{{ route('toko-desa', $item->toko->slug) }}" class="badge bg-success" style="text-decoration: none; margin-bottom: 5px;"><i class="bi bi-shop"></i> {{ $item->toko->nama_toko}}</a>
                                <span class="badge bg-primary"><i class="bi bi-eye-fill"></i></i>
                                    {{ $item->views }}
                                </span>
                                <h5 class="mt-0">{{ $item->nama_produk }}</h5>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                {{-- Batasan --}}
                <div class="mb-5"></div>

            </div>
        </div>
@endsection
