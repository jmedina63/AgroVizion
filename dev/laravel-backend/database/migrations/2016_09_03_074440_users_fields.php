<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone',11)->nullable();
            $table->string('site',100)->nullable();
            $table->string('department',100)->nullable();
            $table->string('title',100)->nullable();
            $table->string('timezone',100)->nullable();
            $table->string('language',100)->nullable();
            $table->dropColumn('occupation');
            $table->dropColumn('biography');
            $table->dropColumn('username');
            $table->dropColumn('location');
            $table->dropColumn('country');
            $table->dropColumn('website');
            $table->dropColumn('image');
            $table->dropColumn('birthday');

            $perm_id=DB::table('permissions')->insertGetId(
                array('name' => 'edit_profile','display_name' => 'edit_profile')
            );
            DB::table('permission_role')->insert(
                array('permission_id' =>$perm_id,'role_id' => 1)
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
