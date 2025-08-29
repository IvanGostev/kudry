<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = false;

    public function images() {
        return Image::where('review_id', $this->id)->get();
    }
}
