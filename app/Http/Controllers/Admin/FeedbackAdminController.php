<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FeedbackAdminController extends Controller
{
    public function index(Request $request): View
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function delete(Feedback $feedback): RedirectResponse
    {
        $feedback->delete();
        return back();
    }
}
