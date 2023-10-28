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
        Schema::create('first_pages', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('category');
            $table->string('category_bn');
            $table->string('title');
            $table->string('title_bn');
            $table->string('heading');
            $table->string('heading_bn');
            $table->string('short_text');
            $table->string('short_text_bn');
            $table->text('text');
            $table->text('text_bn');
             $table->integer('user_id');
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
        Schema::dropIfExists('first_pages');
    }
};
