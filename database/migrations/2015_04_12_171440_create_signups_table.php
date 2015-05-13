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
			$table->string('player', 12);
			$table->integer('event')->index('event');
			$table->boolean('first_time')->default(0);
			$table->primary(['player','event']);
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
