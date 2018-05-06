<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('chat_id', 'fk_messages_chat_id')->references('id')->on('chats')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id', 'fk_messages_user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('fk_messages_chat_id');
        });
    }
}
