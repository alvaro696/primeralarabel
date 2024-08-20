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
        Schema::create('siniestros_detalles', function (Blueprint $table) {
            $table->id('id_siniestro_detalle');
            $table->unsignedBigInteger('id_siniestro');
            $table->text('ruta');
            $table->string('tipo_archivo');
            $table->timestamps();

            $table->foreign('id_siniestro')->references('id_siniestro')->on('siniestros')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siniestros_detalles');
    }
};
