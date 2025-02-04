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
    public function artists(){
        return $this->belongsToMany(Artist::class, 'song_artists', 'song_id', 'artist_id');
    }
}
