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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_category_id');
            $table->foreign('course_category_id')->references('id')->on('course_categories')->onDelete('cascade');
            $table->string('type')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title_course')->nullable();
            $table->string('slug')->nullable();
            $table->string('thumbnail_course')->nullable();
            $table->text('description_course')->nullable();
            $table->string('excerpt_course')->nullable();
            $table->string('thumbnail2_course')->nullable();
            $table->string('period_time_course')->nullable();
            $table->string('price_course')->nullable();
            $table->string('image_author')->nullable();
            $table->text('description_author')->nullable();
            $table->string('season_back')->nullable();
            $table->string('spotPlayerID')->comment('شناسه دوره توی سایت اسپات پلیر')->nullable();

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
        Schema::dropIfExists('courses');
    }
};
