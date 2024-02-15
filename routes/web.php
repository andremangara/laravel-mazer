<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Kategori Route
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.tambah');
    Route::get('/kategori/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

    //Product Route
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product-tambah', [ProductController::class, 'create'])->name('product.tambah');
    Route::post('/product-tambah', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    //Order Route
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order-tambah', [OrderController::class, 'create'])->name('order.tambah');
    Route::post('/order-tambah/{id}', [OrderController::class, 'store'])->name('order.store');
    Route::post('/order-tambah', [OrderItemController::class, 'store'])->name('orderitem.store');
    Route::delete('/order-tambah/{id}', [OrderItemController::class, 'destroy'])->name('orderitem.delete');
    Route::group(['prefix' => 'components', 'as' => 'components.'], function () {
        Route::get('/alert', function () {
            return view('admin.component.alert');
        })->name('alert');
        Route::get('/accordion', function () {
            return view('admin.component.accordion');
        })->name('accordion');
    });
});