<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewUsersFields extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table)  {
            $table->string('rfc', 45)->nullable();
            $table->string('id_cliente_uno', 45)->nullable();
            $table->string('id_cliente_dos', 45)->nullable();
            $table->unsignedInteger('address_id');
            $table->unsignedInteger('branchoffice_id');
            $table->string('ife_ expiration', 45)->nullable();

            $table->index(["address_id"], 'fk_users_address1_idx');

            $table->unique(["rfc"], 'rfc_UNIQUE');

         //   $table->foreign('address_id', 'fk_users_address1_idx')
         //       ->references('id')->on('address')
         //       ->onDelete('cascade')
         //       ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
      // Schema::dropIfExists($this->set_schema_table);
     }
}
