<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['foto_id', 'report_type'];

    public function photo()
    {
        return $this->belongsToMany(foto::class);
    }
}
