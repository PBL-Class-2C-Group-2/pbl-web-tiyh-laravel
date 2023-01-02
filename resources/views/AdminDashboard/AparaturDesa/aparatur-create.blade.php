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
                            <h3 style="color:white;">Form Tambah Aparatur Desa</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('aparatur.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="masa_jabatan">Masa Jabatan</label>
                                    <div class="input-group">
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" placeholder="mm/dd/yyyy" data-provide="datepicker" name="mulai" id="mulai">
                                        </div>
                                        <div class="col-sm-2">
                                            <p>Sampai Dengan</p>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" placeholder="mm/dd/yyyy" data-provide="datepicker" name="selesai" id="selesai">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select id="jabatan" name="jabatan" class="custom-select">
                                        <option selected disabled="disable">Pilih Jabatan</option>
                                        <option value="KEPALA DESA">KEPALA DESA</option>
                                        <option value="BPD">BPD</option>
                                        <option value="SEKDES">SEKDES</option>
                                        <option value="KAUR PEMERINTAHAN">KAUR PEMERINTAHAN</option>
                                        <option value="KAUR UMUM">KAUR UMUM</option>
                                        <option value="KAUR KEUANGAN">KAUR KEUANGAN</option>
                                        <option value="KAUR PEMBANGUNAN">KAUR PEMBANGUNAN</option>
                                        <option value="KAUR KEAMANAN DAN KETERTIBAN">KAUR KEAMANAN DAN KETERTIBAN</option>
                                        <option value="KAUR PENGEMBANGAN">KAUR PENGEMBANGAN</option>
                                        <option value="KAUR KERSA">KAUR KERSA</option>
                                        <option value="KADUS">KADUS</option>
                                        <option value="MASYARAKAT">MASYARAKAT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
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
