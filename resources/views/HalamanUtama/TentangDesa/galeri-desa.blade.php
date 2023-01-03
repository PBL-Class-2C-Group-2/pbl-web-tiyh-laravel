@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="text-center text-black-60" style="margin-top: 100px">
            <h2>Galeri Desa Tambong</h2>
            <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
        </div>
        @forelse ($galeri as $item)
        <div class="col-md-6 p-2 border">
            <div class="d-flex">
                <div class="flex-shrink-0">
                  <img src="{{ asset('uploads/' . $item->foto_galeri) }}" alt="..." width="250" height="200">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h4>Keterangan</h4><hr>
                    <p>{!! $item->keterangan !!}</p>
                </div>
              </div>
        </div>
        @empty
            <p class="text-center">Data Masih Kosong</p>
        @endforelse
    </div>

@endsection
