<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::get('/',[HomeController::class,"index"])->name("home.index");
Route::get('/users',[AdminController::class,"user"])->name("user.list");
Route::delete('/deleteuser/{user}',[AdminController::class,"delete"])->name("user.delete");
Route::get('/redirects',[HomeController::class,"redirects"])->name("auth.redirects");

//food route
Route::get('/foodMenu',[AdminController::class,'foodMenu'])->name('food.list');
Route::post('/uploadFood',[AdminController::class,'upload'])->name('food.upload');
Route::delete('/delete/{fooditem}',[AdminController::class,'deletefood'])->name('food.deletefood');
Route::delete('/delete/{fooditem}',[AdminController::class,'deletefood'])->name('food.deletefood');
Route::get('/edit/{fooditem}',[AdminController::class,'editfood'])->name('food.editfood');
Route::put('/update/{fooditem}',[AdminController::class,'updatefood'])->name('food.updatefood');
//food route end

//Reservation route start
Route::post('/reservation',[AdminController::class,'reservation'])->name('reservation.upload');
Route::get('/reservationshow',[AdminController::class,'reservationshow'])->name('reservation.show');
Route::delete('/reservationdelete/{reserve}',[AdminController::class,'reservationdelete'])->name('reservation.delete');
//Reservation route end

//chefs route start
Route::get('/viewchefs',[AdminController::class,'viewchefs'])->name('viewchefs.show');
Route::post('/uploadchef',[AdminController::class,'uploadchef'])->name('chefs.upload');
Route::get('/editchef/{data}',[AdminController::class,'editchef'])->name('chefs.edit');
Route::put('/updatechef/{data}',[AdminController::class,'updatechef'])->name('chefs.update');
Route::delete('/deletechef/{data}',[AdminController::class,'deletechef'])->name('chefs.delete');
//chefs route end

// add to cart start
Route::post('/addtocart/{fooditem}',[HomeController::class,'addtocart'])->name('food.addtocart');
Route::get('/showcart',[HomeController::class,'showcart'])->name('food.showcart');
Route::get('/deletecart/{data2}',[HomeController::class,'deletecart'])->name('food.deletecart');
// add to cart end

//order route
Route::post('/orderconfirm',[HomeController::class,'orderconfirm'])->name('food.orderconfirm');
Route::get('/orders',[AdminController::class,'orders'])->name('food.orders');
//order route end

//search option
Route::get('/search',[AdminController::class,'search'])->name('food.search');
//seacrh option




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
