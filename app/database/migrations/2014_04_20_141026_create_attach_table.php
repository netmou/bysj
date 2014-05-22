<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attach',function($table){
	        $table->increments('id');
	        $table->string('title',64);
	        $table->string('desc')->nullable();
	        $table->float('size')->default(0);
	        $table->string('addr',128);
	       
     	});
     	//添加测试数据
     	DB::table('attach')->insert(array(
     		'title'=>'产品说明书',
     		'desc'=>'this is desc file!',
     		'size'=>25.6,
     		'addr'=>'c:\fsfs\fsfs.jsp'
     		
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('attach');
	}

}
