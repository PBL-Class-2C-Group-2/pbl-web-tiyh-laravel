@extends('layouts.kategori')

@section('content')
        <div class="row">
            <div class="col-md-8" style="margin-top: 90px; background-color:rgb(246, 246, 234);">
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <img src="{{ asset('uploads/' . $toko->foto ) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-2">
                        <h1>{{ $toko->nama_toko }}</h1>
                        <p>Alamat &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:  {{ $toko->alamat }}</p>
                        <p style="margin-top: -12px;">No Telephone : {{ $toko->no_telp }}</p>
                        <div class="mt-3 mb-4 mx-auto">
                            <a href="https://wa.me/{{ $toko->no_telp }}?text=Hai%2C%20saya%20melihat%20toko%20anda%20di%20App%20Tambong%20In%20Your%20Hand%0ASaya%20tertarik%20untuk%20membeli%20produk%20anda" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Whatsapp' type="button" class="btn btn-success btn-lg"><i class="bi bi-whatsapp"></i>
                                &ensp;Hubungi Toko
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-5 text-black-60">
                        <h2>Produk</h2>
                        <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
                    </div>
                    @forelse ($produk as $row)
                        <div class="col-md-4 mt-2 mb-2">
                            <div class="card">
                                <a href="{{ route('detail-produk', $row->slug) }}">
                                    <img src=" {{ asset('uploads/' . $row->foto ) }} " class="card-img-top" height="250" alt="...">
                                </a>
                                <div class="card-body">
                                    <p class="card-title mt-2">
                                        <a href="{{ route('detail-produk', $row->slug) }}" style="text-decoration: none; color: black;">{{ $row ->nama_produk }}</a>
                                    </p>
                                    <h3 class="card-text">{{ $row->harga }}</h3>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p>Data Masih Kosong</p>
                        @endforelse
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
