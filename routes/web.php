<?php

use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\FeedbackAdminController;
use App\Http\Controllers\Admin\FilmAdminController;
use App\Http\Controllers\Admin\InstAdminController;
use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Controllers\Admin\PackageAdminController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\Admin\PostBlockAdminController;
use App\Http\Controllers\Admin\ReviewAdminController;
use App\Http\Controllers\Admin\SeoAdminController;
use App\Http\Controllers\Admin\SlideAdminController;
use App\Http\Controllers\Admin\SubcategoryAdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::name('main.')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/privacy-policy', [MainController::class, 'privacy_policy'])->name('privacy-policy');
    Route::get('/terms-of-use', [MainController::class, 'terms_of_use'])->name('terms-of-use');
    Route::get('/blog', [MainController::class, 'blog'])->name('blog');
    Route::get('/{post}/post-{slug}', [MainController::class, 'post'])->name('post');
    Route::get('/portfolio', [MainController::class, 'portfolio'])->name('portfolio');
    Route::get('/packages', [MainController::class, 'packages'])->name('packages');
    Route::get('/reviews', [MainController::class, 'review'])->name('review');
    Route::get('/{review}/review-{slug}', [MainController::class, 'review_show'])->name('review.show');
});

Route::prefix('feedback')->name('feedback.')->controller(FeedbackController::class)->group(function () {
    Route::get('/', 'store')->name('store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('text')->name('text.')->controller(MainAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{text}/edit')->name('edit');
        Route::patch('/{text}/update')->name('update');
        Route::delete('{text}/delete', 'delete')->name('delete');
    });

    Route::prefix('feedback')->name('feedback.')->controller(FeedbackAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::delete('/{delete}/delete', 'delete')->name('delete');
    });

    Route::prefix('inst')->name('inst.')->controller(InstAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{inst}/edit')->name('edit');
        Route::patch('/{inst}/update')->name('update');
        Route::delete('/{inst}/delete', 'delete')->name('delete');
    });
    Route::prefix('package')->name('package.')->controller(PackageAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{package}/edit')->name('edit');
        Route::patch('/{package}/update')->name('update');
        Route::delete('/{package}/delete', 'delete')->name('delete');
    });

    Route::prefix('slide')->name('slide.')->controller(SlideAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{slide}/edit')->name('edit');
        Route::patch('/{slide}/update')->name('update');
        Route::delete('/{slide}/delete', 'delete')->name('delete');
    });
    Route::prefix('film')->name('film.')->controller(FilmAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{film}/edit')->name('edit');
        Route::patch('/{film}/update')->name('edit');
        Route::delete('/{film}/delete', 'delete')->name('delete');
    });
    Route::prefix('category')->name('category.')->controller(CategoryAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{category}/edit')->name('edit');
        Route::patch('/{}update/');
        Route::delete('/{category}/delete', 'delete')->name('delete');
    });
    Route::prefix('subcategory')->name('subcategory.')->controller(SubcategoryAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{subcategory}/edit')->name('edit');
        Route::patch('/{post}/update')->name('update');
        Route::delete('/{subcategory}/delete', 'delete')->name('delete');
    });
    Route::prefix('post')->name('post.')->controller(PostAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{post}/edit')->name('edit');
        Route::patch('/{post}/update')->name('update');
        Route::delete('/{post}/delete', 'delete')->name('delete');
    });
    Route::prefix('post')->name('post.block.')->controller(PostBlockAdminController::class)->group(function () {
        Route::get('/{post}/block', 'index')->name('index');
        Route::get('/{post}/block/create', 'create')->name('create');
        Route::get('/{block}/block/edit', 'edit')->name('edit');
        Route::patch('/{block}/block/update', 'update')->name('update');
        Route::post('/block/store', 'store')->name('store');
        Route::delete('post/block/delete', 'delete')->name('delete');
    });
    Route::prefix('review')->name('review.')->controller(ReviewAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{review}/edit')->name('edit');
        Route::patch('/{review}/update')->name('update');
        Route::delete('/{review}/delete', 'delete')->name('delete');
    });

    Route::prefix('seo')->name('seo.')->controller(SeoAdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{seo}/edit')->name('edit');
        Route::patch('/{seo}/update')->name('update');
        Route::delete('/{seo}/delete', 'delete')->name('delete');
    });
});
require __DIR__ . '/auth.php';
