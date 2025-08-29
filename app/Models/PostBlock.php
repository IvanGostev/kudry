<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostBlock extends Model
{
    protected $guarded = false;

    public function images() {
        return Image::where('post_block_id', $this->id)->get();
    }
}
