<?php

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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('title_tr')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('description_tr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('canonical_tr')->nullable();
            $table->string('canonical_en')->nullable();
            $table->string('canonical_ar')->nullable();
            $table->string('twitter_name')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('keywords_tr')->nullable();
            $table->string('keywords_en')->nullable();
            $table->string('keywords_ar')->nullable();
            // Diğer SEO bileşenleri (keywords, canonical, vb.) burada eklenebilir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};
