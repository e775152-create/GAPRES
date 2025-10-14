<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('set null');
            $table->decimal('monto', 10, 2);
            $table->date('fecha_pago');
            $table->string('tipo_pago')->nullable(); // quincena, bono, propina, etc.
            $table->text('observacion')->nullable();
            $table->string('estado')->default('Realizado');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
