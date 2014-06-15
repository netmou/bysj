<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category',function($table){
	        $table->increments('id');
	        $table->integer('parent')->default('0');
	        $table->integer('channel');
	        $table->string('title',64);
	        $table->string('symbol',16);
	        $table->smallInteger('index')->default('0');
	        $table->string('status',10)->default('normal');
     	});
     	//添加测试数据
     	DB::table('category')->insert(array(
     		'parent'=>0,
     		'channel'=>2,
     		'title'=>'公告',
     		'symbol'=>'gonggao',
     		'index'=>0,
     		'status'=>'normal'
        ));
        
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('category');
	}

}
