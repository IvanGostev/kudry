<?php

use App\Models\Seo;
use Illuminate\Support\Str;

function seo($url) {
    return Seo::where('url', $url)->first();
}
function slug($item) {
    return Str::slug($item);
}
