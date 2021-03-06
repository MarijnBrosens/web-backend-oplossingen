<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// hier wordt tabel gemaakt

		Schema::create( 'users', function( Blueprint $table ){
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->text('remember_token')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//

		Schema::drop('users');
	}

}
