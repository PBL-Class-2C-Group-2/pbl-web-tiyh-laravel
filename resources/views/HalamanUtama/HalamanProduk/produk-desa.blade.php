@extends('layouts.master')

<!-- corousel -->
<div class="container-fluid">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel"  style="margin-top: 100px;">
    <div class="carousel-inner">
        @php $i = 1; @endphp
        @foreach ($produk as $row)
            <div class="carousel-item {{ $i == '1' ? 'active':'' }}" data-bs-interval="5000">
                <a href="{{ route('detail-produk', $row->slug) }}">
                    @php $i++; @endphp
                    @if ($row->foto)
                    <img src="{{ asset('uploads/' . $row->foto) }}" class="d-block w-100" height="600" alt="...">
                    @else
                    <img src="{{ asset('Photo/slider.JPG') }}" class="d-block w-100" height="500" alt="...">
                    @endif
                </a>
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

@section('content')
<div class="row">
    {{-- Kategori Produk --}}
    <div class="d-flex mt-5">
        <div class="p-2 flex-grow-1">
            <h4>Kategori Produk Desa Tambong</h4>
            <hr style="height:5px;background:#d3ea3e;border:2px double #ffffff; margin-top:5px; margin-bottom:-50px;">
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @forelse ($kategori as $item)
        <div class="col-md-2">
            <div class="card">
                <a href="{{ route('produk-kategori', $item->slug) }}" style="text-decoration: none; color:black;">
                    <img src="{{ asset('uploads/' . $item->gambar) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title text-center">{{ $item->nama_kategori }}</h5>
                    </div>
                </a>
            </div>
        </div>
        @empty
            <p>Data Kosong</p>
        @endforelse
    </div>
</div>

{{-- Tampil Produk --}}
<div class="row">
    <div class="mt-5 text-black-60">
        <h2>Produk Desa Tambong</h2>
        <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
    </div>
    @forelse ($produk as $row)
        <div class="col-md-4 mt-2 mb-2">
            <div class="card">
                <a href="{{ route('detail-produk', $row->slug) }}">
                    <img src=" {{ asset('uploads/' . $row->foto ) }} " class="card-img-top" height="250" alt="...">
                </a>
                <div class="card-body">
                    <a href="{{ route('produk-kategori', $row->kategori_produk->slug) }}" class="badge bg-warning" style="text-decoration: none; margin-bottom: 5px;"><i class="bi bi-tag"></i> {{ $row->kategori_produk->nama_kategori }}</a>
                    <a href="{{ route('toko-desa', $row->toko->slug) }}" class="badge bg-success" style="text-decoration: none; margin-bottom: 5px;"><i class="bi bi-shop"></i> {{ $row->toko->nama_toko}}</a>
                    <span class="badge bg-primary"><i class="bi bi-eye-fill"></i></i>
                        {{ $row->views }}
                   </span>
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




<br><br><br><br><br>
@endsection
