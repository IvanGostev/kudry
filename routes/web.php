<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\DetailAdminController;
use App\Http\Controllers\Admin\FeedbackAdminController;
use App\Http\Controllers\Admin\FilmAdminController;
use App\Http\Controllers\Admin\WorkAdminController;
use App\Http\Controllers\Admin\ReportAdminController;
use App\Http\Controllers\Admin\ReportVideoAdminController;
use App\Http\Controllers\Admin\TextAdminController;
use App\Http\Controllers\Admin\PackageAdminController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\Admin\PostBlockAdminController;
use App\Http\Controllers\Admin\ReviewAdminController;
use App\Http\Controllers\Admin\SeoAdminController;
use App\Http\Controllers\Admin\SlideAdminController;
use App\Http\Controllers\Admin\SubCategoryAdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\AdminMiddleware;
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
//    Route::get('/guide', [MainController::class, 'packages'])->name('packages');
    Route::get('/reviews', [MainController::class, 'review'])->name('review');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::get('/{review}/review-{slug}', [MainController::class, 'review_show'])->name('review.show');
    Route::get('/price', [MainController::class, 'price'])->name('price');
});
Route::prefix('report')->name('report.')->controller(ReportController::class)->group(function () {
    Route::get('/{report}~{slug}', 'show')->name('show');
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
    Route::controller(AdminController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/auth', 'auth')->name('auth');
    });
    Route::middleware(AdminMiddleware::class)->group(function () {


        Route::prefix('text')->name('text.')->controller(TextAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{text}/edit', 'edit')->name('edit');
            Route::patch('/{text}/update')->name('update');
            Route::delete('{text}/delete', 'delete')->name('delete');
        });

        Route::prefix('feedback')->name('feedback.')->controller(FeedbackAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::delete('/{delete}/delete', 'delete')->name('delete');
        });

        Route::prefix('detail')->name('detail.')->controller(DetailAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{detail}/edit', 'edit')->name('edit');
            Route::patch('/{detail}/update')->name('update');
            Route::delete('/{detail}/delete', 'delete')->name('delete');
        });
        Route::prefix('work')->name('work.')->controller(WorkAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{work}/edit', 'edit')->name('edit');
            Route::patch('/{work}/update')->name('update');
            Route::delete('/{work}/delete', 'delete')->name('delete');
        });
        Route::prefix('package')->name('package.')->controller(PackageAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{package}/edit', 'edit')->name('edit');
            Route::patch('/{package}/update')->name('update');
            Route::delete('/{package}/delete', 'delete')->name('delete');
        });

        Route::prefix('slide')->name('slide.')->controller(SlideAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{slide}/edit', 'edit')->name('edit');
            Route::patch('/{slide}/update')->name('update');
            Route::delete('/{slide}/delete', 'delete')->name('delete');
        });
        Route::prefix('film')->name('film.')->controller(FilmAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{film}/edit', 'edit')->name('edit');
            Route::patch('/{film}/update')->name('edit');
            Route::delete('/{film}/delete', 'delete')->name('delete');
        });
        Route::prefix('category')->name('category.')->controller(CategoryAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{category}/edit', 'edit')->name('edit');
            Route::patch('/{category}/update/', 'update')->name('update');
            Route::delete('/{category}/delete', 'delete')->name('delete');
        });
        Route::prefix('subcategory')->name('subcategory.')->controller(SubcategoryAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{subcategory}/edit', 'edit')->name('edit');
            Route::patch('/{post}/update')->name('update');
            Route::delete('/{subcategory}/delete', 'delete')->name('delete');
        });
        Route::prefix('post')->name('post.')->controller(PostAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{post}/edit', 'edit')->name('edit');
            Route::patch('/{post}/update', 'update')->name('update');
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
        Route::prefix('report')->name('report.')->controller(ReportAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{report}/edit', 'edit')->name('edit');
            Route::patch('/{report}/update', 'update')->name('update');
            Route::delete('/{report}/delete', 'delete')->name('delete');
        });
        Route::prefix('report/video')->name('report.video.')->controller(ReportVideoAdminController::class)->group(function () {
            Route::post('/store', 'store')->name('store');
            Route::delete('/{report}/delete', 'delete')->name('delete');
        });
        Route::prefix('review')->name('review.')->controller(ReviewAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{review}/edit', 'edit')->name('edit');
            Route::patch('/{review}/update', 'update')->name('update');
            Route::delete('/{review}/delete', 'delete')->name('delete');
        });

        Route::prefix('seo')->name('seo.')->controller(SeoAdminController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{seo}/edit', 'edit')->name('edit');
            Route::patch('/{seo}/update', 'update')->name('update');
            Route::delete('/{seo}/delete', 'delete')->name('delete');
        });
    });
});
require __DIR__ . '/auth.php';
