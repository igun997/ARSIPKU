<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArsipLockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('arsip_lock', function(Blueprint $table)
		{
			$table->foreign('kode_surat', 'arsip_lock_ibfk_1')->references('kode_surat')->on('arsip')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('arsip_lock', function(Blueprint $table)
		{
			$table->dropForeign('arsip_lock_ibfk_1');
		});
	}

}
