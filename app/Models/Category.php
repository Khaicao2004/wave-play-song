<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'cover_image',
        'description',
    ];

    public function songs(){
        return $this->belongsToMany(Song::class, 'song_categories', 'category_id', 'song_id');
    }
}
