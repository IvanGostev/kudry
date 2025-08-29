<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['email' => $all['email'], 'date' => $all['date']];
        Feedback::create($data);
        return back();
    }

}
