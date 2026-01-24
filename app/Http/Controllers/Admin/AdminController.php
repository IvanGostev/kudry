<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use http\Cookie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function login(Request $requiest): View
    {
        return view('admin.auth.login');
    }


    public function auth(Request $request)
    {
        $key = $request->key;
        if ($key === env('ADMIN_KEY')) {
            return redirect()->route('admin.text.index')->cookie('ADMIN_KEY', $key, 60*60*60*24*60);
        } else {
            return back();
        }
    }
}
