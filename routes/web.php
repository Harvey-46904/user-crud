<?php

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
    return redirect()->route('login'); // Cambia 'login' por el nombre de la ruta que tengas configurada para el inicio de sesión
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', "DashboardController@index")->name('dashboard');
});

Route::post('/login', "AuthController@login");
Route::post('/register', "AuthController@register");
Route::post('/logout', "AuthController@logout")->middleware('auth')->name("logout");

require __DIR__ . '/auth.php';
