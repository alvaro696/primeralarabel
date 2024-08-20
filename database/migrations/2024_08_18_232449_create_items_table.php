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
        Schema::create('items', function (Blueprint $table) {
            $table->id('id_item');
            $table->timestamps();
            $table->unsignedBigInteger('id_poliza');
            $table->unsignedBigInteger('id_estado');
            $table->string('placa');
            $table->string('clase');
            $table->string('marca');
            $table->string('modelo');
            $table->string('uso');
            $table->string('color');
            $table->text('foto_frontal');
            $table->text('foto_lateral');
            $table->text('foto_trasera');

            $table->foreign('id_poliza')->references('id_poliza')->on('polizas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estado')->references('id_estado')->on('estados')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
