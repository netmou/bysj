<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article',function($table){
	        $table->increments('id');
	        $table->string('title',128);
	        $table->text('content');
	        $table->integer('channel');
	        $table->integer('category');
	        $table->string('user',32);
	        $table->string('keyword',64)->nullable();
	        $table->integer('attach')->nullable();//附件
	        $table->date('date');
     	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('article');
	}

}
