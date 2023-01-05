@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="text-center text-black-60" style="margin-top: 100px">
            <h2>Galeri Desa Tambong</h2>
            <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
        </div>
        @forelse ($galeri as $item)
            <div class="col-6">
                <div class="card mb-3">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('uploads/' . $item->foto_galeri) }}" class="w-100 rounded" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <h5 class="card-title">Keterangan</h5>
                        <p class="card-text">{!! $item->keterangan !!}</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-center">Data Masih Kosong</p>
            @endforelse
    </div>
    <br><br><br><br><br>

@endsection

