<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class  SiswaController extends Controller
{
    public function dashboard()
    {
        // Ambil data guru berdasarkan user yang login
        $siswa = Siswa::where('user_id', Auth::id())->first();
        return view('dashboard.index', compact('siswa'));
    }


    public function editsiswa()
    {
        // Ambil data guru untuk diedit
        $siswa = Siswa::where('user_id', Auth::id())->first();
        return view('dashboard.edit', compact('guru'));
    }

    public function updatesiswa(Request $request)
    {
        
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'required|string|max:255',
            'kelas' => 'nullable|string|max:15',
            'tgl_lahir' => 'nullable|string|date_format:Y-m-d',
            'wali' => 'nullable|string',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Ambil atau buat data guru
        $siswa= Siswa::updateOrCreate(
            ['user_id' => Auth::id()],
            [  
                'nama_siswa' => $request->nama_siswa,
                'nisn' => $request->nisn,
                'kelas' => $request->kelas,
                'wali' => $request->wali,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
            ]
        );

        // Jika ada foto yang diupload
        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($siswa->foto) {
                Storage::delete($siswa->foto);
            }
            // Simpan gambar baru
            $siswa->foto = $request->file('foto')->store('images','public');
            $siswa->save();
        }

        return redirect()->route('dashboard.index')->with('success', 'Profil berhasil diperbarui.');
    }
}