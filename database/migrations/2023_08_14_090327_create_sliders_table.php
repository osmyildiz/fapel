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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('first_title_tr');
            $table->string('first_title_en');
            $table->string('first_title_ar');
            $table->string('second_title_tr');
            $table->string('second_title_en');
            $table->string('second_title_ar');
            $table->string('img');
            $table->integer('is_active')->default(1);
            $table->integer('priority')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
