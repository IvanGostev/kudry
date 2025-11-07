<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Inst;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Image\Image;

class InstAdminController extends Controller
{
    public function index(Request $request): View
    {
        $insts = Inst::all();
        return view('admin.inst.index', compact('insts'));
    }

    public function create(Request $request): View
    {
        return view('admin.inst.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        if (isset($all['img'])) {
            $imageName = time() . '-inst' . '.' . $request->img->extension();
            Image::load($request->img->path())
                ->optimize()
                ->save(public_path('images/') . $imageName);
            $all['img'] = 'images/' . $imageName;
        }
        $data = ['img' => $all['img'], 'url' => $all['url']];
        Inst::create($data);
        return redirect()->route('admin.inst.index');
    }


    public function edit(Inst $inst, Request $request): View
    {
        return view('admin.inst.edit', compact('inst'));
    }

    public function update(Inst $inst, Request $request): RedirectResponse
    {
        $all = $request->all();

        $data = ['url' => $all['url']];

        if (isset($all['img'])) {
            $imageName = time() . '-inst' . '.' . $request->img->extension();
            Image::load($request->img->path())
                ->optimize()
                ->save(public_path('images/') . $imageName);
            $data['img'] = 'images/' . $imageName;
        }

        $inst->update($data);
        return redirect()->route('admin.inst.index');
    }

    public function delete(Inst $inst): RedirectResponse
    {
        $inst->delete();
        return redirect()->route('admin.inst.index');
    }
}
