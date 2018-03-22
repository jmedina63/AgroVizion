<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsCategoriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'notifications_categories';

    /**
     * Run the migrations.
     * @table notifications_categories
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('catgories_id');
            $table->unsignedInteger('notifications_id');

            $table->index(["notifications_id"], 'fk_notifications_categories_notifications1_idx');


            $table->foreign('notifications_id', 'fk_notifications_categories_notifications1_idx')
                ->references('id')->on('notifications')
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
