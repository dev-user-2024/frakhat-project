<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('mobile')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('role')->default('user');
            $table->enum('is_ban', [0, 1])->nullable()->comment('بلاک و انبلاک بودن کاربر را مشخص میکند');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_device')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('users');
    }
};
