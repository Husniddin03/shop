<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
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

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('index', [ProductController::class, 'index'])->name('index');
Route::get('products', [ProductController::class, 'products'])->name('products');
Route::get('contact', [ProductController::class, 'contact'])->name('contact');
Route::get('checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('detail', [ProductController::class, 'detail'])->name('detail');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('login', [CustomerController::class, 'login'])->name('login');
Route::post('signin', [CustomerController::class, 'signin'])->name('signin');
Route::get('signup', [CustomerController::class, 'signup'])->name('signup');
Route::post('register', [CustomerController::class, 'register'])->name('register');
Route::get('show/{id}', [ProductController::class, 'show'])->name('show');

Route::resource('admins', AdminController::class);
Route::post('adminlogin', [AdminController::class, 'login'])->name('adminlogin');
Route::get('showLoginForm', [AdminController::class, 'showLoginForm'])->name('showLoginForm');
Route::get('adminlogout', [AdminController::class, 'logout'])->name('adminlogout');

Route::get('admin', [CustomerController::class, 'customerlist'])->name('customerlist');
Route::get('admin/customerlist', [CustomerController::class, 'customerlist'])->name('customerlist');
Route::get('admin/customershow/{id}', [CustomerController::class, 'customershow'])->name('customershow');
Route::post('admin/customerdelete/{id}', [CustomerController::class, 'customerdelete'])->name('customerdelete');

Route::get('admin/productlist', [ProductController::class, 'productlist'])->name('productlist');
Route::get('admin/productadd', [ProductController::class, 'productadd'])->name('productadd');
Route::post('admin/productedid/{id}', [ProductController::class, 'productedid'])->name('productedid');
Route::get('admin/productupdate/{id}', [ProductController::class, 'productupdate'])->name('productupdate');
Route::get('admin/productshow/{id}', [ProductController::class, 'productshow'])->name('productshow');
Route::post('admin/productdelete/{id}', [ProductController::class, 'productdelete'])->name('productdelete');
Route::post('admin/productstore', [ProductController::class, 'productstore'])->name('productstore');
Route::post('admin/productimgdelete/{id}', [ProductController::class, 'productimgdelete'])->name('productimgdelete');
Route::post('admin/productimgedd/{id}', [ProductController::class, 'productimgedd'])->name('productimgedd');

