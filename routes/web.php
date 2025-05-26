<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\DrugController;
use App\Http\Controllers\Admin\DrugTitleController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login.index');
    Route::post('/login', 'login')->name('login.post');
})->name('login.');

Route::middleware('auth')->prefix('home')->name('frontend.')->group(function () {
    Route::controller(FrontendController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/listBy', 'listBy')->name('listBy');
        Route::get('/details/{drug}', 'details')->name('details');
    });
});

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::redirect('/', '/admin/drugs');
    Route::get('drugs/listBy', [DrugController::class, 'listBy']);
    Route::post('drugs/update/{drug}', [DrugController::class, 'update']);
    Route::get('drugs/{drug}/delete', [DrugController::class, 'destroy']);
    Route::resource('drugs', DrugController::class);
    Route::post('titles/update/', [DrugTitleController::class, 'update']);
    Route::resource('titles', DrugTitleController::class);
});
