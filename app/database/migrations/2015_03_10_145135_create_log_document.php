<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogDocument extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_document', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('id_document');
            $table->integer('id_user');
            $table->string('old_title');
            $table->string('new_title');
            $table->string('situation');
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
		Schema::drop('log_document');
	}

}
