<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AdminController::class, 'getLogin'])->name('admin.login');

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
Route::post('/login', [AdminController::class, 'postLogin'])->name('adminLoginPost');
Route::view('/privacy-policy', 'template.policy');
Route::view('/terms-and-conditions', 'template.terms-and-conditions');

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('get.categories');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/edit-category/{uuid}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/update-category', [CategoryController::class, 'update'])->name('update.category');
    Route::post('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
    Route::get('/filter-categories', [CategoryController::class, 'getFilterCategories'])->name('filter.categories');

    Route::get('/video', [VideoController::class, 'index'])->name('get.videos');
    Route::get('/create-video', [VideoController::class, 'create'])->name('create.video');
    Route::post('/store-videos', [VideoController::class, 'store'])->name('store.video');
    Route::get('/search-videos', [VideoController::class, 'getFilterVideo'])->name('search-videos');
    Route::get('/edit-video/{uuid}', [VideoController::class, 'edit'])->name('edit.video');
    Route::post('/update-video', [VideoController::class, 'update'])->name('update.video');
    Route::post('/delete-video/{id}', [VideoController::class, 'destroy'])->name('destroy.video');
});
// });
