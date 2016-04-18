<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('user_comments', function(Blueprint $table)
        {
	        $table->increments('id');
	        $table->text('comment');
	        $table->integer('profile_id')->index();
	        $table->integer('user_id')->index();
	        $table->timestamps();
	        $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('user_comments');
    }
}
