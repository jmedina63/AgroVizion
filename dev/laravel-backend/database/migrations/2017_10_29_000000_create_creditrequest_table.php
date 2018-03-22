<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditrequestTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'creditrequest';

    /**
     * Run the migrations.
     * @table creditrequest
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
            $table->unsignedInteger('folio')->nullable();
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('estatus_credito_id')->nullable();
            $table->string('estatus_credito')->nullable();
            $table->integer('hectareas_cultivo')->nullable();
            $table->integer('tamano_empresa')->nullable();
            $table->integer('hectareas_propias')->nullable();
            $table->integer('hectareas_financiar')->nullable();
            $table->string('tipo_garantia', 45)->nullable();
            $table->integer('anos_actividad')->nullable();
            $table->string('identificacion')->nullable();
            $table->string('comprobante_domicilio')->nullable();
            $table->string('acta_nacimiento')->nullable();
            $table->string('curp')->nullable();
            $table->string('acta_nacimiento_aval')->nullable();
            $table->string('rfc')->nullable();
            $table->string('identificacion_solidarios')->nullable();
            $table->string('permisos_riego')->nullable();
            $table->string('contratos_arrendamiento')->nullable();
            $table->string('curp_aval')->nullable();
            $table->date('fecha_estatus')->nullable();
            $table->string('producto_financiado', 45)->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('cadena_credito', 45)->nullable();
            $table->string('plazo', 45)->nullable();
            $table->date('vencimiento_cercano')->nullable();
            $table->integer('status')->nullable()->default('1');
            $table->timestamp('created_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('update_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('delete_at')->nullable()->default('0000-00-00 00:00:00');

            $table->index(["order_id"], 'fk_creditrequest_orders1_idx');


            $table->foreign('order_id', 'fk_creditrequest_orders1_idx')
                ->references('id')->on('orders')
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
