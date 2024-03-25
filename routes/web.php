<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;



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
    return view('auth.register');
});

Route::get('administrator', function () {
    return view('layouts.admin_master_app');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('admin/users', [UsersController::class, 'index'])->name('admin.users');
Route::get('admin/users/create', [UsersController::class, 'create'])->name('admin.users.create');
Route::post('admin/users/store', [UsersController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/show/{id}', [UsersController::class, 'show'])->name('admin.users.show');
Route::get('admin/users/edit/{id}',[UsersController::class,'edit'])->name('admin.users.edit');
Route::put('admin/users/update/{id}',[UsersController::class,'update'])->name('admin.users.update');
Route::delete('admin/users/destroy/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');

Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/category/show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
Route::get('admin/category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
Route::put('admin/category/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
Route::delete('admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

Route::get('admin/product', [ProductController::class, 'index'])->name('admin.product');
Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
Route::get('admin/product/show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
Route::put('admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
Route::delete('admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
