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
        Schema::create('ab_shoppingcart', function (Blueprint $table) {
            $table->id()->comment('Primärschlüssel');

            $table->timestamps();

            $table->unsignedBigInteger('ab_creator_id')->comment('Referenz auf den/die Benutzer:in,
            dem der Warenkorb gehört');
            $table->foreign('ab_creator_id')->on('ab_user')->references('id');

            $table->timestamp('ab_createdate')->comment('Zeitpunkt der Erstellung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_shoppingcart');
    }
};
