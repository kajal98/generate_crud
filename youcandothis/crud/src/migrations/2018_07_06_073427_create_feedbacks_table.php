<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->text('feedback')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('show_name')->default(0);
            $table->tinyInteger('show_loaction')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
