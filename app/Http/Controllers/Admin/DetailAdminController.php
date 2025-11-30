<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\PriceDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Image\Image;

class DetailAdminController extends Controller
{
    public function index(Request $request): View
    {
        $details = PriceDetail::all();
        return view('admin.detail.index', compact('details'));
    }

    public function create(Request $request): View
    {
        return view('admin.detail.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $imageName = time() . '-detail' . '.' . $request->img->extension();
        Image::load($request->img->path())
            ->optimize()
            ->save(public_path('images/') . $imageName);
        $data['img'] = 'images/' . $imageName;

//        $data['img'] = $all['img']->store('reviews/video', 'public');

        PriceDetail::create($data);
        return redirect()->route('admin.detail.index');
    }


    public function delete(PriceDetail $detail): RedirectResponse
    {
        $detail->delete();
        return redirect()->route('admin.detail.index');
    }
}
