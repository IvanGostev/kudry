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

        $data = [
            'views' => $all['views'],
            'stars' => $all['stars'],
            'slug' => Str::slug($all['vertical_title']),

            'geo' => $all['geo'],
            'names' => $all['names'],

            'small_title' => $all['small_title'],
            'small_description' => $all['small_description'],

            'img_title' => $all['img_title'],
            'img_description' => $all['img_description'],
            'img_text' => $all['img_text'],

            'vertical_title' => $all['vertical_title'],
            'vertical_description' => $all['vertical_description'],
        ];


        $data['main_video_preview'] = $all['main_video_preview']->store('reviews/preview', 'public');
        if (isset($data['main_video_link'])) {
            $data['main_video_link'] = $all['main_video_link'];
        } else {
            $data['main_video'] = $all['main_video']->store('reviews/video', 'public');
        }


        $data['small_video_preview'] = $all['small_video_preview']->store('reviews/preview', 'public');
        if (isset($data['small_video_link'])) {
            $data['small_video_link'] = $all['small_video_link'];
        } else {
            $data['small_video'] = $all['small_video']->store('reviews/video', 'public');
        }


        $data['first_img'] = $all['first_img']->store('reviews/images', 'public');
        $data['second_img'] = $all['second_img']->store('reviews/images', 'public');


        $data['vertical_video_preview'] = $all['vertical_video_preview']->store('reviews/preview', 'public');
        if (isset($data['vertical_video_link'])) {
            $data['vertical_video_link'] = $all['vertical_video_link'];
        } else {
            $data['vertical_video'] = $all['vertical_video']->store('reviews/video', 'public');
        }


        $review = Review::create($data);
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
            'views' => $all['views'],
            'stars' => $all['stars'],
            'slug' => Str::slug($all['vertical_title']),

            'geo' => $all['geo'],
            'names' => $all['names'],

            'small_title' => $all['small_title'],
            'small_description' => $all['small_description'],

            'img_title' => $all['img_title'],
            'img_description' => $all['img_description'],
            'img_text' => $all['img_text'],

            'vertical_title' => $all['vertical_title'],
            'vertical_description' => $all['vertical_description'],
        ];

        if (isset($all['main_video_preview']) and isset($all['main_video'])) {
            $data['main_video_preview'] = $all['main_video_preview']->store('reviews/preview', 'public');

            if (isset($data['main_video_link'])) {
                $data['main_video_link'] = $all['main_video_link'];
            } else {
                $data['main_video'] = $all['main_video']->store('reviews/video', 'public');
            }

        }

        if (isset($all['small_video_preview']) and isset($all['small_video'])) {
            $data['small_video_preview'] = $all['small_video_preview']->store('reviews/preview', 'public');

            if (isset($data['small_video_link'])) {
                $data['small_video_link'] = $all['small_video_link'];
            } else {
                $data['small_video'] = $all['small_video']->store('reviews/video', 'public');
            }
        }

        if (isset($all['first_img'])) {
            $data['first_img'] = $all['first_img']->store('reviews/images', 'public');
        }

        if (isset($all['second_img'])) {
            $data['second_img'] = $all['second_img']->store('reviews/images', 'public');
        }


        if (isset($all['vertical_video_preview']) and isset($all['vertical_video'])) {
            $data['vertical_video_preview'] = $all['vertical_video_preview']->store('reviews/preview', 'public');

            if (isset($data['vertical_video_link'])) {
                $data['vertical_video_link'] = $all['vertical_video_link'];
            } else {
                $data['vertical_video'] = $all['vertical_video']->store('reviews/video', 'public');
            }
        }

        $review->update($data);

        return redirect()->route('admin.review.index');
    }

    public function delete(Review $review): RedirectResponse
    {
        $review->delete();
        return redirect()->route('admin.review.index');
    }
}
