<?php

use App\Http\Controllers\LoginController;
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


Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/', function () {
    // return view('welcome');
    return view('admin.layouts.app');
});
Route::resource('members', UsersController::class);

Route::middleware([CheckAdmin::class])->group(function () {
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
