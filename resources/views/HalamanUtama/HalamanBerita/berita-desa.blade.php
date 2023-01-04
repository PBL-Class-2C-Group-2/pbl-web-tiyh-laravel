@extends('layouts.beritalayout')

@section('content')
        <div class="row">
            <div class="mt-5 text-center text-black-60">
                <h2>Berita Desa Tambong</h2>
                <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
            </div>
            @forelse ($berita as $row)
            <div class="col-md-4 mt-4">
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
@endsection
