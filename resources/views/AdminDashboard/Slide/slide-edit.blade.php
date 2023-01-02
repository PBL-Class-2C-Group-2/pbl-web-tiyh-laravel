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
                            <h3 style="color:white;">Form Ubah Slide Banner</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('slide.update', $slide->id ) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="judul_slide">Judul Slide Banner</label>
                                    <input type="text" id="judul_slide" name="judul_slide" class="form-control" value="{{ $slide->judul_slide }}">
                                </div>
                                <div class="form-group">
                                    <label for="link">Link Slide</label>
                                    <input type="text" name="link" id="link" class="form-control" value="{{ $slide->link }}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option selected>Pilih Status Slide</option>
                                        <option value="1" {{ $slide->status == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $slide->status == '0' ? 'selected' : '' }}>Draf</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_slide">Gambar Slide</label>
                                    <input type="file" name="gambar_slide" id="gambar_slide" class="form-control">
                                    <br><label for="">Gambar Saat Ini : </label><br>
                                    <img src=" {{ asset('uploads/' . $slide->gambar_slide) }} " width="150">
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
