<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderOrderdetailsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'order_orderdetails';

    /**
     * Run the migrations.
     * @table order_orderdetails
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('order_id');
            $table->unsignedInteger('orderdetail_id');

            $table->index(["orderdetail_id"], 'fk_order_orderdetails_orderdetails1_idx');

            $table->index(["order_id"], 'fk_order_orderdetails_orders1_idx');

            $table->foreign('order_id', 'fk_order_orderdetails_orders1_idx')
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
