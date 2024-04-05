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
        Schema::create('discount_usages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('course_id');
            $table->integer('course_price');
            $table->integer('discounted_course_price');
            $table->ipAddress('user_ip');
            $table->integer('usage_count')->default(0);
            $table->string('discount_code')->nullable();
            $table->timestamp('used_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

//            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
//            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
};
