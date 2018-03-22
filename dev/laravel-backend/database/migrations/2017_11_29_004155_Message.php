<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Message extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'messages';
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
          $table->integer('user_id')->unsigned();
          $table->text('message');
          $table->text('text');
          $table->text('thread_id');
          $table->text('file_name');
          $table->text('file_size');
          $table->text('file_type');
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
        //
    }
}
