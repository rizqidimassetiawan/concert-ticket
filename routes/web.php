<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UniversalController;
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

Route::get('/',[BookingController::class,'index'])->name('home');
Route::middleware('guest')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/admin','index')->name('login');
        Route::post('/login','authentication')->name('auth');
    });
});
Route::middleware('auth')->group(function(){
   Route::get('/dashboard',[UniversalController::class,'dashboard'])->name('dashboard'); 
   Route::get('/check-in',[UniversalController::class,'checkIn'])->name('checkIn'); 
   Route::get('/search',[UniversalController::class,'search'])->name('search'); 
    
   Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});