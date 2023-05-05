<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use barryvdh\DomPDF\Facade\Pdf;



//_______________________________________________________________//
//|                                                             |//
//|--RUTAS CLIENTE + RUTAS FUNCIONES TIENDA                    -|//
//|_____________________________________________________________|//

// Route::get('/', function () {
//     return view('home');
// });

//Mostrar inicio
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Filtro categorias//
Route::get('/store/filter-category/{category}', [App\Http\Controllers\CartController::class, 'productByCategory'])->name('store.category');


//Filtro marcas//
Route::get('/store/filter-brand/{brand}', [App\Http\Controllers\CartController::class, 'productByBrand'])->name('store.brand');


//Mostrar tienda
Route::get('/store', [App\Http\Controllers\CartController::class, 'store'])->name('products.store');


// Route::get('/products/{category}', [App\Http\Controllers\HomeController::class, 'productByCategory'])->name('products.category');




//__________________________________________________________________________________________//
//|                                                                                        |//
//|--RUTAS CARRITO + FUNCIONES CARRITO + REGISTROS BBDD DE PRODUCTOS + FACTURA DE COMPRA  -|//
//|________________________________________________________________________________________|//

//Mostrar carrito + middleware Auth Cliente(Verificacion login cliente) + middleware 30 minutos de caducacion carrito//
Route::get('/cart/show', [App\Http\Controllers\CartProductController::class, 'show'])->name('cart.show')->middleware('auth')->middleware('cart.time');

//Carrito -> editar,añadir,vaciar,eliminar producto //
Route::post('/cart/update', [App\Http\Controllers\CartProductController::class, 'update'])->name('cart.update');
Route::get('/cart/add/{product}', [App\Http\Controllers\CartProductController::class, 'add'])->name('cart.add');
Route::get('/cart/trash', [App\Http\Controllers\CartProductController::class, 'trash'])->name('cart.trash');
Route::get('/cart/delete/{product}', [App\Http\Controllers\CartProductController::class, 'delete'])->name('cart.delete');


// Pdf factura actual
Route::get('/store/pdf-facture/{id_facture}', [App\Http\Controllers\CartController::class, 'factureById'])->name('facture.store');


//Restar stock + crear factura + vaciar carrito//
Route::get('/subtract/stock', [\App\Http\Controllers\CartProductController::class, 'add_order_details'])->name('subtract.stock');


//Generar pdf//
Route::get('/generar-pdf/{facturaId}', [App\Http\Controllers\PdfController::class, 'generarPdf'])->name('pdf-generate');


//Lista Facturas Usuario
Route::get('/list-facturas/{user}', [App\Http\Controllers\FacturaUser::class, 'ListFacturas'])->name('list-facturas');


//Enviar comentario incidencia
Route::post('/send-factura', [App\Http\Controllers\FacturaUser::class, 'IncidFacturas'])->name('facture.update');




//_______________________________________________________________//
//|                                                             |//
//|--RUTAS ADMINISTRADOR + CRUDS -> EDITAR,BORRAR,AÑADIR CAMPOS-|//
//|_____________________________________________________________|//

//Logout Panel Admin
Route::get('/logout', [App\Http\Controllers\LogoutAdminController::class, 'perform'])->name('logout.perform');


//Middleware Auth Admin(Verificacion login adminstrador) + funcion para introducir la route de abajo
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');


//Funcion para mostrar el home de panel admin, solo se ejecutara esta ruta en la funcion index de la ruta anterior teniendo el middleware Auth Admin y no se podra ir directamente a esta ruta sin el middleware Auth Admin 
Route::get('/home', function(){
    return view('admin.home_admin');
})->middleware('auth.admin');


//Panel ADMIN + CRUD Categorias//
Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->middleware('auth.admin')->name('admin.categories');
Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->middleware('auth.admin')->name('admin.categories.store');
Route::post('/admin/categories/{categoryId}/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->middleware('auth.admin')->name('admin.categories.update');
Route::delete('/admin/categories/{categoryId}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->middleware('auth.admin')->name('admin.categories.delete');



//Panel ADMIN + CRUD Posts//
// Route::get('/admin/posts', [App\Http\Controllers\Admin\PostsController::class, 'index'])->middleware('auth.admin')->name('admin.posts');
// Route::post('/admin/posts/store', [App\Http\Controllers\Admin\PostsController::class, 'store'])->middleware('auth.admin')->name('admin.posts.store');
// Route::post('/admin/posts/{postId}/update', [App\Http\Controllers\Admin\PostsController::class, 'update'])->middleware('auth.admin')->name('admin.posts.update');
// Route::delete('/admin/posts/{postId}/delete', [App\Http\Controllers\Admin\PostsController::class, 'delete'])->middleware('auth.admin')->name('admin.posts.delete');



//Panel ADMIN + CRUD Productos//
Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->middleware('auth.admin')->name('admin.products');
Route::post('/admin/products/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->middleware('auth.admin')->name('admin.products.store');
Route::post('/admin/products/{productId}/update', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->middleware('auth.admin')->name('admin.products.update');
Route::delete('/admin/products/{productId}/delete', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->middleware('auth.admin')->name('admin.products.delete');




//Panel ADMIN + CRUD Marcas//
Route::get('/admin/brands', [App\Http\Controllers\Admin\BrandsController::class, 'index'])->middleware('auth.admin')->name('admin.brands');
Route::post('/admin/brands/store', [App\Http\Controllers\Admin\BrandsController::class, 'store'])->middleware('auth.admin')->name('admin.brands.store');
Route::post('/admin/brands/{brandId}/update', [App\Http\Controllers\Admin\BrandsController::class, 'update'])->middleware('auth.admin')->name('admin.brands.update');
Route::delete('/admin/brands/{brandId}/delete', [App\Http\Controllers\Admin\BrandsController::class, 'delete'])->middleware('auth.admin')->name('admin.brands.delete');



//Panel ADMIN + CRUD Users//
Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->middleware('auth.admin')->name('admin.users');
Route::post('/admin/users/store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->middleware('auth.admin')->name('admin.users.store');
Route::post('/admin/users/{userId}/update', [App\Http\Controllers\Admin\UsersController::class, 'update'])->middleware('auth.admin')->name('admin.users.update');
Route::delete('/admin/users/{userId}/delete', [App\Http\Controllers\Admin\UsersController::class, 'delete'])->middleware('auth.admin')->name('admin.users.delete');



//Panel ADMIN + CRUD Facturas//
Route::get('/admin/facturas', [App\Http\Controllers\Admin\FacturaController::class, 'index'])->middleware('auth.admin')->name('admin.facturas');
Route::delete('/admin/facturas/{facturaId}/delete', [App\Http\Controllers\Admin\FacturaController::class, 'delete'])->middleware('auth.admin')->name('admin.facturas.delete');



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

