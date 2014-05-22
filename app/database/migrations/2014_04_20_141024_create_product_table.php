<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product',function($table){
	        $table->increments('id');
	        $table->integer('channel');
	        $table->integer('category');
	        $table->string('title',64);
	        $table->string('image',128); //样式
	        $table->text('illustrate')->nullable(); //产品说明
	        $table->text('desc')->nullable();
	        $table->date('date')->nullable();
     	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('product');
	}

}
