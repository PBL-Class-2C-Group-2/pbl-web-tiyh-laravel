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
                            <h3 style="color:white;">Form Tambah Toko/Lapak Desa</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('toko.update', $toko->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Nama Toko/Lapak</label>
                                    <input type="text" id="nama_toko" name="nama_toko" class="form-control" placeholder="Masukan Nama Toko/Lapak" value="{{ $toko->nama_toko }}">
                                </div>
                                <div class="form-group">
                                    <label for="">No Telp <span class="text-dark">(*contoh pengisian: 6281234567890)</span></label>
                                    <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Masukan Nomor Telephone" value="{{ $toko->no_telp }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="alamat" rows="5" class="form-control">{{ $toko->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Toko</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                    <br><label for="">Gambar Saat Ini : </label><br>
                                    <img src=" {{ asset('uploads/' . $toko->foto) }} " width="150">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Simpan Data</button>
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
