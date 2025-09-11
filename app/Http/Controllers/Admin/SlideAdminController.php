<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Slide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SlideAdminController extends Controller
{
    public function index(Request $request): View
    {
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    public function create(Request $request): View
    {
        return view('admin.slide.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['info' => $all['info'], 'title' => $all['title'], 'url' => $all['url']];
        Slide::create($data);
        return redirect()->route('admin.slide.index');
    }


    public function edit(Slide $slide, Request $request): View
    {
        return view('admin.slide.edit', compact('slide'));
    }

    public function update(Slide $slide, Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['info' => $all['info'], 'title' => $all['title'], 'url' => $all['url']];
        $slide->update($data);
        return redirect()->route('admin.slide.index');
    }

    public function delete(Slide $slide): RedirectResponse
    {
        $slide->delete();
        return redirect()->route('admin.slide.index');
    }
}
