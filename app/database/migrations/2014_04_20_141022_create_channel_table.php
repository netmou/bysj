<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('channel',function($table){
	        $table->increments('id');
	        $table->string('title',12);
            $table->string('symbol',16)->unique();
	        $table->smallInteger('index')->default('0');
	        $table->string('show',4)->default('yes');
	        $table->string('status',10)->default('normal');
     	});
     	//添加测试数据
     	DB::table('channel')->insert(array(
     		'title'=>'产品展示',
            'symbol'=>'product',
     		'index'=>0,
     		'show'=>'yes',
     		'status'=>'normal'
        ));
        DB::table('channel')->insert(array(
     		'title'=>'文章咨询',
            'symbol'=>'article',
     		'index'=>1,
     		'show'=>'yes',
     		'status'=>'normal'
        ));
        DB::table('channel')->insert(array(
     		'title'=>'在线留言',
            'symbol'=>'message',
     		'index'=>2,
     		'show'=>'yes',
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
		 Schema::drop('channel');
	}

}
