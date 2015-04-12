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
			$table->foreign('username', 'signups_ibfk_1')->references('username')->on('players')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('game_name', 'signups_ibfk_2')->references('name')->on('games')->onUpdate('CASCADE')->onDelete('CASCADE');
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
