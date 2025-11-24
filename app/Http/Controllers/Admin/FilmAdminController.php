<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Film;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Image\Image;

class FilmAdminController extends Controller
{
    public function index(Request $request): View
    {
        $films = Film::all();
        return view('admin.film.index', compact('films'));
    }

    public function create(Request $request): View
    {
        return view('admin.film.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();

//        if (isset($all['img'])) {
//            $imageName = time() . '.' . $request->img->extension();
//            Image::load($request->img->path())
//                ->optimize()
//                ->save(public_path('images/') . $imageName);
//            $all['img'] = 'images/' . $imageName;
//        }
        $all['img'] = $all['img']->store('reviews/video', 'public');
        $data = ['img' => $all['img'], 'title' => $all['title'], 'video' => $all['video']->store('reviews/video', 'public')];

        Film::create($data);
        return redirect()->route('admin.film.index');
    }

    public function edit(Film $film, Request $request): View
    {
        return view('admin.film.edit', compact('film'));
    }

    public function update(Film $film, Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['title' => $all['title']];
        if (isset($all['video'])) {
            $data['video'] = $all['video']->store('reviews/video', 'public');
        }
        if (isset($all['img'])) {
            $imageName = time() . '.' . $request->img->extension();
            Image::load($request->img->path())
                ->optimize()
                ->save(public_path('images/') . $imageName);
            $data['img'] = 'images/' . $imageName;
        }
//        $data['img'] = $all['img']->store('reviews/video', 'public');
        $film->update($data);

        return redirect()->route('admin.film.index');
    }


    public function delete(Film $film): RedirectResponse
    {

        $film->delete();
        return redirect()->route('admin.film.index');
    }
}
