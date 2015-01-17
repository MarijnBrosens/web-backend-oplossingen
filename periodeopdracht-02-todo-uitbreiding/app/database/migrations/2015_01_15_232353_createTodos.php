<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// hier wordt tabel gemaakt

		Schema::create( 'todos', function( Blueprint $table ){
			$table->increments('id');
			$table->integer('userId');
			$table->string('todoTitle');
			$table->string('todoDetails');
			$table->boolean('isDone');
			$table->boolean('isArchived');
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
		Schema::drop('todos');
	}

}
