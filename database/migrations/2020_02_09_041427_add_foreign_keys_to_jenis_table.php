<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJenisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jenis', function(Blueprint $table)
		{
			$table->foreign('jenis_id', 'jenis_ibfk_1')->references('id')->on('jenis')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jenis', function(Blueprint $table)
		{
			$table->dropForeign('jenis_ibfk_1');
		});
	}

}
