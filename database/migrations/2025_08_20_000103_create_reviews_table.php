<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('stars')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->text('slug')->nullable();

            $table->text('names')->nullable();
            $table->text('geo')->nullable();
            $table->text('main_video_preview')->nullable();
            $table->text('main_video')->nullable();
            $table->text('main_video_link')->nullable();

            $table->text('small_video_preview')->nullable();
            $table->text('small_video')->nullable();
            $table->text('small_video_link')->nullable();
            $table->text('small_title')->nullable();
            $table->text('small_description')->nullable();

            $table->text('first_img')->nullable();
            $table->text('second_img')->nullable();
            $table->text('img_title')->nullable();
            $table->text('img_description')->nullable();
            $table->text('img_text')->nullable();


            $table->text('vertical_video_preview')->nullable();
            $table->text('vertical_video')->nullable();
            $table->text('vertical_video_link')->nullable();
            $table->text('vertical_title')->nullable();
            $table->text('vertical_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
