<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message',function($table){
	        $table->increments('id');
	        $table->integer('channel');
	        $table->integer('category');
	        $table->string('title',64);
	        $table->text('desc')->nullable();
	      	$table->text('reply')->nullable();
	      	$table->text('date')->nullable();
	      	$table->smallInteger('status')->default(0);

     	});
     	//添加测试数据
     	DB::table('message')->insert(array(
     		'title'=>'产品说明书',
     		'channel'=>3,
     		'category'=>0,
     		'desc'=>'this is desc file!',
     		'reply'=>'zheshilaiziguanliyuandehuifu,...',
     		'date'=>'2014-05-02',
     		'status'=>6
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('message');
	}

}
