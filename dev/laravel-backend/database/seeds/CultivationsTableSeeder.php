<?php

use Illuminate\Database\Seeder;

class CultivationsTableSeeder extends Seeder
{
     //Schema table name to migrate
    public $set_schema_table = 'cultivations';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->set_schema_table)->delete();
        DB::table($this->set_schema_table)->insert([
            'id' => 4,
            'key' => '0111047',
            'description' => 'CULTIVO DE CEBADA',
            'short_desc' => 'CEBADA',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 6,
            'key' => '0111063',
            'description' => 'CULTIVO DE MAIZ',
            'short_desc' => 'MAIZ',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 9,
            'key' => '0111097',
            'description' => 'CULTIVO DE SOYA',
            'short_desc' => 'SOYA',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 10,
            'key' => '0111104',
            'description' => 'CULTIVO DE TRIGO',
            'short_desc' => 'TRIGO',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 17,
            'key' => '0112079',
            'description' => 'CULTIVO DE FRIJOL',
            'short_desc' => 'FRIJOL',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 18,
            'key' => '0112087',
            'description' => 'CULTIVO DE GARBANZO',
            'short_desc' => 'GARBANZO',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 27,
            'key' => '0113019',
            'description' => 'CULTIVO DE ALFALFA',
            'short_desc' => 'ALFALFA',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 32,
            'key' => '0121012',
            'description' => 'CULTIVO DE ALGODON',
            'short_desc' => 'ALGODON',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 71,
            'key' => '0211011',
            'description' => 'CRIA Y EXPLOTACION DE GANADO VACUNO PARA CARNE',
            'short_desc' => 'GANADO VACUNO',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
