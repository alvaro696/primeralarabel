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
        Schema::create('polizas', function (Blueprint $table) {
            $table->id('id_poliza');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_cotizacion');
            $table->string('cod_poliza');
            $table->date('f_ini');
            $table->date('f_fin');
            $table->string('tipo_pago');
            $table->dateTime('f_registro');
            $table->timestamps();

            $table->foreign('id_cotizacion')->references('id_cotizacion')->on('cotizaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estado')->references('id_estado')->on('estados')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polizas');
    }
};
