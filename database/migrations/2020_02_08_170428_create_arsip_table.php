<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArsipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arsip', function(Blueprint $table)
		{
			$table->string('kode_surat', 100)->primary();
			$table->string('judul_surat', 150);
			$table->integer('jenis_id')->index('jenis');
			$table->string('file_surat', 100);
			$table->string('file_surat_pdf', 100);
			$table->integer('users_id')->index('sud');
			$table->text('catatan', 65535)->nullable();
			$table->timestamp('dibuat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('arsip');
	}

}
