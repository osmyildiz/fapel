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
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_tr');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('slug_tr')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_ar')->unique();
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
        Schema::dropIfExists('gallery_categories');
    }
};
