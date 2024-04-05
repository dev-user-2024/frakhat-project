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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['text', 'image', 'video'])->nullable();
            $table->enum('status', ['draft', 'approved', 'rejected'])->default('draft');
            $table->string('image')->nullable()->comment('تصویر شاخص یا کاور');
            $table->string('url')->nullable();
            $table->string('short_link')->nullable();
            $table->string('code')->unique()->nullable();
            $table->unsignedInteger('like_count')->default(0);
            $table->unsignedInteger('view_count')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
