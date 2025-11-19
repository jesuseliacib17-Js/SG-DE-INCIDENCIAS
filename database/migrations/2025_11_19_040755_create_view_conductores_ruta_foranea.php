<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW vw_conductores_ruta_foranea AS
            SELECT
              c.id_conductor,
              c.nombre_completo,
              s.nombre_sede,
              r.nombre AS nombre_ruta,
              r.tipo AS tipo_ruta,
              csr.fecha_alta,
              csr.activo
            FROM conductor_sede_ruta csr
            JOIN conductores c ON csr.id_conductor = c.id_conductor
            JOIN sedes s ON csr.id_sede = s.id_sede
            JOIN rutas r ON csr.id_ruta = r.id_ruta
            WHERE r.tipo = 'FORANEA';
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS vw_conductores_ruta_foranea");
    }
};
