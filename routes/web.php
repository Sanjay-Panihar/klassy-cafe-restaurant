<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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



Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/dashboard', function () {
    return view('admin.layouts.adminhome');
})->middleware(['auth'])->name('dashboard');

Route::resource('users', Admin\UserController::class);
Route::resource('food', Admin\FoodController::class);


Route::post('/changeStatus',[Admin\UserController::class, 'changeStatus']);
require __DIR__.'/auth.php';
