<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSignupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('signups', function(Blueprint $table)
		{
			$table->string('username', 12)->index('username');
			$table->string('game_name', 50)->index('game_name');
			$table->timestamps();
			$table->dateTime('start_time');
			$table->boolean('first_time');
			$table->integer('signup_id', true);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('signups');
	}

}
