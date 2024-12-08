<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Link to Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden; /* Mencegah scrollbar */
        }
        .sidebar {
            min-width: 150px;
            background-color: #63a8ec;
            padding: 20px;
            flex-shrink: 0; /* Mencegah sidebar menyusut */
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto; /* Scroll jika konten terlalu panjang */
        }
        .navbar {
            z-index: 1; /* Pastikan navbar di atas sidebar */
        }
        .main-container {
            display: flex;
            flex: 1;
            margin-top: 70px; /* Tinggi navbar untuk menghindari tumpang tindih */
        }
        .modal {
    z-index: 1050; /* Pastikan modal memiliki z-index yang lebih tinggi */
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary text-white fixed-top">
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
                        <a class="nav-link text-white dropdown-toggle" href="/home" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a class="nav-link" href="/login">Login</a>
                    @endauth
            </ul>
        </div>
    </nav>

    <div class="main-container">
        <div class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    @auth
                    @if (Auth::user()->role === 'admin')
                    <a class="nav-link text-white" href="/dashboard/pembuatan">Pembuatan</a>
                    @endif
                    @endauth
                  </li>
                <li class="nav-item">
                    @auth
                        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'guru')
                            <a class="nav-link text-white" href="/dashboard/Mypost">My Post</a>
                        @endif
                    @endauth
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link text-white btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
    </div>
 

        <div class="content">
            @auth
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'guru')
            <h2>Profil Guru</h2>
            <div class="container">
                <div class="profile mt-4">
                    <img src="{{ isset($guru) && $guru->foto ? asset('storage/' . $guru->foto) : asset('images/profile.png') }}" alt="Foto Profil" class="profile-pic" style="width: 150px; height: 200px;">
                    <br><br>
                    <h3>{{ $guru->nama_guru ?? 'Belum mengisi nama' }}</h3>
                    <p>Email: {{ $guru->email ?? 'Belum mengisi email' }} </p>
                    <p>NIP: {{ $guru->nip ?? 'Belum mengisi NIP' }} </p>
                    <p>Nomor Telepon: {{ $guru->no_telp ?? 'Belum mengisi nomor telepon' }}</p>
                    <p>Alamat: {{ $guru->alamat ?? 'Belum mengisi alamat' }} </p>
                </div>
            @endif
            @endauth

            @auth
            @if (Auth::user()->role === 'siswa')
            <h2>Profil Siswa</h2>
            <div class="container">
                <div class="profile mt-4">
                    <img src="{{ isset($siswa) && $siswa->foto ? asset('storage/' . $siswa->foto) : asset('images/profile.png') }}" alt="Foto Profil" class="profile-pic" style="width: 150px; height: 200px;">
                    <br><br>
                    <h3>{{ $siswa->nama_siswa ?? 'Belum mengisi ' }}</h3>
                    <p>Wali: {{ $siswa->wali ?? 'Belum mengisi ' }} </p>
                    <p>Kelas: {{ $siswa->kelas ?? 'Belum mengisi ' }} </p>
                    <p>NISN: {{ $siswa->nisn ?? 'Belum mengisi ' }} </p>
                    <p>Tanggal Lahir: 
                        {{ $siswa->tgl_lahir ? \Carbon\Carbon::parse($siswa->tgl_lahir)->format('d-m-Y') : 'Belum mengisi' }}
                    </p>
                    <p>Alamat: {{ $siswa->alamat ?? 'Belum mengisi ' }} </p>
                </div>
            @endif
            @endauth
        </div>


        <!-- Button trigger modal -->
 <div class="container mt-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile">Edit Profile</button>
    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfile">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @auth
                @if (Auth::user()->role === 'admin' || Auth::user()->role === 'guru')
                <form action="{{ route('dashboard.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_guru">Nama Guru</label>
                            <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="{{ $guru->nama_guru ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $guru->email ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" value="{{ $guru->nip ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $guru->no_telp ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control">{{ $guru-> alamat ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Profil</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            @if(isset($guru->foto) && $guru->foto)
                                <img src="{{ asset($guru->foto) }}" alt="Foto Profil" class="mt-2" style="width: 100px; height: auto;">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
                @endif
                @endauth

                @auth
                @if (Auth::user()->role === 'siswa')
                <form action="{{ route('dashboard.updatesiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{ $siswa->nama_siswa ?? '' }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="wali">Wali</label>
                            <input type="text" name="wali" id="wali" class="form-control" value="{{ $siswa->kelas ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $siswa->kelas ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $siswa->nisn ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir *2005-07-15 :</label>
                            <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ $siswa->tgl_lahir ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control">{{ $siswa-> alamat ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Profil</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            @if(isset($siswa->foto) && $siswa->foto)
                                <img src="{{ asset($siswa->foto) }}" alt="Foto Profil" class="mt-2" style="width: 100px; height: auto;">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>