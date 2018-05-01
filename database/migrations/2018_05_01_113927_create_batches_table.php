<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name');
            $table->string('school_code');
            $table->integer('testno');
            $table->integer('no_section');
            $table->string('batch');
            $table->integer('type')->default('0');
            $table->string('subj1')->default('none');
            $table->string('subj2')->default('none');
            $table->string('subj3')->default('none');
            $table->string('subj4')->default('none');
            $table->string('subj5')->default('none');
            $table->string('subj6')->default('none');
            $table->string('subj7')->default('none');
            $table->string('subj8')->default('none');
            $table->string('subj9')->default('none');
            $table->string('subj10')->default('none');
            $table->string('subj11')->default('none');
            $table->string('subj12')->default('none');
            $table->string('subj13')->default('none');
            $table->string('subj14')->default('none');
            $table->string('subj15')->default('none');
            $table->string('subj16')->default('none');
            $table->string('subj17')->default('none');
            $table->string('subj18')->default('none');
            $table->string('subj19')->default('none');
            $table->string('subj20')->default('none');
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
        Schema::dropIfExists('batches');
    }
}
