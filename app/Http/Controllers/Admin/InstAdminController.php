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
            $all['img'] = $request->file('img')->store('inst', 'public');
        }
        $data = ['img' => $all['img'], 'url' => $all['url']];
        Inst::create($data);
        return redirect()->route('admin.inst.index');
    }

    public function delete(Inst $inst): RedirectResponse
    {
        $inst->delete();
        return redirect()->route('admin.inst.index');
    }
}
