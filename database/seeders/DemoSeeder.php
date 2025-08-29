<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostBlock;
use App\Models\Review;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Category and SubCategory
        $items = ['first', 'second', 'third', 'fourth', "fifth", 'sixth', 'seventh'];
        foreach ($items as $item) {
            $category = Category::create(['title' => $item]);
            foreach ($items as $i) {
                SubCategory::create(['title' => $i, 'category_id' => $category->id]);
            }
        }

        // Post
        for ($i = 0; $i < 10; $i++) {
            $subcategory = SubCategory::where('id', rand(1, 9))->first();
            $post = Post::create([
                'img' => 'posts/photos/top/demo.png',
                'category_id' => $subcategory->category_id,
                'sub_category_id' => $subcategory->id,
                'top_title' => Str::random(16),
                'slug' => Str::random(16),
                'top_description' => Str::random(16),
                'bottom_title' => Str::random(16),
                'bottom_description' => Str::random(16),
                'caption' => Str::random(16),
                'views' => rand(148, 56967),
            ]);
            for ($j = 0; $j < 2; $j++) {
                Image::create([
                    'patch' => 'posts/photos/top/demo.png',
                    'post_id' => $post->id,
                    'type' => 'top',
                ]);
            }
            for ($j = 0; $j < 6; $j++) {
                Image::create([
                    'patch' => 'posts/photos/bottom/demo.png',
                    'post_id' => $post->id,
                    'type' => 'bottom',
                ]);
            }
            // Блоки
            for ($j = 0; $j < 5; $j++) {
                $block = PostBlock::create([
                    'post_id' => $post->id,
                    'title' => Str::random(16),
                    'description' => Str::random(16),
                ]);
                for ($j = 0; $j < 6; $j++) {
                    Image::create([
                        'patch' => 'blocks/photos/free/demo.png',
                        'post_block_id' => $block->id,
                        'type' => 'free',
                    ]);
                }
            }
        }

        // Review
        for ($i = 0; $i < 10; $i++) {
            $review = Review::create([
                'video' => 'reviews/video/demo.mp4',
                'stories' => 'reviews/video/demo.mp4',
                'video_preview' => 'reviews/preview/demo.png',
                'stories_preview' => 'reviews/preview/demo.png',
                'faces' => 'reviews/preview/demo.png',
                'names' => Str::random(12),
                'name' => Str::random(12),
                'slug' => Str::random(12),
                'role' => Str::random(12),
                'stars' => rand(1, 5),
                'title_first' => Str::random(16),
                'description_first' => Str::random(16),
                'quote_title' => Str::random(16),
                'quote_main' => Str::random(16),
                'description_second' => Str::random(16),
                'title_second' => Str::random(16),
                'description_third' => Str::random(16),
            ]);
            for ($j = 0; $j < 6; $j++) {
                Image::create([
                    'patch' => 'posts/photos/bottom/demo.png',
                    'review_id' => $review->id,
                    'type' => 'free',
                ]);
            }
        }
    }
}
