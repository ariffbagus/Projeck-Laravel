<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'images',
        'body',
        'videos',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'kegiatan';
}
