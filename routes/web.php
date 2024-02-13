<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;
use App\Models\Admin;
use App\Models\Category;
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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Route::get('/login', [AdminController::class, 'getLogin'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::post('/login', [AdminController::class, 'postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/categories', [CategoryController::class, 'index'])->name('get.categories');
        Route::get('/create-category', [CategoryController::class, 'create'])->name('create.category');
        Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category');
        Route::get('/edit-category/{uuid}', [CategoryController::class, 'edit'])->name('edit.category');
        Route::post('/update-category', [CategoryController::class, 'update'])->name('update.category');

        Route::get('/filter-categories', [CategoryController::class, 'getFilterCategories'])->name('filter.categories');


        Route::get('/video', [VideoController::class, 'index'])->name('get.videos');
        Route::get('/create-video', [VideoController::class, 'create'])->name('create.video');
        Route::post('/store-videos', [VideoController::class, 'store'])->name('store.video');
        Route::get('/search-videos', [VideoController::class, 'getFilterVideo'])->name('search-videos');

        Route::get('/edit-video/{uuid}', [VideoController::class, 'edit'])->name('edit.video');
        Route::post('/update-video', [VideoController::class, 'update'])->name('update.video');

        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


        // Route::get('/filter-leads', [AdminController::class, 'getFilterLeads'])->name('searchLeads');
        // Route::get('/add-leads', [AdminController::class, 'addLeads']);
        // Route::get('/campaign-list', [AdminController::class, 'getCampaigns']);
        // Route::post('store-campaign', [AdminController::class, 'storeCampaign']);
        // Route::post('/store-lead', [AdminController::class, 'storeLead']);
        
        Route::get('/', [AdminController::class, 'template']);
    });
});
