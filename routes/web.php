<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get(
    '/',
    function () {
        return view('welcome');
})->name('welcome');

Route::post(
    '/logout',
    [LogoutController::class, 'logout']
)->name('logout')->middleware('auth');

Route::post(
    '/login',
    [LoginController::class, 'authenticate']
)->name('login');

Route::get(
    '/login',
    [LoginController::class, 'create']
)->name('login');

Route::get(
    '/register',
    [RegisterController::class, 'create']
)->name('register');

Route::post(
    '/register',
    [RegisterController::class, 'store']
)->name('register');
