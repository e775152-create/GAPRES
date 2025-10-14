<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cierres', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('total_efectivo', 10, 2)->default(0);
            $table->decimal('total_tarjeta', 10, 2)->default(0);
            $table->decimal('total_general', 10, 2)->default(0);
            $table->unsignedBigInteger('user_id'); // quien cierra el día
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cierres');
    }
};
