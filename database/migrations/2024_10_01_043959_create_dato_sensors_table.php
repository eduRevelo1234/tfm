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
        Schema::create('datos_sensores', function (Blueprint $table) {
            $table->id('id_dato');
            $table->timestamp('fecha_hora');
            $table->decimal('valor', 5, 2);
            $table->string('tipo_dato', 50);
            $table->foreignId('id_dispositivo')->constrained('dispositivos_iot', 'id_dispositivo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_sensores');
    }
};
