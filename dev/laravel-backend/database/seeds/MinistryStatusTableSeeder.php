<?php

use Illuminate\Database\Seeder;

class MinistryStatusTableSeeder extends Seeder
{
    //Schema table name to migrate
    public $set_schema_table = 'ministry_status';

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
            'ministry_id' => 1,
            'description' => 'Solicitud de Efectivo',
            'short_desc' => 'Solicitud',
            'appText' => 'Ha <span>SOLICITADO</span> %% en efectivo',
            'colorHex' => '0c5284',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 2,
            'ministry_id' => 1,
            'description' => 'Efectivo Autorizado',
            'short_desc' => 'Autorizado',
            'appText' => '%% efectivo <span>AUTORIZADOS</span>',
            'colorHex' => '50bc55',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 3,
            'ministry_id' => 2,
            'description' => 'Solicitud de Semillas y Fertilizantes',
            'short_desc' => 'Solicitud',
            'appText' => 'Ha <span>SOLICITADO</span> %% tons de semillas y fertilizantes',
            'colorHex' => '0c5284',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 4,
            'ministry_id' => 2,
            'description' => 'Semillas y Fertilizantes Autorizados',
            'short_desc' => 'Autorizado',
            'appText' => '%% tons de semillas y fertilizantes <span>AUTORIZADOS</span>',
            'colorHex' => '50bc55',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
