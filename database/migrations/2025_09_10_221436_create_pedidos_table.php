<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('num_mesa')->default(0);
            $table->date('fecha')->nullable();
            $table->decimal('total', 10, 2);
            $table->enum('estado', ['PENDIENTE','FINALIZADO'])->default('PENDIENTE');
            $table->unsignedBigInteger('id_usuario')->default(1); // Usuario que creó el pedido
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
