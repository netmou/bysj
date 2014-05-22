<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('link',function($table){
	        $table->increments('id');
	        $table->string('type',10);
	        $table->string('title',64);
	        $table->text('url');
	      	$table->string('status',10)->default('show');
     	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('link');
	}

}
