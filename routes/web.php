<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Controllers\AddressController;
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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'processLogin'])->name('process_login');

Route::get('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('signup', [AuthController::class, 'processSignup'])->name('process_signup');

Route::get('/google', [AuthController::class, 'googleRedirect'])->name('google-auth');
Route::get('/google/callback', [AuthController::class, 'callbackGoogle']);



Route::group([
    'middleware'=> CheckLoginMiddleware::class,
], function(){
    Route::get('account', [UserController::class, 'account'])->name('account.index');
    Route::post('account', [UserController::class, 'saveAddress'])->name('process_save_address');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('address', AddressController::class)->except(
        'show, index, create, edit, update',
    );

    Route::post('/address/update/{id}', [AddressController::class, 'update']);

    Route::group([
        'middleware'=> CheckAdminMiddleware::class,
    ], function(){
        Route::prefix('admin')->group(function(){
            Route::resource('users' , UserController::class);
            Route::resource('publishers' , PublisherController::class)->except('show');
            Route::resource('dashboard' , AdminController::class);
            Route::resource('books', BookController::class)->except(
                'show',
            );
        });

    });
});


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');



Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/checkout/', [CheckOutController::class, 'index'])->name('checkout.index');

//email
Route::get('/auth/verify-email/{verification_code}', [AuthController::class, 'verifyEmail'])->name('verify_email');

// Order
Route::post('/order/add', [OrderController::class, 'store']);

//Route::group(['prefix' => 'books', 'as' => 'book.'], function () {
//    Route::get('/', [BookController::class, 'index'])->name('index');
//    Route::get('/create', [BookController::class, 'create'])->name('create');
//    Route::post('/store', [BookController::class, 'store'])->name('store');
//    Route::delete('/destroy/{book}', [BookController::class, 'destroy'])->name('destroy');
//    Route::get('/edit/{book}', [BookController::class, 'edit'])->name('edit');
//    Route::put('/edit/{book}', [BookController::class, 'update'])->name('update');
//});
