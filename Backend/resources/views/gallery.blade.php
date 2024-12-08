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
<div class="container text-center mb-4">
    <h1 class="text-center mb-4">Galeri Foto</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        @foreach ($galeris as $galeri)
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
<div class="container text-center">
    <h1 class="text-center mb-4">Galeri Video</h1>
    <div class="text-center mb-3">
        <a href="https://www.youtube.com/@sdnegeritembalang2514" target="_blank">
            <img src="{{ asset('images/logo.png') }}" alt="Youtube" class="img-fluid rounded p-2 " style="width: 150px; border:2px solid rgb(63, 136, 160);">
        </a><br>
        <h5><a href="https://www.youtube.com/@sdnegeritembalang2514" class="text-white me-2 btn btn-danger mt-2"> Youtube Resmi SDN 1 Tembalang</a></h5>
    </div>
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