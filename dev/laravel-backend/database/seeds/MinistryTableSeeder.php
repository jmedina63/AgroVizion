<?php

use Illuminate\Database\Seeder;

class MinistryTableSeeder extends Seeder
{
    //Schema table name to migrate
   public $set_schema_table = 'ministry';

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
            'description' => 'Efectivo',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 2,
            'description' => 'Semillas y Fertilizantes',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 3,
            'description' => 'Agroquímicos',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 4,
            'description' => 'Agua',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);

    }
}
