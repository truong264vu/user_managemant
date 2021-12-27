<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/home', function () {
    return view('home.index');
})->name('home');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::name('auth.')->prefix('auth')->group(function () {

        Route::get('/authentication', [AuthController::class, 'Authentication'])->name('authentication');
        Route::post('/login', [AuthController::class, 'Login'])->name('HandleLogin');
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/register', [AuthController::class, 'Register'])->name('register');
        Route::get('email_confirm',[AuthController::class, 'emailConfirm'])->name('email_confirm');

});
