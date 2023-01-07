-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2023 pada 07.21
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbl-web-kel2-2c`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aparatur_desa`
--

CREATE TABLE `aparatur_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aparatur_desa`
--

INSERT INTO `aparatur_desa` (`id`, `nama`, `masa_jabatan`, `foto`, `jabatan`, `created_at`, `updated_at`) VALUES
(3, 'Agus Hermawan, S.Sos.', '2021-05-16 sd 2026-05-16', 'aparatur/AClgSo9SO9kJB24QGVYGNkCRKfXOagOtHXSDyPq1.png', 'KEPALA DESA', '2022-12-30 01:16:21', '2022-12-30 02:07:13'),
(4, 'Mustahiq S.Adm', '2021-05-15 sd 2026-05-16', 'aparatur/ida6xjP8EcaFverYi1W9ARK3Ww1Fnt7b067aXrdH.png', 'SEKDES', '2022-12-30 01:32:21', '2022-12-30 01:32:21'),
(5, 'Syafruddin', '2021-05-16 sd 2021-05-16', 'aparatur/WzfBf8Dgx9jcoULJ1NmLSM39ULR8RdeFrIRYkxyD.png', 'KAUR PEMERINTAHAN', '2022-12-30 01:39:44', '2022-12-30 01:39:44'),
(6, 'Supardi Rustam', '2021-05-16 sd 2026-05-16', 'aparatur/vlHHyAYa5oLTr0ZhGCAPahcSmSwz3T4LimoW2eFj.png', 'KAUR UMUM', '2022-12-30 01:46:32', '2022-12-30 01:46:32'),
(7, 'Mardiana', '2021-05-16 sd 2026-05-16', 'aparatur/exKF2epJJ3CXd2E46YJOo5NrNroTCzmCKiFYwPxr.png', 'KAUR KEUANGAN', '2022-12-30 01:47:17', '2022-12-30 01:47:17'),
(8, 'Syafi-i. SE', '2021-05-16 sd 2026-05-16', 'aparatur/X6eIB0hYUGMLTUKG2pp4Pz757fgDMe9fQhh9c8xo.png', 'KAUR PEMBANGUNAN', '2022-12-30 01:48:06', '2022-12-30 01:48:06'),
(9, 'Mahrup', '2021-05-16 sd 2026-05-16', 'aparatur/57PzC2gzUh4Vfyb7oDADYCoByqLcffYcGxjdL7RO.png', 'KAUR KEAMANAN DAN KETERTIBAN', '2022-12-30 01:48:52', '2022-12-30 01:48:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_berita_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gambar_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivasi` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `deskripsi`, `kategori_berita_id`, `user_id`, `gambar_berita`, `aktivasi`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Desa Tambong', 'desa-tambong', '<p>Sejarah Desa Tambong sangatlah luar biasa mulai awal berdirinya yg lalu, wah pokok</p>', 3, 2, 'berita/NBlpoeRkS0oMt6SNkEO8astY8a21sPjxZB1lXjWW.webp', 1, 9, '2022-12-25 19:53:21', '2023-01-04 21:19:53'),
(4, 'Aneka Ragam Kuliner Desa Tambong', 'aneka-ragam-kuliner-desa-tambong', '<p>Desa tambong memiliki berbagai kuliner yang sangat menarik salah satunya pelasan</p>', 2, 2, 'berita/2UQyWXKW6QRYISikKarxuD2fs78Iy9QF9Z5v4NKO.png', 1, 15, '2022-12-25 15:45:10', '2022-12-31 17:12:22'),
(6, 'Pertanian Desa Tambong', 'pertanian-desa-tambong', '<p>Sektor Pertanian Desa Tambong cukup baik saat ini</p>', 4, 2, 'berita/y1v7yXCT0cjkdCgMvLBZNSlBVQcEuIzvVsm9llDI.webp', 1, 2, '2022-12-29 10:35:49', '2023-01-04 12:44:01'),
(7, 'Penyerahan insentif Kepala Desa kepada beberapa lembaga desa', 'penyerahan-insentif-kepala-desa-kepada-beberapa-lembaga-desa', '<p>Kepala Desa Tambong, Bapak Agus Hermawan, S.Sos telah menyerahkan dana insentif kepada beberapa lembaga diantaranya RT dan RW, PKK, serta Linmas di Pendopo Kantor Desa Tambong pada Selasa (4/10).<br />\r\n<br />\r\nLembaga tersebut di atas merupakan garda terdepan dalam melayani masyarakat, kinerja terbaik yang telah mereka berikan untuk masyarakat patut diapresiasi. Dalam sambutanyya, Kades Tambong mengucapkan terima kasih kepada seluruh komponen lembaga yang telah melaksanakan tugas dengan baik dan penuh tanggung jawab untuk membantu terlaksananya kegiatan pemerintahan di Desa Tambong.<br />\r\n<br />\r\n&quot;Terima kasih kepada seluruh komponen lembaga, Bapak RT dan RW, Kader PKK, serta Linmas yang telah bekerja untuk masyarakat. Saya mengajak semuanya untuk lebih meningkatkan kinerja terbaik semuanya dalam melayani masyarakat. Dana insentif ini kami berikan dan merupakan ikhtiar serta stimulus untuk Bapak dan Ibu-ibu sekalian atas jerih payah kerja nyata yang telah dilaksanakan. Jalan kita masih panjang dan pelayanan harus terus ditingkatkan.&quot;</p>', 1, 2, 'berita/k6Ez9TzQoyP4s4dPzlORzmZTQv9b4bvsg89MsBzF.png', 1, 15, '2022-12-29 23:09:30', '2023-01-02 12:02:51'),
(8, 'Sejarah Desa Tambong', 'sejarah-desa-tambong', '<p>Desa yang dipimpin Kepala Desa (Kades) Agus Hermawan, S Sos, ini memiliki catatan sejarah yang sangat penting. Selain merupakan salah satu desa tertua, yang sudah ada sejak era kejayaan kerajaan Blambangan. Desa Tambong juga saksi kisah heroik perang Puputan Bayu.</p>\r\n\r\n<p>Menurut tokoh pemuda pagiat sejarah Banyuwangi, Hidayat Aji Ramawidi, Babad Bayu menyebutkan bahwa Desa Tambong merupakan salah satu desa yang Bekel-nya ikut membantu Mas Rempeg dalam mengusir penjajahan VOC - Belanda tahun 1771-1772. Yakni Ki Rekso. Dia membantu Mas Rempeg dalam Perang Bayu I yang heroik itu.</p>\r\n\r\n<p>Dalam Kamus Bahasa Using Hasan Ali, Tambong adalah salah satu jenis Bambu. Yakni Bambu Tambong.</p>\r\n\r\n<p>&quot;Mungkin dahulu, saat pertama kali pemuka desa yang babat alas (babat hutan) di Tambong menemukan banyak bambu jenis tersebut,&quot; ucap Mas Aji, sapaan akrab Hidayat Aji Ramawidi, Sabtu (13/8/2022).</p>\r\n\r\n<p>Lalu siapakah sosok yang membabat hutan Desa Tambong?. Merujuk cerita rakyat, Desa Tambong dibuka oleh Ki Anggajaya. Dia adalah tokoh yang diduga telah babat alas Desa Tambong (Krajan) dan Dusun Kebonsari.</p>\r\n\r\n<p>Babad Tawangalun menuturkan bahwa Tawangalun yang waktu itu menjadi Pangeran Kedhawung kemudian mengalah kepada adiknya dan pindah ke Hutan Bayu. Setelah itu dia bertapa di Pangabekten. Setelah itu bertemu dengan Macan Putih dan kemudian mengantarkannya sampai hutan Sudimara.</p>\r\n\r\n<p>Selanjutnya bersama penduduk Bayu, Tanwangalun membangun kota baru di tempat tersebut. Pembangunan dilakukan selama lima tahun sepuluh bulan (antara tahun 1655-1661). Ibukota Blambangan kemudian dipindahkan ke Sudimara yang kelak dikenal sebagai Kutha Macan Putih.</p>\r\n\r\n<p>Penduduk dari Kuthadawung atau Kutha Kedhawung (di Paleran Umbulsari Jember), kemudian menyusul pindah ke Macan Putih. Semakin lama semakin banyak penduduk yang ikut pindah hingga mencapai lebih dari 2.000 jiwa.</p>\r\n\r\n<p>Lima tahun berdiri, sejumlah desa penyangga ikut terbentuk disekitar Kutharaja Macan Putih, Seperti Sratian (Sraten), Alihan (Aliyan), Gelintang (Gintangan). Juga muncul Kedhawung-kedhawng baru, seperti Kedhawung Sraten, Kedhawung Aliyan, Kedhawung Pondoknongko, dan lainnya antara tahun 1660-1665.</p>\r\n\r\n<p>&quot;Pengembangan Kutharaja ke arah utara dilakukan oleh tokoh bernama Ki Anggajaya, kemungkinan besar dia adalah salah satu pejabat di era tersebut yang mendapat tanah di sebelah utara sungai. Wilayah yang banyak ditumbuhi Bambu Tambong itu kemudian dikenal dengan Padukuhan Tambong,&quot; ungkap Mas Aji.</p>\r\n\r\n<p>Di Desa Tambong, lanjutnya, juga terdapat jejak sejarah bernama Taman Meru. Namanya mengingatkan kita pada nama tempat di-aben-nya jenazah Prabu Tawangalun pada tahun 1691.</p>\r\n\r\n<p>Karena masyarakat kita kental dengan nuansa feodalism, maka jelas sekali bahwa Ki Reksa, si Bekel Desa Tambong, adalah penerus Ki Anggajaya. Entah sebagai cucu atau buyutnya. Kalau bukan, sangat mustahil dia dapat menjadi Bekel di Desa Tambong. Desa yang dibuka oleh Ki Anggajaya, yang hidup era Susuhunan Prabu Tawangalun II.</p>\r\n\r\n<p>Dari data-data tersebut, dipastikan bahwa penduduk Desa Tambong memiliki peran penting dalam Perang Bayu. Sebuah perang penuh kisah heroik mempertahankan kemerdekaan Blambangan dari serbuan tentara penjajah kompeni Belanda.</p>\r\n\r\n<p>Tentang bagaimana nasib Ki Reksa, setelah perang Bayu, Mas Aji yang merupakan Ketua Komunitas Sejarah Blambangan Royal Volunteer (Bravo), tidak menemukan penjelasan kebih lanjut.</p>\r\n\r\n<p>Apakah dia gugur di medan laga, ataukah ikut tertangkap dan dibawa ke Teluk Pampang dan dieksekusi disana. Atau selamat dan ikut mengungsi ke Pulau Nusabarong?&nbsp;Tidak ada yang tahu.</p>\r\n\r\n<p>Nah, dari sekelumit catatan sejarah ini, maka sudah seharusnya para generasi muda Desa Tambong Kabat Banyuwangi mewarisi serta meneruskan semangat juang dan jiwa nasionalisme para leluhurnya. Berani tampil di garda depan dengan turut serta aktif dalam pembangunan</p>', 1, 2, 'berita/3ZadDdtYtyAub8wZORmTLnsoGutoW6xtLvwC1DjA.png', 1, 24, '2022-12-30 14:24:10', '2023-01-06 21:51:54'),
(9, 'Desa Tambong dengan Aneka Ragam Perkebunanya', 'desa-tambong-dengan-aneka-ragam-perkebunanya', 'Kebun-kebun desa tambong sangatlah menarik\n\nmulai dari perkebunan kelapa yang sangat banyak dan memiliki nilai ekonomis yang cukup tinggi\n\ndesa tambong kaya akan petaninya yang memiliki banyak sawah dan perkebunan', 5, 3, 'berita/FLwasklmfWDyU5RvNOfqTcArwXUjpKHTmppdvFkj.webp', 1, 4, '2022-12-31 02:03:45', '2023-01-06 09:41:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_galeri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `foto_galeri`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'galeri/cRR8Z6u5fnCd8vR0xxskqef8VV4io0hrp4QIJ6N2.jpg', '<p>Desa Tambong</p>', NULL, '2023-01-02 11:22:09'),
(3, 'galeri/izKjOhBkqkjpov2dflDJF3k62row0R0Na6bhyeuk.webp', '<p>Perkebunan Kelapa Desa Tambong Kecamatan Kabat</p>', '2023-01-02 11:25:20', '2023-01-02 11:25:44'),
(4, 'galeri/j7NBU5J0By2obDHjVve8z0mMgK5UEFYZswEZ8iuO.webp', '<p>Persawahan Desa Tambong</p>', '2023-01-04 10:58:29', '2023-01-04 10:58:29'),
(5, 'galeri/xW41BVZKXSZjFWna9tpPbvz8j515keWq0LqN6CfK.jpg', '<p>Anyaman Bambu</p>', '2023-01-04 14:57:57', '2023-01-04 14:57:57'),
(6, 'galeri/b3666wl9f2GgIK2VOoe54nk4Wb5rYo97dQgXkCi5.jpg', '<p>Minyak Kelapa</p>', '2023-01-04 14:59:26', '2023-01-04 14:59:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Desa Tambong', 'desa-tambong', '2022-12-25 15:55:59', '2022-12-25 11:43:41'),
(2, 'UMKM', 'umkm', NULL, NULL),
(3, 'Pariwisata', 'pariwisata', NULL, NULL),
(4, 'Pertanian', 'pertanian', NULL, NULL),
(5, 'Perkebunan', 'perkebunan', NULL, NULL),
(11, 'Perairan', 'perairan', '2022-12-25 11:59:09', '2022-12-25 11:59:09'),
(12, 'Pemerintahan', 'pemerintahan', '2023-01-03 11:32:45', '2023-01-03 11:32:45'),
(13, 'Teknologi Terkini', 'teknologi-terkini', '2023-01-03 11:55:21', '2023-01-03 11:55:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama_kategori`, `slug`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Anyaman', 'anyaman', 'kategoriProduk/iFhtyQ8wmfq198Q4XQCCw5c6iW9IeypLSQ7b3iv8.jpg', '2023-01-04 13:37:05', '2023-01-04 13:54:08'),
(3, 'Minyak Kelapa', 'minyak-kelapa', 'kategoriProduk/ZCahWydSKXeTep1HtfWl6FW6Yv0alkf2s23WHy4h.jpg', '2023-01-04 13:55:55', '2023-01-04 13:55:55'),
(5, 'Makanan Ringan', 'makanan-ringan', 'kategoriProduk/GVMWjxK45C7MpEguPCg9dUZEZfqAMmdeBFJjYjvk.jpg', '2023-01-06 07:46:38', '2023-01-06 07:46:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_12_25_155239_create_kategori_beritas_table', 2),
(11, '2022_12_25_190616_create_berita_table', 3),
(12, '2022_12_27_160357_create_slides_table', 4),
(14, '2022_12_30_070712_create_aparatur_desas_table', 5),
(16, '2023_01_02_171326_create_galeris_table', 6),
(17, '2023_01_02_070110_create_visi_misis_table', 7),
(18, '2023_01_04_194806_create_kategori_produks_table', 8),
(21, '2023_01_05_005558_create_tokos_table', 9),
(22, '2023_01_05_014432_create_produks_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 3, 'auth_token', '8ce3e78bcdfe7a5fc988f4b448e1a889bc51906fc2c18e9a11bb40540a58271e', '[\"*\"]', '2023-01-04 10:26:46', NULL, '2023-01-03 11:17:00', '2023-01-04 10:26:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko_id` int(11) NOT NULL,
  `kategori_produk_id` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivasi` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `slug`, `harga`, `deskripsi`, `toko_id`, `kategori_produk_id`, `foto`, `aktivasi`, `views`, `created_at`, `updated_at`) VALUES
(2, 'Virgin Coconut Oil', 'virgin-coconut-oil', 'Rp. 50.000/L', '<p>Virgin Coconut Oil merupkan minyak kelapa murni yang diolah dengan mesin yang sangat akurat buatan Mahasiswa Poliwangi yang telah berkolaborasi dengan Desa tambong</p>', 2, 3, 'Produk/xEYW3uBaDvnjm2ME3xbMzotDTDNxOZpiOjCApjOq.jpg', 1, 75, '2023-01-04 19:46:48', '2023-01-06 07:29:55'),
(3, 'Anyaman Bambu', 'anyaman-bambu', 'Rp. 35.000', '<p>Anyaman Bambu</p>\r\n\r\n<p>Uk. 35 cm2</p>\r\n\r\n<p>Sangat menarik dan unik</p>', 1, 1, 'Produk/BXaCPUMLzL1MJoP3x5zwu1l5kfRYZTNXxPOuaKDP.jpg', 1, 12, '2023-01-04 20:01:57', '2023-01-06 09:41:56'),
(4, 'Makanan Ringan Daerah Tambong', 'makanan-ringan-daerah-tambong', 'Rp. 10.000/Kemasan', '<p>Makanan Ringan dengan tekstur yang sangat gurih saat masuk ke mulut anda</p>', 2, 5, 'Produk/7fVbo7o7abaeGqt1yTeccwZuBGdqzLhln0yTZKLC.jpg', 1, 9, '2023-01-06 07:47:53', '2023-01-06 09:43:39'),
(5, 'Keranjang', 'keranjang', 'Rp. 30.000', '<p>Anayaman Keranjang buatan tangan dari Masyarakat Desa Tambong</p>', 1, 1, 'Produk/ucXDvLxwT2OzNsnZ4XllxUEdGCdvuK0MiIyNrxDJ.jpg', 1, 2, '2023-01-06 08:25:19', '2023-01-06 09:42:38'),
(6, 'Minyak Kelapa Murni', 'minyak-kelapa-murni', 'Rp. 50.000/L', '<p>Minyak Kelapa Murni dengan khasiat yang terbaik</p>', 1, 3, 'Produk/b75M2bd44E3ZrCxE1D2vu7b2yLwjJik8X90VF6bt.jpg', 1, 3, '2023-01-06 09:50:04', '2023-01-06 21:50:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_slide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id`, `judul_slide`, `link`, `gambar_slide`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Slide Pertama', 'slide1', 'slide/By5ccIYk8AfdmbFbmdvD0CHu1D7w7HkIlG1gUx7W.png', 1, '2022-12-27 10:40:19', '2023-01-04 10:50:07'),
(7, 'Slide 2', 'slider', 'slide/fQsRdtKXNyum5evdQcKD9MviuNwDfM22qRB1ZTbZ.webp', 1, '2022-12-29 10:09:00', '2023-01-04 10:49:46'),
(9, 'Selamat Datang Di Desa Tambong', 'desatambong.co.id', 'slide/EI4FbtuAHJl71qlRgBKZkFjONuz4HhHmkbWlRYwf.png', 1, '2022-12-29 10:40:17', '2022-12-29 10:40:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_toko` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `slug`, `no_telp`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Jaya Store', 'jaya-store', '6281235736467', 'Desa Tambong Kec Kabat', 'Toko/Agp89CB2vnf65vDCO6j8Vqp6PPHHsZObipSUWW9r.png', '2023-01-04 19:00:14', '2023-01-04 19:01:08'),
(2, 'Kanaya Store', 'kanaya-store', '6281235736467', 'Desa Tambong', 'Toko/wyfUY3wJU5udODwEGkGKbDMW3TMve1Vy3s46Lez1.jpg', '2023-01-04 19:00:49', '2023-01-04 19:00:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `alamat`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123456789', 'Admin', 'tambong', 'tambong@gmail.com', NULL, '$2y$10$eGYUO/KRjBG/ert6NRH5iusq6yTVpWcVn2yjImuRgtCA.GvceGpau', NULL, '2022-12-25 05:46:22', '2022-12-25 05:46:22'),
(2, '1122334455', 'Admin 2', 'tambong', 'tambong2@gmail.com', NULL, '$2y$10$yJQB/lX9CjJKxgAni.FqjO25I2LYe0bzFMgowdV5kw9asXiydnLVy', NULL, '2022-12-25 08:05:46', '2022-12-25 08:05:46'),
(3, '123123123', 'Admin 3', 'Desa Tambong', 'admin3@gmail.com', NULL, '$2y$10$Pl57e0huG5i8IrAvKmicveUEmWasXvhp6YJTMJ.vR4fGTwuFpJ8YS', NULL, '2023-01-03 11:04:50', '2023-01-03 11:04:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>VISI</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&quot;Senggigi Berseri&quot;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>(Bersih, Relegius, Sejahtera, Rapi, dan Indah)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&quot;Terwujudnya masyarakat Desa Senggigi yang Bersih, Relegius, Sejahtera, Rapi dan Indah melalui Akselerasi Pembangunan yang berbasis Keagamaan, Budaya Hukum dan Berwawasan Lingkungan dengan berorentasi pada peningkatan Kinerja Aparatur dan Pemberdayaan Masyarakat&quot;</strong></p>', '<p><strong>MISI</strong></p>\r\n\r\n<p><strong>Misi dan Program Desa Senggigi</strong></p>\r\n\r\n<p>Dan untuk melaksanakan visi Desa Senggigi dilaksanakan misi dan program sebagai berikut:</p>\r\n\r\n<p>1. Pembangunan Jangka Panjang</p>\r\n\r\n<p>&nbsp; &nbsp; - Melanjutkan pembangunan desa yang belum terlaksana.</p>\r\n\r\n<p>&nbsp; &nbsp; - Meningkatkan kerjasama antara pemerintah desa dengan lembaga desa yang ada.</p>\r\n\r\n<p>&nbsp; &nbsp; - Meningkatkan kesejahtraan masyarakat desa dengan meningkatkan sarana dan prasarana ekonomi warga.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. Pembangunan Jangka Pendek &nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; - Mengembangkan dan Menjaga serta melestarikan ada istiadat desa terutama yang telah mengakar di desa senggigi.&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; - Meningkatkan pelayanan dalam bidang pemerintahan kepada warga masyarakat&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; - Meningkatkan sarana dan prasarana ekonomi warga desa dengan perbaikan prasarana dan sarana ekonomi.</p>\r\n\r\n<p>&nbsp; &nbsp; - Meningkatkan sarana dan prasarana pendidikan guna peningkatan sumber daya manusia Desa Senggigi.&nbsp;</p>', '2023-01-05 05:00:47', '2023-01-04 22:05:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aparatur_desa`
--
ALTER TABLE `aparatur_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aparatur_desa`
--
ALTER TABLE `aparatur_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
