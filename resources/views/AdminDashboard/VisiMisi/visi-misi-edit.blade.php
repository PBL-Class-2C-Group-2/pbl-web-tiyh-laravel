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
                            <h3 style="color:white;">Form Ubah Visi Misi</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('visi-misi.update', $visimisi->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="visi">Visi</label>
                                    <textarea name="visi" id="editor1" class="form-control">{!! $visimisi->visi !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="misi">Misi</label>
                                    <textarea name="misi" id="editor2" rows="5" class="form-control">{!! $visimisi->misi !!}</textarea>
                                </div>
                                <div class="form-group mt-2">
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
