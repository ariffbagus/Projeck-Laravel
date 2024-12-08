<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Profil Guru</title>
    <!-- Link to Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    <a class="nav-link text-white btn" href="/login">Login</a>
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
                  @auth
                  @if (Auth::user()->role === 'admin')
                  <a class="nav-link text-white" href="/dashboard/pembuatan">Pembuatan</a>
                  @endif
                  @endauth
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/dashboard/Mypost">My Post</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link text-white btn bg-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <div class="content p-4">
            <div class="Modal">
            <h2>My Post</h2>
            <section>
                <!--Pop up Modal -->
              <div class="link p-1">
                    <button class="btn btn-primary" data-bs-target="#blog2" data-bs-toggle="modal" data-bs-dismiss="modal">Tambah</button>
             </div>
             <div class="modal fade" id="blog2" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                      <div class="link">
                          <button class="btn btn-primary" data-bs-target="#galery1" data-bs-toggle="modal" data-bs-dismiss="modal">Gallery</button>
                          <button class="btn btn-warning " data-bs-target="#blog2" data-bs-toggle="modal" data-bs-dismiss="modal">Berita</button>
                          <button class="btn btn-primary" data-bs-target="#kegiatan3" data-bs-toggle="modal" data-bs-dismiss="modal">Kegiatan</button>
                         </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <h1 class="modal-title fs-5" id="blog2">Tambahkan Berita</h1>
                      <form action="/create-post" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}">
                             @error('title')
                              <div class="invalid-feedback">
                                       {{ $message }}
                              </div>    
                              @enderror
                          </div>
                          <div class="form-group">
                            <label for="images">Gambar</label>
                            <input type="file" name="images[]" id="images" class="form-control @error('images')is-invalid @enderror" multiple required value="{{ old('images') }}"> 
                            @error('images')
                            <div class="invalid-feedback">
                                     {{ $message }}
                            </div>    
                            @enderror
                        </div>
                          <div class="form-group">
                              <label for="body">Body</label>
                              <textarea type="text" class="form-control @error('body')is-invalid @enderror" rows="7" id="body" name="body" required value="{{ old('body') }}"></textarea>
                             @error('body')
                              <div class="invalid-feedback">
                                       {{ $message }}
                              </div>    
                              @enderror
                          </div>
                          <div class="p-2">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                          </div>
                        </form>
                  </div>
                </div>
              </div>
            </div>
  
          <div class="modal fade" id="galery1" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg ">
                  <div class="modal-content">
                    <div class="modal-header">
                        <div class="link">
                            <button class="btn btn-warning" data-bs-target="#galery1" data-bs-toggle="modal" data-bs-dismiss="modal">Gallery</button>
                            <button class="btn btn-primary" data-bs-target="#blog2" data-bs-toggle="modal" data-bs-dismiss="modal">Berita</button>
                            <button class="btn btn-primary" data-bs-target="#kegiatan3" data-bs-toggle="modal" data-bs-dismiss="modal">Kegiatan</button>
                           </div>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="modal-title fs-5" id="galery1">Tambahkan Galery </h1>
                        <form action="/create-galery" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}">
                             @error('title')
                              <div class="invalid-feedback">
                                       {{ $message }}
                              </div>    
                              @enderror
                          </div>
                          <div class="form-group">
                            <label for="images">Gambar</label>
                            <input type="file" name="images[]" id="images" class="form-control @error('images')is-invalid @enderror" multiple required value="{{ old('images') }}"> 
                            @error('images')
                            <div class="invalid-feedback">
                                     {{ $message }}
                            </div>    
                            @enderror
                            <div class="p-2">
                              <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                         </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="modal fade" id="kegiatan3" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                        <div class="link">
                            <button class="btn btn-primary" data-bs-target="#galery1" data-bs-toggle="modal" data-bs-dismiss="modal">Gallery</button>
                            <button class="btn btn-primary" data-bs-target="#blog2" data-bs-toggle="modal" data-bs-dismiss="modal">Berita</button>
                            <button class="btn btn-warning" data-bs-target="#kegiatan3" data-bs-toggle="modal" data-bs-dismiss="modal">Kegiatan</button>
                           </div>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="modal-title fs-5" id="kegiatan3">Tambahkan Kegiatan</h1>
                        <form action="/create-kegiatan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}">
                               @error('title')
                                <div class="invalid-feedback">
                                         {{ $message }}
                                </div>    
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="images">Gambar</label>
                              <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" multiple value="{{ old('images') }}"> 
                              @error('images')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>    
                              @enderror
                          </div>
                          <div class="form-group">
                            <label for="videos">Link Video (pisahkan dengan koma)</label>
                            <input type="text" name="videos" id="videos" class="form-control @error('videos') is-invalid @enderror" value="{{ old('videos') }}" placeholder="https://youtube.com/watch?v=xxxx, https://youtube.com/watch?v=yyyy"> 
                            @error('videos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>    
                            @enderror
                        </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea type="text" class="form-control @error('body')is-invalid @enderror" rows="7" id="body" name="body" required value="{{ old('body') }}"></textarea>
                               @error('body')
                                <div class="invalid-feedback">
                                         {{ $message }}
                                </div>    
                                @enderror
                            </div>
                            <div class="p-2">
                              <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>
                          </form>
                    </div>
                  </div>
                </div>
              </div>
            
            </section>
        
            </div> 
    
            <div class="tabel p-3">
            <table class="table">
                <h4>Berita</h4>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Author</th>
                    <th scope="col">content</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pengumumans as $pengumuman)    
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ Str::limit($pengumuman ['title'],20 )}}</td>
                      <td>{{ $pengumuman->user->name }}</td>
                      <td>{{ Str::limit($pengumuman ['body'],20 )}}</td>
                      <td>
                        @php
                        $images = json_decode($pengumuman->images); // Decode JSON untuk mendapatkan array gambar
                    @endphp
                    @if(!empty($images))
                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $pengumuman->title }}" style="width: 200px; height: 100px;">
                    @endif
                      </td>
                      <td>
                      <td>
                        <a href="/dashboard/Mypost/detail/{{ $pengumuman->id }}" class="btn btn-info">view</a>
                        <a href="/dashboard/Mypost/detail/{{  $pengumuman->id }}/edit " class="btn btn-warning">Edit</a>
                        <form action="/delete-post/{{ $pengumuman->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table p-3">
                <h4>Gallery</h4>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th> 
                    <th scope="col">Author</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($galeris as $galeri)    
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ Str::limit($galeri ['title'],20 ) }}</td>
                      <td>{{ $galeri->user->name }}</td>
                      <td>
                        @php
                        $images = json_decode($galeri->images); // Decode JSON untuk mendapatkan array gambar
                    @endphp
                    @if(!empty($images))
                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $galeri->title }}" style="width: 200px; height: 100px;">
                    @endif
                      </td>
                      <td>
                        <a href="/dashboard/Mypost/galery/{{ $galeri->id }}" class="btn btn-info">view</a>
                        <a href="/dashboard/Mypost/galery/{{  $galeri->id }}/edit " class="btn btn-warning">Edit</a>
                        <form action="/delete-galery/{{ $galeri->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?')">Hapus </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table p-3">
                <h4>Kegiatan</h4>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Author</th>
                    <th scope="col">content</th>
                    <th scope="col">Media</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kegiatans as $kegiatan)    
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ Str::limit($kegiatan['title'],20)}}</td>
                      <td>{{ $kegiatan->user->name }}</td>
                      <td>{{ Str::limit($kegiatan ['body'],20)}}</td>
                      <td>
                        @php
                        $images = json_decode($kegiatan->images); // Decode JSON untuk mendapatkan array gambar
                         $videos = json_decode($kegiatan->videos); // Decode JSON untuk mendapatkan array video
                        @endphp

                        @if(!empty($images))
                          <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $kegiatan->title }}" style="width: 200px; height: 100px;">
                      @elseif(!empty($videos))
                          @php
                              // Mengambil ID video dari link YouTube
                              preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videos[0], $matches);
                              $videoId = $matches[1] ?? null; // Ambil ID video jika ada
                          @endphp
                          @if($videoId)
                              <iframe width="200" height="auto" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                          @else
                              <p>Link video tidak valid: {{ $videos[0] }}</p>
                          @endif
                      @endif
                    </td>
                      <td>
                        <a href="/dashboard/Mypost/kegiatan/{{ $kegiatan->id }}" class="btn btn-info">view</a>
                        <a href="/dashboard/Mypost/kegiatan/{{  $kegiatan->id }}/edit " class="btn btn-warning">Edit</a>
                        <form action="/delete-kegiatan/{{ $kegiatan->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?')">Hapus </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if (Auth::check() && Auth::user()->role === 'admin')
            <table class="table p-3">
              <h4>Pengaduan</h4>
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Pesan</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              @foreach ($pengaduan as $aduan)
              @if (in_array($aduan->status, ['baru', 'diproses']))
                  <tr>
                      <td scope="row">{{ $loop->iteration }}</td>
                      <td>{{ $aduan->nama }}</td>
                      <td>{{ $aduan->body }}</td>
                      <td>{{ ucfirst($aduan->status) }}</td>
                      <td>
                          <form action="{{ route('pengaduan.updateStatus', $aduan->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('PATCH')
                              @if ($aduan->status == 'baru')
                                  <input type="hidden" name="status" value="diproses">
                                  <button type="submit" class="btn btn-warning btn-sm">Diproses</button>
                              @elseif ($aduan->status == 'diproses')
                                  <input type="hidden" name="status" value="selesai">
                                  <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                              @endif
                          </form>
                      </td>
                  </tr>
              @endif
             @endforeach
            </table>
            @endif
        </div>
  </div> 
</div>
    <!-- Link to Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3"></script>
</body>
</html>