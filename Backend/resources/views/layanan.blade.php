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
    padding: 0;}
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
<div class="container d-flex justify-content-center align-items-center " style="height: 100vh;">
    <div class="row col-lg-9">
    <form action="{{ route('layanan.store') }}" class="bg-info p-4 rounded shadow" method="POST">
        @csrf
        <h2 class="text-center mb-4">Layanan Pengaduan SDN Tembalang </h2>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name ="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
        <label for="no_telp" class="form-label">No.telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Pesan</label>
            <textarea class="form-control" id="body" name="body" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
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