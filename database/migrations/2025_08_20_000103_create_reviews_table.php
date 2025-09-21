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
            $table->integer('starts')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->string('slug')->nullable();
            $table->string('video_preview')->nullable();
            $table->string('video')->nullable();
            $table->string('names')->nullable();
            $table->string('name')->nullable();
            $table->string('role')->nullable();
            $table->string('faces')->nullable();
            $table->string('title_first')->nullable();
            $table->text('description_first')->nullable();
            $table->string('quote_title')->nullable();
            $table->string('quote_main')->nullable();
            $table->text('description_second')->nullable();
            $table->string('stories_preview')->nullable();
            $table->string('stories')->nullable();
            $table->string('title_second')->nullable();
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
