<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function(Blueprint $table)
        {
	        $table->increments('id');
	        $table->string('title', 255);
	        $table->text('content');
	        $table->boolean('active')->default(false);
	        $table->integer('user_id')->unsigned();
	        $table->timestamps();
	        $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('posts');
    }
}
