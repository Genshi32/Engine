<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chat_room_id');
            $table->text('context');
            $table->bigInteger('post_user_info_id');
            // $table->foreign('chat_room_id')
            // ->references('id')->on('chat_rooms')
            // ->onDelete('cascade');
            // $table->foreign('id')
            // ->references('id')->on('user_infoes')
            // ->onDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
}
