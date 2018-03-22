<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditMinistryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'credit_ministry';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
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
            $table->decimal('amount', 8, 2)->default(0);
            $table->integer('status')->default('1');
            $table->timestamps();
            $table->primary(['credit_id', 'ministry_id']);
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
