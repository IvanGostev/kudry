<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostBlock;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostBlockAdminController extends Controller
{
    public function index(Request $request, Post $post): View
    {
        $blocks = PostBlock::where('post_id', $post->id)->get();
        return view('admin.post.block.index', compact('blocks', 'post'));
    }

    public function create(Request $request, Post $post): View
    {
        return view('admin.post.block.create', compact('post'));
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();

        $block = PostBlock::create([
            'post_id' => $all['post_id'],
            'title' => $all['title'],
            'description' => $all['description'],
        ]);

        $files = $all['photos'];
        foreach ($files as $file) {
            $patch = $file->store('blocks/photos/free', 'public');
            Image::create([
                'patch' => $patch,
                'post_block_id' => $block->id,
                'type' => 'free',
            ]);
        }


        return redirect()->route('admin.post.block.index', $all['post_id']);
    }

    public function edit(Request $request, Post $post): View
    {
        return view('admin.post.block.edit', compact('post'));
    }

    public function update(PostBlock $block, Request $request): RedirectResponse
    {
        $all = $request->all();

        $block->update([
            'title' => $all['title'],
            'description' => $all['description'],
        ]);

        if (count($all['photos']) != 0) {
            $files = Image::where('post_block_id', $block->id)->where('type', 'free')->get();
            foreach ($files as $file) {
                $file->delete();
            }

            $files = $all['photos'];
            foreach ($files as $file) {
                $patch = $file->store('blocks/photos/free', 'public');
                Image::create([
                    'patch' => $patch,
                    'post_block_id' => $block->id,
                    'type' => 'free',
                ]);
            }
        }


        return redirect()->route('admin.post.block.index', $all['post_id']);
    }

    public function delete(PostBlock $block): RedirectResponse
    {
        $block->delete();
        return redirect()->route('admin.post.block.index');
    }
}
