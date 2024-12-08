<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
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
                    <a class="nav-link text-white" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " href="/dashboard/pembuatan">Pembuatan</a>
                </li>
                <li class="nav-item">
                            <a class="nav-link text-white" href="/dashboard/Mypost">My Post</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link text-white btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
    </div>
 
 
    <div class="content mt-3 p-5">
        <div class=" mb-4">
            <h1>Pembuatan Akun Guru dan Murid</h1>
        </div>
        <div class="d-flex justify-content-start">
            <div class="col-lg-8">
            <form action="{{ route('admin.storeUser') }}" method="POST" class="w-50">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="guru">Guru</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="identity" class="form-label">NISN/NIP:</label>
                    <input type="text" name="identity" id="identity" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" required>
                </div>        
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>  
        </div>
        </div>  
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>