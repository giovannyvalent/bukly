<?php

use App\Http\Controllers\HotelsController;
use App\Http\Controllers\RoomsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(HotelsController::class)
    ->prefix('hotels')
    ->group( function(){
    Route::get('/', 'index')->name('hotels');
    Route::get('/create', 'create')->name('hotel.create');
    Route::post('/store', 'store')->name('hotel.store');
    Route::get('/edit/{id}', 'edit')->name('hotel.edit');
    Route::post('/update', 'update')->name('hotel.update');
    Route::get('/destroy/{id}', 'destroy')->name('hotel.destroy');
});

Route::controller(RoomsController::class)
    ->prefix('rooms')
    ->group( function(){
    Route::get('/', 'index')->name('rooms');
    Route::get('/create', 'create')->name('room.create');
    Route::post('/store', 'store')->name('room.store');
    Route::get('/edit/{id}', 'edit')->name('room.edit');
    Route::post('/update', 'update')->name('room.update');
    Route::get('/destroy/{id}', 'destroy')->name('room.destroy');
});


