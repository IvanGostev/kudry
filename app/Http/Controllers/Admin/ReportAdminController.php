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

class ReportAdminController extends Controller
{
    public function index(Request $request): View
    {
        $reports = Report::all();
        return view('admin.report.index', compact('reports'));
    }

    public function create(Request $request): View
    {
        return view('admin.report.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();

        $report = Report::create([
            'img' =>  $all['img']->store('reports/previews/', 'public'),
            'name' => $all['name'],
            'date' => $all['date'],
            'text' => $all['text'],
        ]);

        if (isset($all['photos'])) {
            $files = $all['photos'];
            foreach ($files as $file) {
                $patch = $file->store('reports/photos/', 'public');
                ReportImage::create([
                    'img' => $patch,
                    'report_id' => $report->id,
                ]);
            }
        }

        return redirect()->route('admin.report.index');
    }


    public function edit(Report $report, Request $request): View
    {
        $videos = ReportVideo::all();
        return view('admin.report.edit', compact('videos', 'report'));
    }


    public function update(Report $report, Request $request): RedirectResponse
    {
        $all = $request->all();

        $report->update([
            'category_id' => SubCategory::where('id', $all['subcategory_id'])->first()->category_id,
            'sub_category_id' => $all['subcategory_id'],
            'slug' => Str::slug($all['top_title']),
            'top_title' => $all['top_title'],
            'top_description' => $all['top_description'],
            'bottom_title' => $all['bottom_title'],
            'bottom_description' => $all['bottom_description'],
            'caption' => $all['caption'],
        ]);


        if (count($all['photos-top']) != 0) {
            $files = Image::where('type', 'top')->where('report_id', $report->id)->get();
            foreach ($files as $file) {
                $file->delete();
            }
            $files = $all['photos-top'];
            foreach ($files as $file) {
                $patch = $file->store('reports/photos/top', 'public');
                Image::create([
                    'patch' => $patch,
                    'report_id' => $report->id,
                    'type' => 'top',
                ]);
            }
        }
        if (count($all['photos-bottom']) != 0) {
            $files = Image::where('type', 'bottom')->where('report_id', $report->id)->get();
            foreach ($files as $file) {
                $file->delete();
            }
            $files = $all['photos-bottom'];
            foreach ($files as $file) {
                $patch = $file->store('reports/photos/bottom', 'public');
                Image::create([
                    'patch' => $patch,
                    'report_id' => $report->id,
                    'type' => 'bottom',
                ]);
            }
        }


        return redirect()->route('admin.report.index');
    }

    public function delete(Report $report): RedirectResponse
    {
        $report->delete();
        return redirect()->route('admin.report.index');
    }
}
