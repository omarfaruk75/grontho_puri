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
            $table->string('category');
            $table->string('title');
            $table->string('logo_img');
            $table->string('name');
            $table->string('image');
            $table->string('heading');
            $table->string('short_text');
            $table->text('text');
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
