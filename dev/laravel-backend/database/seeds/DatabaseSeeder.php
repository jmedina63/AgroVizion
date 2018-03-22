<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(CreditStatusTableSeeder::class);
        $this->call(CultivationsTableSeeder::class);
        $this->call(MinistryTableSeeder::class);
    }
}
