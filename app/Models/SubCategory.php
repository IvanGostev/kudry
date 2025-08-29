<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = false;

    public function category()
    {
        return Category::where('id', $this->category_id)->first();
    }
}
