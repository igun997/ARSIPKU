<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJenisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jenis', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama_jenis', 100);
			$table->string('kode_jenis', 20)->nullable();
			$table->integer('jenis_id')->nullable()->index('jenis_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jenis');
	}

}
