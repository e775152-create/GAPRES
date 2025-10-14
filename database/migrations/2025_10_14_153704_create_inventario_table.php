<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('categoria', 50)->nullable(); // Ej: Bebidas, Carnes, Panes
            $table->integer('cantidad')->default(0);
            $table->string('unidad', 20)->nullable(); // Ej: kg, litros, unidades
            $table->decimal('precio_unitario', 10, 2)->nullable();
            $table->string('estado', 20)->default('Disponible'); // Disponible / Agotado
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
