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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_tr'); // Türkçe isim
            $table->string('slug_tr')->unique(); // Türkçe SEO dostu URL

            $table->string('name_en'); // İngilizce isim
            $table->string('slug_en')->unique(); // İngilizce SEO dostu URL

            $table->string('name_ar'); // Arapça isim
            $table->string('slug_ar')->unique(); // Arapça SEO dostu URL
            $table->integer('is_active')->default(1);
            $table->integer('priority')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
