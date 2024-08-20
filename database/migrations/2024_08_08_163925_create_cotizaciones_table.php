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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->unsignedBigInteger('id_distrito');
            $table->unsignedBigInteger('id_ramo_tipo');
            $table->unsignedBigInteger('id_estado');
            $table->decimal('valor_asegurado', 30, 9);
            $table->decimal('tasa', 30, 9);
            $table->decimal('prima', 30, 9);
            $table->datetime('f_cotizacion');
            $table->timestamps();

            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_distrito')->references('id_distrito')->on('distritos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ramo_tipo')->references('id_ramo_tipo')->on('ramo_tipos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estado')->references('id_estado')->on('estados')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
