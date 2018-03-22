<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchofficesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'branchoffices';

    /**
     * Run the migrations.
     * @table branchoffices
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->unsignedInteger('address_id');
            $table->integer('status')->default('1');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('update_at')->default('0000-00-00 00:00:00');

            $table->index(["user_id"], 'fk_branchoffices_users1_idx');
            $table->index(["address_id"], 'fk_branchoffices_address1_idx');

            $table->foreign('user_id', 'fk_branchoffices_users1_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('address_id', 'fk_branchoffices_address1_idx')
                ->references('id')->on('address')
                ->onDelete('cascade')
                ->onUpdate('restrict');
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
