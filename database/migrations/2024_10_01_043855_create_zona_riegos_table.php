<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zonas_riego', function (Blueprint $table) {
            $table->id('id_zona');
            $table->string('nombre_zona', 100);
            $table->string('ubicacion', 255);
            $table->decimal('humedad_min', 5, 2);
            $table->decimal('humedad_max', 5, 2);
            $table->decimal('temperatura_min', 5, 2);
            $table->decimal('temperatura_max', 5, 2);
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zonas_riego');
    }
};
