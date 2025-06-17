<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class,'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class,'index'])->name('contact');
Route::get('/login_admin', [App\Http\Controllers\Auth\LoginAdminController::class,'index'])->name('login_admin');
Route::get('/create', [App\Http\Controllers\TiketController::class,'create'])->name('create');
