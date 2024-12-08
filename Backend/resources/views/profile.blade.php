<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Singkat SD Negeri Tembalang</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       footer {
    width: 100vw;
    margin-left: calc((100% - 100vw) / 2); /* Mengatasi margin otomatis pada pusat */
    padding: 0;
}

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary text-white">
    <a class="navbar-brand m-1" href="/home">
        <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Tembalang" style="max-height: 50px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-white" href="/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/profile">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/gallery">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/berita">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/kegiatan">Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/layanan">Layanan</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto p-2">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Selamat Datang, {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                        <form action="/logout" method="POST">
                            @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                  </li>
                </ul>
              </li>
             @else
             <li class="nav-item ">
                <a class="nav-link text-white btn" href="/login">Login</a>
            @endauth
    </ul>
    </div>
</nav>
<div class="container my-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Sejarah Singkat SD Negeri Tembalang</h1>
        </div>
        
        <!-- Gambar Gabungan -->
        <div class="text-center mb-4">
            <img src="{{ asset('images/profil.png') }}" alt="SDN Tembalang" class="img-fluid rounded">
        </div>

        <!-- Konten Sejarah Singkat -->
        <div class="content">
            <p>Sekolah Dasar Negeri Tembalang didirikan pada Tanggal 01 Bulan Januari Tahun 1910 sesuai SK Pendirian Sekolah 421.2/001/IV/92/85 dengan status kepemilikian oleh Pemerintah Daerah.SDN Tembalang berada di Jl Jatimulyo No 04 Tembalang Kecamatan Tembalang Kota Semarang Jawa Tengah. SD Negeri Tembalang terakreditasi A dan termasuk sekolah piloting di Kecamatan Tembalang, SD Negeri Tembalang berkapasitas dua rombel terdiri dari beberapa bangunan utama, dengan rincian 12 (dua belas) ruangan Kelas, 1 (satu) ruangan Guru, 1 (satu) ruang Kepala Sekolah, 1 (satu) ruangan Perpustakaan, Mushola, Ruang UKS, 1 Rumah Penjaga Sekolah dan 1 kantin yang berada didalam lingkungan sekolah. SD Negeri Tembalang mempuyai branding BERSINAR yang mempunyai arti Bersih, Sehat, Integritas , Nasionalis dan Religius.i</p>
        
        </div>
    </div>
    <div class="text-center mb-4">
            <h1 class="fw-bold">Sambutan Kepala Sekolah</h1>
        </div>
        <div class="text-center mb-4">
            <img src="{{ asset('images/kepsek.png') }}" alt="SDN Tembalang" class="img-fluid rounded">
        </div>
        <div class="content">
            <p class="text-center">Assalamu'alaikum Wr. Wb.</p>

<p >Puji syukur kami panjatkan ke hadirat Tuhan Yang Maha Kuasa atas limpahan rahmat dan karunia-Nya sehingga SDN Tembalang berhasil membuat website, hadirnya Website SDN Tembalang diharapkan dapat memudahkan penyampaian informasi secara terbuka kepada warga sekolah, alumni dan masyarakat serta instansi lain yang terkait. 
Semoga dengan hadirnya Website ini dapat memperoleh informasi dengan cepat sehingga dapat mengikuti perkembangan dalam pengetahuan yang berkembang dengan cepat. Serta akan terjalin informasi, komunikasi antar alumni khususnya sebagai salah satu upaya sekolah mendapatkan informasi akan penelusuran tamatan/ alumni dimana saja berada.
Kesiapan dari semua warga sekolah sangat besar artinya bagi keberadaan website tersebut, sebab tanpa kesiapan dari warga sekolah maka keberadaan website tersebut akan tidak ada gunanya.
Sehubungan dengan hal tersebut maka semua warga sekolah harus tetap konsisten untuk menggunakan website ini sebagai alat/sumber informasi dan komunikasiserta sebagai media pembelajaran.
Selamat bekerja dan kiranya Tuhan Yang Maha Kuasa selalu melimpahkan anugerah dan karunia-Nya.
Demikian dan terima kasih. </p>
 
<p class="text-center">Wassalamu'alaikum Wr. Wb.</p>
<p class="text-center">Kepala SDN Tembalang</p>
 
<p class="text-center">Hadi Wagiman,S.Pd</p>
        
        </div>
        <div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Visi Misi SDN 1 Tembalang</h1>
    </div>

    <div class="row">
        <!-- Visi Sekolah -->
        <div class="col-md-6">
            <div class="p-4 bg-light rounded">
                <h2 class="text-center">VISI SEKOLAH</h2>
                <p class="text-center">"Terwujudnya peserta didik yang cerdas berkarakter, berwawasan dan peduli lingkungan, yang dilandasi iman dan takwa kepada Tuhan Yang Maha Esa"</p>
                <div class="text-center mt-4">
                    <img src="{{ asset('images/guru.jpeg') }}" alt="Foto Visi Sekolah" class="img-fluid rounded">
                </div>
            </div>
        </div>

        <!-- Misi Sekolah -->
        <div class="col-md-6">
            <div class="p-4 bg-light-blue rounded">
                <h2 class="text-center">MISI SEKOLAH</h2>
                <ol>
                    <li>Menerapkan pembelajaran berdasarkan karakter religius pada upaya peningkatan ketakwaan kepada Tuhan Yang Maha Esa dan melaksanakan nilai-nilainya serta budi pekerti luhur (Iman dan Taqwa Kepada Tuhan Yang Maha Esa).</li>
                    <li>Menerapkan pembelajaran yang berkarakter dengan menumbuhkan berbagai nilai religiusitas, nasionalisme, integritas, mandiri, dan gotong royong dalam kegiatan pembiasaan sekolah yang berkesinambungan (Cerdas dan Berkarakter).</li>
                    <li>Menyelenggarakan pembelajaran yang efektif untuk mengoptimalkan potensi akademik dan non-akademik yang dimiliki anak (Cerdas dan Berkarakter).</li>
                    <li>Menyelenggarakan kegiatan ekstrakurikuler untuk mengembangkan keterampilan, bakat, dan minat anak (Cerdas dan Berkarakter).</li>
                    <li>Menumbuhkan sikap sadar lingkungan dalam pembelajaran yang berkelanjutan (Berwawasan dan Peduli Lingkungan).</li>
                    <li>Menciptakan lingkungan sekolah yang bersih, sehat, dan nyaman (Berwawasan dan Peduli Lingkungan).</li>
                    <li>Penanaman budaya menghargai dan mencintai lingkungan (Berwawasan dan Peduli Lingkungan).</li>
                    <li>Mencegah kerusakan lingkungan (Berwawasan dan Peduli Lingkungan).</li>
                    <li>Meningkatkan kompetensi pendidik dan tenaga kependidikan (Cerdas dan Berkarakter).</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Profil Guru dan Karyawan SDN 1 Tembalang</h1>
    </div>
    <div class="text-center mb-4">
            <img src="{{ asset('images/gurukaryawan.png') }}" alt="SDN Tembalang" class="img-fluid rounded">
        </div>
    <div class="text-center mb-4">
            <img src="{{ asset('images/prestasi.png') }}" alt="SDN Tembalang" class="img-fluid rounded">
        </div>
        <div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Prestasi SD Negeri Tembalang</h1>
    </div>
    <ul>
        <li>SD Negeri Tembalang Terakreditasi A dengan nilai 92</li>
        <li>Sekolah Adiwiyata Tingkat Kota Tahun 2018</li>
        <li>Penghargaan Piagam Bintang Kantin Sehat dari BPOM Tahun 2018</li>
        <li>Sekolah Adiwiyata Tingkat Provinsi Tahun 2020</li>
        <li>Sekolah Adiwiyata Tingkat Nasional Tahun 2022</li>
    </ul>

    <div class="text-center my-4">
        <h1 class="fw-bold">Prestasi Siswa SD Negeri Tembalang</h1>
    </div>
    <ul>
        <li>Juara III Volly Popda tingkat kota Semarang 2017</li>
        <li>Juara III Pantomim Fls2n tingkat kecamatan tahun 2017</li>
        <li>Juara tergiat III Putri Pesta Siaga tingkat kecamatan tahun 2017</li>
        <li>Juara I Tari Kreasi baru Fls2n tingkat kecamatan tahun 2017</li>
        <li>Juara I Catur O2SN tingkat kecamatan tahun 2017</li>
        <li>Juara I Taekwondo kelas Randory under 30 kg tingkat kota tahun 2017</li>
        <li>Juara I Sepak Bola tingkat kecamatan tahun 2017</li>
        <li>Juara 1 Taekwondo Kyorugi Katagori U 36 kg Putri tingkat Kota tahun 2018</li>
        <li>Juara 3 Taekwondo Kyorugi Katagori U 36 kg Putra tingkat Kota tahun 2018</li>
        <li>Juara 2 Taekwondo Kyorugi Katagori B U 34 kg Putra tingkat Provinsi tahun 2018</li>
        <li>Juara 3 Taekwondo Kyorugi Katagori B U 34 kg Putri tingkat Provinsi tahun 2018</li>
        <li>Juara 1 Taekwondo Kyorugi Pra Kadet Putra tingkat Nasional tahun 2018</li>
        <li>Juara 2 Lomba Siswa Cari Jentik (SICENTIK) tingkat kecamatan tahun 2018</li>
        <li>Juara 3 Gambar Bercerita MAPAK tingkat kecamatan tahun 2018</li>
        <li>Juara 1 Cepat Tepat buka baca Al Kitab (MAPAK) tingkat kecamatan tahun 2018</li>
        <li>Juara 2 Senam Pramuka Penggalang Putra Tingkat Kecamatan Tahun 2018</li>
        <li>Juara 1 Pantomim FLS2N Tingkat kecamatan Tembalang Tahun 2018</li>
        <li>Juara 1 Tari Kreasi FLS2N Tingkat Kecamatan Tembalang Tahun 2018</li>
        <li>Juara 1 Kewirausahaan MAPSI tahun 2018</li>
        <li>Juara 1 Taekwondo Rotary Cup tingkat kota Semarang tahun 2018</li>
        <li>Juara 3 LIPIO tingkat kecamatan tahun 2018</li>
        <li>Juara 2 Matematika tingkat kota Semarang tahun 2019</li>
        <li>Juara 1 Tari Kreasi FLS2N tingkat kecamatan tahun 2019</li>
        <li>Juara 1 Pantomim FLS2N tingkat kecamatan tahun 2019</li>
        <li>Juara 2 Cerita Bergambar FLS2N tingkat kecamatan tahun 2018</li>
        <li>Juara 2 Geguritan MAPSI tingkat kecamatan tahun 2018</li>
        <li>Juara 3 Literasi Menulis surat untuk walikota tingkat kota Semarang tahun 2019</li>
        <li>Juara 1 Pidato FLS2N tingkat kecamatan tahun 2018</li>
        <li>Juara 1 Khitobah MAPSI tingkat kota Semarang tahun 2018</li>
        <li>Juara 2 menari LIBFEST tingkat kota Semarang tahun 2018</li>
        <li>Juara 2 Tilawah tingkat kecamatan tahun 2019</li>
        <li>Juara 2 Tilawah MAPSI tingkat kecamatan Tembalang tahun 2018</li>
        <li>Meraih Penghargaan Piagam Bintang 1 Keamanan Pangan Untuk Kantin Sekolah tingkat Jawa Tengah tahun 2018</li>
        <li>Juara 1 Lomba Geguritan Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 3 Lomba PBB Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 1 Lomba Tari Denok Geol Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 1 Lomba Pantomin Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 1 Lomba Taekwondo Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 1 Lomba Olimpiade IPA Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 2 Lomba Tilawah Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 1 Lomba Olimpiade Matematika Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 1 Lomba Menulis Surat Tingkat Kota Semarang Tahun 2019</li>
        <li>Juara 3 Lomba LCC Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 2 Lomba Hifzil Quran Tingkat Kecamatan Tembalang Tahun 2019</li>
        <li>Juara 2 Lomba Tenis Meja Tingkat Kecamatan Tembalang Tahun 2020</li>
        <li>Juara 2 Lomba Lari Tingkat Kecamatan Tembalang Tahun 2020</li>
        <li>Juara 1 Lomba Taekwondo Kecamatan Tembalang Tahun 2020</li>
        <li>Juara 3 Lomba MAPSI Cabang Khitobah Putri Tingkat Kecamatan Tahun 2022</li>
        <li>Juara 3 Lomba Literasi Mendongeng Tingkat Kecamatan Tembalang Tahun 2022</li>
        <li>Juara 1 Lomba Literasi Puisi Tingkat Kecamatan Tembalang Tahun 2022</li>
        <li>Juara Sekolah Adiwiyata Tingkat Nasional Tahun 2022</li>
    </ul>
</div>


<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Sarana dan Prasarana SDN 1 Tembalang</h1>
    </div>
    <div class="text-center mb-4">
            <img src="{{ asset('images/sarana.png') }}" alt="SDN Tembalang" class="img-fluid rounded">
        </div>
        <div class="text-center mb-4">
            <img src="{{ asset('images/prasarana.png') }}" alt="SDN Tembalang" class="img-fluid rounded">
        </div>
</div>
</div>

<footer class="bg-primary text-white mt-5 py-4 w-100" style="margin: 0;">
    <div class="row">
        <!-- Sekolah Info -->
        <div class="col-md-4">
            <h5>Sekolah Dasar Negeri Tembalang</h5>
            <p>Jl Jatimulyo No 04<br>
            Tembalang, Kecamatan Tembalang, Kota Semarang</p>
            <p>PHONE: (024) 7478464<br>
            EMAIL: sdntembalang@gmail.com</p>
        </div>
        
        <!-- Useful Links -->
        <div class="col-md-4">
            <h5>Useful Links</h5>
            <ul class="list-unstyled">
                <li><a href="#" class="text-white">Kemendikbud</a></li>
                <li><a href="#" class="text-white">Dinas Pendidikan</a></li>
            </ul>
        </div>

        <!-- Ikuti Kami -->
        <div class="col-md-4">
            <h5>Ikuti Kami</h5>
            <a href="#" class="text-white me-2"><i class="fab fa-facebook"></i> Facebook</a><br>
            <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i> Instagram</a><br>
            <a href="#" class="text-white me-2"><i class="fab fa-youtube"></i> YouTube</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
            <p>SD NEGERI TEMBALANG | SEKOLAH ADIWIYATA NASIONAL</p>
            <p>SEKOLAH SEHAT | SEKOLAH RAMAH ANAK</p>
        </div>
    </div>
</footer>





    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
