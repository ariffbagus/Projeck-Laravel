<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
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

    <div class="container p-2">
        <h1>{{ $kegiatan->title }}</h1>
        <p>{{ \Carbon\Carbon::parse($kegiatan->created_at)->locale('id')->translatedFormat('l, j F Y') }}</p>
        <p>{{ $kegiatan->body }}</p>
        
        @php
            $images = json_decode($kegiatan->images); // Decode JSON untuk mendapatkan array gambar
            $videos = json_decode($kegiatan->videos); // Decode JSON untuk mendapatkan array video
        @endphp
    
        @if(!empty($images) && is_array($images))
            <h3>Gambar:</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                @foreach($images as $image)
                    <div style="width: 300px; height: 300px; overflow: hidden; border-radius: 5px;">
                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $kegiatan->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endforeach
            </div>
        @endif
    
        @if(!empty($videos) && is_array($videos))
            <h3>Video:</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                @foreach($videos as $video)
                    @php
                        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $video, $matches);
                        $videoId = $matches[1] ?? null;
                    @endphp
                    @if($videoId)
                        <div style="width: 300px; height: 200px; overflow: hidden; border-radius: 5px;">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @else
                        <p>Link video tidak valid: {{ $video }}</p>
                    @endif
                @endforeach
            </div>
        @endif
        <br>
        @guest
        <a href="/kegiatan" class="btn btn-warning">Kembali Kegiatan</a>
        @endguest
        <!-- Tombol Hapus -->
        @auth
            @if (Auth::user()->role === 'admin' || $kegiatan->user_id === Auth::id())
            <a href="{{ route('dashboard.Mypost.index') }}" class="btn btn-warning">Kembali ke daftar Mypost</a>
                <form action="/delete-kegiatan/{{ $kegiatan->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')" class="btn btn-danger">Delete</button>
                </form>
            @endif
        @endauth
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
