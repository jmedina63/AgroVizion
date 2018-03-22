<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesnotificationsTable extends Migration
{

    /**
     * Run the migrations.
     * @table categoriesnotifications
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoriesnotification', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('status', 45)->nullable()->default('1');
            $table->timestamp('create_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('update_at')->nullable()->default('0000-00-00 00:00:00');
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
