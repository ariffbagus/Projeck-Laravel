<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\galery;
use App\Models\Layanan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class galeryController extends Controller
{
    public function index()
    {
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
        $galeri = galery::findOrFail($id); // Gunakan findOrFail untuk memastikan data ada, jika tidak akan muncul 404

        // Kirim data post ke view 'create.galery.show'
        return view('dashboard.Mypost.galery.showgalery', compact('galeri'));
    }
    

    public function store(Request $request)
    {
       // Validasi data kecuali `user_id`
    $validatedData = $request->validate([
        'title' => 'required|max:255',
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
    galery::create($validatedData);
  

    // Set pesan sukses
    session()->flash('success', 'Blog anda sudah terdaftar');

        // Redirect atau tindakan selanjutnya
        return redirect()->route('dashboard.Mypost.index');
    }

        public function edit($id)
        {
            $galeri = galery::findOrFail($id); // Mengambil galeri berdasarkan ID
            return view('dashboard.Mypost.galery.editgalery', compact('galeri')); // Mengembalikan tampilan edit
        }
   
        public function update(Request $request, $id)
        {
            // Validasi input
            $request->validate([
                'title' => 'required|max:255',
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
                'title' => $request->title, // Pastikan title juga disertakan
                'images' => json_encode($imagePaths), // Simpan gambar sebagai JSON
            ];
        
            // Temukan galeri berdasarkan ID dan update
            $galeri = galery::findOrFail($id);
            $galeri->update($validatedData); // Gunakan $validatedData untuk update
        
            // Redirect dengan pesan sukses
            return redirect()->route('dashboard.Mypost.index')->with('success', 'Galery updated successfully.');
        }

    public function destroy($id)
{
    // Temukan galeri berdasarkan ID
    $galeri = galery::findOrFail($id);

    // Hapus galeri
    $galeri->delete();

    // Redirect ke halaman yang sesuai dengan pesan sukses
    return redirect()->route('dashboard.Mypost.index')->with('success', 'Galeri berhasil dihapus!');
}

}
