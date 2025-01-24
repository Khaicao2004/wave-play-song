<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name',
        'cover_image',
        'audio_file',
        'duration',
        'release_date'
    ];
}
