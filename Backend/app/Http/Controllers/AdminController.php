<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.pembuatan');
    }
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'role' => 'required|in:guru,siswa',
            'identity' => 'required|string', // NISN atau NIP
            'alamat' => 'required|string',
        ]);
    
        // Buat User
        $user = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);
    
        // Simpan data tambahan berdasarkan role
        if ($validated['role'] === 'siswa') {
            Siswa::create([
                'user_id' => $user->id,
                'nisn' => $validated['identity'],
                'alamat' => $validated['alamat'],
                'nama_siswa' => $validated['nama'],
            ]);

        } elseif ($validated['role'] === 'guru') {
            Guru::create([
                'user_id' => $user->id,
                'nip' => $validated['identity'],
                'alamat' => $validated['alamat'],
                'nama_guru' => $validated['nama'],
            ]);
        }
    
    return redirect()->back()->with('success', 'Akun berhasil dibuat!');
}

}
