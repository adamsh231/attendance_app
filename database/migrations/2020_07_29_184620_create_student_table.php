<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('password');
            $table->integer('intake')->nullable();
            $table->integer('batch')->nullable();
            $table->date('ttl')->nullable();
            $table->string('faculty')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->boolean('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('line')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('student');
    }
}
