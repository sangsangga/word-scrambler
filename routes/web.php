<?php

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
    return view('auth.register');
})->name('home');
Route::get("/login", [UserController::class, 'loginIndex'])->name("login");
Route::post("/login", [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/game', function () {
    return view('game');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
