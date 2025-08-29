<?php

use App\Models\Category;
use App\Models\SubCategory;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('img')->nullable();
            $table->foreignIdFor(Category::class)->cascadeOnDelete();
            $table->foreignIdFor(Subcategory::class)->cascadeOnDelete();
            $table->string('top_title')->nullable();
            $table->text('top_description')->nullable();
            $table->string('bottom_title')->nullable();
            $table->text('bottom_description')->nullable();
            $table->text('caption')->nullable();
            $table->bigInteger('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
