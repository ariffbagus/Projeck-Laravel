<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\galery;
use App\Models\Kegiatan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class blogController extends Controller
{
    public function index()
    {
        // Cek peran pengguna
        if (Auth::user()->role === 'admin') {
            // Admin dapat melihat semua post
            $pengaduan =Layanan::all();
            $pengumumans = Post::all();
            $galeris = galery::all();
            $kegiatans = Kegiatan::all();
        } else {
            // Guru hanya melihat post yang dibuat oleh mereka sendiri
            $pengumumans = Post::where('user_id', Auth::id())->get();
            $galeris = galery::where('user_id', Auth::id())->get();
            $kegiatans = Kegiatan::where('user_id', Auth::id())->get();
            $pengaduan = null; // Set pengaduan menjadi null untuk guru
        }
    
        return view('dashboard.Mypost.index', compact('pengumumans','galeris','kegiatans','pengaduan')); // Mengirimkan semua posts ke view  
  
    }

    public function show($id)
    {
        // Ambil data post berdasarkan ID
        $pengumuman = Post::findOrFail($id); // Gunakan findOrFail untuk memastikan data ada, jika tidak akan muncul 404
    
        // Kirim data post ke view 'create.blog.show'
        return view('dashboard.Mypost.detail.show', compact('pengumuman')); // Pastikan variabelnya 'post', bukan 'posts'
    }
    

    public function store(Request $request) 
    {
       // Validasi data kecuali `user_id`
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg', // Validasi gambar
    ]);

      // Array untuk menampung path setiap gambar
      $imagePaths = [];

      if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Simpan gambar ke storage
            $path = $image->store('images', 'public');
            $imagePaths[] = $path;
        }
    }

    // Tambahkan `user_id` secara manual dengan ID pengguna yang login
    $validatedData['user_id'] = Auth::id();
    $validatedData['images'] = json_encode($imagePaths); // Simpan array path gambar sebagai JSON
        // Debugging: Periksa isi data yang akan dimasukkan
    //dd($validatedData);

    // Simpan data ke dalam tabel `posts`
    Post::create($validatedData);

    // Set pesan sukses
    return redirect()->route('dashboard.Mypost.index')->with('success', 'Data berhasil disimpan!');

    }
    public function destroy($id)
    {
        // Temukan galeri berdasarkan ID
        $pengumuman= Post::findOrFail($id);
    
        // Hapus galeri
       $pengumuman->delete();
    
        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('dashboard.Mypost.index')->with('success', 'Blog berhasil dihapus!');
    }
    public function edit($id)
    {
       $pengumuman = Post::findOrFail($id); // Mengambil galeri berdasarkan ID
        return view('dashboard.Mypost.detail.editblog', compact('pengumuman')); // Mengembalikan tampilan edit
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $imagePaths = [];
    
        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Simpan gambar ke storage
                $path = $image->store('images', 'public');
                $imagePaths[] = $path;
            }
        }
    
        // Siapkan data yang akan diupdate
        $validatedData = [
            'user_id' => Auth::id(),
            'body' => $request->body,
            'title' => $request->title, // Pastikan title juga disertakan
            'images' => json_encode($imagePaths), // Simpan gambar sebagai JSON
        ];
    
        // Temukan galeri berdasarkan ID dan update
       $pengumuman = Post::findOrFail($id);
       $pengumuman->update($validatedData); // Gunakan $validatedData untuk update
    
        // Redirect dengan pesan sukses
        return redirect()->route('dashboard.Mypost.index')->with('success', 'Galery updated successfully.');
    }

}
