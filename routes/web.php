<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminHomeCotroller;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminAdminController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminReturnBookController;
use App\Http\Controllers\AdminRequestBookController;

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
Route::get('/',[BookController::class, 'index'])->name('home');
Route::get('/preview/{book}',[BookController::class, 'show'])->name('preview');

Route::middleware('guest')->group(function () {
    Route::view('/onBoarding', 'pages.general.onBoarding' )->name('onBoarding');
    Route::view('/login', 'pages.general.login' )->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});
Route::middleware('auth')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    //user
    Route::get('/home',[ BookController::class, 'index'])->name('home.index');
    Route::get('/home/{book}',[ BookController::class, 'show'])->name('home.show');

    Route::get('/activity', [BorrowController::class, 'index'])->name('borrow.index');
    Route::post('/activity', [BorrowController::class, 'store'])->name('borrow.store');
    
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('/notif', NotificationController::class);
    Route::resource('/comment', CommentController::class);

    //admin
    Route::middleware('superuser')->prefix('/admin')->name('admin.')->group(function () {
        Route::get('/home',AdminHomeCotroller::class)->name('home.index');

        Route::resource('/book', AdminBookController::class);

        Route::resource('/permintaan', AdminRequestBookController::class);

        Route::resource('/return', AdminReturnBookController::class);

        Route::resource('/user', AdminUserController::class);

        Route::resource('/admin', AdminAdminController::class);

        Route::resource('/category', AdminCategoryController::class);
    });
});
