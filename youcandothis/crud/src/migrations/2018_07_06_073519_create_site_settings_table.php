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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone_1', 255)->nullable();
            $table->string('phone_2', 255)->nullable();
            $table->string('copy_right', 255)->nullable();
            $table->integer('site_visitors')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
