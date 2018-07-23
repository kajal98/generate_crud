<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->text('feedback')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->tinyInteger('status', 0);
            $table->tinyInteger('show_name', 0);
            $table->tinyInteger('show_loaction', 0);
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
        Schema::dropIfExists('feedbacks');
    }
}
