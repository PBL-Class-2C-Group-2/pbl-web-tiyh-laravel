<!DOCTYPE html>
<html lang="en">
<head>
@include('Template.head')
</head>
<body>

@include('Template.navbar')

<!-- Halaman Mulai dari sini -->
@include('Template.slider')
    <!-- Berita Desa -->
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- footer -->
    @include('Template.footer')
    @include('Template.js')

</body>

</html>
