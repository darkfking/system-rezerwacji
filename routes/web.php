<?php

use Illuminate\Support\Facades\Route;
use App\Mail\BookingMail;
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

Route::get('/', function () {
    $cars = DB::table('cars')->get();
    $booking = DB::table('bookings')->get();

    return view('welcome')->with(compact(['cars', 'booking']));

})->name('start');

Route::get('/regulamin', function () {
    return view('booking.regulamin');
})->name('regulamin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/zaliczka', [App\Http\Controllers\BookingController::class, 'zaliczka'])->name('zaliczka');

Route::post('/zaliczka/store', [App\Http\Controllers\BookingController::class, 'zaliczka_payment'])->name('zaliczka_payment');

Route::get('/booking/{car}', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.create');

Route::get('/booking/check/{car}', [App\Http\Controllers\BookingController::class, 'check'])->name('booking.check');

Route::get('/admin', [App\Http\Controllers\BookingController::class, 'admin'])->middleware('can:isAdmin')->name('booking.admin');

Route::delete('/booking/delete/{book}', [App\Http\Controllers\BookingController::class, 'destroy'])->middleware('can:isAdmin')->name('booking.delete');

Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');

Route::get('/booking/edit/{book}', [App\Http\Controllers\BookingController::class, 'edit'])->middleware('can:isAdmin')->name('booking.edit');

Route::put('booking/update/{book}', [App\Http\Controllers\BookingController::class, 'update'])->middleware('can:isAdmin')->name('booking.update');

Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->middleware('can:isAdmin')->name('cars.create');

Route::post('/cars/store', [App\Http\Controllers\CarController::class, 'store'])->middleware('can:isAdmin')->name('cars.store');

Route::delete('/cars/delete/{car}', [App\Http\Controllers\CarController::class, 'destroy'])->middleware('can:isAdmin')->name('cars.delete');

Route::get('/addition/admin', [App\Http\Controllers\AdditionController::class, 'create'])->middleware('can:isAdmin')->name('addition.create');

Route::post('/addition/store', [App\Http\Controllers\AdditionController::class, 'store'])->middleware('can:isAdmin')->name('addition.store');

Route::delete('/addition/delete/{add}', [App\Http\Controllers\AdditionController::class, 'destroy'])->middleware('can:isAdmin')->name('addition.delete');
