<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('products')) return;
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('categories_id');
            $table->decimal('units_measure', 12, 4)->nullable();
            $table->decimal('unit_price', 12, 4)->nullable();
            $table->decimal('units_instock', 12, 4)->nullable();
            $table->decimal('units_onorder', 12, 4)->nullable();
            $table->string('picture')->nullable();
            $table->string('status', 45)->nullable()->default('1');
            $table->timestamp('created_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('update_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('delete_at')->nullable()->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
