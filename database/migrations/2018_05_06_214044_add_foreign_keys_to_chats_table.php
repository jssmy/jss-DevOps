<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->foreign('slack_id', 'fk_chats_slack_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropForeign('fk_chats_slack_id');
        });
    }
}
