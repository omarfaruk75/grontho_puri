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
        Schema::create('header_articles', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->integer('user_id');
            $table->string('title');
            $table->string('title_bn');
            $table->string('category');
            $table->string('category_bn');
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
        Schema::dropIfExists('header_articles');
    }
};
