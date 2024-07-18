<?php

use App\Http\Controllers\GuardController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');

Route::get('policies/{slug}', [WebController::class, 'policies'])->name('policies');
Route::get('policy/{slug}', [WebController::class, 'policy'])->name('policy');

Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');
Route::post('submit_enquiry', [WebController::class, 'enquiry'])->name('enquiry.submit');

Auth::routes();


// ***************************** Admin Routes *****************************
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('admin');
    // -------------------------Members Routes-------------------------
    Route::resource('members', UsersController::class);
    //Route::post('members/status/{id}', [UsersController::class, 'status'])->name('members.status');
    Route::post('members/status', [UsersController::class, 'status'])->name('members.status');

    // -------------------------Society Routes-------------------------
    Route::resource('society', SocietyController::class);
    Route::get('society/view/{id}', [SocietyController::class, 'view'])->name('society.view');
    Route::get('/society-approve/{id}', [SocietyController::class, 'societyApprove'])->name('society.approve');
    Route::post('/society-approve/{id}', [SocietyController::class, 'societyApproveAction'])->name('society.approve');
    Route::post('society/status', [SocietyController::class, 'status'])->name('society.status');
    Route::get('society-list', [SocietyController::class, 'list'])->name('society.list');
    Route::get('society-renewe', [SocietyController::class, 'renewList'])->name('society.renewe');
    Route::get('society-renew/{id}', [SocietyController::class, 'renewView'])->name('society.renew');
    Route::post('society-renew/{id}', [SocietyController::class, 'renewAction'])->name('society.renew.submit');



    Route::resource('guard', GuardController::class);
    Route::resource('director', DirectorController::class);
    Route::post('guard/status', [GuardController::class, 'status'])->name('guard.status');
    Route::post('/getTl', [UsersController::class, 'getTl'])->name('getTl');

    // -------------------------Resident Routes-------------------------
    Route::resource('resident', ResidentController::class);
    Route::post('resident/status', [ResidentController::class, 'status'])->name('resident.status');

    // -------------------------REPORT Routes-------------------------
    Route::get('report-sale', [ReportController::class, 'sale'])->name('report.sale');
    Route::get('report-renewal', [ReportController::class, 'renewal'])->name('report.renewal');
    Route::get('report-commission', [ReportController::class, 'commission'])->name('report.commission');


    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');



    Route::resource('categories', CategoryController::class);
    Route::post('categories/status', [CategoryController::class, 'status'])->name('categories.status');

    Route::resource('insurances', InsuranceController::class);
    Route::post('insurances/status', [InsuranceController::class, 'status'])->name('insurances.status');
    Route::resource('enquiries', EnquiryController::class);
    Route::post('enquiries/status', [EnquiryController::class, 'status'])->name('enquiries.status');
});



Route::get('/storage-link', function () {
    $target = storage_path('app/public');
    $link = public_path('/storage');
    echo symlink($target, $link);
    // echo "symbolic link created successfully";
});
