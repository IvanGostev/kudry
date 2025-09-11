<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryAdminController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create(Request $request): View
    {
        return view('admin.category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['title' => $all['title']];
        Category::create($data);
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category, Request $request): View
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category, Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['title' => $all['title']];
        $category->update($data);
        return redirect()->route('admin.category.index');
    }

    public function delete(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
