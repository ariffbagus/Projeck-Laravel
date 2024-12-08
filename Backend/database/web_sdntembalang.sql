-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2024 at 11:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_sdntembalang`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('guru@gmail.com|127.0.0.1', 'i:1;', 1732448114),
('guru@gmail.com|127.0.0.1:timer', 'i:1732448114;', 1732448114);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `created_at`, `updated_at`, `images`, `title`, `user_id`) VALUES
(2, '2024-11-26 08:50:28', '2024-11-26 08:50:28', '[\"images\\/mzCNPBWGfmLdMO8pSeNQeBUjCW3zSkK1OScwvmLx.png\"]', 'RAMADHAN CERIA 1444 H SDN TEMBALANG', 2),
(3, '2024-11-26 08:55:25', '2024-11-26 08:55:25', '[\"images\\/8tRMQDw5QpeQHRK3VagiSA11CZi6QzuF8ajq7NqI.jpg\",\"images\\/3ixSsZZuEul2N84qw93wZA820lbxBFmFewJ1qXBO.jpg\",\"images\\/8lDfu784hgaBEOmpSRIujnMYqj8iarzawLCRPi3w.jpg\",\"images\\/A1OJwGhnWfyKxUIHgp0cgduPao6jmJXBIjxkqUzZ.jpg\",\"images\\/soClDGi2ypBTyVGiMEj5AS4TCSeXKM4FigxSzmO3.jpg\",\"images\\/kcokQEgqSaPVGzPqFJhiYORwmfvhpV1q4fR5sUDK.jpg\",\"images\\/bufVTMUb7D98QnHyHY8zwMHeDnGzwNrWZxGXWShH.jpg\"]', 'KEGIATAN PENILAIAN TENGAH SEMESTER GENAP TAHUN 2022/2023 SDN TEMBALANG TANGGAL 27 FEBRUARI 2023 - 3 MARET 2023', 2),
(6, '2024-12-04 09:09:46', '2024-12-04 09:09:46', '[\"images\\/lNAIVwqKQN9abjoYlYpRElpUJ753PpMoayWvMKo2.jpg\",\"images\\/3HLzV9YG84qe2SMtanDOTwGEoFkWNa4Ut3yxwcU4.jpg\",\"images\\/zQmJ4DI0JanDs1Nfs1vgrnesldicnhqDWGLxll80.jpg\",\"images\\/pjXTwlwODFJWt4g7pQtDJr21cFcvKgnx2cIevXkI.jpg\",\"images\\/hl49pgt9F5AXcOCAab6ZwWydRmEnqYRc4WucmA8P.jpg\",\"images\\/23c6YBU1ZeK7sZUVu6zTwUPbyck70RwKtmDugSl5.jpg\",\"images\\/d0yZX0KwjdB5o00LY1fKWAydbosDv8RyXkV3Yxze.jpg\",\"images\\/tw5uv0rniGSW1b44NipULR58GlGUKa1MbyMT6PkO.jpg\"]', 'GERAKAN MENANAM URBAN FARMING SD NEGERI TEMBALANG', 1),
(7, '2024-12-04 09:14:44', '2024-12-04 09:14:44', '[\"images\\/i3Au2UNUXL6tMrrii9G1UUoUQFEmXtOLijntIN3s.jpg\",\"images\\/KvVapn7ZL3WqPluHC5L3uHk9PBKjuG4ruUV4uONG.jpg\",\"images\\/luKi7kXnx8eaIyAIr7grY9KG8eT481t7QCga7b2m.jpg\",\"images\\/LWIs29QvwAiRT5y8XJIFEr6m5IPUYDwNuD9FbvFb.jpg\",\"images\\/N62GVW8hUiN3LD8TQaMc40bFGBtBDpt2bR28dnSi.jpg\",\"images\\/YMAfh55qltyi061pJNv6pjg2y6yL1kosEFG79tJ4.jpg\"]', 'LINGKUNGAN SD NEGERI TEMBALANG', 1),
(8, '2024-12-04 09:16:23', '2024-12-04 09:17:10', '[\"images\\/0n6sjbVP1jJavEdnRHRLHK2xEXJ1oTNDclcpAvqR.jpg\",\"images\\/tEoBtfWQVdXpOJKd0cD4fBMUcgYP2lbFi7OepbhT.jpg\",\"images\\/csuY9wGurFy5GScjL9VtyHKdPP5SQUc32zpOqvdF.jpg\",\"images\\/6HSHFuRKp5VJeHV9ISiKSJyO3N8a80o1bkNnhQ40.jpg\"]', 'KEGIATAN PRAMUKA SD NEGERI TEMBALANG', 1),
(9, '2024-12-04 09:20:55', '2024-12-04 09:20:55', '[\"images\\/GLUYtxWeA3OrDLzZX7TpuRuwYrT95GMUoiAte3Xq.jpg\",\"images\\/QKhltDLoegSCHdLI6HoBJl5Xcp1rfJAhWirT0ikN.jpg\",\"images\\/zvWuk9THhoGSjBwwosFFKFCboNWTCMa0Dgcn6SRx.jpg\"]', 'AGROWIYATA TENTREM RAHAYU SD NEGERI TEMBALANG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `created_at`, `updated_at`, `nama_guru`, `nip`, `alamat`, `no_telp`, `email`, `foto`, `user_id`) VALUES
(1, '2024-11-30 05:29:14', '2024-12-04 06:38:02', 'Arif Bagus Prasetiyo', '123123123', 'Bendan Duwur, Jl. Menoreh Raya No.70, Sampangan, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50235', '089527136690', 'arifbagusprasetiyo@gmail.com', 'images/nrO3r7bA3xq7majhv6Goj0T4u1bEztvNuE2iGTSO.jpg', 2),
(2, '2024-11-30 05:41:41', '2024-12-05 18:49:33', 'Arif Bagus', '2343343', 'Gunung pati', '089527136690', '12366@gmail.com', 'images/uZRMYv0Xr03TjHxy9HgPOmPDCt0Z0obCtZKWZiii.jpg', 1),
(4, '2024-12-04 21:16:34', '2024-12-04 21:18:18', 'Prasetiyo', '22222', 'sampagan', '089527136690', '12345@gmail.com', 'images/UZjxUUQJP6TZYAXdrX20uqBQRqwmDHkvQWO29w1o.jpg', 16),
(5, '2024-12-04 21:22:13', '2024-12-04 21:22:13', 'Maul', '33333', 'Pondok', NULL, NULL, NULL, 17);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `videos` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `created_at`, `updated_at`, `title`, `body`, `images`, `videos`, `user_id`) VALUES
(2, '2024-11-28 02:21:30', '2024-11-28 02:23:32', 'LOMBA FLS2N TAHUN 2023', 'Program dalam rangka meningkatkan prestasi peserta didik di bidang seni bahasa dan Literasi yaitu penyelenggaraan kegiatan Festival dan Lomba Seni Siswa Nasional atau disebut FLS2N. Pelaksanaan FLS2N Jenjang SD tahun 2023 berupaya untuk dapat menghasilkan anak-anak berprestasi  di bidang Seni dan mampu berdaya saing nasional maupun global. Melalui FLS2N ini, kami berharap dapat  menjadi ruang atmosfer lomba yang sehat dan bertumbuh  dalam budaya yang silih asih dan asuh. Dukungan segenap pihak  sangat diperlukan dalam menyiapkan peserta didik menjadi  generasi bangsa yang kelak turut andil dalam kemajuan Indonesia.\r\n\r\nSD NEGERI TEMBALANG DIWAKILI OLEH:\r\n1. ANGEL PUTRI KINANTI UNTUK MENYANYI TUNGGAL\r\n2. MAUHAMMAD ALIF SAEFUDIN DAN SYARIF ABRIZAM TSAQIF UNTUK PANTOMIM\r\n3. GRACEANNE WINDY AUBERTA, TALITA SASABILA DAN SAVIERINDA KEYSA CINTA MAHARANI UNTUK SENI TARI\r\n4. AGTAGHEEA AMEERA PUTRI UNTUK GAMBAR BERCERITA\r\n5. NAURA ZAFIRA SANTOSO UNTUK KRIYA ANYAM \r\nSD NEGERI TEMBALANG BERSINAR', '[\"images\\/thnIKEEv4s6cF5fhBTN3ww3tp4gOQsHehlvPEcIw.jpg\",\"images\\/Utem5qPHroqbcRmfhywOTSS5cd0rD7HS56VcxO61.jpg\",\"images\\/wWoOkPH4IM1W8PIRL7vkWgWS362crQNCicpAPK38.jpg\",\"images\\/dC50yhdVYMUswudcZkZAshOZ0EdoJ42ulufqU7SV.jpg\",\"images\\/Gk1n6IaN9I03WX0xeForGqIKcDMwBS6E4Rz3EUay.jpg\",\"images\\/m9qByM1F2YwiGoTz7aqKYX1L9wXSzgH5Y6Yr8pIO.jpg\"]', NULL, 1),
(10, '2024-12-04 09:57:56', '2024-12-04 09:57:56', 'LOMBA LITERASI SD', 'LOMBA BACA CERPEN\r\n\r\n\r\nLOMBA LITERASI SD :\r\n1.LOMBA MENDONGENG\r\n2.LOMBA BACA PUISI\r\n3.LOMBA VIDIO PENYULUHAN\r\n4.LOMBA VIDIO TIKTOK\r\n5.LOMBA VIDIO LAYANAN IKLAN MASYARAKAT', '[]', '[\"https:\\/\\/youtu.be\\/mqbZvJNNODo\",\"https:\\/\\/youtu.be\\/9CmBv_33L8U\",\"https:\\/\\/youtu.be\\/T6mvkEgAkQM\",\"https:\\/\\/youtu.be\\/KXjGXhXKFS8\",\"https:\\/\\/youtu.be\\/pknkgLGLboI\",\"https:\\/\\/youtu.be\\/lgLOZaKQ9ik\"]', 1),
(11, '2024-12-04 10:01:47', '2024-12-04 10:01:47', 'LOMBA SISWA BERPRESTASI', 'LOMBA SISWA BERPRESTASI : \r\n1.PEMANFAATAN SINAR MATAHARI (SOLAR ENERGI) UNTUK TANAMAN HIDROPONIK OLEH ERLANGGA PUTRA RAMADHAN SDN TEMBALANG \r\n2. CARA MEMBUAT PERANGKAP NYAMUK SEDERHANA (MOSQUETO TRAP) OLEH DESCOVERY MECHA SETYAWAN SDN TEMBALANG', '[]', '[\"https:\\/\\/www.youtube.com\\/watch?v=ZerHhtr0Xek\",\"https:\\/\\/youtu.be\\/VUiOmBBG500\"]', 1),
(12, '2024-12-04 10:07:31', '2024-12-04 10:07:31', 'LOMBA BAHASA JAWA', 'LOMBA BAHASA JAWA  :\r\n1. Sesorah \r\n2. Geguritan \r\n3. Macapat', '[]', '[\"https:\\/\\/youtu.be\\/sUkLMoaLFGc\",\"https:\\/\\/youtu.be\\/mio6v4AKt9Y\",\"https:\\/\\/youtu.be\\/Bwq4473ice4\"]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_11_09_150049_create_murid_table', 1),
(4, '2024_11_09_150059_create_guru_table', 1),
(5, '2024_11_09_150311_create_pengaduan_table', 1),
(6, '2024_11_10_070701_create_pengumuman_table', 1),
(7, '2024_11_10_114253_create_galeri_table', 1),
(8, '2024_11_21_031532_create_kegiatan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('baru','diproses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `created_at`, `updated_at`, `nama`, `email`, `no_telp`, `body`, `user_id`, `status`) VALUES
(1, '2024-12-01 02:30:01', '2024-12-05 18:52:36', 'John Doe', 'john@example.com', '123456789', 'Ini adalah pengaduan.', NULL, 'selesai'),
(3, '2024-12-01 02:52:52', '2024-12-01 03:20:14', 'aaaa', 'arifbagusprasetiyo@gmail.com', '089527136690', '22222222222222222222222222222222222222222222222222222', NULL, 'selesai'),
(4, '2024-12-01 02:54:09', '2024-12-04 09:07:21', 'aaaa', 'arifbagusprasetiyo@gmail.com', '089527136690', '22222222222222222222222222222222222222222222222222222', NULL, 'selesai'),
(5, '2024-12-01 03:02:04', '2024-12-04 09:07:26', 'bbbbbbbbbbbbbb', 'arifbagusprasetiyo@gmail.com', '089527136690', 'bbbbbbbbbbbbbbbbbbbbb', NULL, 'selesai'),
(6, '2024-12-05 18:47:43', '2024-12-05 18:52:13', 'Pramudito', 'admin@gmail.com', '089527136690', '<script> alert(\"halo\")</script>', NULL, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `created_at`, `updated_at`, `title`, `body`, `images`, `user_id`) VALUES
(4, '2024-11-29 07:47:45', '2024-11-29 07:47:45', 'Ramadhan Ceria', 'Ramadhan Ceria SDN Tembalang', '[\"images\\/RBRMx2QduhlzrBJikPQt1f4c7wh65oPASOpkdhCi.png\"]', 2),
(5, '2024-12-04 09:32:52', '2024-12-04 09:32:52', 'Selamat Mengerjakan PTS Genap tahun 2020/2023', 'Selamat Mengerjakan PTS Genap tahun 2020/2023 Sekolah Dasar Negeri Tembalang', '[\"images\\/BQtkV5FWJKx05oAVSUpmHPnAwM6zIJFJd3plaAFi.jpg\"]', 1),
(6, '2024-12-04 09:35:05', '2024-12-04 09:35:05', 'Penghargaan Adiwiyata Mandiri & Nasional 2022', 'Penghargaan Adiwiyata Mandiri & Nasional 2022 Sekolah Dasar Negeri Tembalang', '[\"images\\/pcSHiOLkxOK6gwzToOSWrKbSQyXEEfIChE8RWbGW.jpg\"]', 1),
(7, '2024-12-04 09:37:55', '2024-12-04 09:37:55', 'Memperingati ISRA\' MI\'RAJ Nabi Muhammad SAW', 'Memperingati ISRA\' MI\'RAJ Nabi Muhammad SAW Sekolah Dasar Negeri Tembalang', '[\"images\\/FGwqfAzqdQkMlWLXKRVVOHYBh1xC9blm0EAiUv5u.jpg\"]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('s6lf5UJYi6HAVA7vLN6VO1CL1YeqppA091ywzOuC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ09HajladGt1NjlNN0JTNldrc240RmpiNm5EQ2F3dzdBbzNUc2hrTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733450019),
('soqukfOXvcz0usCFwpunPrGpjOYzVrFkG1nGlLnM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHRySUZ6UUhROURCNU4wa3V6YUdValJKNWxJekRDUXJOQjNkdUFvSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733449432);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wali` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `created_at`, `updated_at`, `nama_siswa`, `kelas`, `nisn`, `tgl_lahir`, `alamat`, `wali`, `foto`, `user_id`) VALUES
(1, '2024-12-04 22:01:17', '2024-12-04 23:14:11', 'Viko', '6', '666666666', '2012-12-15', 'Unggaran', 'Tante Viko', 'images/cn5yMGUJDdZ3jZCb870UrqgTkwrlnaCQhSqd73ZI.png', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','guru','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$bXlT/Y3NWarbiW0xWTT1veqrG5CLK62rqctGqINjQvPa91vxrIOui', NULL, NULL, NULL, 'admin'),
(2, 'Guru', 'guru@gmail.com', NULL, '$2y$12$ze51WvGmmiEQNvnUx2Zb5.EqNQ1Q5gWs8chAPJX8jpvQt9cxD0vqK', NULL, NULL, NULL, 'guru'),
(3, 'Siswa', 'siswa@gmail.com', NULL, '$2y$12$2cAC6FHQYkhA3O/ZZvCymeOitYahV2UD9DYAoUc9uJ.dc7ynr5abC', NULL, NULL, NULL, 'siswa'),
(4, 'Jannie Mohr', 'doyle.predovic@example.net', '2024-11-24 01:44:18', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', 'jhHxthPbWb0XQ8BUl4sarnmfbIWZMtRa4aaBBF1Eupq0wrwnb7MoDrJfGPw3', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'guru'),
(5, 'Breanne Tremblay', 'qmetz@example.com', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', 'PbKTYzchqA', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'guru'),
(6, 'Otho Fay I', 'bartell.marlon@example.com', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', 'BJzsaGZKuQ', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'admin'),
(7, 'Mrs. Daphne Wiegand', 'cordelia34@example.net', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', 'aECTZTGXhV', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'siswa'),
(8, 'Rossie Bednar Jr.', 'kasey61@example.com', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', 'ZAyGzoQtIf', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'guru'),
(9, 'Lemuel Rosenbaum', 'marcia71@example.com', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', 'izfnmEo2bE', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'siswa'),
(10, 'Mr. Douglas Daniel', 'isai49@example.com', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', 'g2xtuI3yvv', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'guru'),
(11, 'Louisa Donnelly', 'broderick55@example.org', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', '4mfAoDVqIm', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'admin'),
(12, 'Mateo Pfannerstill', 'gorczany.gregoria@example.org', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', '8lzgApUR4X', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'siswa'),
(13, 'Mr. Oran Ondricka', 'fernando86@example.net', '2024-11-24 01:44:19', '$2y$12$yo31Jh27rK03H8O0XA8vcuv9Q2oCc6JW2PD631ElBwj3n5BDT/Xgq', 'TE4UXepGSf', '2024-11-24 01:44:19', '2024-11-24 01:44:19', 'guru'),
(14, 'Pramudito', '123@gmail.com', NULL, '$2y$12$992RJbJg8EOzMULIbBxi2enf3H17Q3ti9Vl9NJ2.e506PahxJ9fQ6', NULL, '2024-12-04 20:35:40', '2024-12-04 20:35:40', 'guru'),
(15, 'ilyas', '1234@gmail.com', NULL, '$2y$12$JO4sxbc60DnMAU/EfCyzUetY6FoMr4p0BMTHGux17J12DxwlLufuC', NULL, '2024-12-04 20:44:01', '2024-12-04 20:44:01', 'siswa'),
(16, 'Prasetiyo', '12345@gmail.com', NULL, '$2y$12$EXDE30MXIP46zlm0LHaDvuS7idNYYBXU8AC5tSURgQuKDLLlFFIZO', NULL, '2024-12-04 21:16:34', '2024-12-04 21:16:34', 'guru'),
(17, 'Maul', '1@gmail.com', NULL, '$2y$12$sjwtfKpkpiwYorEyaDRRq.Db7UIGOi4lVycQ0j2soG1o/hPt79UbG', NULL, '2024-12-04 21:22:13', '2024-12-04 21:22:13', 'guru'),
(20, 'Viko', '12344566@gmail.com', NULL, '$2y$12$ijtuUOL4ZntxvhX7UBBSruaNnkAhWAwNCaLKJ5VpcTMKeflFAOWxi', NULL, '2024-12-04 22:01:17', '2024-12-04 22:01:17', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeri_user_id_foreign` (`user_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_nip_unique` (`nip`),
  ADD UNIQUE KEY `guru_email_unique` (`email`),
  ADD KEY `guru_user_id_foreign` (`user_id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_user_id_foreign` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_user_id_foreign` (`user_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nisn_unique` (`nisn`),
  ADD KEY `siswa_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
