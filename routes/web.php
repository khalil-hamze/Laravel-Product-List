<?php

use App\Models\Images;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::get('/', [ProductController::class, 'index']);

// Route::get('/', function () {
//     // dd(Product::all());
//     return view('products.index',[
//         'products' => Product::all()
//         // 'images' => Images::all()
//     ]);
// });

Route::get('/admin',function () {
    return view('admin.admin-cp');
});

//show create form
Route::get('/admin/create',[ProductController::class, 'createForm']);

//store new prod
Route::post('/products', [ProductController::class, 'store']);

//mange products
Route::get('/admin/manage', [ProductController::class ,'manage']);

//show edit product form
Route::get('/admin/{product}/edit', [ProductController::class, 'edit']);

//edit submit to update
Route::put('/admin/{product}', [ProductController::class, 'update']);

//delete listing
Route::delete('/admin/{product}', [ProductController::class, 'destroy']);

//single prod
Route::get('/products/{id}',function($id) {
    return view('products.show', [
        'product' => Product::find($id)
    ]);
});
