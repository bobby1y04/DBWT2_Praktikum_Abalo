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
        Schema::table('ab_article', function (Blueprint $table) {
            $table->string('ab_image',200)->nullable(true)->after('ab_createdate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ab_article', function (Blueprint $table) {
            $table->dropColumn('ab_image');
        });
    }
};
