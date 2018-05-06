<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats_has_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chat_id')->unsigned()->nullable()->index('fk_chats_has_users_chat_id_idx');
            $table->integer('user_id')->unsigned()->nullable()->index('fk_chats_has_users_user_id_idx');
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
        Schema::dropIfExists('chats_has_users');
    }
}
