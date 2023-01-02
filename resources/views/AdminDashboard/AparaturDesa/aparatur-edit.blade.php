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
                            <h3 style="color:white;">Form Ubah Aparatur Desa</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route('aparatur.update', $aparatur->id )}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" value="{{ $aparatur-> nama}}">
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
                                        <option value="KEPALA DESA" {{ $aparatur->jabatan == 'KEPALA DESA' ? 'selected' : '' }}>KEPALA DESA</option>
                                        <option value="BPD" {{ $aparatur->jabatan == 'BPD' ? 'selected' : '' }}>BPD</option>
                                        <option value="SEKDES" {{ $aparatur->jabatan == 'SEKDES' ? 'selected' : '' }}>SEKDES</option>
                                        <option value="KAUR PEMERINTAHAN" {{ $aparatur->jabatan == 'KAUR PEMERINTAHAN' ? 'selected' : '' }}>KAUR PEMERINTAHAN</option>
                                        <option value="KAUR UMUM" {{ $aparatur->jabatan == 'KAUR UMUM' ? 'selected' : '' }}>KAUR UMUM</option>
                                        <option value="KAUR KEUANGAN" {{ $aparatur->jabatan == 'KAUR KEUANGAN' ? 'selected' : '' }}>KAUR KEUANGAN</option>
                                        <option value="KAUR PEMBANGUNAN" {{ $aparatur->jabatan == 'KAUR PEMBANGUNAN' ? 'selected' : '' }}>KAUR PEMBANGUNAN</option>
                                        <option value="KAUR KEAMANAN DAN KETERTIBAN" {{ $aparatur->jabatan == 'KAUR KEAMANAN DAN KETERTIBAN' ? 'selected' : '' }}>KAUR KEAMANAN DAN KETERTIBAN</option>
                                        <option value="KAUR PENGEMBANGAN" {{ $aparatur->jabatan == 'KAUR PENGEMBANGAN' ? 'selected' : '' }}>KAUR PENGEMBANGAN</option>
                                        <option value="KAUR KERSA" {{ $aparatur->jabatan == 'KAUR KERSA' ? 'selected' : '' }}>KAUR KERSA</option>
                                        <option value="KADUS" {{ $aparatur->jabatan == 'KADUS' ? 'selected' : '' }}>KADUS</option>
                                        <option value="MASYARAKAT" {{ $aparatur->jabatan == 'MASYARAKAT' ? 'selected' : '' }}>MASYARAKAT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control">
                                    <br><label for="">Gambar Saat Ini : </label><br>
                                    <img src=" {{ asset('uploads/' . $aparatur->foto) }} " width="150">
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
