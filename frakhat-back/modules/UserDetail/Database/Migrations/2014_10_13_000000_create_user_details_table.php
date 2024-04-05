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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('card_number')->nullable();
            $table->string('shaba_number')->nullable();
            $table->bigInteger('percent_money')->nullable();

            $table->string('type_learn')->nullable();
            $table->string('hiring_frakhat')->nullable();
            $table->enum('University_faculty', ['نیستم','علمی','آزاد و پیام نور'])->nullable();
            $table->enum('status_education', ['دانشجوری کارشناسی','فارغ التحصیل کاردانی','فارغ التحصیل کارشناسی','دانشجوی ارشد','فارغ التحصیل ارشد','دانشجوی دکتر','فارغ التحصیل دکترا'])->nullable();
            $table->string('fish_water')->nullable();
            $table->integer('check_phone')->default('0');
            $table->string('national_code')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('upload_national_code')->nullable();
            $table->string('tell')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('user_details');
    }
};
