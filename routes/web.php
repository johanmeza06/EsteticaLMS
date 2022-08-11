<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ReservasController;

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
    return view('auth.login'); 
});

// Route::get('/cliente', function () {
//     return view('cliente.index');
// });

// Route::get('cliente/nuevo-cliente', [ClientesController::class, 'create']);

Route::resource('cliente', ClientesController::class)->middleware('auth');
Route::resource('reserva', ReservasController::class)->middleware('auth');

Auth::routes(['reset' => false]);

Route::get('/home', [ClientesController::class, 'index'])->name('home');
Route::middleware(['middleware', 'auth'], function () {
    Route::get('/', [ClientesController::class, 'index'])->name('home');
});
