<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CanCreateProduct;
use App\Http\Middleware\CanEditProduct;
use App\Http\Middleware\CanDeleteProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard');

    

    Route::group(['middleware' => ['CanEditProduct']], function () {
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    });

    Route::group(['middleware' => ['CanDeleteProduct']], function () {
        Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    });
});

Route::middleware(['role:admin', 'can:create-product'])->group(function () {
    Route::get('/create-product', [ProductController::class,'create'])->name('create.product');
    Route::post('/products/create', [ProductController::class,'store'])->name('products.store');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index',])->name('home');
