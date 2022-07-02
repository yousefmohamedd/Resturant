<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FrontController::class, 'index'])->name('frontpage');
Route::get('meal/{id}', [FrontController::class, 'show'])->name('meal.show');
Route::post('/order/store', [FrontController::class, 'store'])->name('order.store');


Route::group(['prefix'=> 'admin' ,'middleware' => ['auth' , 'admin']] , function(){
    //meals
    Route::get('/meals', [MealController::class, 'index'])->name('meals');
    Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');
    Route::post('/meals/store', [MealController::class, 'store'])->name('meals.store');
    Route::get('/meals/edit/{id}', [MealController::class, 'edit'])->name('meals.edit');
    Route::put('/meals/update/{id}', [MealController::class, 'update'])->name('meals.update');
    Route::delete('/meals/delete/{id}', [MealController::class, 'destroy'])->name('meals.delete');

    //orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/orders/{id}/status', [OrderController::class, 'changeStatus'])->name('orders.status');

});//admin user

