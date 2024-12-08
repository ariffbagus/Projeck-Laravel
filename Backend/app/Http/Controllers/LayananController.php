<?php

namespace App\Http\Controllers;


use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    public function index(){
        return view('layanan');
    }
    
    public function store(Request $request) 
{
    // Validasi data kecuali `user_id`
    $validatedData = $request->validate([
        'nama' => 'required|max:255',
        'no_telp' => 'required|max:255',
        'email' => 'nullable|email',
        'body' => 'required|string',
    ]);
    // Simpan data tanpa user_id
    $validatedData['nama'] = htmlspecialchars($validatedData['nama']);
    $validatedData['no_telp'] = htmlspecialchars($validatedData['no_telp']);
    $validatedData['email'] = htmlspecialchars($validatedData['email']);
    $validatedData['body'] = htmlspecialchars($validatedData['body']);
    Layanan::create($validatedData);

    // Set pesan sukses
    return redirect()->route('layanan.index')->with('success', 'Data berhasil disimpan!');
}
public function update(Request $request, $id)
{
    $pengaduan = Layanan::findOrFail($id);

    $status = $request->status;
    if (in_array($status, ['baru', 'diproses', 'selesai'])) {
        $pengaduan->status = $status;
        $pengaduan->save();
    }

    return redirect()->back()->with('success', 'Status berhasil diperbarui!');
}
}