<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchOfficesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'branchoffices';

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
            $table->integer('user_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->integer('address_id');
            $table->index(["address_id"], 'fk_branch_offices_address1_idx');
            $table->foreign('address_id', 'fk_branch_offices_address1_idx')
                ->references('id')->on('address')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->integer('status')->nullable()->default('1');
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
