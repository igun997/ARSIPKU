<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArsipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('arsip', function(Blueprint $table)
		{
			$table->foreign('jenis_id', 'arsip_ibfk_1')->references('id')->on('jenis')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('users_id', 'arsip_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('arsip', function(Blueprint $table)
		{
			$table->dropForeign('arsip_ibfk_1');
			$table->dropForeign('arsip_ibfk_2');
		});
	}

}
