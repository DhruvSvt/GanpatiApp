<?php

use App\Http\Controllers\GuardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', function () {
    return redirect(route('admin.layouts.app'));
})->middleware('auth');

Auth::routes();


// ***************************** Admin Routes *****************************
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        // return view('welcome');
        return view('admin.layouts.app');
    })->name('admin.layouts.app');

    // -------------------------Members Routes-------------------------
    Route::resource('members', UsersController::class);

    // -------------------------Society Routes-------------------------
    Route::resource('society', SocietyController::class);
});


// ***************************** Secretary Routes *****************************
Route::middleware(['auth', 'secretary'])->prefix('secretary')->group(function () {
    Route::get('/', function () {
        // return view('welcome');
        return view('admin.layouts.app');
    })->name('admin.layouts.app');

    // -------------------------Guard Routes-------------------------
    Route::resource('guard', GuardController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
