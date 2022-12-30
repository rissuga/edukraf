<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ClassController;
// use App\Http\Controllers\WbnrController;
use App\Http\Controllers\WebinarController as WebinarFrontController;


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

Route::prefix('')->group(function () {
    
    Route::get('/ensiklopedia', function () {return view('frontend.ensiklopedia');})->name('ensiklopedia');
    Route::get('/komunitas', function () {return view('frontend.komunitas');})->name('komunitas');
    Route::get('/Tentang Kami', function () {return view('frontend.aboutus');})->name('tentangKami');
    
    Route::get('/beranda', [BerandaController::class, 'fiturshow'])->name('home');

    Route::get('/kelas', [ClassController::class, 'show'])->name('category');
    Route::get('/kelas{id}', [ClassController::class, 'list'])->name('class');
    Route::get('/kelas/detail{id}', [ClassController::class, 'detail'])->name('classdetail');

    Route::get('/webinar', [WebinarFrontController::class, 'show'])->name('webinar');
    Route::get('/webinar/soon', [WebinarFrontController::class, 'show_soon'])->name('webinar_soon');
    Route::get('/webinar/done', [WebinarFrontController::class, 'show_done'])->name('webinar_done');
    Route::get('/webinar/detail{id}', [WebinarFrontController::class, 'detail'])->name('webinardetail');
    
    Route::get('/', [BerandaController::class, 'fiturshow']);   
});


Route::prefix('admin')->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    
        Route::get('/dashboard', function () {return view('admin.dashboard');})->name('dashboard');

        Route::get('/dashboard', [DashboardController::class, 'panelDashboard'])->name('admin.webinar.dashboard');
    
        Route::get('/webinar/view', [WebinarController::class, 'index'])->name('admin.webinar.view');
        Route::get('/webinar/add', [WebinarController::class, 'add'])->name('admin.webinar.add');
        Route::post('/webinar/store', [WebinarController::class, 'store'])->name('admin.webinar.store');   
        Route::get('/webinar/edit/{id}', [WebinarController::class, 'edit'])->name('admin.webinar.edit');
        Route::get('/webinar/update', [WebinarController::class, 'update'])->name('admin.webinar.update');
        Route::get('/webinar/delete/{id}', [WebinarController::class, 'delete'])->name('admin.webinar.delete');
        Route::get('/webinar/detail/{id}', [WebinarController::class, 'detailAdmin'])->name('admin.webinar.detail');
        Route::get('/webinar/cancel', [WebinarController::class, 'cancel'])->name('admin.webinar.cancel');
    
        Route::get('/category/view', [CategoryController::class, 'index'])->name('admin.category.view');
        Route::get('/category/add', [CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/category/edit{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::get('/category/update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/category/delete{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/category/cancel', [CategoryController::class, 'cancel'])->name('admin.category.cancel');
    
        Route::get('/classroom/view', [ClassroomController::class, 'index'])->name('admin.classroom.view');
        Route::get('/classroom/add', [ClassroomController::class, 'add'])->name('admin.classroom.add');
        Route::post('/classroom/store', [ClassroomController::class, 'store'])->name('admin.classroom.store');
        Route::get('/classroom/edit{id}', [ClassroomController::class, 'edit'])->name('admin.classroom.edit');
        Route::put('/classroom/update{id}', [ClassroomController::class, 'update'])->name('admin.classroom.update');
        Route::get('/classroom/delete{id}', [ClassroomController::class, 'delete'])->name('admin.classroom.delete');
        Route::get('/classroom/cancel', [ClassroomController::class, 'cancel'])->name('admin.classroom.cancel');
        Route::get('/classroom/detail{id}', [ClassroomController::class, 'detailAdmin'])->name('admin.classroom.detail');
    
        Route::get('/account/view', [AdminAccountController::class, 'index'])->name('admin.view');
        Route::get('/account/add', [AdminAccountController::class, 'add'])->name('admin.add');
        Route::post('/account/store', [AdminAccountController::class, 'store'])->name('admin.store');
        Route::get('/account/edit/{id}', [AdminAccountController::class, 'edit'])->name('admin.edit');
        Route::post('/account/update/{id}', [AdminAccountController::class, 'update'])->name('admin.update');
        Route::get('/account/delete/{id}', [AdminAccountController::class, 'delete'])->name('admin.delete');
        Route::get('/account/cancel', [AdminAccountController::class, 'cancel'])->name('admin.cancel');
        
        Route::get('/account/logout', [LogoutController::class, 'logout'])->name('admin.logout');    
});










