<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Review;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ReviewAdminController extends Controller
{
    public function index(Request $request): View
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }

    public function create(Request $request): View
    {
        $subcategories = SubCategory::all();
        return view('admin.review.create', compact('subcategories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();

        $all['video'] = $all['video']->store('reviews/video', 'public');
        $all['video_preview'] = $all['video_preview']->store('reviews/preview', 'public');
        $all['stories'] = $all['stories']->store('reviews/video', 'public');
        $all['stories_preview'] = $all['stories_preview']->store('reviews/preview', 'public');
        $all['faces'] = $all['faces']->store('reviews/faces', 'public');

        $review = Review::create([
            'video' => $all['video'],
            'video_preview' => $all['video_preview'],
            'names' => $all['names'],
            'name' => $all['name'],
            'role' => $all['role'],
            'faces' => $all['faces'],
            'views' => $all['views'],
            'stars' => $all['stars'],
            'title_first' => $all['title_first'],
            'slug' => Str::slug($all['title_first']),
            'description_first' => $all['description_first'],
            'quote_title' => $all['quote_title'],
            'quote_main' => $all['quote_main'],
            'description_second' => $all['description_second'],
            'stories' => $all['stories'],
            'stories_preview' => $all['stories_preview'],
            'title_second' => $all['title_second'],
            'description_third' => $all['description_third'],
        ]);

        $files = $all['photos'];
        foreach ($files as $file) {
            $patch = $file->store('reviews/photos', 'public');
            Image::create([
                'patch' => $patch,
                'review_id' => $review->id,
                'type' => 'free',
            ]);
        }
        return redirect()->route('admin.review.index');
    }


    public function edit(Review $review, Request $request): View
    {
        $subcategories = SubCategory::all();
        return view('admin.review.edit', compact('subcategories', 'review'));
    }

    public function update(Review $review, Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = [
            'names' => $all['names'],
            'name' => $all['name'],
            'role' => $all['role'],
            'views' => $all['views'],
            'stars' => $all['stars'],
            'title_first' => $all['title_first'],
            'slug' => $all['slug'],
            'description_first' => $all['description_first'],
            'quote_title' => $all['quote_title'],
            'quote_main' => $all['quote_main'],
            'description_second' => $all['description_second'],
            'title_second' => $all['title_second'],
            'description_third' => $all['description_third'],
        ];
        if (isset($all['video'])) {
            $data['video'] = $all['video']->store('reviews/video', 'public');
        }
        if (isset($all['faces'])) {
            $data['faces'] = $all['faces']->store('reviews/faces', 'public');
        }

        if (isset($all['video_preview'])) {
            $data['video_preview'] = $all['video_preview']->store('reviews/preview', 'public');
        }

        if (isset($all['stories'])) {
            $data['stories'] = $all['stories']->store('reviews/video', 'public');

        }
        if (isset($all['stories_preview'])) {
            $data['stories_preview'] = $all['stories_preview']->store('reviews/preview', 'public');
        }

        $review->update($data);

        if (isset($all['photos'])) {
            $files = Image::where('review_id', $review->id)->where('type', 'free')->get();
            foreach ($files as $file) {
                $file->delete();
            }
            $files = $all['photos'];
            foreach ($files as $file) {
                $patch = $file->store('reviews/photos', 'public');
                Image::create([
                    'patch' => $patch,
                    'review_id' => $review->id,
                    'type' => 'free',
                ]);
            }
        }
        return redirect()->route('admin.review.index');
    }

    public function delete(Review $review): RedirectResponse
    {
        $review->delete();
        return redirect()->route('admin.review.index');
    }
}
