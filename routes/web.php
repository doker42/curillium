<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AvatarController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MyJobController;
use App\Http\Controllers\Admin\LetterController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('main');

Route::group(['prefix' => env('ADMIN') . '/contact'], function () {
    Route::post('/', 'App\Http\Controllers\Admin\ContactController@contact')->name('contact');
});


Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' =>  env('ADMIN') ], function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin');

        Route::group(['prefix' => 'jobs'], function () {
            Route::controller(MyJobController::class)->group(function () {
                Route::get('/', 'index')->name('jobs');
                Route::get('/create', 'create')->name('create_job');
                Route::get('/edit/{id}', 'edit')->name('edit_job');
                Route::post('/update/{id}', 'update')->name('update_job');
                Route::post('/destroy/{job}', 'destroy')->name('destroy_job');
                Route::post('/store', 'store')->name('store_job');
            });
        });

        Route::group(['prefix' => 'avatars'], function () {
            Route::controller(AvatarController::class)->group(function () {
                Route::get('/', 'index')->name('avatars');
                Route::post('/store', 'store')->name('store_avatar');
                Route::get('/update/{avatar}', 'update')->name('update_avatar');
                Route::post('/destroy/{avatar}', 'destroy')->name('destroy_avatar');
                Route::get('/avacheck','avacheck')->name('avacheck');
            });
        });

        Route::group(['prefix' => 'images'], function () {
            Route::controller(ImageController::class)->group(function () {
                Route::get('/', 'index')->name('images');
                Route::post('/store', 'store')->name('store_image');
                Route::get('/update/{image}', 'update')->name('update_image');
            });
        });

        Route::group(['prefix' => 'letters'], function () {
            Route::controller(LetterController::class)->group(function () {
                Route::get('/', 'index')->name('letters');
                Route::post('/store', 'store')->name('store_letter');
                Route::get('/update/{letter}', 'update')->name('update_letter');
                Route::post('/destroy/{letter}', 'destroy')->name('destroy_letter');
            });
        });

        Route::group(['prefix' => 'about'], function () {
            Route::controller(AboutController::class)->group(function () {
                Route::get('/', 'index')->name('about');
                Route::get('/create', 'create')->name('create_about');
                Route::post('/store', 'store')->name('store_about');
                Route::get('/edit/{id}', 'edit')->name('edit_about');
                Route::post('/update/{about}', 'update')->name('update_about');
                Route::get('/update-status/{about}', 'updateStatus')->name('update_status_about');
                Route::post('/update_status', 'updatestatus')->name('update_about_status');
            });
        });

        Route::group(['prefix' => 'projects'], function () {
            Route::controller(ProjectController::class)->group(function () {
                Route::get('/', 'index')->name('projects');
                Route::get('/create', 'create')->name('create_project');
                Route::post('/store', 'store')->name('store_project');
                Route::get('/show/{id}', 'how')->name('show_project');
                Route::get('/edit/{id}', 'edit')->name('edit_project');
                Route::post('/update/{id}', 'update')->name('update_project');
                Route::post('/update_status', 'updatestatus')->name('update_project_status');
                Route::post('/destroy_project/{project}', 'destroy')->name('destroy_project');
            });
        });

        Route::group(['prefix' => 'settings'], function () {
            Route::controller(SettingController::class)->group(function () {
                Route::get('/', 'index')->name('settings');
                Route::get('/create', 'create')->name('create_setting');
                Route::get('/edit/{id}', 'edit')->name('edit_setting');
                Route::post('/update/{id}', 'update')->name('update_setting');
                Route::post('/destroy/{setting}', 'destroy')->name('destroy_setting');
                Route::post('/store', 'store')->name('store_setting');
            });
        });

        Route::group(['prefix' => 'visitors'], function () {
            Route::get('/', 'App\Http\Controllers\Admin\VisitorController@index')->name('visitors');
        });

    });
});

require __DIR__.'/auth.php';
