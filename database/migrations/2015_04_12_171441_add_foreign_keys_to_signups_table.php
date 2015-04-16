<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSignupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('signups', function(Blueprint $table)
		{
			$table->foreign('player', 'signups_ibfk_1')->references('username')->on('players')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('event', 'signups_ibfk_2')->references('id')->on('events')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('signups', function(Blueprint $table)
		{
			$table->dropForeign('signups_ibfk_1');
			$table->dropForeign('signups_ibfk_2');
		});
	}

}
