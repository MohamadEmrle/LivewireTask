<?php

use App\Http\Controllers\Task\UserController;
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
    return view('pages.login');
});


Route::group(['namespace' => 'Task' , 'prefix' => 'user'],function(){
    Route::get('register',[UserController::class,'register'])->name('user.register');
    Route::get('login',[UserController::class,'login'])->name('user.login');
    Route::get('dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
});

Route::group(['namespace' => 'Task' , 'prefix' => 'user' , 'middleware' => 'check'],function(){
    Route::get('dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
});
