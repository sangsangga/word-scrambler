<?php

use App\Http\Controllers\GameController;
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
Route::get('/game', [GameController::class, 'index'])->name('game')->middleware('auth');
Route::get('/words', [GameController::class, 'getAllWord']);
Route::get('/myGame', [UserController::class, 'myGame'])->name('myGame')->middleware('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/answer/{id}', [GameController::class, 'checkAnswer']);
