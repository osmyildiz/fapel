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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('menu_categories');
            $table->string('name_tr');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('img');

            $table->text('description_tr')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('is_active')->default(1);
            $table->integer('priority')->default(0);
            $table->softDeletes();
            $table->timestamps();

            // SEO alanları
            $table->string('seo_title_tr')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->string('seo_title_ar')->nullable();
            $table->text('seo_description_tr')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->text('seo_description_ar')->nullable();
            $table->string('seo_keywords_tr')->nullable();
            $table->string('seo_keywords_en')->nullable();
            $table->string('seo_keywords_ar')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
