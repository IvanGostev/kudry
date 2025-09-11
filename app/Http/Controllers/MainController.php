<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Film;
use App\Models\Inst;
use App\Models\Package;
use App\Models\Post;
use App\Models\Review;
use App\Models\Slide;
use App\Models\SubCategory;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $films = Film::all();
        $insts = Inst::all();
        $slides = Slide::all();
        return view('index', compact('films', 'insts', 'slides'));
    }

    public function blog(Request $request)
    {
        $categories = Category::all();
        $category_id = $request->category_id ?? 'all';
        $subcategory_id = $request->subcategory_id ?? 'all';
        if ($category_id != 'all') {
            $posts = Post::where('category_id', $category_id);
            $subcategories = Subcategory::where('category_id', $category_id)->get();
            if ($subcategory_id != 'all') {
                $posts = $posts->where('sub_category_id', $subcategory_id)->get();
            } else {
                $posts = $posts->get();
            }
        } else {
            $posts = Post::all();
            $subcategories = [];
        }
        return view('blog', compact('posts', 'categories', 'category_id', 'subcategories', 'subcategory_id'));
    }

    public function post(Post $post)
    {
        $posts_related = Post::whereNot('id', $post->id)->latest()->take(4)->get();
        $posts_popular = Post::whereNot('id', $post->id)->orderBy('views', 'desc')->take(4)->get();
        $post->update(['views' => $post->views + 1]);
        return view('post', compact('post', 'posts_related', 'posts_popular'));
    }

    public function portfolio()
    {
        $reviews = Review::orderBy(DB::raw('RAND()'))->take(2)->get();
        return view('portfolio', compact('reviews'));
    }

    public function packages()
    {
        $packages = Package::all();
        return view('package', compact('packages'));
    }

    public function review()
    {
        $review = Review::where('id', rand(1, Review::count()))->first();
        $reviews = Review::whereNot('id', $review->id)->orderBy(DB::raw('RAND()'))->take(2)->get();
        return view('review', compact('reviews', 'review'));
    }

    public function review_show(Review $review)
    {
        $reviews = Review::whereNot('id', $review->id)->orderBy(DB::raw('RAND()'))->take(2)->get();
        return view('review', compact('reviews', 'review'));
    }

    public function privacy_policy()
    {

        $text = Text::where('key', 'privacy-policy')->first();

        return view('text', compact('text'));
    }

    public function terms_of_use()
    {

        $text = Text::where('key', 'terms-of-use')->first();
        return view('text', compact('text'));
    }

}
