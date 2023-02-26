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





//Filtro categorias//
Route::get('/store/{category}', [App\Http\Controllers\CartController::class, 'productByCategory'])->name('store.category');

// Route::get('/products/{category}', [App\Http\Controllers\HomeController::class, 'productByCategory'])->name('products.category');






// Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');

Route::get('/home', function(){
    return view('admin.home_admin');
})->middleware('auth');


//Panel ADMIN + CRUD Categorias//
Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('admin.categories.store');
Route::post('/admin/categories/{categoryId}/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{categoryId}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');



//Panel ADMIN + CRUD Posts//
Route::get('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'index'])->name('admin.posts');
Route::post('/admin/posts/store', [App\Http\Controllers\Admin\PostsController::class, 'store'])->name('admin.posts.store');
Route::post('/admin/posts/{postId}/update', [App\Http\Controllers\Admin\PostsController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{postId}/delete', [App\Http\Controllers\Admin\PostsController::class, 'delete'])->name('admin.posts.delete');



//Panel ADMIN + CRUD Productos//
Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
Route::post('/admin/products/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('admin.products.store');
Route::post('/admin/products/{productId}/update', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{productId}/delete', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('admin.products.delete');




//Panel ADMIN + CRUD Marcas//
Route::get('/admin/brands', [App\Http\Controllers\Admin\BrandsController::class, 'index'])->name('admin.brands');
Route::post('/admin/brands/store', [App\Http\Controllers\Admin\BrandsController::class, 'store'])->name('admin.brands.store');
Route::post('/admin/brands/{brandId}/update', [App\Http\Controllers\Admin\BrandsController::class, 'update'])->name('admin.brands.update');
Route::delete('/admin/brands/{brandId}/delete', [App\Http\Controllers\Admin\BrandsController::class, 'delete'])->name('admin.brands.delete');




Route::get('/cart/update/{product}/{stock?}', [App\Http\Controllers\CartProductController::class, 'update'])->name('cart.update');
Route::get('/store', [App\Http\Controllers\CartController::class, 'store'])->name('products.store');
Route::get('/cart/add/{product}', [App\Http\Controllers\CartProductController::class, 'add'])->name('cart.add');
Route::get('/cart/show', [App\Http\Controllers\CartProductController::class, 'show'])->name('cart.show');
Route::get('/cart/trash', [App\Http\Controllers\CartProductController::class, 'trash'])->name('cart.trash');
Route::get('/cart/detail', [App\Http\Controllers\CartProductController::class, 'orderDetail'])->name('order.detail')->middleware('auth');
Route::get('/cart/delete/{product}', [App\Http\Controllers\CartProductController::class, 'delete'])->name('cart.delete');

// Route::get('/cart/prueba', [App\Http\Controllers\CartProductController::class, 'prueba'])->name('cart.show');

Auth::routes();



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

