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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('img')->nullable();
            $table->string('content_tr')->nullable();
            $table->string('content_en')->nullable();
            $table->string('content_ar')->nullable();
            $table->string('weekday_opening_time')->nullable(); // Hafta içi açılış saati
            $table->string('weekend_opening_time')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->integer('priority')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
