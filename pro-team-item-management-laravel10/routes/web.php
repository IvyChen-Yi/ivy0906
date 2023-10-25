<?php

use Illuminate\Support\Facades\Route;
use App\Http\Auth\Controllers;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ログインしているユーザーのみ許可


    //商品管理画表示
    Route::get('/item', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/item/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/item/store', [App\Http\Controllers\ItemController::class, 'store']);
    Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/item/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    Route::post('/item/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);


    Route::get('/item/order_list', [App\Http\Controllers\ItemController::class, 'order_list']);
    Route::get('/item/OrderAdd', [App\Http\Controllers\ItemController::class, 'OrderAdd']);
    Route::post('/item/OrderStore', [App\Http\Controllers\ItemController::class, 'OrderStore']);
    Route::get('/item/OrderEdit/{id}', [App\Http\Controllers\ItemController::class, 'OrderEdit']);
    Route::post('/item/OrderUpdate/{id}', [App\Http\Controllers\ItemController::class, 'OrderUpdate']);
    Route::post('/item/OrderDestroy/{id}', [App\Http\Controllers\ItemController::class, 'OrderDestroy']);

       
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/add', [App\Http\Controllers\UserController::class, 'add']);
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::post('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);


    Route::get('/item/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail']);


   

