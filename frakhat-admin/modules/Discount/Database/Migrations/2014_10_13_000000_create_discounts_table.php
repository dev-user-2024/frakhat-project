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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->enum('type', ['course', 'course_category'])->nullable();
            $table->integer('percent')->nullable();
            $table->integer('maxOfMarketer')->nullable()->comment('تعداد یوزر برای هر بازاریاب');
            $table->string('code')->nullable();
            $table->integer('maxOfPrice')->nullable();
            $table->integer('maxOfUser')->nullable()->comment('تعداد دفعات استفاده برای هر کاربر');
            $table->timestamp('expired_at')->nullable();
            $table->enum('maker', ['admin', 'marketer'])->nullable();
            $table->timestamps();
            $table->softDeletes();

            //            $table->unsignedBigInteger('discount_marketer_id');
//            $table->unsignedBigInteger('course_category_id');

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
