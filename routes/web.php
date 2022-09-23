<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix(LaravelLocalization::setLocale())
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->group(function () {

        Route::controller(SiteController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/search', 'search')->name('search');
                Route::get('/category/{slug}', 'category')->name('category');
                Route::get('/leader/{slug}', 'leader')->name('leader');
                Route::get('/region/{slug}', 'region')->name('region');
                Route::get('/about/{slug}', 'about')->name('about');
                Route::get('/news/{slug}', 'news')->name('news');
                Route::get('/pages/{slug}', 'pages')->name('pages');
                Route::get('/documents/{slug}', 'documents')->name('documents');
                Route::get('/contact', 'contact')->name('contact');
                Route::get('rss', 'rss');
            });

        Route::fallback(function () {
            return view('frontend.404');
        });

        Route::get('clear', function () {
            Artisan::call('optimize:clear');
            return redirect('/');
        });
    });

Auth::routes();
