<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::middleware(['guest'])->group(function() {
    Route::get('/', function () {
        return redirect()->intended('/login');
    });

    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/login', [MainController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function() {
    Route::get ('/home', [MainController::class, 'home'])->name('home');
    Route::post('/calculate', [MainController::class, 'calculate'])->name('calculate');
});
