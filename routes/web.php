<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');

Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article');

Route::prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('administration')->middleware('custom.auth');
    Route::prefix('articles')->group(function(){
        Route::get('/list', [ArticleController::class, 'adminList'])->name('articles-admin')->middleware('custom.auth');
        Route::get('/add', [ArticleController::class, 'create'])->name('article-add-admin')->middleware('custom.auth');
        Route::get('/add/store', [ArticleController::class, 'store'])->name('article-store-admin')->middleware('custom.auth');
        Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article-edit-admin')->middleware('custom.auth');
        Route::get('/delete/{id}', [ArticleController::class, 'destroy'])->name('article-delete-admin')->middleware('custom.auth');
        Route::get('/edit/{id}/update', [ArticleController::class, 'update'])->name('article-update-admin')->middleware('custom.auth');
    });

    Route::prefix('users')->group(function(){
        Route::get('/list', [UserController::class, 'adminList'])->name('users-admin')->middleware('custom.auth');
        Route::get('/add', [UserController::class, 'create'])->name('user-add-admin')->middleware('custom.auth');
        Route::get('/add/store', [UserController::class, 'store'])->name('user-store-admin')->middleware('custom.auth');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users-edit-admin')->middleware('custom.auth');
        Route::get('/edit/{id}/update', [UserController::class, 'update'])->name('user-update-admin')->middleware('custom.auth');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user-delete-admin')->middleware('custom.auth');
    });
});

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/login', [AdminController::class, 'login'])->name('login');

Route::get('/create-account', [UserController::class, 'newAccount'])->name('create-account');
Route::get('/create-account/store', [UserController::class, 'createAccountStore'])->name('create-account-store');