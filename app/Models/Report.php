<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = false;

    public function images()
    {
        return ReportImage::where('report_id', $this->id)->get();
    }

    public function videos()
    {
        return ReportVideo::where('report_id', $this->id)->get();
    }
}
