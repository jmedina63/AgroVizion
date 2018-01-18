<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_orderdetails', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->increments('order_id');
            $table->unsignedInteger('orderdetail_id');

            $table->index(["orderdetail_id"], 'fk_order_orderdetails_orderdetails1_idx');

            $table->index(["order_id"], 'fk_order_orderdetails_orders1_idx');


            $table->foreign('orderdetail_id', 'fk_order_orderdetails_orderdetails1_idx')
                ->references('id')->on('orderdetails')
                ->onDelete('cascade')
                ->onUpdate('restrict');

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
        Schema::dropIfExists('orders_orderdetails');
    }
}
