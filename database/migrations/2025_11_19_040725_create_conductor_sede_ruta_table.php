<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conductor_sede_ruta', function (Blueprint $table) {
            $table->id('id_asignacion');

            $table->unsignedBigInteger('id_conductor');
            $table->unsignedBigInteger('id_sede');
            $table->unsignedBigInteger('id_ruta');

            $table->date('fecha_alta')->default(value: DB::raw('CURRENT_DATE'));
            $table->boolean('activo')->default(true);
            $table->timestamp('creado_en')->useCurrent();

            // Relaciones
            $table->foreign('id_conductor')
                  ->references('id_conductor')
                  ->on('conductores')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('id_sede')
                  ->references('id_sede')
                  ->on('sedes')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('id_ruta')
                  ->references('id_ruta')
                  ->on('rutas')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conductor_sede_ruta');
    }
};
