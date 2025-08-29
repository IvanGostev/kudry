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

class MainAdminController extends Controller
{
    public function index(Request $request): View
    {
        $texts = Text::all();
        return view('admin.main.index', compact('texts'));
    }
    public function delete(Text $text): View
    {
        $text->delete();
        return back();
    }
}
