<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Seo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SeoAdminController extends Controller
{
    public function index(Request $request): View
    {
        $seos = Seo::all();
        return view('admin.seo.index', compact('seos'));
    }

    public function create(Request $request): View
    {
        return view('admin.seo.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = [
            'url' => $all['url'],
            'title' => $all['title'],
            'description' => $all['description'],
            'keywords' => $all['keywords'],
        ];
        Seo::create($data);
        return redirect()->route('admin.seo.index');
    }

    public function delete(Seo $seo): RedirectResponse
    {
        $seo->delete();
        return redirect()->route('admin.seo.index');
    }
}
