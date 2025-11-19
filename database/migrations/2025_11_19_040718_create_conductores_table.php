<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conductores', function (Blueprint $table) {
            $table->id('id_conductor');
            $table->string('nombre_completo', 150);
            $table->string('nombre', 80)->nullable();
            $table->string('apellido_paterno', 80)->nullable();
            $table->string('apellido_materno', 80)->nullable();
            $table->string('numero_licencia', 50)->nullable();
            $table->boolean('vigente')->default(true);
            $table->timestamp('creado_en')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conductores');
    }
};
