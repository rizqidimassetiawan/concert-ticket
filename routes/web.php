<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\UniversalController;

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

Route::middleware('guest')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/admin','index')->name('login');
        Route::post('/login','authentication')->name('auth');
    
    Route::get('/',[BookingController::class,'index'])->name('home');   
    });
});
Route::middleware('auth')->group(function(){
   Route::resource('/visitor',VisitorsController::class); 
   Route::get('/dashboard',[UniversalController::class,'dashboard'])->name('dashboard'); 
   Route::get('/check-in',[UniversalController::class,'checkIn'])->name('checkIn'); 
   Route::put('/check-in/verify/{id}',[UniversalController::class,'verify'])->name('verify'); 
   Route::get('/visitor',[UniversalController::class,'search'])->name('search'); 
   Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

    Route::controller(RegionController::class)->group(function(){
        Route::get('/provinces','selectProvince');
        Route::get('/regencies','selectRegency');
        Route::get('/districts','selectDistrict');
        Route::get('/villages','selectVillage');
    });