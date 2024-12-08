<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner SDN Tembalang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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


    <div class="container mt-4">
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
            <div class="col-md-4">
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
    <div class="container text-center mb-4">
        <h1 class="text-center mb-4">Berita</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            @foreach ($pengumumans as $pengumuman)
            <div class="col">
                <div class="card h-100">
                    @php
                        $images = json_decode($pengumuman->images); // Decode JSON untuk mendapatkan array gambar
                    @endphp
                    @if(!empty($images))
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $pengumuman->title }}" style="width: 355px; height: 200px;">
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($pengumuman ['title'],40)}}</h5>
                        <a href="/dashboard/Mypost/detail/{{ $pengumuman->id }}" class="btn btn-danger">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

   <div class="container mt-4">
       <img src="{{ asset('images/sd.png') }}" alt="Kegiatan " class="text-start mx-auto d-block" style="max-width: 100%; height: auto;">
        <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
        <h1 class="text-center mb-4 p-2">Kurikulum SDN Tembalang</h1>
        </div>
        
        <p>
            Kurikulum merupakan seperangkat rencana dan pengaturan mengenai tujuan, isi, dan bahan pelajaran serta cara yang digunakan sebagai pedoman penyelenggaraan kegiatan pembelajaran untuk mencapai tujuan pendidikan tertentu. 
            Dalam pelaksanaan Kurikulum Tingkat Satuan Pendidikan (KTSP), Departemen Pendidikan dan Kebudayaan telah menetapkan kerangka dasar Standar Kompetensi Lulusan (SKL), Standar Kompetensi (SK), dan Kompetensi Dasar (KD) sesuai dengan Permendikbud nomor 67 tahun 2013 tentang Struktur Kurikulum, Permendikbud nomor 65 tahun 2013 tentang Standar Proses, Permendikbud No 66 thn 2013 tentang standar penilaian, Permen_thn 2013 nomor 54 lampiran SKL tahun 2013.
        </p>

        <p>
            Satuan pendidikan diwujudkan dalam bentuk Kurikulum Tingkat Satuan Pendidikan (KTSP), hal ini sesuai dengan yang diamanatkan di dalam Peraturan Pemerintah Republik Indonesia Nomor 13 tahun 2015 tentang perubahan kedua atas Peraturan Pemerintah Nomor 19 tahun 2005 tentang Standar Nasional Pendidikan pasal 1 ayat 20 “Kurikulum Tingkat Satuan Pendidikan adalah Kurikulum operasional yang disusun oleh dan dilaksanakan dimasing-masing satuan pendidikan.”
        </p>

        <p>
            Kondisi ideal yang diharapkan SDN Tembalang adalah terpenuhinya delapan Standar Nasional Pendidikan, sehingga penyelenggaraan dan hasil pendidikan yang bermutu dapat tercapai. Namun demikian, kondisi nyata SDN Tembalang masih harus terus berbenah dan mengupayakan pemenuhan delapan Standar Nasional Pendidikan. Secara rinci kondisi nyata SDN Tembalang adalah sebagai berikut:
        </p>

        <h3>Standar Kompetensi Lulusan</h3>
        <p>
            Kondisi nyata sekolah perlu membiasakan sikap-sikap yang baik di sekolah dengan pengawalan yang serius, kriteria kelulusan masih rendah, sehingga perlu dinaikan agar sesuai SNP yaitu 75, dan kompetensi keterampilan peserta didik kritis dan produktif yang dimiliki peserta didik perlu ditingkatkan. 
            Kondisi ideal Lulusan memiliki kompetensi sikap minimal baik, lulusan memiliki kompetensi dimensi pengetahuan minimal 75, dan lulusan memiliki kompetensi keterampilan seperti kolaborasi, mandiri, komunikatif, kritis dan produktif. 
            Lulusan SDN Tembalang sudah 100% lulus dengan baik tetapi perlu ditingkatkan terutama pada dimensi sikap dan keterampilan.
        </p>

        <h3>Standar Isi</h3>
        <p>
            Kondisi nyata Komite dan orang tua belum aktif / berperan dalam penyampaian aspirasi dalam review kurikulum dan Perangkat pembelajaran belum teratur dalam pembuatannya. 
            Kondisi ideal, terdapat kurikulum yang sudah direview dan direvisi oleh unsur dewan guru, komite, narasumber, pihak dinas pendidikan yang menampung aspirasi semua pihak, kurikulum di kembangkan sesuai dengan prosedur dan terdapat perangkat pembelajaran yang sesuai. 
            Kurikulum telah di review dan direvisi sesuai dengan prosedur yang ditetapkan akan tetapi perlu ditingkatkan dalam peran serta komite dan orang tua siswa dalam perumusan kurikulum tersebut.
        </p>
  </div>


  <h1 class="text-center mb-2">Kalender Akademik</h1>
  <br>

    <div class="card-group mt-4 px-5">
        
    <div class="card text-center">
      <a href="https://drive.google.com/file/d/1RMp5cSK7KQhbqC-ySllY6qI9D82XsBGi/view"><img src="{{ asset('images/kalender.jpg') }}" alt="Kegiatan " style="width: 200px; height: 250px;"></a>
      <div class="card-body">
        <a href="https://drive.google.com/file/d/1RMp5cSK7KQhbqC-ySllY6qI9D82XsBGi/view"><p class="card-title">KALENDER AKADEMIK TAHUN PELAJARAN 2020/2021</p></a>
      </div>
    </div>
    <div class="card text-center">
       <a href="https://drive.google.com/file/d/1FKbQMrWboprzaVDar_H1Ozh9bUugPkLC/view"><img src="{{ asset('images/kalender.jpg') }}" alt="Kegiatan " style="width: 200px; height: 250px;"></a>
      <div class="card-body">
        <a href="https://drive.google.com/file/d/1FKbQMrWboprzaVDar_H1Ozh9bUugPkLC/view"><p class="card-title">KALENDER AKADEMIK TAHUN PELAJARAN 2021 / 2022</p></a>
      </div>
    </div>
    <div class="card text-center">
        <a href="https://drive.google.com/file/d/19kso2xWRongUIs6xjSAuSHE95ReLuSlk/view"><img src="{{ asset('images/kalender.jpg') }}" alt="Kegiatan " style="width: 200px; height: 250px;"></a>
      <div class="card-body">
        <a href="https://drive.google.com/file/d/19kso2xWRongUIs6xjSAuSHE95ReLuSlk/view"><p class="card-title">KALENDER AKADEMIK TAHUN PELAJARAN 2022 / 2023</p></a>
      </div>
    </div>
    </div>

    <div class="text-center mt-4">
        <div class="text-center mb-3">
            <a href="https://www.youtube.com/@PembelajaranSDKotaSemarang" target="_blank">
                <img src="{{ asset('images/logokl.jpg') }}" alt="Youtube" class="img-fluid rounded p-2 " style="width: 200px; border-style:solid; border-color:rgb(0, 0, 0); border-radius:50%;">
            </a><br>
        <a href="https://www.youtube.com/@PembelajaranSDKotaSemarang" target="_blank" class="btn btn-primary mt-2">Akun resmi pembelajaran Sd Semarang</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
