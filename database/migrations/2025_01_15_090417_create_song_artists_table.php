<?php

use App\Models\Artist;
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
        Schema::create('song_artists', function (Blueprint $table) {
            $table->foreignIdFor(Song::class)->constrained();
            $table->foreignIdFor(Artist::class)->constrained();
 
            $table->primary(['song_id', 'artist_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('song_artists');
    }
};
