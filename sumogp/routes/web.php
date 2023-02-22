<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products/{category}', [App\Http\Controllers\HomeController::class, 'productByCategory'])->name('products.category');

Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');

Route::get('/home', function(){
    return view('home');
})->middleware('auth');

Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('admin.categories.store');
Route::post('/admin/categories/{categoryId}/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{categoryId}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');

Route::get('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'index'])->name('admin.posts');
Route::post('/admin/posts/store', [App\Http\Controllers\Admin\PostsController::class, 'store'])->name('admin.posts.store');
Route::post('/admin/posts/{postId}/update', [App\Http\Controllers\Admin\PostsController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{postId}/delete', [App\Http\Controllers\Admin\PostsController::class, 'delete'])->name('admin.posts.delete');

Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
Route::post('/admin/products/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('admin.products.store');
Route::post('/admin/products/{productId}/update', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{productId}/delete', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('admin.products.delete');

Route::get('/admin/brands', [App\Http\Controllers\Admin\BrandsController::class, 'index'])->name('admin.brands');
Route::post('/admin/brands/store', [App\Http\Controllers\Admin\BrandsController::class, 'store'])->name('admin.brands.store');
Route::post('/admin/brands/{brandId}/update', [App\Http\Controllers\Admin\BrandsController::class, 'update'])->name('admin.brands.update');
Route::delete('/admin/brands/{brandId}/delete', [App\Http\Controllers\Admin\BrandsController::class, 'delete'])->name('admin.brands.delete');

Auth::routes();



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

