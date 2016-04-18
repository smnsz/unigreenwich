<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('event_comments', function(Blueprint $table)
        {
	        $table->increments('id');
	        $table->text('comment');
	        $table->integer('event_id')->index();
	        $table->integer('user_id')->index();
	        $table->timestamps();
	        $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('event_comments');
    }
}
