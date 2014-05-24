<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user',function($table){
	        $table->increments('id');
	        $table->string('name',32);
	        $table->string('pass',128);
	        $table->integer('role')->default(0);
	        $table->string('realname',10)->nullable();
	        $table->string('email',24)->nullable();
	        $table->string('phone',18)->nullable();
	        $table->date('birth')->nullable();
	        $table->string('sex',2)->nullable();
	        $table->dateTime('regtime')->nullable();
     	});
     	//添加测试数据
     	DB::table('user')->insert(array(
     		'name'=>'test',
     		'realname'=>'muzhiqing',
     		'phone'=>'13468354127',
     		'birth'=>'1990-01-07',
     		'regtime'=>'2014-03-07 12:30:00',
     		'sex'=>'男',
        	'email'=>'test@sina.com',
        	'pass'=>Hash::make('123'),
        	'role'=>addslashes(serialize(array(2)))
        ));
        DB::table('user')->insert(array(
     		'name'=>'article',
     		'realname'=>'muzhiqing',
     		'phone'=>'18754365211',
     		'birth'=>'1990-03-12',
     		'regtime'=>'2014-05-07 10:30:00',
     		'sex'=>'女',
        	'email'=>'test@sina.com',
        	'pass'=>Hash::make('m12z22q0'),
        	'role'=>addslashes(serialize(array(2)))
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
