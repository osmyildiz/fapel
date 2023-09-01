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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('blog_categories')->onDelete('set null');

            // Türkçe başlık, slug, içerik ve SEO
            $table->string('title_tr');
            $table->string('slug_tr')->unique();
            $table->text('content_tr');
            $table->string('seo_title_tr')->nullable();
            $table->text('seo_description_tr')->nullable();
            $table->string('seo_keywords_tr')->nullable();

            // İngilizce başlık, slug, içerik ve SEO
            $table->string('title_en');
            $table->string('slug_en')->unique();
            $table->text('content_en');
            $table->string('seo_title_en')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->string('seo_keywords_en')->nullable();

            // Arapça başlık, slug, içerik ve SEO
            $table->string('title_ar');
            $table->string('slug_ar')->unique();
            $table->text('content_ar');
            $table->string('seo_title_ar')->nullable();
            $table->text('seo_description_ar')->nullable();
            $table->string('seo_keywords_ar')->nullable();
            $table->string('img');
            $table->string('img_home');

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
        Schema::dropIfExists('blog_posts');
    }
};
