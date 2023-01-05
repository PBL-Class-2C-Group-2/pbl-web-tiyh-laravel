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
                    <h1 class="h3 mb-2 text-gray-800">PRODUK DESA TAMBONG</h1>
                    <p class="mb-4">Produk-produk Desa Tambong</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{route('produk.create')}}" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Slug</th>
                                            <th>Toko</th>
                                            <th>Kategori Produk</th>
                                            <th>Foto Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- isi tabel -->
                                    <tbody>
                                        @forelse($produk as $index => $object)
                                        <tr class="text-center">
                                            <td>{{ $index + $produk->firstItem() }}</td>
                                            <td>{{ $object -> nama_produk }}</td>
                                            <td>{{ $object -> slug }}</td>
                                            <td>{{ $object -> toko -> nama_toko}}</td>
                                            <td>{{ $object -> kategori_produk -> nama_kategori }}</td>
                                            <td><img src=" {{ asset('uploads/' . $object->foto) }} " width="100"></td>
                                            <td>
                                                <!-- Update Button -->
                                                <a href="{{route('produk.edit', $object->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <!-- Delete Button -->
                                                <form action="{{route('produk.destroy', $object->id)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data Masih Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    {{ $produk->links('pagination::bootstrap-5') }}
                                </div>
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
