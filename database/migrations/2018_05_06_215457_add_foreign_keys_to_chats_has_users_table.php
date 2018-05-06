<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToChatsHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chats_has_users', function (Blueprint $table) {
            $table->foreign('chat_id', 'fk_chats_has_users_chat_id')->references('id')->on('chats')->onUpdate('NO ACTION')->onDelete('cascade');
            $table->foreign('user_id', 'fk_chats_has_users_user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats_has_users', function (Blueprint $table) {
            $table->dropForeign('fk_chats_has_users_chat_id');
            $table->dropForeign('fk_chats_has_users_user_id');
        });
    }
}
