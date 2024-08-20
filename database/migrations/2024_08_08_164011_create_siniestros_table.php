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
        Schema::create('siniestros', function (Blueprint $table) {
            $table->id('id_siniestro');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_poliza');
            $table->date('f_sinietro');
            $table->date('f_denuncia');
            $table->text('descripcion');
            $table->date('f_registro');
            $table->timestamps();

            $table->foreign('id_poliza')->references('id_poliza')->on('polizas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estado')->references('id_estado')->on('estados')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siniestros');
    }
};
