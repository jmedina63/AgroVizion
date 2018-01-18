<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'address';

    /**
     * Run the migrations.
     * @table address
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('address', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('col', 100)->nullable();
            $table->unsignedInteger('city_id');
            $table->string('postal_code', 10)->nullable();
            $table->integer('number')->nullable();
            $table->string('phone', 20)->nullable();
            $table->decimal('latitude', 18, 6)->nullable();
            $table->decimal('longitude', 18, 6)->nullable();
            $table->integer('status')->nullable()->default('1');
            $table->timestamp('create_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('update_at')->nullable()->default('0000-00-00 00:00:00');

            $table->index(["city_id"], 'fk_address_city1_idx');


            $table->foreign('city_id', 'fk_address_city1_idx')
                ->references('id')->on('city')
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
