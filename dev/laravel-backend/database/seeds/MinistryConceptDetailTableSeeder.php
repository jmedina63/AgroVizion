<?php

use Illuminate\Database\Seeder;

class MinistryConceptDetailTableSeeder extends Seeder
{
    //Schema table name to migrate
    public $set_schema_table = 'ministry_concept_detail';

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
            'concept_id' => 1,
            'description' => 'RENTAS',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 2,
            'concept_id' => 2,
            'description' => 'Barbecho',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 3,
            'concept_id' => 2,
            'description' => 'Rastreo',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 4,
            'concept_id' => 2,
            'description' => 'Tabloneo',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 5,
            'concept_id' => 2,
            'description' => 'Surcado',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 6,
            'concept_id' => 2,
            'description' => 'Bordeo y canalizacion ',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 7,
            'concept_id' => 2,
            'description' => 'Pega de Surcos y Bordos',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 40,
            'concept_id' => 2,
            'description' => 'Nivelación Land Plane',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 65,
            'concept_id' => 2,
            'description' => 'Rastreo escarificacion',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 8,
            'concept_id' => 3,
            'description' => 'Analisis de suelo',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 9,
            'concept_id' => 3,
            'description' => 'Urea (primera)',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 10,
            'concept_id' => 3,
            'description' => 'Fosfato monoamonico',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 11,
            'concept_id' => 3,
            'description' => 'Fertilizacion de presiembra',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 12,
            'concept_id' => 3,
            'description' => 'Amoniaco (tercera)',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 41,
            'concept_id' => 3,
            'description' => 'Urea (segunda)',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 53,
            'concept_id' => 3,
            'description' => 'Aplicacion de Fertilizante',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 56,
            'concept_id' => 3,
            'description' => 'Mezcla (27 - 15 - 12)',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 57,
            'concept_id' => 3,
            'description' => 'Fosfonitrato',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 13,
            'concept_id' => 4,
            'description' => 'Permiso de Siembra',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 14,
            'concept_id' => 4,
            'description' => 'Semilla de trigo',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 15,
            'concept_id' => 4,
            'description' => 'Siembra',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 16,
            'concept_id' => 4,
            'description' => 'Revestimiento de surcos',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 42,
            'concept_id' => 4,
            'description' => 'Semilla de algodón',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 58,
            'concept_id' => 4,
            'description' => 'Semilla de Maiz',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 17,
            'concept_id' => 5,
            'description' => 'Lipia de Canales',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 18,
            'concept_id' => 5,
            'description' => 'Costo del agua Millares M3',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 19,
            'concept_id' => 5,
            'description' => 'Riego de Presiembra',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 20,
            'concept_id' => 5,
            'description' => 'Riego de auxilio 1er.',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 21,
            'concept_id' => 5,
            'description' => 'Riego de auxilio 2do.',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 22,
            'concept_id' => 5,
            'description' => 'Riego de Auxilio 3er.',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 23,
            'concept_id' => 5,
            'description' => 'Riego de Auxilio 4to.',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 24,
            'concept_id' => 5,
            'description' => 'Construcc y rep. de regaderas',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 44,
            'concept_id' => 5,
            'description' => 'Permiso de siembra y cuota emergente',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 45,
            'concept_id' => 5,
            'description' => 'Regadores',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 25,
            'concept_id' => 6,
            'description' => 'Cultivo',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 43,
            'concept_id' => 6,
            'description' => 'Limpia manual',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 59,
            'concept_id' => 6,
            'description' => 'Escarda Con Trac. Animal',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 26,
            'concept_id' => 7,
            'description' => 'Herbicida 2,4 d amina',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 27,
            'concept_id' => 7,
            'description' => 'Herbicida Topik',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 28,
            'concept_id' => 7,
            'description' => 'Insecticida Dimetoato 400 CE',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 29,
            'concept_id' => 7,
            'description' => 'Fungicida folicur',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 30,
            'concept_id' => 7,
            'description' => 'Aplicacion terrestre',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 31,
            'concept_id' => 7,
            'description' => 'Fumigacion Aerea',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 46,
            'concept_id' => 7,
            'description' => 'Control de Maleza',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 47,
            'concept_id' => 7,
            'description' => 'Control de Plagas',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 49,
            'concept_id' => 7,
            'description' => 'Regulador de Crecimiento',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 50,
            'concept_id' => 7,
            'description' => 'Defoliante',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 51,
            'concept_id' => 7,
            'description' => 'Aplicacion Aerea',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 32,
            'concept_id' => 8,
            'description' => 'Tumba de bordos',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 33,
            'concept_id' => 8,
            'description' => 'Trilla',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 34,
            'concept_id' => 8,
            'description' => 'Fletes',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 35,
            'concept_id' => 9,
            'description' => 'Seguro Agricola',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 36,
            'concept_id' => 9,
            'description' => 'Cobertura de precio',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 37,
            'concept_id' => 9,
            'description' => 'Administracion',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
        DB::table($this->set_schema_table)->insert([
            'id' => 38,
            'concept_id' => 9,
            'description' => 'Asistencia tecnica',
            'status' => 1,
            'created_at' => date('Y-m-d H:m:s')
        ]);
    }
}
