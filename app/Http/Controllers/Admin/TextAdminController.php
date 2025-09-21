<?php

namespace App\Http\Controllers\Admin;
use App\Models\Text;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TextAdminController extends Controller
{
    public function index(Request $request): View
    {
        $texts = Text::all();
        return view('admin.text.index', compact('texts'));
    }
    public function create(Request $request): View
    {
        $texts = Text::all();
        return view('admin.text.create', compact('texts'));
    }
    public function store(Request $request)
    {

        Text::create([
            'key' => $request->key,
            'text' => $request->text
        ]);
        return redirect()->route('admin.text.index');
    }
    public function delete(Text $text)
    {
        $text->delete();
        return back();
    }
}
