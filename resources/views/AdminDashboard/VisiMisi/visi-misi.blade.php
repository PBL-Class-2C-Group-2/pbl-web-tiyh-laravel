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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">VISI MISI</h1>
                    <p class="mb-4">Visi Misi Desa Tambong</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- isi tabel -->
                                    <tbody>
                                        @forelse($visimisi as $object)
                                        <tr>
                                            <td>{!! $object->visi !!}</td>
                                            <td>{!! $object->misi !!}</td>
                                            <td>
                                                <!-- Update Button -->
                                                <a href="{{route('visi-misi.edit', $object->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Masih Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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

    <!-- alert -->
    @include('sweetalert::alert')

</body>

</html>

