<?php

use App\Models\Post;
use App\Models\PostBlock;
use App\Models\Review;
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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('patch');
            $table->foreignIdFor(Review::class)->cascadeOnDelete()->nullable();
            $table->foreignIdFor(Post::class)->cascadeOnDelete()->nullable();
            $table->foreignIdFor(PostBlock::class)->cascadeOnDelete()->nullable();
            $table->string('type'); // top / bottom / free

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
