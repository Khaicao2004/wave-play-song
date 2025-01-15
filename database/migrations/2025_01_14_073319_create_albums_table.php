<?php

use App\Models\Artist;
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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Artist::class)->constrained(); // Nghệ sĩ
            $table->string('name'); // Tên albums
            $table->string('version')->nullable(); // Tên phiên bản
            $table->string('cover_image')->nullable(); // Ảnh bìa albums
            $table->year('release_year'); // Năm phát hành albums

            $table->unique(['name','artist_id','version','release_year']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
