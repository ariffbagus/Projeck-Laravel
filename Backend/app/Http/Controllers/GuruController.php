<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function dashboard()
    {
        // Ambil data guru berdasarkan user yang login
        $guru = Guru::where('user_id', Auth::id())->first();
        return view('dashboard.index', compact('guru'));
    }


    public function edit()
    {
        // Ambil data guru untuk diedit
        $guru = Guru::where('user_id', Auth::id())->first();
        return view('dashboard.edit', compact('guru'));
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nip' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Ambil atau buat data guru
        $guru = Guru::updateOrCreate(
            ['user_id' => Auth::id()],
            [  
                'nama_guru' => $request->nama_guru,
                'email' => $request->email,
                'nip' => $request->nip,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]
        );

        // Jika ada foto yang diupload
        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($guru->foto) {
                Storage::delete($guru->foto);
            }
            // Simpan gambar baru
            $guru->foto = $request->file('foto')->store('images','public');
            $guru->save();
        }

        return redirect()->route('dashboard.index')->with('success', 'Profil berhasil diperbarui.');
    }
}