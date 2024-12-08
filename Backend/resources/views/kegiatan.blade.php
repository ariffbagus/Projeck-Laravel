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
@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="text-center mb-4">Kegiatan Lomba</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        @foreach ($kegiatans as $kegiatan)
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
<h1 class="text-center mb-4">Kader Adiwiyata</h1>
<div class="text-center mb-4">
        <img src="{{ asset('images/kader.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
</div>
<h1 class="text-center mb-4">KEGIATAN KEGIATAN DI SD NEGERI TEMBALANG SEBAGAI SEKOLAH ADIWIYATA NASIONAL TAHUN 2022</h1>
<div class="text-center mb-4">
        <img src="{{ asset('images/adiwiyata.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
</div>
<h1 class="text-center mb-4">KOMUNITAS DAN EKSTRAKURIKULER</h1>
<h2 class="text-start"> Komunitas di SDN 1 Tembalang</h2>
<h3 class="text-center mb-4">1. KOMUNITAS AGAMA ISLAM</h3>
<div class="text-center mb-4">
        <img src="{{ asset('images/islam.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
</div>
<h3 class="text-center mb-4">2. KOMUNITAS ABAD 21</h3>
<div class="text-center mb-4">
        <img src="{{ asset('images/abad21.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
</div>
<h2 class="text-start"> Extrakurikuler di SDN 1 Tembalang</h2>
<h3 class="text-center mb-4">1. Pramuka</h3>
<div class="text-center mb-4">
        <img src="{{ asset('images/pramuka.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
</div>
<h3 class="text-center mb-4">2. Extra Tari</h3>
<div class="text-center mb-4">
        <img src="{{ asset('images/tari.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
</div>
<h3 class="text-center mb-4">3. Extra Rebana</h3>
<div class="text-center mb-4">
        <img src="{{ asset('images/rebana.png') }}" alt="Kegiatan " class="mx-auto d-block" style="max-width: 100%; height: auto;">
        <img src="{{ asset('images/logosd.png') }}" alt="Kegiatan " class="mx-auto d-block mb-4" style="max-width: 100%; height: auto;">
</div>


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
@endsection
</body>
</html>