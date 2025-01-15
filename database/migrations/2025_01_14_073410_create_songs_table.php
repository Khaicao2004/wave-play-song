<?php

use App\Models\Artist;
use App\Models\Genre;
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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên bài hát
            $table->string('cover_image')->nullable(); // Ảnh bìa bài hát
            $table->time('duration');  // Thời lượng bài hát
            $table->date('release_date');  // Ngày phát hành

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
