<?php

use Illuminate\Database\Seeder;

class CreditStatusTableSeeder extends Seeder
{
    //Schema table name to migrate
    public $set_schema_table = 'credit_status';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->set_schema_table)->delete();
        DB::table($this->set_schema_table)->insert([
            'id' => 1,
            'description' => 'Desarrollo del Análisis',
            'short_desc' => 'Análisis',
            'appText' => 'Su crédito está en <span>ANALISIS DE CREDITO</span>',
            'colorHEX' => 'd0d258',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 2,
            'description' => 'Solicitud Completa',
            'short_desc' => 'Completa',
            'appText' => 'Su crédito con folio %% está <span>APROBADO</span>',
            'colorHEX' => '50bc55',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 3,
            'description' => 'Solicitud Condicionada Por Crédito',
            'short_desc' => 'Condicionada Por Crédito',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 4,
            'description' => 'Revisión del Análisis',
            'short_desc' => 'Revisión',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 5,
            'description' => 'Mesa de Control',
            'short_desc' => 'Mesa de Control',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 6,
            'description' => 'Condicionada',
            'short_desc' => 'Condicionada',
            'appText' => 'Su crédito está en estatus <span>CONDICIONAR</span>',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 7,
            'description' => 'Rechazado',
            'short_desc' => 'Rechazado',
            'appText' => 'Su crédito NO fue <span>APROBADO</span>',
            'colorHEX' => 'e32121',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 8,
            'description' => 'Decisión',
            'short_desc' => 'Decisión',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 9,
            'description' => 'Primera Ministración',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 10,
            'description' => 'Crédito Vigente',
            'short_desc' => 'Vigente',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 11,
            'description' => 'Crédito Vencido',
            'short_desc' => 'Vencido',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 12,
            'description' => 'Crédito Pagado',
            'short_desc' => 'Pagado',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 13,
            'description' => 'Crédito Castigado',
            'short_desc' => 'Castigado',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 14,
            'description' => 'Crédito Cancelado',
            'short_desc' => 'Cancelado',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 15,
            'description' => 'Crédito Garantizado',
            'short_desc' => 'Garantizado',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 16,
            'description' => 'Mesa de Control - Crédito Existente',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 17,
            'description' => 'Finanzas - Crédito Existente',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
