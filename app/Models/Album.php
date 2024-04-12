<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['nama_album', 'desc', 'photo', 'user_id'];

    protected $table = 'album';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
