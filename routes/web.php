<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SecurityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('app.home')->middleware('auth');

Route::get('/login', [SecurityController::class, 'loginView'])->name('auth.loginView')->middleware('guest');
Route::post('/login', [SecurityController::class, 'login'])->name('auth.login')->middleware('guest');
Route::delete('/logout', [SecurityController::class, 'logout'])->name('auth.logout');

Route::prefix('/articles')->name('articles.')->controller(ArticleController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'store')->name('store');
    Route::get('/edit/{article}', 'edit')->name('edit');
    Route::put('/edit/{article}', 'update')->name('update');
    Route::delete('/{article}', 'delete')->name('delete');
});

Route::resource('category', CategoryController::class)->middleware('auth');
