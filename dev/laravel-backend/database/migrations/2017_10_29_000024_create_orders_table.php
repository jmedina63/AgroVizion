<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'orders';

    /**
     * Run the migrations.
     * @table orders
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('branchoffice_id');
            $table->unsignedInteger('supplier_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->timestamp('orderdate')->default('0000-00-00 00:00:00');
            $table->timestamp('requiered_date');
            $table->string('contract', 45);
            $table->string('shipname')->nullable()->default(null);
            $table->timestamp('shippeddate')->nullable()->default('0000-00-00 00:00:00');
            $table->string('shippingadrees')->nullable();
            $table->string('paid_on')->nullable();
            $table->integer('status')->nullable()->default('1');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('update_at')->default('0000-00-00 00:00:00');
            $table->timestamp('detele_at')->nullable()->default('0000-00-00 00:00:00');

            $table->index(["supplier_id"], 'fk_orders_supplier_idx');

            $table->index(["branchoffice_id"], 'fk_orders_branchofficerbranchoffices1_idx');


            $table->foreign('branchoffice_id', 'fk_orders_branchofficerbranchoffices1_idx')
                ->references('id')->on('branchoffices')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('supplier_id', 'fk_orders_supplier_idx')
                ->references('id')->on('suppliers')
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
