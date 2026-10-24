<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('name');
            $table->string('role')->default('user')->index();
            $table->string('profile_photo')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('phone')->nullable();
            $table->string('pincode')->nullable();
            $table->string('mobile')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropColumn([
                'last_name', 'role', 'profile_photo', 'gender', 'age', 'dob', 'address', 'city',
                'state', 'country', 'time_zone', 'phone', 'pincode', 'mobile', 'active', 'file',
            ]);
        });
    }
};
