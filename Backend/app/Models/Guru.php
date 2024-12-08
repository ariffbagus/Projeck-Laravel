<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_guru',
        'user_id',
        'nip',
        'alamat',
        'no_telp',
        'email',
        'foto',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'guru';
}
