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
    Schema::create('abouts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('image')->nullable();

        // Tambahan counter (statistik perusahaan)
        $table->integer('counter1_value')->default(0);
        $table->string('counter1_label')->nullable();
        $table->integer('counter2_value')->default(0);
        $table->string('counter2_label')->nullable();
        $table->integer('counter3_value')->default(0);
        $table->string('counter3_label')->nullable();
        $table->integer('counter4_value')->default(0);
        $table->string('counter4_label')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};