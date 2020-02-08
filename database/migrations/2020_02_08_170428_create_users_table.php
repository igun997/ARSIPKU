<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama', 150)->nullable();
			$table->text('alamat', 65535)->nullable();
			$table->string('no_hp', 20)->nullable();
			$table->string('email', 100)->nullable();
			$table->string('username', 100);
			$table->string('password', 100);
			$table->integer('status')->default(1);
			$table->enum('level', array('super_admin','tata_usaha','kepala_sekolah','guru','wakil_kepala_sekolah','staff_lain'));
			$table->text('isLogin', 65535)->nullable();
			$table->timestamp('tgl_register')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
