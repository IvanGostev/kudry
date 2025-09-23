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
            $table->text('video_preview')->nullable();
            $table->text('video')->nullable();
            $table->text('names')->nullable();
            $table->text('name')->nullable();
            $table->text('role')->nullable();
            $table->text('faces')->nullable();
            $table->text('title_first')->nullable();
            $table->text('description_first')->nullable();
            $table->text('quote_title')->nullable();
            $table->text('quote_main')->nullable();
            $table->text('description_second')->nullable();
            $table->text('stories_preview')->nullable();
            $table->text('stories')->nullable();
            $table->text('title_second')->nullable();
            $table->text('description_third')->nullable();
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
