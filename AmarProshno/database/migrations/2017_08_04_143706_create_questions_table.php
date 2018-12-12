<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('top')->default(0);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('html')->default(0);
            $table->string('css')->default(0);
            $table->string('php')->default(0);
            $table->string('oop')->default(0);
            $table->string('mysql')->default(0);
            $table->string('javascript')->default(0);
            $table->string('ajax')->default(0);
            $table->string('jquery')->default(0);
            $table->string('rate')->default(0);
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
        Schema::dropIfExists('questions');
    }
}
