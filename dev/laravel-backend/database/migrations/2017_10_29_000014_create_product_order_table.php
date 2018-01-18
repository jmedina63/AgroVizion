<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOrderTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'product_order';

    /**
     * Run the migrations.
     * @table product_order
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('product_id');
            $table->unsignedInteger('orderdatail_id');

            $table->index(["orderdatail_id"], 'fk_product_order_orderdetails1_idx');

            $table->index(["product_id"], 'fk_product_order_products1_idx');


            $table->foreign('orderdatail_id', 'fk_product_order_orderdetails1_idx')
                ->references('id')->on('orderdetails')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('product_id', 'fk_product_order_products1_idx')
                ->references('id')->on('products')
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
