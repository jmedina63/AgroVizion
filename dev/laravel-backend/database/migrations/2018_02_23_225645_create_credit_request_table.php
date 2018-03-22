<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditRequestTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'credit_request';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->integer('cultivation_id')->unsigned();
            $table->foreign('cultivation_id')
                ->references('id')->on('cultivations')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->integer('hectares');
            $table->integer('docs_id')->unsigned();
            $table->foreign('docs_id')
                ->references('id')->on('credit_docs')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->integer('status')->default('1');
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
