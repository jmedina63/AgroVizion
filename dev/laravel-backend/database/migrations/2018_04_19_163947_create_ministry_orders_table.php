<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinistryOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ministry_orders';

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
            $table->integer('credit_id')->unsigned();
            $table->foreign('credit_id')
                ->references('id')->on('credits')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->integer('ministry_id')->unsigned();
            $table->foreign('ministry_id')
                ->references('id')->on('ministry')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->integer('ministry_request_id');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
                ->references('id')->on('ministry_status')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->integer('status')->default(1);
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
