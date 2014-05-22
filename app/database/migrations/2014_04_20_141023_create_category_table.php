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
	        $table->integer('cover')->nullable();
	        $table->string('status',10)->default('normal');
     	});
     	//添加测试数据
     	DB::table('category')->insert(array(
     		'parent'=>0,
     		'channel'=>0,
     		'title'=>'家用产品',
     		'symbol'=>'famly',
     		'index'=>0,
     		'status'=>'normal'
        ));
        DB::table('category')->insert(array(
     		'parent'=>0,
     		'channel'=>3,
     		'title'=>'公司简介',
     		'symbol'=>'brief',
     		'index'=>0,
     		'status'=>'normal'
        ));
        DB::table('category')->insert(array(
     		'parent'=>0,
     		'channel'=>3,
     		'title'=>'企业文化',
     		'symbol'=>'culture',
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
