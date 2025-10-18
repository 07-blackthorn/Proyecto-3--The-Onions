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
        Schema::create('reparaciones', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_nombre');
            $table->string('cliente_telefono');
            $table->string('cliente_email');
            $table->string('dispositivo');
            $table->string('marca');
            $table->string('modelo');
            $table->text('problema');
            $table->decimal('costo_estimado', 8, 2)->nullable();
            $table->date('fecha_ingreso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparaciones');
    }
};
