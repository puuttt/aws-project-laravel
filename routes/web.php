<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\NewsController;

Route::get('/', [PublicController::class, 'index'])->name('articles');

Route::get('/news/{id}', [PublicController::class, 'show'])->name('articles.news');

Route::get('/category', [PublicController::class, 'categoryList'])->name('articles.category');

Route::get('/category/{category}', [PublicController::class, 'showCategory'])->name('articles.category');

// Route::get('/{title}', function ($title) {
//     return view('public.articles', ['title' => $title]);
// });

// Route::get('/', function () {
//     if (Auth::check()) {
//         return redirect()->route('dashboard');
//     }
//     return view('auth/login');
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(NewsController::class)->prefix('articles')->group(function () {
        Route::get('', 'index')->name('articles');
        Route::get('create', 'create')->name('articles.create');
        Route::post('store', 'store')->name('articles.store');
        Route::get('show/{id}', 'show')->name('articles.show');
        Route::get('edit/{id}', 'edit')->name('articles.edit');
        Route::put('edit/{id}', 'update')->name('articles.update');
        Route::delete('destroy/{id}', 'destroy')->name('articles.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
