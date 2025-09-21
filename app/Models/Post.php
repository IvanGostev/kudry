<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = false;

    public function category() {
        return Category::where('id', $this->category_id)->first();
    }
    public function subcategory() {
        return SubCategory::where('id', $this->sub_category_id)->first();
    }
    public function images($type) {
        return Image::where('post_id', $this->id)->where('type', $type)->get();
    }
    public function blocks() {
        return PostBlock::where('post_id', $this->id)->get();
    }
}
