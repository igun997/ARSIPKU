<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArsipLockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arsip_lock', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('kode_surat', 100)->index('ds');
			$table->enum('status_lock', array('temporary','permanent'));
			$table->timestamp('tgl_lock')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('catatan', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arsip_lock');
	}

}
