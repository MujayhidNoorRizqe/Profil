<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_contents', function (Blueprint $table) {
            $table->string('visi_image')->nullable()->after('misi_text');
            $table->string('misi_image')->nullable()->after('visi_image');
        });
    }

    public function down(): void
    {
        Schema::table('home_contents', function (Blueprint $table) {
            $table->dropColumn(['visi_image', 'misi_image']);
        });
    }
};
