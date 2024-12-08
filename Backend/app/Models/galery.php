<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class galery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'images',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'galeri';
}
