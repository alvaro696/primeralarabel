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
        Schema::create('ramo_tipos', function (Blueprint $table) {
            $table->id('id_ramo_tipo');
            $table->timestamps();
            $table->string('ramo_tipo');
            $table->unsignedBigInteger('id_ramo');

            $table->foreign('id_ramo')->references('id_ramo')->on('ramos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramo_tipos');
    }
};
