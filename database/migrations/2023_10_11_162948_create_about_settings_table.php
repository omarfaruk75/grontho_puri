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
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            $table->string('about_image')->nullable();
            $table->text('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->text('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('mission_image_1')->nullable();
            $table->string('mission_image_2')->nullable();
            $table->string('mission_image_3')->nullable();
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
        Schema::dropIfExists('about_settings');
    }
};
