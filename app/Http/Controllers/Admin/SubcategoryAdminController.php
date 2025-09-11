<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SubcategoryAdminController extends Controller
{
    public function index(Request $request): View
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    public function create(Request $request): View
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['category_id' => $all['category_id'], 'title' => $all['title']];
        Subcategory::create($data);
        return redirect()->route('admin.subcategory.index');
    }

    public function edit(Subcategory $subcategory, Request $request): View
    {
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    public function update(Subcategory $subcategory, Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['title' => $all['title']];
        $subcategory->update($data);
        return redirect()->route('admin.subcategory.index');
    }


    public function delete(Subcategory $subcategory): RedirectResponse
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategory.index');
    }
}
