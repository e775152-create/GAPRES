<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('id_pedido');
    $table->unsignedBigInteger('id_producto')->nullable();
    $table->string('nombre');
    $table->decimal('precio', 10, 2);
    $table->integer('cantidad');
    $table->decimal('subtotal', 10, 2)->default(0);
    $table->timestamps();

    $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('cascade');
    $table->foreign('id_producto')->references('id')->on('menus')->onDelete('cascade');
});


    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
