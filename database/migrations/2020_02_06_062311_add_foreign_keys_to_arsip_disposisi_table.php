<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArsipDisposisiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('arsip_disposisi', function(Blueprint $table)
		{
			$table->foreign('users_id', 'arsip_disposisi_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('kode_surat', 'arsip_disposisi_ibfk_2')->references('kode_surat')->on('arsip')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('arsip_disposisi', function(Blueprint $table)
		{
			$table->dropForeign('arsip_disposisi_ibfk_1');
			$table->dropForeign('arsip_disposisi_ibfk_2');
		});
	}

}
