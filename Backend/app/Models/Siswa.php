<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'kelas',
        'user_id',
        'nisn',
        'alamat',
        'tgl_lahir',
        'wali',
        'foto',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'siswa';
}

