<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
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


Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/', function () {
    return view('admin.layouts.app');
})->middleware('auth');

Auth::routes();

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::resource('members', UsersController::class);

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
