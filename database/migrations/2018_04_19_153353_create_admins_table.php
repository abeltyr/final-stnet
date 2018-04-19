<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firtname');
            $table->string('lastname');
            $table->string('avatar')->default('/admin/avatar/avatar.jpg');
            $table->integer('role_id')->default('0');
            $table->integer('user_id')->unique();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('password');
            $table->integer('pin');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
