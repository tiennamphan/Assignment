<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
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
//User
Route::get('/', [HomeController::class, 'index'])->name('user.index');

Route::get('user/products', [ProductController::class, 'index'])->name('user.products.index');
Route::get('user/category/{id}',[ProductController::class, 'showCategory'])->name('user.products.showCategory');
Route::get('user/product/{id}',[ProductController::class, 'showProduct'])->name('user.products.showProduct');

Route::get('user/login',[AuthController::class, 'login'])->name('user.auth.login');
Route::post('/user/auth/login', [AuthController::class, 'postLogin'])->name('user.auth.postLogin');
Route::get('user/register',[AuthController::class, 'register'])->name('user.auth.register');
Route::post('user/register', [AuthController::class, 'postRegister'])->name('user.auth.postRegister');

Route::middleware('auth')->group(function () {
Route::get('user/account',[AccountController::class, 'index'])->name('user.account.index');
Route::get('user/resetPassword',[AccountController::class, 'resetPassword'])->name('user.account.resetPassword');
Route::post('user/account/resetPassword', [AccountController::class, 'updatePassword'])->name('updatePassword');
Route::get('user/logout', [AccountController::class, 'logout'])->name('user.logout');
Route::get('user/account/update', [AccountController::class, 'edit'])->name('user.account.edit');
Route::post('user/account/update', [AccountController::class, 'update'])->name('user.account.update');

});


//Admin
Route::middleware('admin')->group(function () {
//Home
Route::get('admin/home',[AdminHomeController::class, 'home'])->name('admin.home');
//products
Route::get('admin/products/list',[AdminProductController::class, 'list'])->name('admin.products.list');
Route::get('admin/product/add',[AdminProductController::class, 'add'])->name('admin.product.add');
Route::post('admin/product/add',[AdminProductController::class, 'store'])->name('admin.product.store');
Route::get('admin/product/edit/{product}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
Route::put('admin/product/update/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');
Route::delete('admin/delete/edit/{product}',[AdminProductController::class, 'destroy'])->name('admin.product.destroy');


Route::get('admin/categories/list',[AdminCategoryController::class, 'list'])->name('admin.categories.list');
Route::get('admin/category/add',[AdminCategoryController::class, 'add'])->name('admin.category.add');
Route::post('admin/category/add',[AdminCategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
Route::delete('admin/category/edit/{id}',[AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');


Route::get('admin/users/list',[AdminUserController::class, 'list'])->name('admin.users.list');
Route::get('admin/users/add',[AdminUserController::class, 'add'])->name('admin.users.add');
Route::post('admin/users/add',[AdminUserController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/edit/{user}',[AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/update/{user}',[AdminUserController::class, 'update'])->name('admin.users.update');
Route::post('/admin/users/{user}/toggle', [AdminUserController::class, 'toggleActivation'])->name('admin.users.toggle');
Route::delete('admin/users/edit/{user}',[AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});
