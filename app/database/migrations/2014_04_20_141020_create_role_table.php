<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role',function($table){
	        $table->increments('id');
	        $table->string('title',32);
	        $table->string('type',24);
	        $table->text('rights')->nullable();

     	});
     	//添加测试数据
     	DB::table('role')->insert(array(
     		'title'=>'普通用户',
     		'type'=>'normal',
     		'rights'=>''
        ));
        DB::table('role')->insert(array(
     		'title'=>'管理用户',
     		'type'=>'admin',
     		'rights'=>'all'
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('role');
	}

}
