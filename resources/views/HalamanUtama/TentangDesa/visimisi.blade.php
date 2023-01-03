@extends('layouts.master')

@section('content')
    <div class="div">
        <div class="text-center text-black-60" style="margin-top: 100px">
            <h2>Visi Misi Desa Tambong</h2>
            <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
        </div>
        @forelse ($visimisi as $item)
        <div class="card mb-3">
            <div class="card-body">
              <h3 class="card-title text-center">Visi</h3><hr>
              <p class="card-text">{!! $item->visi !!}</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
              <h3 class="card-title text-center">Misi</h5><hr>
              <p class="card-text">{!! $item->misi !!}</p>
            </div>
        </div>
        @empty
            <div class="mt-2">
                Data Kosong
            </div>
        @endforelse
    </div>

@endsection
