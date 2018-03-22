<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'notifications';

    /**
     * Run the migrations.
     * @table notifications
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->string('notifiable_type')->nullable();
            $table->string('data')->nullable();
            $table->timestamp('read_at')->nullable()->default('0000-00-00 00:00:00');
            $table->timestamp('created_at')->nullable()->default('0000-00-00 00:00:00');
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
