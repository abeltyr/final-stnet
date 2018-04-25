<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_code')->unique();
            $table->string('name')->unique();
            $table->string('logo')->default('/school/default.jpg');
            $table->string('representative');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('hashed_password');
            $table->boolean('password_changed');
            $table->integer('phone')->unique();
            $table->string('address');
            $table->string('no_student');
            $table->string('school_owner');
            $table->integer('subscibtion');
            $table->integer('subscibtion_type');
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
        Schema::dropIfExists('schools');
    }
}
