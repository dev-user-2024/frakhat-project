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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name_fa')->comment('اسم فارسی شرکت');
            $table->string('name_en')->comment('اسم انگلیسی شرکت');
            $table->integer('established_year')->comment('سال تاسیس');
            $table->string('logo')->comment('لوگو');
            $table->string('number_of_persons')->nullable()->comment('تعداد نفرات');
            $table->text('description')->comment('توضیحات');
            $table->string('address')->comment('آدرس');
            $table->string('industry')->comment('حوزه کاری');
            $table->string('website')->comment('آدرس وب سایت شرکت');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('companies');
    }
};
