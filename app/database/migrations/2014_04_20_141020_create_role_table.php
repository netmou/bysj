<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('role', function($table) {
            $table->increments('id');
            $table->string('title', 32);
            $table->string('type', 24);
            $table->text('rights')->nullable();
        });
        //添加测试数据
        DB::table('role')->insert(array(
            'title' => '上帝角色',
            'type' => 'admin',
            'rights' => 'all'
        ));
        DB::table('role')->insert(array(
            'title' => '用户角色',
            'type' => 'admin',
            'rights' => 'user'
        ));
        DB::table('role')->insert(array(
            'title' => '系统角色',
            'type' => 'admin',
            'rights' => 'system'
        ));
        
        DB::table('role')->insert(array(
            'title' => '文章角色',
            'type' => 'admin',
            'rights' => 'article'
        ));
        DB::table('role')->insert(array(
            'title' => '产品用户',
            'type' => 'admin',
            'rights' => 'product'
        ));
        DB::table('role')->insert(array(
            'title' => '留言角色',
            'type' => 'admin',
            'rights' => 'message'
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('role');
    }

}
