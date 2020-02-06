<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArsipDisposisiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arsip_disposisi', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('kode_surat', 100)->index('kode');
			$table->integer('users_id')->index('sasd');
			$table->integer('users_konf');
			$table->dateTime('tgl_konf')->nullable();
			$table->timestamp('tgl_kirim')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('arsip_disposisi');
	}

}
