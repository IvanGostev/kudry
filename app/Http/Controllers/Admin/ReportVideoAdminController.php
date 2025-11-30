<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Image;
use App\Models\Report;
use App\Models\ReportImage;
use App\Models\ReportVideo;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ReportVideoAdminController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = [
            'report_id' => $all['report_id'],
            'img' => $all['img']->store('reports/previews/', 'public'),
        ];

        if (isset($data['video_link']) and isset($data['video_download'])) {
            $data['video_link'] = $all['video_link'];
            $data['video_download'] = $all['video_download'];
        } else {
            $data['video'] = $all['video']->store('reports/videos/', 'public');
        }
        ReportVideo::create($data);
        return back();
    }

    public function delete(ReportVideo $report): RedirectResponse
    {
        $report->delete();
        return back();
    }
}
