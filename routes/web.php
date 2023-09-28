<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\HomeController;
use App\Models\Cart;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class , 'redirect']);
// ->middleware(['auth','verified']);

Route::get('/',[HomeController::class , 'index'])->name('home');

Route::resource('category' , CategoriesController::class);

Route::resource('products' , ProductsController::class);

Route::get('order' ,[ OrderController::class , 'order']);




Route::post('/add_cart/{id}',[CartController::class ,'add_cart']);

Route::get('/show_cart',[CartController::class ,'show_cart']);

Route::get('/remove_cart/{id}',[CartController::class ,'remove_cart']);

Route::get('/cash_order',[OrderController::class ,'cash_order']);

Route::get('/stripe/{totalprice}',[OrderController::class ,'stripe']);


Route::post('stripe/{totalprice}',[OrderController::class ,'stripePost'])->name('stripe.post');


Route::get('delivered/{id}',[OrderController::class , 'delivered']);

Route::get('download_pdf/{id}',[OrderController::class , 'download_pdf']);


Route::get('search',[OrderController::class , 'search']);


 Route::get('/my_order',[OrderController::class ,'my_order']);

 Route::get('/cancel_order/{id}',[OrderController::class ,'cancel_order']);


 Route::get('search_product',[HomeController::class , 'search_product']);


 Route::get('all_product',[HomeController::class , 'products'])->name('product.all');

 Route::get('view_all_product',[HomeController::class , 'view_all_product']);


















