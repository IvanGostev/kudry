<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PackageAdminController extends Controller
{
    public function index(Request $request): View
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }

    public function create(Request $request): View
    {
        return view('admin.package.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        if (isset($all['img'])) {
            $all['img'] = $request->file('img')->store('package', 'public');
        }
        $data = ['img' => $all['img'], 'title' => $all['title'], 'description' => $all['description']];
        Package::create($data);
        return redirect()->route('admin.package.index');
    }

    public function delete(Package $package): RedirectResponse
    {
        $package->delete();
        return redirect()->route('admin.package.index');
    }
}
