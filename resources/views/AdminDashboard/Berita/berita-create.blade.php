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
                            <h3 style="color:white;">Form Tambah Berita</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('berita.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Judul Berita</label>
                                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukan Judul">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="editor1" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_berita_id">Kategori Berita</label>
                                    <select aria-label="kategori_berita_id" name="kategori_berita_id" class="form-control">
                                        <option selected>Pilih Kategori</option>
                                        @foreach ($kategoriberita as $row)
                                        <option value="{{ $row->id}}">{{ $row->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_berita">Gambar Berita</label>
                                    <input type="file" name="gambar_berita" id="gambar_berita" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="aktivasi">Aktivasi</label>
                                    <select id="aktivasi" name="aktivasi" class="form-control">
                                        <option selected>Pilih Aktivasi Berita</option>
                                        <option value="1">Publikasi</option>
                                        <option value="0">Draf</option>
                                    </select>
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
