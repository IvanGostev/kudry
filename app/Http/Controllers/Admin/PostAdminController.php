<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostAdminController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create(Request $request): View
    {
        $subcategories = SubCategory::all();
        return view('admin.post.create', compact('subcategories'));
    }


    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();

        $post = Post::create([
            'category_id' => SubCategory::where('id', $all['subcategory_id'])->first()->category_id,
            'sub_category_id' => $all['subcategory_id'],
            'slug' => Str::slug($all['top_title']),
            'top_title' => $all['top_title'],
            'top_description' => $all['top_description'],
            'bottom_title' => $all['bottom_title'],
            'bottom_description' => $all['bottom_description'],
            'caption' => $all['caption'],
        ]);

        $files = $all['photos-top'];
        foreach ($files as $file) {
            $patch = $file->store('posts/photos/top', 'public');
            Image::create([
                'patch' => $patch,
                'post_id' => $post->id,
                'type' => 'top',
            ]);
        }
        $files = $all['photos-bottom'];
        foreach ($files as $file) {
            $patch = $file->store('posts/photos/bottom', 'public');
            Image::create([
                'patch' => $patch,
                'post_id' => $post->id,
                'type' => 'bottom',
            ]);
        }


        return redirect()->route('admin.post.index');
    }


    public function edit(Post $post, Request $request): View
    {
        $subcategories = SubCategory::all();
        return view('admin.post.edit', compact('subcategories', 'post'));
    }


    public function update(Post $post, Request $request): RedirectResponse
    {
        $all = $request->all();

        $post->update([
            'category_id' => SubCategory::where('id', $all['subcategory_id'])->first()->category_id,
            'sub_category_id' => $all['subcategory_id'],
            'slug' => Str::slug($all['top_title']),
            'top_title' => $all['top_title'],
            'top_description' => $all['top_description'],
            'bottom_title' => $all['bottom_title'],
            'bottom_description' => $all['bottom_description'],
            'caption' => $all['caption'],
        ]);


        if (count($all['photos-top']) != 0) {
            $files = Image::where('type', 'top')->where('post_id', $post->id)->get();
            foreach ($files as $file) {
                $file->delete();
            }
            $files = $all['photos-top'];
            foreach ($files as $file) {
                $patch = $file->store('posts/photos/top', 'public');
                Image::create([
                    'patch' => $patch,
                    'post_id' => $post->id,
                    'type' => 'top',
                ]);
            }
        }
        if (count($all['photos-bottom']) != 0) {
            $files = Image::where('type', 'bottom')->where('post_id', $post->id)->get();
            foreach ($files as $file) {
                $file->delete();
            }
            $files = $all['photos-bottom'];
            foreach ($files as $file) {
                $patch = $file->store('posts/photos/bottom', 'public');
                Image::create([
                    'patch' => $patch,
                    'post_id' => $post->id,
                    'type' => 'bottom',
                ]);
            }
        }


        return redirect()->route('admin.post.index');
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
