<!-- corousel -->
<div class="container-fluid">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel"  style="margin-top: 90px;">
        <div class="carousel-inner">
            @php $i = 1; @endphp
            @foreach ($slide as $row)
                <div class="carousel-item {{ $i == '1' ? 'active':'' }}" data-bs-interval="5000">
                    @php $i++; @endphp
                    @if ($row->gambar_slide)
                    <img src="{{ asset('uploads/' . $row->gambar_slide) }}" class="d-block w-100" height="600" alt="...">
                    @else
                    <img src="{{ asset('Photo/slider.JPG') }}" class="d-block w-100" height="500" alt="...">
                    @endif
                </div>
            @endforeach

            {{-- <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('../Photo/DesaTambong.png') }}" class="d-block w-100" width="800" height="500" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{ asset('../Photo/DesaTambong.png') }}" class="d-block w-100" width="800" height="500" alt="...">
            </div> --}}
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
