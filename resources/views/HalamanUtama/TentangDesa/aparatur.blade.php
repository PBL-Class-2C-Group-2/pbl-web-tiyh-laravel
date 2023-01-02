@extends('layouts.aparaturlayout')

@section('content')
    <div class="row">
        <div class="text-center text-black-60" style="margin-top: 100px">
            <h2>Aparatur Desa Tambong</h2>
            <hr style="height:10px;background:#d3ea3e;border:4px double #ffffff;">
        </div>
        @forelse ($aparatur as $item)
        <div class="col-md-3 mt-2 mb-4">
            <div class="card mt-50" style="width: 18rem;">
                <img src="{{ asset('uploads/' . $item->foto ) }}" class="card-img-top   " alt="...">
                <div class="card-body">
                <h5 class="card-text mt-3 text-center text-dark">{{ $item->nama}}</h5>
                <h6 class="card-text mt-2 text-center">Jabatan</h6>
                <p class="card-text text-center">{{ $item->jabatan}}</p>
                <h6 class="card-text mt-1 text-center">Masa Jabatan</h6>
                <p class="card-text text-center">{{ $item->masa_jabatan}}</p>
                </div>
              </div>
        </div>
        @empty
            <p>Data Masih Kosong</p>
        @endforelse


    </div>

@endsection
