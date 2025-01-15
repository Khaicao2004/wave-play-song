<?php

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('song_genres', function (Blueprint $table) {
            $table->foreignIdFor(Song::class)->constrained();
            $table->foreignIdFor(Genre::class)->constrained();
 
            $table->primary(['song_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('song_genres');
    }
};
