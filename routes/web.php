<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('doctors', DoctorController::class)->except('show', 'destroy');
Route::resource('hospitals', HospitalController::class)->only('index');

Route::get('/polymorphic/has_one', [App\Http\Controllers\PolymorphicController::class, 'indexHasOne'])
    ->name('polymorphic.has_one');

Route::get('/polymorphic/has_many', [App\Http\Controllers\PolymorphicController::class, 'indexHasMany'])
    ->name('polymorphic.has_many');
