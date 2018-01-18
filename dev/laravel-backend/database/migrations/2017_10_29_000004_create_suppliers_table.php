<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'suppliers';

    /**
     * Run the migrations.
     * @table suppliers
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('contact_name', 45)->nullable();
            $table->unsignedInteger('address_id');
            $table->integer('status')->default('1');
            $table->timestamp('created_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('update_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('detele_at')->nullable()->default('0000-00-00 00:00:00');

            $table->index(["address_id"], 'fk_suppliers_address1_idx');

            $table->index(["user_id"], 'fk_suppliers_users1_idx');


            $table->foreign('user_id', 'fk_suppliers_users1_idx')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('address_id', 'fk_suppliers_address1_idx')
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
