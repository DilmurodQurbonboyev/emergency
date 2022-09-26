<?php

use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\UsefulController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\AuthLogController;
use App\Http\Controllers\Admin\AuthorityController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\PageCategoryController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\PhotoCategoryController;
use App\Http\Controllers\Admin\VideoCategoryController;
use App\Http\Controllers\Admin\UsefulCategoryController;
use App\Http\Controllers\Admin\ManagementCategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix(LaravelLocalization::setLocale())
    ->middleware([
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath',
        'frameGuard'
    ])
    ->group(function () {

        Auth::routes([
            'register' => false,
            'reset' => false,
            'verify' => false,
        ]);

        Route::controller(LoginController::class)
            ->prefix('admin')
            ->group(function () {
                Route::get('/oneId', 'oneId')->name('oneId');
                Route::get('/check', 'check')->name('check');
                Route::get('/login-site', 'getLoginSiteForm')->name('getLoginSiteForm');
                Route::post('/login-site', 'setLoginSiteForm')->name('setLoginSiteForm');
            });

        Route::prefix('admin')
            ->middleware(['auth', 'throttle:admin*', 'cors'])
            ->group(function () {

                Route::get('select-role', [AdminController::class, 'getRole'])->name('getRole');
                Route::get('change-role', [AdminController::class, 'changeRole'])->name('changeRole');
                Route::post('select-role', [AdminController::class, 'setRole'])->name('setRole');

                Route::middleware('authoritySessionCheck')->group(function () {

                    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

                    Route::middleware('can:admin')
                        ->group(function () {
                            Route::controller(UserController::class)
                                ->prefix('users')
                                ->as('users.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('{users}', 'show')->name('show');
                                    Route::get('{users}/edit', 'edit')->name('edit');
                                    Route::patch('{users}', 'update')->name('update');
                                    Route::delete('{users}', 'destroy')->name('destroy');
                                });

                            Route::controller(AuthorityController::class)
                                ->prefix('authorities')
                                ->as('authorities.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('trashes', 'trashes')->name('trashes');
                                    Route::get('{authorities}', 'show')->name('show');
                                    Route::get('{authorities}/edit', 'edit')->name('edit');
                                    Route::patch('{authorities}', 'update')->name('update');
                                    Route::delete('{authorities}', 'destroy')->name('destroy');
                                    Route::post('{authorities}/restore', 'restore')->name('restore');
                                    Route::post('{authorities}/forceDelete', 'forceDelete')->name('forceDelete');
                                });
                            Route::controller(MenuCategoryController::class)
                                ->prefix('menus-category')
                                ->as('menus-category.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('trashes', 'trashes')->name('trashes');
                                    Route::get('{menus_category}', 'show')->name('show');
                                    Route::get('{menus_category}/edit', 'edit')->name('edit');
                                    Route::get('{menus_category}/json', 'json')->name('json');
                                    Route::patch('{menus_category}', 'update')->name('update');
                                    Route::delete('{menus_category}', 'destroy')->name('destroy');
                                    Route::post('{menus_category}/restore', 'restore')->name('restore');
                                    Route::post('{menus_category}/forceDelete', 'forceDelete')->name('forceDelete');
                                });

                            Route::controller(MenuController::class)
                                ->prefix('menus')
                                ->as('menus.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('trashes', 'trashes')->name('trashes');
                                    Route::get('{menus}', 'show')->name('show');
                                    Route::get('{menus}/edit', 'edit')->name('edit');
                                    Route::patch('{menus}', 'update')->name('update');
                                    Route::delete('{menus}', 'destroy')->name('destroy');
                                    Route::post('{menus}/restore', 'restore')->name('restore');
                                    Route::post('{menus}/forceDelete', 'forceDelete')->name('forceDelete');
                                });

                            Route::controller(NewsCategoryController::class)
                                ->prefix('news-category')
                                ->as('news-category.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('trashes', 'trashes')->name('trashes');
                                    Route::get('{news_category}', 'show')->name('show');
                                    Route::get('{news_category}/edit', 'edit')->name('edit');
                                    Route::patch('{news_category}', 'update')->name('update');
                                    Route::delete('{news_category}', 'destroy')->name('destroy');
                                    Route::post('{news_category}/restore', 'restore')->name('restore');
                                    Route::post('{news_category}/forceDelete', 'forceDelete')->name('forceDelete');
                                });

                            Route::controller(NewsController::class)
                                ->prefix('news')
                                ->as('news.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{news}', 'show')->name('show');
                                    Route::get('{news}/edit', 'edit')->name('edit');
                                    Route::patch('{news}', 'update')->name('update');
                                    Route::delete('{news}', 'destroy')->name('destroy');
                                });

                            Route::controller(PageCategoryController::class)
                                ->prefix('pages-category')
                                ->as('pages-category.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('trashes', 'trashes')->name('trashes');
                                    Route::get('{pages_category}', 'show')->name('show');
                                    Route::get('{pages_category}/edit', 'edit')->name('edit');
                                    Route::patch('{pages_category}', 'update')->name('update');
                                    Route::delete('{pages_category}', 'destroy')->name('destroy');
                                    Route::post('{pages_category}/restore', 'restore')->name('restore');
                                    Route::post('{pages_category}/forceDelete', 'forceDelete')->name('forceDelete');
                                });

                            Route::controller(PageController::class)
                                ->prefix('pages')
                                ->as('pages.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{pages}', 'show')->name('show');
                                    Route::get('{pages}/edit', 'edit')->name('edit');
                                    Route::patch('{pages}', 'update')->name('update');
                                    Route::delete('{pages}', 'destroy')->name('destroy');
                                });

                            Route::controller(UsefulCategoryController::class)
                                ->prefix('useful-category')
                                ->as('useful-category.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('trashes', 'trashes')->name('trashes');
                                    Route::get('{useful_category}', 'show')->name('show');
                                    Route::get('{useful_category}/edit', 'edit')->name('edit');
                                    Route::patch('{useful_category}', 'update')->name('update');
                                    Route::delete('{useful_category}', 'destroy')->name('destroy');
                                    Route::post('{useful_category}/restore', 'restore')->name('restore');
                                    Route::post('{useful_category}/forceDelete', 'forceDelete')->name('forceDelete');
                                });

                            Route::controller(UsefulController::class)
                                ->prefix('useful')
                                ->as('useful.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{useful}', 'show')->name('show');
                                    Route::get('{useful}/edit', 'edit')->name('edit');
                                    Route::patch('{useful}', 'update')->name('update');
                                    Route::delete('{useful}', 'destroy')->name('destroy');
                                });

                            Route::controller(PhotoCategoryController::class)
                                ->prefix('photos-category')
                                ->as('photos-category.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('trashes', 'trashes')->name('trashes');
                                    Route::get('{photos_category}', 'show')->name('show');
                                    Route::get('{photos_category}/edit', 'edit')->name('edit');
                                    Route::patch('{photos_category}', 'update')->name('update');
                                    Route::delete('{photos_category}', 'destroy')->name('destroy');
                                    Route::post('{photos_category}/restore', 'restore')->name('restore');
                                    Route::post('{photos_category}/forceDelete', 'forceDelete')->name('forceDelete');
                                });

                            Route::controller(PhotoController::class)
                                ->prefix('photos')
                                ->as('photos.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{photos}', 'show')->name('show');
                                    Route::get('{photos}/edit', 'edit')->name('edit');
                                    Route::patch('{photos}', 'update')->name('update');
                                    Route::delete('{photos}', 'destroy')->name('destroy');
                                });

                            Route::controller(VideoCategoryController::class)
                                ->prefix('videos-category')
                                ->as('videos-category.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('trashes', 'trashes')->name('trashes');
                                    Route::get('{videos_category}', 'show')->name('show');
                                    Route::get('{videos_category}/edit', 'edit')->name('edit');
                                    Route::patch('{videos_category}', 'update')->name('update');
                                    Route::delete('{videos_category}', 'destroy')->name('destroy');
                                    Route::post('{videos_category}/restore', 'restore')->name('restore');
                                    Route::post('{videos_category}/forceDelete', 'forceDelete')->name('forceDelete');
                                });

                            Route::controller(VideoController::class)
                                ->prefix('videos')
                                ->as('videos.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{videos}', 'show')->name('show');
                                    Route::get('{videos}/edit', 'edit')->name('edit');
                                    Route::patch('{videos}', 'update')->name('update');
                                    Route::delete('{videos}', 'destroy')->name('destroy');
                                });

                            Route::controller(ManagementCategoryController::class)
                                ->prefix('managements-category')
                                ->as('managements-category.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{managements_category}', 'show')->name('show');
                                    Route::get('{managements_category}/edit', 'edit')->name('edit');
                                    Route::patch('{managements_category}', 'update')->name('update');
                                    Route::delete('{managements_category}', 'destroy')->name('destroy');
                                });

                            Route::controller(ManagementController::class)
                                ->prefix('managements')
                                ->as('managements.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{managements}', 'show')->name('show');
                                    Route::get('{managements}/edit', 'edit')->name('edit');
                                    Route::patch('{managements}', 'update')->name('update');
                                    Route::delete('{managements}', 'destroy')->name('destroy');
                                });

                            Route::controller(MessageController::class)
                                ->prefix('messages')
                                ->as('messages.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{messages}', 'show')->name('show');
                                    Route::get('{messages}/edit', 'edit')->name('edit');
                                    Route::patch('{messages}', 'update')->name('update');
                                    Route::delete('{messages}', 'destroy')->name('destroy');
                                });

                            Route::controller(ContactController::class)
                                ->prefix('contacts')
                                ->as('contacts.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('create', 'create')->name('create');
                                    Route::post('', 'store')->name('store');
                                    Route::get('{contacts}', 'show')->name('show');
                                    Route::get('{contacts}/edit', 'edit')->name('edit');
                                    Route::patch('{contacts}', 'update')->name('update');
                                    Route::delete('{contacts}', 'destroy')->name('destroy');
                                });

                            Route::controller(LogController::class)
                                ->prefix('logs')
                                ->as('logs.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('{logs}', 'show')->name('show');
                                    Route::delete('{logs}', 'destroy')->name('destroy');
                                });

                            Route::controller(AuthLogController::class)
                                ->prefix('authentication-logs')
                                ->as('authentication-logs.')
                                ->group(function () {
                                    Route::get('', 'index')->name('index');
                                    Route::get('{authentication_logs}', 'show')->name('show');
                                    Route::delete('{authentication_logs}', 'destroy')->name('destroy');
                                });
                        });
                });
            });
    });

Route::prefix('laravel-filemanager')
    ->middleware('web', 'auth')
    ->group(function () {
        Lfm::routes();
    });
