<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinistryCashRequestTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ministry_cash_request';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->decimal('rent', 10, 2)->default(0);
            $table->date('rentDate');
            $table->decimal('ground', 10, 2)->default(0);
            $table->date('groundDate');
            $table->decimal('sowing', 10, 2)->default(0);
            $table->date('sowingDate');
            $table->decimal('labors', 10, 2)->default(0);
            $table->date('laborsDate');
            $table->decimal('harvest', 10, 2)->default(0);
            $table->date('harvestDate');
            $table->decimal('diverse', 10, 2)->default(0);
            $table->date('diverseDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
