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
        Schema::create('inventario', function (Blueprint $table) {
        $table->id();
        $table->foreignId('producto_id')->constrained('productos');
        $table->integer('cantidad_disponible');
        $table->integer('stock_minimo');
        $table->string('modelo')->nullable();
        $table->text('notas')->nullable();
        $table->timestamps();
        $table->unique('producto_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
