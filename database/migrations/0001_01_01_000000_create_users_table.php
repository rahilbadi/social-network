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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedTinyInteger('gender')->comment('1 => male, 2 => female, 3 => other');
            $table->unsignedBigInteger('phone_no')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('bio')->nullable();
            $table->string('profile_picture')->nullable();
            $table->unsignedTinyInteger('profile_visibility')->comment('0 => private, 1 => public')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('verify_users', function (Blueprint $table) {
            $table->string('user_id')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('verify_users');
        Schema::dropIfExists('sessions');
    }
};
