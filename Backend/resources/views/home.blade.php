<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDN Tembalang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Sedikit CSS untuk mengatur background */
        .full-bg {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
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
                <a class="nav-link text-white" href="/home">Beranda</a>
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

<!-- Section dengan background full screen -->
<div class="full-bg d-flex justify-content-center align-items-center">
    <div class="text-center text-white">
        <h1>SEKOLAH DASAR NEGERI TEMBALANG</h1>
    </div>
</div>

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
        <p>Sekolah Dasar Negeri Tembalang didirikan pada Tanggal 01 Bulan Januari Tahun 1910 sesuai SK Pendirian Sekolah 421.2/001/IV/92/85 dengan status kepemilikian oleh Pemerintah Daerah.SDN Tembalang berada di Jl Jatimulyo No 04 Tembalang Kecamatan Tembalang Kota Semarang Jawa Tengah. SD Negeri Tembalang terakreditasi A dan termasuk sekolah piloting di Kecamatan Tembalang, SD Negeri Tembalang berkapasitas dua rombel terdiri dari beberapa bangunan utama, dengan rincian 12 (dua belas) ruangan Kelas, 1 (satu) ruangan Guru, 1 (satu) ruang Kepala Sekolah, 1 (satu) ruangan Perpustakaan, Mushola, Ruang UKS, 1 Rumah Penjaga Sekolah dan 1 kantin yang berada didalam lingkungan sekolah. SD Negeri Tembalang mempuyai branding BERSINAR yang mempunyai arti Bersih, Sehat, Integritas , Nasionalis dan Religius.</p>
        <div class="justify-content-center align-items-center">
            <div class="text-center text-white">
                <a href="/profile" class="btn btn-danger mt-3">Selengkapnya</a>  
            </div>
        </div>
    </div>
</div>

<div class="container text-center ">
    <h1 class="text-center mb-4">Galeri Foto</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        @foreach ($galeris->take(6) as $galeri)
        <div class="col">
            <div class="card h-100">
                @php
                    $images = json_decode($galeri->images); // Decode JSON untuk mendapatkan array gambar
                @endphp
                @if(!empty($images))
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $galeri->title }}" style="width: 355px; height: 200px;">
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($galeri ['title'],40)}}</h5>
                    <a href="/dashboard/Mypost/galery/{{ $galeri->id }}" class="btn btn-danger">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
<div class="container text-center ">
    <h1 class="text-center mb-4">Galeri Video</h1>
    <div class="text-center mb-3">
        <a href="https://www.youtube.com/@sdnegeritembalang2514" target="_blank">
            <img src="{{ asset('images/logo.png') }}" alt="Youtube" class="img-fluid rounded p-2 " style="width: 150px; border-style:solid; border-color:rgb(0, 0, 0); border-radius:50%;">
        </a><br>
        <a href="https://www.youtube.com/@sdnegeritembalang2514" class="text-black me-2"> Youtube Resmi SDN 1 Tembalang</a>
    </div>
</div>

<div class="justify-content-center align-items-center">
    <div class="text-center text-white">
        <a href="/gallery" class="btn btn-danger mt-3">Selengkapnya</a>  
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <!-- Banner Carousel -->
        <div class="col-md-8">
            <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/baner1.png') }}" class="d-block w-100" alt="Banner 1">
                    </div>
                    <!-- Jika ada banner tambahan -->
                    <div class="carousel-item">
                        <img src="{{ asset('images/baner2.png') }}" class="d-block w-100" alt="Banner 2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Berita Terbaru -->
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Berita Terbaru
                </div>
                <ul class="list-group list-group-flush text-center" id="newsList">
                    @foreach($pengumumans as $pengumuman)
                        <li class="list-group-item fs-5" >
                            <a href="/dashboard/Mypost/detail/{{ $pengumuman->id }}" class="news-item" data-id="{{ $pengumuman->id }}" data-title="{{ $pengumuman->title }}" data-date="{{ \Carbon\Carbon::parse($pengumuman->created_at)->locale('id')->translatedFormat('l, j F Y') }}" style="color: black;">
                                {{ Str::limit($pengumuman ['title'],10) }} , {{ \Carbon\Carbon::parse($pengumuman->created_at)->locale('id')->translatedFormat('j F Y') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-2">
    <h1 class="text-center mb-4">Kegiatan Lomba</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        @foreach ($kegiatans->take(6) as $kegiatan)
        <div class="col">
            <div class="card h-100">
                @php
                $images = json_decode($kegiatan->images); // Decode JSON untuk mendapatkan array gambar
                $videos = json_decode($kegiatan->videos); // Decode JSON untuk mendapatkan array video
            @endphp

            @if(!empty($images))
                <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $kegiatan->title }}" style="width: 355px; height: 200px;">
            @elseif(!empty($videos))
                @php
                    // Mengambil ID video dari link YouTube
                    preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videos[0], $matches);
                    $videoId = $matches[1] ?? null; // Ambil ID video jika ada
                @endphp
                @if($videoId)
                    <iframe width="355" height="200" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                @else
                    <p>Link video tidak valid: {{ $videos[0] }}</p>
                @endif
            @endif
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($kegiatan ['title'],40)}}</h5>
                    <a href="/dashboard/Mypost/kegiatan/{{ $kegiatan->id }}" class="btn btn-danger">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
<h1 class="text-center mb-4">Kegiatan Rutin</h1>
        <div class="text-center mb-4">
        <img src="{{ asset('images/kegiatan.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
        </div>
<h1 class="text-center mb-4">Kegiatan Keagamaan</h1>
        <div class="text-center mb-4">
        <img src="{{ asset('images/keagamaan.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
        </div>
        <div class="text-center">
    <ul class="d-inline-block text-start">
        <li>1. SHOLAT DUHA</li>
        <li>2. SHOLAT DZUHUR BERJAMAAH</li>
        <li>3. LITERASI JUZ 30 DAN SURAT PILIHAN</li>
        <li>4. KOMUNITAS AGAMA ISLAM</li>
        <li>5. REBANA</li>
        <li>6. KAMIS MANIS (MENGAJI, ASMAUL HUSNA , INFAQ DAN SHODAQOH SETIAP HARI KAMIS)</li>
        <li>7. PERINGATAN HARI BESAR </li>
        <li>8. KEGIATAN PERSEMBAHAN BAGI NON MUSLIM </li>
    </ul>
</div>
<div class="justify-content-center align-items-center">
    <div class="text-center text-white">
        <a href="/kegiatan" class="btn btn-danger mt-3">Selengkapnya</a>  
    </div>
</div>

<!-- Footer -->
<footer class="bg-primary text-white mt-5 py-4">
        <div class="container">
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
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
