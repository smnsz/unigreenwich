<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
	        $table->increments('id');
	        $table->string('username')->unique();
	        $table->string('year_of');
	        $table->string('first_name');
	        $table->string('last_name');
	        $table->string('email')->unique();
	        $table->string('password');
	        $table->string('avatar')->nullable();
	        $table->text('bio')->default("");
	        $table->string('address');
	        $table->string('latitude');
	        $table->string('longitude');
	        $table->boolean('available_for_help')->default(false);
	        $table->tinyInteger('programming')->default(1);
            $table->tinyInteger('database')->default(1);
            $table->tinyInteger('frontend')->default(1);
            $table->tinyInteger('something')->default(1);
			$table->rememberToken();
	        $table->timestamps();
	        $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
