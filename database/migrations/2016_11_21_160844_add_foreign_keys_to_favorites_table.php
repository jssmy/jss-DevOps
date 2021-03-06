<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_favorites_user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropForeign('fk_favorites_user_id');
        });
    }
}
