<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('abouts', function (Blueprint $table) {
            if (!Schema::hasColumn('abouts', 'hero_image')) {
                $table->string('hero_image')->nullable()->after('image');
            }
            if (!Schema::hasColumn('abouts', 'counter_bg')) {
                $table->string('counter_bg')->nullable()->after('hero_image');
            }
        });
    }

    public function down(): void {
        Schema::table('abouts', function (Blueprint $table) {
            if (Schema::hasColumn('abouts', 'hero_image')) {
                $table->dropColumn('hero_image');
            }
            if (Schema::hasColumn('abouts', 'counter_bg')) {
                $table->dropColumn('counter_bg');
            }
        });
    }
};
