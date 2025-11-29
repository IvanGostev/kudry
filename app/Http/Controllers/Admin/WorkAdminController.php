<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Work;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Image\Image;

class WorkAdminController extends Controller
{
    public function index(Request $request): View
    {
        $works = Work::all();
        return view('admin.work.index', compact('works'));
    }

    public function create(Request $request): View
    {
        return view('admin.work.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        if (isset($all['img'])) {
            $imageName = time() . '-work' . '.' . $request->img->extension();
            Image::load($request->img->path())
                ->optimize()
                ->save(public_path('images/') . $imageName);
            $data['img'] = 'images/' . $imageName;
        }
//        $data['img'] = $all['img']->store('reviews/video', 'public');
        if (isset($all['link'])) {
            $data['link'] = $all['link'];

        }
        else if (isset($all['video'])) {
            $data['video'] = $all['video']->store('reviews/video', 'public');
        }
        Work::create($data);
        return redirect()->route('admin.work.index');
    }


    public function edit(Work $work, Request $request): View
    {
        return view('admin.work.edit', compact('work'));
    }

    public function update(Work $work, Request $request): RedirectResponse
    {
        $all = $request->all();

        $data = ['url' => $all['url']];

        if (isset($all['img'])) {
            $imageName = time() . '-work' . '.' . $request->img->extension();
            Image::load($request->img->path())
                ->optimize()
                ->save(public_path('images/') . $imageName);
            $data['img'] = 'images/' . $imageName;
        }

        $work->update($data);
        return redirect()->route('admin.work.index');
    }

    public function delete(Work $work): RedirectResponse
    {
        $work->delete();
        return redirect()->route('admin.work.index');
    }
}
