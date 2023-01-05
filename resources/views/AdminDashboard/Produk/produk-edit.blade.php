<!DOCTYPE html>
<html lang="en">

<head>
@include('AdminDashboard.Template2.header')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('AdminDashboard.Template2.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('AdminDashboard.Template2.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card card-info card-outline">
                        <div class="card-header bg-success">
                        <h3 style="color:white;">Perbarui Produk</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Masukan Nama Produk" value="{{ $produk->nama_produk }}">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Produk <span>(*contoh : Rp. 10.000)</span></label>
                                    <input type="text" id="harga" name="harga" class="form-control" placeholder="Masukan Harga Produk" value="{{ $produk->harga }}">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="editor1" class="form-control">{{  $produk->deskripsi  }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="toko_id">Toko</label>
                                    <select aria-label="toko_id" name="toko_id" class="form-control">
                                        <option selected>Pilih Toko</option>
                                        @foreach ($toko as $row)
                                        @if ($row->id == $produk->toko_id)
                                        <option value="{{ $row->id}}" selected='selected'>{{ $row->nama_toko}}</option>
                                        @else
                                        <option value="{{ $row->id}}">{{ $row->nama_toko}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_produk_id">Kategori Produk</label>
                                    <select aria-label="kategori_produk_id" name="kategori_produk_id" class="form-control">
                                        <option selected>Pilih Kategori</option>
                                        @foreach ($kategori as $row)
                                        @if ($row->id == $produk->kategori_produk_id)
                                        <option value="{{ $row->id}}" selected='selected'>{{ $row->nama_kategori}}</option>
                                        @else
                                        <option value="{{ $row->id}}">{{ $row->nama_kategori}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="aktivasi">Aktivasi</label>
                                    <select id="aktivasi" name="aktivasi" class="form-control">
                                        <option selected>Pilih Aktivasi Produk</option>
                                        <option value="1" {{ $produk->aktivasi == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $produk->aktivasi == '0' ? 'selected' : '' }}>Non-Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Produk</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                    <br><label for="">Gambar Saat Ini : </label><br>
                                    <img src=" {{ asset('uploads/' . $produk->foto) }} " width="150">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Simpan Data</button>
                                    <button type="reset" class="btn btn-danger">Reset Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- footer and js -->
            @include('AdminDashboard.Template2.footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- script -->
    @include('AdminDashboard.Template2.script')

</body>

</html>
