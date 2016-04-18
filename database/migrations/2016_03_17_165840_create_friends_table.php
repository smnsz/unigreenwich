<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    public function up()
    {
        Schema::create('friends', function(Blueprint $table)
        {
	        $table->increments('id');
	        $table->integer('user_id');
	        $table->integer('friend_id');
	        $table->boolean('accepted');
	        $table->timestamps();
	        $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('friends');
    }
}
