<?php

use App\Models\Seo;

function seo($url) {
    return Seo::where('url', $url)->first();
}
