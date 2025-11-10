<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
   public function show(Report $report, $slug) {

       return view('report', compact('report'));
   }
}
