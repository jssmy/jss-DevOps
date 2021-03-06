<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBranchesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_branches_user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropForeign('fk_branches_user_id');
        });
    }
}
