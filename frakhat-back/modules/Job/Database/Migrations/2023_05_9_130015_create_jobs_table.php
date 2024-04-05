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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('province_id')->comment('موقعیت مکانی');

            $table->string('title')->comment('عنوان موقعیت شغلی');

            $table->string('employment_type')->nullable()->comment('نوع همکاری');
            $table->string('minimum_salary')->nullable()->comment('حداقل حقوق');
            $table->text('job_description')->comment('شرح موقعیت شغلی');
            $table->string('minimum_experience')->nullable()->comment('حداقل سابقه کار');
            $table->enum('gender', ['female', 'male', 'default'])->nullable()->comment('جنسیت');
            $table->string('military_status')->nullable()->comment('وضعیت سربازی');
            $table->string('insurance_status')->nullable()->comment('وضعیت بیمه');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

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
        Schema::dropIfExists('jobs');
    }
};
