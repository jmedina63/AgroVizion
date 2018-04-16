<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditRequestTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'creditrequest';

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
            $table->index(["user_id"], 'fk_credit_request_users1_idx');
            $table->foreign('user_id', 'fk_credit_request_users1_idx')
                ->references('user_id')->on('credit_user')
                ->onDelete('cascade')
                ->onUpdate('restrict');
            $table->integer('solicitud_id')->nullable();
            $table->string('estatus_credito')->nullable();
            $table->integer('anos_actividad')->nullable();
            $table->integer('hectareas_cultivo')->nullable();
            $table->integer('tamano_empresa')->nullable();
            $table->integer('hectareas_propias')->nullable();
            $table->integer('hectareas_financiar')->nullable();
            $table->string('tipo_garantia', 45)->nullable();
            $table->string('identificacion')->nullable();
            $table->string('comprobante_domicilio')->nullable();
            $table->string('acta_nacimiento')->nullable();
            $table->string('curp')->nullable();
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
