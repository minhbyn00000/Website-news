<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\NewController;
use App\Http\Controllers\Clients\NewController as ClientsNewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Client Routes
Route::get('/', [ClientsNewController::class, 'index'])->name('index');
Route::get('/{id}/details', [ClientsNewController::class, 'details'])->name('details');
Route::get('/{id}/category', [ClientsNewController::class, 'category'])->name('category');
// Route::get('/', [ClientsNewController::class, 'filter'])->name('filter');
Route::get('/filter', [ClientsNewController::class, 'filter'])->name('news.filter');


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // đường dẫn bài viết
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('news/table', [NewController::class, 'index'])->name('news.table');
    Route::get('news/details', [AdminController::class, 'details'])->name('news.details');
    Route::get('news/create', [NewController::class, 'create'])->name('news.create');
    Route::post('news/store', [NewController::class, 'store'])->name('news.store');
    Route::get('news/{id}/delete', [NewController::class, 'destroy'])->name('news.delete');
    Route::get('news/delete', [NewController::class, 'deleteAll'])->name('news.deleteAll');
    Route::get('news/{id}/edit', [NewController::class, 'edit'])->name('news.edit');
    Route::put('news/{id}', [NewController::class, 'update'])->name('news.update');
    Route::get('news/{id}/details', [NewController::class, 'details'])->name('news.details');

    
});
Route::prefix('admin')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

    // Route để chỉnh sửa danh mục
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');

    // Route để xóa danh mục
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});


Route::get('/admin/news/filter', [NewController::class, 'filter'])->name('admin.news.filter');

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
